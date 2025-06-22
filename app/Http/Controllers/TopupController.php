<?php

namespace App\Http\Controllers;


use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PaymentReport;
use App\Models\TopUpReport;
use App\Models\Coupon;
use App\Models\CouponReport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TopupController extends Controller
{
    // Konstanta harga token
    const TOKEN_PRICE = 2000;

    /**
     * Tampilkan halaman sukses setelah pembayaran,
     * dan kirim data transaksi ke view.
     */
    public function showSuccessPage($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);

        return view('pages.topup-success', [
            'transactionId' => $transaction->id,
            'tokens' => $transaction->token_amount,
            'total' => $transaction->total_price,
        ]);
    }

    /**
     * Download struk pembayaran dalam bentuk PDF.
     */
    public function downloadReceipt($id)
    {
        $transaction = Transaction::findOrFail($id);

        $pdf = PDF::loadView('pdf.receipt', [
            'transaction' => $transaction,
            'date' => Carbon::now()->format('d M Y, H:i')
        ]);

        return $pdf->download('struk-topup-' . $transaction->id . '.pdf');
    }

    /**
     * Topup melalui admin (offline)
     */
    public function adminTopup(Request $request)
    {
        Log::info('📥 Memasuki fungsi adminTopup', $request->all());
        Log::info("🪪 Nilai coupon sebelum validasi: " . print_r($request->coupon, true));

        $rules = [
            'login' => 'required|string',
            'payment_method' => 'required|in:cash,transfer,coupon',
            'note' => 'nullable|string',
            'coupon' => 'nullable|required_if:payment_method,coupon|string',
            'image1' => 'required_unless:payment_method,coupon|image|mimes:jpeg,png,jpg,webp|max:2048'
        ];

        if ($request->payment_method !== 'coupon') {
            $rules['qty_token'] = 'required|integer|min:1';
            $rules['qty_bill'] = 'required|integer|min:1';
        }

        $request->validate($rules);

        Log::info("🔍 Tipe data coupon: " . gettype($request->coupon));
        Log::info("🎟️ Nilai coupon string mentah: " . $request->coupon);


        DB::beginTransaction();
        
        try {
            // Cari user berdasarkan username atau email
            $user = User::where('username', $request->login)
                       ->orWhere('email', $request->login)
                       ->first();

            if (!$user) {
                return redirect()->back()->with('error', ['message' => 'User tidak ditemukan']);
            }

            if ($request->payment_method === 'coupon') {
                return $this->processCouponTopup($request, $user, true);
            } else {
                return $this->processRegularTopup($request, $user, true);
            }

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Topup online oleh user
     */
    public function userTopup(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:transfer,coupon',
            'qty_token' => 'required_unless:payment_method,coupon|integer|min:1',
            'coupon' => 'nullable|required_if:payment_method,coupon|string',
            'note' => 'nullable|string',
            'payment_photo' => 'required_unless:payment_method,coupon|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        DB::beginTransaction();
        
        try {
            $user = Auth::user();

            if ($request->payment_method === 'coupon') {
                return $this->processCouponTopup($request, $user, false);
            } else {
                return $this->processRegularTopup($request, $user, false);
            }

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Proses topup reguler (cash/transfer)
     */
    private function processRegularTopup(Request $request, User $user, bool $isAdmin)
    {
        $qtyToken = $request->qty_token;
        $qtyBill = $request->qty_bill ?? ($qtyToken * self::TOKEN_PRICE);
        
        // Upload foto bukti pembayaran
        $photoPath = null;
        $imageField = $isAdmin ? 'image1' : 'payment_photo';
        
        // Setelah simpan foto
        if ($request->hasFile($imageField)) {
            $photoPath = $request->file($imageField)->store('payment_proofs', 'public');
            Log::info("📷 Gambar disimpan di: $photoPath");
        }

        // Sebelum buat payment report
        Log::info("🧾 Akan buat payment report", [
            'user_id' => $user->id,
            'username' => $user->username,
            'qty_bill' => $qtyBill,
            'payment_method' => $request->payment_method,
            'status' => $isAdmin ? 'success' : 'pending',
        ]);

        // Buat payment report
        $paymentReport = PaymentReport::create([
            'user_id' => $user->id,
            'user_username' => $user->username,
            'midtrans_id' => null,
            'qty_bill' => $qtyBill,
            'payment_method' => $request->payment_method,
            'status' => $isAdmin ? 'success' : 'pending',
            'payment_start' => now(),
            'payment_end' => $isAdmin ? now() : now()->addHours(24),
            'note' => $request->note,
            'payment_photo' => $photoPath
        ]);


        // Cek apakah berhasil
        if (!$paymentReport) {
            Log::error("❌ Gagal membuat paymentReport");
            throw new \Exception("Gagal membuat paymentReport");
        }

        Log::info("✅ PaymentReport berhasil dibuat: ID {$paymentReport->id}");

        // Jika admin topup, langsung success dan tambah token
        if ($isAdmin) {
            $this->completeTopup($paymentReport, $user, $qtyToken, 'offline');
            
            DB::commit();
            Log::info("✅ DB Commit sukses untuk user: $user->username");

            return redirect()->back()->with('success', 'Topup berhasil! Token telah ditambahkan ke akun ' . $user->username);
            
        } else {
            DB::commit();
            return redirect()->back()->with('success', 'Permintaan topup berhasil dibuat. Silakan tunggu konfirmasi pembayaran.');
        }
    }

    /**
     * Proses topup dengan kupon
     */
    private function processCouponTopup(Request $request, User $user, bool $isAdmin)
    {
        Log::info("🔍 Memulai proses kupon", ['coupon' => $request->coupon]);

        $coupon = Coupon::where('code', $request->coupon)->first();
        Log::info("🎟️ Coupon ditemukan?", ['coupon_found' => $coupon ? true : false]);
        
        if (!$coupon) {
            throw new \Exception('Kode kupon tidak ditemukan');
        }

        // Cek apakah kupon masih berlaku
        if ($coupon->expired < now()) {
            throw new \Exception('Kupon sudah expired');
        }

        // Cek apakah kupon masih bisa digunakan
        if ($coupon->qty_use >= $coupon->qty_can_use) {
            throw new \Exception('Kupon sudah mencapai batas maksimal penggunaan');
        }

        // Cek apakah user sudah pernah menggunakan kupon ini
        $hasUsed = CouponReport::where('coupon_id', $coupon->id)
                              ->where('user_id', $user->id)
                              ->exists();

        if ($hasUsed) {
            throw new \Exception('Anda sudah pernah menggunakan kupon ini sebelumnya');
        }

        // Buat payment report dengan nominal 0
        $paymentReport = PaymentReport::create([
            'user_id' => $user->id,
            'user_username' => $user->username,
            'midtrans_id' => null,
            'qty_bill' => 0,
            'payment_method' => 'coupon',
            'status' => 'success',
            'payment_start' => now(),
            'payment_end' => now(),
            'note' => 'Pembayaran menggunakan kupon: ' . $coupon->code,
            'payment_photo' => null
        ]);

        // Update penggunaan kupon
        Log::info("❗ expired sebelum increment: " . $coupon->expired);
        Log::info('💣 Perubahan attribute model:', $coupon->getDirty());
        Coupon::where('id', $coupon->id)->increment('qty_use');
        Log::info("✅ expired setelah increment: " . $coupon->fresh()->expired);

        // Catat penggunaan kupon
        CouponReport::create([
            'coupon_id' => $coupon->id,
            'user_id' => $user->id
        ]);

        // Complete topup dengan token dari kupon
        $topupMethod = $isAdmin ? 'offline' : 'online';
        $this->completeTopup($paymentReport, $user, $coupon->qty_token, $topupMethod);

        DB::commit();
        return redirect()->back()->with('success', 'Topup dengan kupon berhasil! ' . $coupon->qty_token . ' token telah ditambahkan ke akun Anda');
    }

    /**
     * Redeem Token Dari Sisi user
     */
    public function redeemCoupon(Request $request)
    {
        $request->validate([
            'coupon' => 'required|string'
        ]);

        DB::beginTransaction();

        try {
            $user = Auth::user();
            $coupon = Coupon::where('code', $request->coupon)->first();

            if (!$coupon) {
                return back()->withErrors(['coupon' => 'Kode kupon tidak ditemukan.']);
            }

            if ($coupon->expired < now()) {
                return back()->withErrors(['coupon' => 'Kupon sudah expired.']);
            }

            if ($coupon->qty_use >= $coupon->qty_can_use) {
                return back()->withErrors(['coupon' => 'Kupon sudah mencapai batas penggunaan.']);
            }

            $alreadyUsed = CouponReport::where('coupon_id', $coupon->id)
                                    ->where('user_id', $user->id)
                                    ->exists();

            if ($alreadyUsed) {
                return back()->withErrors(['coupon' => 'Kamu sudah pernah menggunakan kupon ini.']);
            }

            // Buat payment report
            $paymentReport = PaymentReport::create([
                'user_id' => $user->id,
                'user_username' => $user->username,
                'midtrans_id' => null,
                'qty_bill' => 0,
                'payment_method' => 'coupon',
                'status' => 'success',
                'payment_start' => now(),
                'payment_end' => now(),
                'note' => 'Redeem kupon user: ' . $coupon->code,
                'payment_photo' => null
            ]);

            // Increment kupon
            Coupon::where('id', $coupon->id)->increment('qty_use');

            // Catat laporan kupon
            CouponReport::create([
                'coupon_id' => $coupon->id,
                'user_id' => $user->id
            ]);

            // Tambah token ke user
            $this->completeTopup($paymentReport, $user, $coupon->qty_token, 'online');

            DB::commit();

            return back()->with('success', 'Berhasil redeem! Token berhasil ditambahkan ke akunmu.');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['coupon' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Selesaikan proses topup
     */
    private function completeTopup(PaymentReport $paymentReport, User $user, int $qtyToken, string $topupMethod)
    {
        // Buat topup report
        TopUpReport::create([
            'user_id' => $user->id,
            'payment_id' => $paymentReport->id,
            'qty_token' => $qtyToken,
            'qty_bill' => $paymentReport->qty_bill,
            'topup_method' => $topupMethod,
            'payment_method' => $paymentReport->payment_method,
            'note' => $paymentReport->note,
            'paid_at' => now()
        ]);

        // Tambah token ke user
        $before = $user->token;
        $user->increment('token', $qtyToken);
        $after = $user->fresh()->token;

        Log::info("✅ Token user $user->username: sebelum $before, tambah $qtyToken, setelah: $after");
    }

    /**
     * Konfirmasi pembayaran oleh admin (untuk topup online yang pending)
     */
    public function confirmPayment(Request $request, $paymentId)
    {
        DB::beginTransaction();
        
        try {
            $paymentReport = PaymentReport::findOrFail($paymentId);
            
            if ($paymentReport->status !== 'pending') {
                return redirect()->back()->withErrors(['error' => 'Pembayaran sudah dikonfirmasi atau dibatalkan']);
            }

            $user = User::findOrFail($paymentReport->user_id);
            
            if ($request->action === 'approve') {
                $paymentReport->update([
                    'status' => 'success',
                    'payment_end' => now()
                ]);

                // Hitung token berdasarkan bill
                $qtyToken = intval($paymentReport->qty_bill / self::TOKEN_PRICE);
                
                $this->completeTopup($paymentReport, $user, $qtyToken, 'online');
                
                DB::commit();
                Log::info("✅ DB Commit sukses untuk user: $user->username");

                return redirect()->back()->with('success', 'Pembayaran dikonfirmasi dan token telah ditambahkan');
                
            } else {
                $paymentReport->update([
                    'status' => 'failed',
                    'payment_end' => now()
                ]);
                
                DB::commit();
                return redirect()->back()->with('success', 'Pembayaran ditolak');
            }
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Validate coupon (AJAX)
     */
    public function validateCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();
        
        if (!$coupon) {
            return response()->json(['valid' => false, 'message' => 'Kode kupon tidak ditemukan']);
        }

        if ($coupon->expired < now()) {
            return response()->json(['valid' => false, 'message' => 'Kupon sudah expired']);
        }

        if ($coupon->qty_use >= $coupon->qty_can_use) {
            return response()->json(['valid' => false, 'message' => 'Kupon sudah mencapai batas maksimal penggunaan']);
        }

        $hasUsed = CouponReport::where('coupon_id', $coupon->id)
                              ->where('user_id', Auth::id())
                              ->exists();

        if ($hasUsed) {
            return response()->json(['valid' => false, 'message' => 'Anda sudah pernah menggunakan kupon ini']);
        }

        return response()->json([
            'valid' => true, 
            'coupon' => [
                'name' => $coupon->name,
                'qty_token' => $coupon->qty_token,
                'expired' => $coupon->expired->format('d/m/Y H:i')
            ]
        ]);
    }

    /**
     * Get pending payments untuk admin
     */
    // public function getPendingPayments()
    // {
    //     $pendingPayments = PaymentReport::with('user')
    //                                   ->where('status', 'pending')
    //                                   ->orderBy('payment_start', 'desc')
    //                                   ->get();
        
    //     return view('pages.admin_topup_report', compact('pendingPayments'));
    // }

    /**
     * Get topup history
     */
    // public function getTopupHistory(Request $request)
    // {
    //     $query = TopupReport::with(['user', 'paymentReport']);
        
    //     if ($request->user_id) {
    //         $query->where('user_id', $request->user_id);
    //     }
        
    //     $topups = $query->orderBy('paid_at', 'desc')->paginate(20);
        
    //     return view('pages.admin_topup_report', compact('topups'));
    // }

    /**
     * Read Topup and Payment Report
     */
    public function getAllTopupAndPayments(Request $request)
    {
        $topups = TopupReport::with(['user', 'paymentReport'])
                    ->orderByDesc('paid_at')
                    ->get();

        $payments = PaymentReport::with('user')
                    ->orderByDesc('payment_start')
                    ->get();

        return view('pages.admin_topup_report', compact('topups', 'payments'));
    }
}

