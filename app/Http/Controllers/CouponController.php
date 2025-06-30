<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

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
            'code' => 'required|unique:coupons',
            'sponsor' => 'nullable',
            'desc' => 'nullable',
            'qty_can_use' => 'required|integer|min:1',
            'qty_token' => 'required|integer|min:1',
            'expired' => 'required|date',
        ]);

        $validated['qty_use'] = 0; // set default kupon terpakai

        Coupon::create($validated);

        return redirect()->route('admin.coupon.index')->with('success', 'Kupon berhasil ditambahkan!');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return back()->with('success', 'Kupon berhasil dihapus!');
    }
}
