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
use Illuminate\Support\Str;
use IntlDateFormatter;


class TopupController extends Controller
{
    // Konstanta harga token
    const TOKEN_PRICE = 2000;

    /**
     * Tampilkan halaman sukses setelah pembayaran,
     * dan kirim data transaksi ke view.
     */
    public function showSuccessPage($paymentId)
    {
        $payment = PaymentReport::findOrFail($paymentId);

        // Jika status masih pending, cek status ke Xendit
        if ($payment->status === 'pending') {
            $xenditController = new XenditPaymentController();
            $xenditController->checkPaymentStatus($paymentId);
            $payment->refresh(); // Refresh data terbaru
        }

        return view('pages.topup-success', [
            'transactionId' => $payment->external_id,
            'tokens' => $payment->token_amount,
            'total' => $payment->qty_bill,
            'status' => $payment->status,
            'payment' => $payment
        ]);
    }

    /**
     * Download struk pembayaran dalam bentuk PDF.
     */
    public function downloadReceipt($id)
    {
        try {
            $payment = PaymentReport::with('user')->findOrFail($id);

            $tokens = $payment->token_amount;
            $amount = $payment->qty_bill;

            if ($topup = TopUpReport::where('payment_id', $payment->id)->first()) {
                $tokens = $topup->qty_token;
                $amount = $topup->qty_bill;
            }

            $pdf = PDF::loadView('pdf.receipt', [
                'transaction' => (object) [
                    'id' => $payment->external_id ?? $payment->id,
                    'tokens' => $tokens,
                    'amount' => $amount,
                    'method' => $payment->payment_method,
                    'date' => $payment->payment_start, // Pastikan ini ada
                    'user' => $payment->user, // Pastikan relasi user dimuat
                ],
                'date' => Carbon::now()->format('d M Y, H:i')
            ]);

            return $pdf->download('receipt-' . ($payment->external_id ?? $payment->id) . '.pdf');
        } catch (\Exception $e) {
            Log::error('Gagal membuat struk: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengunduh struk');
        }
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
                Log::warning("❌ Kupon tidak ditemukan: {$request->coupon}");
                return back()->withErrors(['coupon' => 'Kode kupon tidak ditemukan.']);
            }

            if ($coupon->expired < now()) {
                Log::warning("⏰ Kupon expired: {$coupon->code}");
                return back()->withErrors(['coupon' => 'Kupon sudah expired.']);
            }

            if ($coupon->qty_use >= $coupon->qty_can_use) {
                Log::warning("⚠️ Kupon limit: {$coupon->code}");
                return back()->withErrors(['coupon' => 'Kupon sudah mencapai batas penggunaan.']);
            }

            $alreadyUsed = CouponReport::where('coupon_id', $coupon->id)
                ->where('user_id', $user->id)
                ->exists();

            if ($alreadyUsed) {
                Log::info("ℹ️ Kupon sudah digunakan oleh user {$user->username}");
                return back()->withErrors(['coupon' => 'Kamu sudah pernah menggunakan kupon ini.']);
            }

            $paymentReport = PaymentReport::create([
                'user_id' => $user->id,
                'user_username' => $user->username,
                'qty_bill' => 0,
                'payment_method' => 'coupon',
                'status' => 'success',
                'payment_start' => now(),
                'payment_end' => now(),
                'note' => 'Redeem kupon user: ' . $coupon->code,
                'payment_photo' => null
            ]);

            Coupon::where('id', $coupon->id)->increment('qty_use');

            CouponReport::create([
                'coupon_id' => $coupon->id,
                'user_id' => $user->id
            ]);

            $this->completeTopup($paymentReport, $user, $coupon->qty_token, 'online');

            DB::commit();

