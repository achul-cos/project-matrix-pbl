<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('pages.admin_coupon_management', compact('coupons'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'code' => 'nullable|unique:coupons',
            'sponsor' => 'nullable',
            'desc' => 'nullable',
            'qty_can_use' => 'required|integer|min:1',
            'qty_token' => 'required|integer|min:1',
            'expired' => 'required|date',
        ]);

        // ambil input code
        $code = $request->input('code');

        if (empty($code)) {
            do {
                $code = Str::upper(Str::random(8));
            } while (Coupon::where('code', $code)->exists());
        } else {
            // jika diisi manual, tetap validasi ulang
            if (Coupon::where('code', $code)->exists()) {
                return back()->withErrors(['Kode kupon sudah digunakan.'])->withInput();
            }
        }

        $validated['code'] = $code;

        $validated['qty_use'] = 0; // set default kupon terpakai

        Coupon::create($validated);

        return redirect()->route('admin.coupon.index')->with('success', 'Kupon berhasil ditambahkan!');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return back()->with('success', 'Kupon berhasil dihapus!');
    }

    public function redeem(Request $request)
    {
        $request->validate([
            'coupon' => 'required|string',
        ]);

        $user = Auth::user();

        $coupon = Coupon::where('code', $request->coupon)
            ->where('expired', '>', now())
            ->first();

        if (!$coupon) {
            return back()->withErrors(['Kode tidak valid atau sudah kadaluarsa.']);
        }

        $alreadyUsed = DB::table('coupons_report')
            ->where('coupon_id', $coupon->id)
            ->where('user_id', $user->id)
            ->exists();

        if ($alreadyUsed) {
            return back()->withErrors(['Kamu sudah pernah menukarkan kupon ini.']);
        }

        if ($coupon->qty_use >= $coupon->qty_can_use) {
            return back()->withErrors(['Kupon ini sudah habis digunakan.']);
        }

        // Tambahkan ke laporan
        DB::table('coupons_report')->insert([
            'coupon_id' => $coupon->id,
            'user_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $coupon->increment('qty_use');

        // Asumsi kolom token ada di tabel users
        $user->token = (int)$user->token + $coupon->qty_token;
        $user->save();

        return back()->with('success', 'Berhasil menukarkan kupon. Token kamu bertambah!');
    }

}