            Log::info("✅ Kupon berhasil diredeem oleh {$user->username}, token +{$coupon->qty_token}");
            return back()->with('success', 'Berhasil redeem! Token berhasil ditambahkan ke akunmu.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('❌ Error saat redeem kupon: ' . $e->getMessage());
            return back()->withErrors(['coupon' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
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
     * Get pending payments untuk admin
     */
    public function getPendingPayments()
    {
        $pendingPayments = PaymentReport::with('user')
            ->where('status', 'pending')
            ->orderBy('payment_start', 'desc')
            ->get();

        return view('admin.pending-payments', compact('pendingPayments'));
    }

    /**
     * Get topup history
     */
    public function getTopupHistory(Request $request)
    {
        $query = TopUpReport::with(['user', 'paymentReport']);

        if ($request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        $topups = $query->orderBy('paid_at', 'desc')->paginate(20);

        return view('admin.topup', compact('topups'));
    }

    public function makePayment(Request $request)
    {
        $user = Auth::user();

        $orderId = 'TOPUP-' . Str::uuid();

        // Simpan dulu ke database, status masih pending
        TopUpreport::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'tokens_added' => $request->amount / 1000, // contoh 1000 rupiah = 1 token
            'status' => 'pending',
            'midtrans_order_id' => $orderId
        ]);

        // Buat Snap Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $request->amount,
            ],
            'customer_details' => [
                'email' => $user->email,
            ],
            'callbacks' => [
                'finish' => url('/topup-success')
            ]
        ];

        \Midtrans\Config::$serverKey = 'SB-Mid-server-idLBWpOyQV1zigXLzgqL67S7';
        \Midtrans\Config::$isProduction = false;

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json(['snapToken' => $snapToken]);
    }

    public function midtransCallback(Request $request)
    {
        Log::info('📩 Callback Midtrans masuk', $request->all());

        $serverKey = 'SB-Mid-server-idLBWpOyQV1zigXLzgqL67S7';
        $signature = hash(
            'sha512',
            $request->order_id .
                $request->status_code .
                $request->gross_amount .
                $serverKey
        );

        if ($signature !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Cek status berhasil
        if (in_array($request->transaction_status, ['capture', 'settlement'])) {
            $payment = PaymentReport::where('midtrans_id', $request->order_id)->first();

            if ($payment) {
                if ($payment->status !== 'success') {
                    $payment->status = 'success';
                    $payment->payment_end = now();
                    $payment->midtrans_payment_type = $request->payment_type ?? null;
                    $payment->save();
                }

                // Cek apakah sudah ada entri topup_report
                $alreadyExists = TopUpReport::where('payment_id', $payment->id)->exists();

                if (!$alreadyExists) {
                    $jumlahToken = $this->hitungToken($payment->qty_bill);

                    TopUpReport::create([
                        'user_id' => $payment->user_id,
                        'payment_id' => $payment->id,
                        'qty_token' => $jumlahToken,
                        'qty_bill' => $payment->qty_bill,
                        'topup_method' => 'online',
                        'payment_method' => 'transfer',
                        'note' => 'Topup otomatis dari Midtrans',
                        'paid_at' => now(),
                    ]);

                    // ✅ INI DIA FIX-NYA
                    $user = User::find($payment->user_id);
                    if ($user) {
                        $before = $user->token;
                        $user->increment('token', $jumlahToken);
                        $after = $user->fresh()->token;

                        Log::info("✅ Token user $user->username: sebelum $before, tambah $jumlahToken, setelah: $after");
                    } else {
                        Log::error("❌ User dengan ID {$payment->user_id} tidak ditemukan saat proses token topup.");
                    }
                }
            }
        }

        return response()->json(['message' => 'Callback handled']);
    }

    private function hitungToken($bill)
    {
        return intval($bill / 2000); // Misal: Rp.2000 = 1 token
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
     * Read Topup and Payment Report
     */

    public function topupReport()
    {
        // Ambil data payment report yang berhasil
        $payments = PaymentReport::with('topup', 'user')
            ->whereNotNull('paid_at')
            ->where('status', 'success')
            ->orderBy('paid_at', 'asc')
            ->get();

        // Inisialisasi variabel
        $topupCounts = [];
        $tokenTopupCountsPerDay = [];
        $revenuePerDay = [];

        // Proses data per hari
        foreach ($payments as $payment) {
            $tanggalKey = $payment->paid_at->format('Y-m-d');
            
            // Jumlah transaksi
            $topupCounts[$tanggalKey] = ($topupCounts[$tanggalKey] ?? 0) + 1;
            
            // Jumlah token (termasuk yang menggunakan kupon)
            if ($payment->topup) {
                $tokenTopupCountsPerDay[$tanggalKey] = ($tokenTopupCountsPerDay[$tanggalKey] ?? 0) + $payment->topup->qty_token;
            }
            
            // Pendapatan (tidak termasuk yang menggunakan kupon)
            // Karena kupon biasanya tidak menghasilkan uang
            if ($payment->payment_method !== 'coupon') {
                $revenuePerDay[$tanggalKey] = ($revenuePerDay[$tanggalKey] ?? 0) + $payment->qty_bill;
            }
        }

        // Urutkan berdasarkan tanggal
        ksort($topupCounts);
        ksort($tokenTopupCountsPerDay);
        ksort($revenuePerDay);

        // Siapkan data untuk chart
        $categories = [];
        $data = []; // Transaksi
        $tokenData = []; // Token
        $revenueData = []; // Pendapatan

        foreach ($topupCounts as $tanggal => $jumlah) {
            $categories[] = Carbon::parse($tanggal)->isoFormat('D MMMM');
            $data[] = $jumlah;
            $tokenData[] = $tokenTopupCountsPerDay[$tanggal] ?? 0;
            $revenueData[] = $revenuePerDay[$tanggal] ?? 0;
        }

        // Periode bulan ini
        $startDate = Carbon::now()->subMonth()->startOfDay();
        $endDate = Carbon::now()->endOfDay();
        
        // Periode bulan sebelumnya
        $prevStartDate = Carbon::now()->subMonths(2)->startOfDay();
        $prevEndDate = Carbon::now()->subMonth()->endOfDay();

        // Hitung statistik bulan ini
        $statsBulanIni = $this->calculateStats($payments, $startDate, $endDate);
        
        // Hitung statistik bulan sebelumnya
        $statsBulanSebelumnya = $this->calculateStats($payments, $prevStartDate, $prevEndDate);

        // Hitung persentase perubahan
        $persentase = $this->calculatePercentageChanges($statsBulanIni, $statsBulanSebelumnya);

        // Format tanggal untuk tampilan
        $fmt = new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        $startDateFormatted = $fmt->format($startDate);
        $endDateFormatted = $fmt->format($endDate);

        return view('pages.admin_topup_report', [
            'payments' => $payments,
            'categories' => $categories,
            'data' => $data,
            'tokenData' => $tokenData,
            'revenueData' => $revenueData,
            'statsBulanIni' => $statsBulanIni,
            'statsBulanSebelumnya' => $statsBulanSebelumnya,
            'persentase' => $persentase,
            'startDateFormatted' => $startDateFormatted,
            'endDateFormatted' => $endDateFormatted,
        ]);
    }

    private function calculateStats($payments, $startDate, $endDate)
    {
        $transaksi = 0;
        $token = 0;
        $pendapatan = 0;

        foreach ($payments as $payment) {
            if ($payment->paid_at >= $startDate && $payment->paid_at <= $endDate) {
                $transaksi++;
                
                // $pendapatan += $payment->qty_bill;
                
                if ($payment->topup) {
                    $token += $payment->topup->qty_token;
                }

                if ($payment->payment_method !== 'coupon') {
                    $pendapatan += $payment->qty_bill;
                }                
            }
        }

        return [
            'transaksi' => $transaksi,
            'token' => $token,
            'pendapatan' => $pendapatan,
        ];
    }

    private function calculatePercentageChanges($current, $previous)
    {
        $persentase = [
            'transaksi' => null,
            'token' => null,
            'pendapatan' => null,
        ];

        if ($previous['transaksi'] > 0) {
            $persentase['transaksi'] = (($current['transaksi'] - $previous['transaksi']) / $previous['transaksi']) * 100;
        }

        if ($previous['token'] > 0) {
            $persentase['token'] = (($current['token'] - $previous['token']) / $previous['token']) * 100;
        }

        if ($previous['pendapatan'] > 0) {
            $persentase['pendapatan'] = (($current['pendapatan'] - $previous['pendapatan']) / $previous['pendapatan']) * 100;
        }

        return $persentase;
    }


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
                // Redirect ke Xendit untuk pembayaran transfer
                return $this->initiateXenditPayment($request, $user);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    private function initiateXenditPayment(Request $request, User $user)
    {
        $qtyToken = $request->qty_token;
        $qtyBill = $qtyToken * self::TOKEN_PRICE;

        // Buat payment report
        $paymentReport = PaymentReport::create([
            'user_id' => $user->id,
            'user_username' => $user->username,
            'qty_bill' => $qtyBill,
            'token_amount' => $qtyToken,
            'payment_method' => 'online',
            'status' => 'pending',
            'payment_start' => now(),
            'external_id' => (string) Str::uuid(),
        ]);

        // Panggil Xendit controller
        $xenditController = new XenditPaymentController();
        $response = $xenditController->makePayment(new Request([
            'token_amount' => $qtyToken,
            'total' => $qtyBill,
        ]));

        // Handle response JSON
        $responseData = $response->getData();

        if (isset($responseData->redirect_url)) {
            DB::commit();
            return redirect()->away($responseData->redirect_url);
        } else {
            DB::rollback();
            Log::error('Gagal membuat pembayaran Xendit: ' . ($responseData->message ?? 'Unknown error'));
            return redirect()->back()->withErrors(['error' => 'Gagal membuat pembayaran: ' . ($responseData->message ?? 'Silakan coba lagi')]);
        }
    }

    private function completeTopup(PaymentReport $paymentReport, User $user, int $qtyToken, string $topupMethod)
    {
        // Jika pembayaran via Xendit, tandai sebagai metode 'xendit'
        $paymentMethod = $paymentReport->payment_method === 'online' && $topupMethod === 'online'
            ? 'xendit'
            : $paymentReport->payment_method;

        TopUpReport::create([
            'user_id' => $user->id,
            'payment_id' => $paymentReport->id,
            'qty_token' => $qtyToken,
            'qty_bill' => $paymentReport->qty_bill,
            'topup_method' => $topupMethod,
            'payment_method' => $paymentMethod,
            'note' => $paymentReport->note,
            'paid_at' => now()
        ]);

        $before = $user->token;
        $user->increment('token', $qtyToken);
        $after = $user->fresh()->token;

        Log::info("✅ Token user $user->username: sebelum $before, tambah $qtyToken, setelah: $after");
    }
    public function userTopupHistory()
    {
        $user = Auth::user();

        // Ambil semua payment report untuk user ini
        $payments = PaymentReport::with('topupReport')
            ->where('user_id', $user->id)
            ->orderBy('payment_start', 'desc')
            ->get();

        // Tambahkan ini untuk mengelompokkan berdasarkan tanggal
        $groupedPayments = $payments->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->payment_start)->format('Y-m-d');
        });

        // Kelompokkan berdasarkan status
        $pendingPayments = $payments->where('status', 'pending');
        $successPayments = $payments->where('status', 'success');
        $failedPayments = $payments->where('status', 'failed');

        return view('pages.history_topup', [
            'groupedPayments' => $groupedPayments,
            'pendingPayments' => $pendingPayments,
            'successPayments' => $successPayments,
            'failedPayments' => $failedPayments,
        ]);
    }
}
