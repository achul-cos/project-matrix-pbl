<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction; // <- pastikan kamu pakai model Transaction
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\PaymentReport;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    // public function makePayment(Request $request)
    // {
    //     // Konfigurasi Midtrans
    //     Config::$serverKey = 'SB-Mid-server-idLBWpOyQV1zigXLzgqL67S7';
    //     Config::$isProduction = false;
    //     Config::$isSanitized = true;
    //     Config::$is3ds = true;

    //     // Generate ID pesanan unik
    //     $orderId = uniqid();
    //     $grossAmount = $request->total;

    //     // Simpan transaksi ke database
    //     $transaction = Transaction::create([
    //         'user_id' => Auth::id(),
    //         'order_id' => $orderId,
    //         'token_amount' => $request->token_amount,
    //         'total_price' => $grossAmount,
    //         'status' => 'pending',
    //     ]);

    //     // Parameter untuk Midtrans Snap
    //     $params = [
    //         'transaction_details' => [
    //             'order_id' => $orderId,
    //             'gross_amount' => $grossAmount,
    //         ],
    //         'customer_details' => [
    //             'first_name' => Auth::user()->name ?? 'Guest',
    //             'email' => Auth::user()->email ?? 'guest@example.com',
    //         ]
    //     ];

    //     // Ambil Snap Token dari Midtrans
    //     $snapToken = Snap::getSnapToken($params);

    //     // Simpan order_id ke sesi (opsional)
    //     // session(['current_order_id' => $orderId]);

    //     // Kirim response ke frontend berupa token + id transaksi
    //     return response()->json([
    //         'snap_token' => $snapToken,
    //         'redirect_url' => route('topup.success', ['transactionId' => $transaction->id]),
    //     ]);
    // }

    public function makePayment(Request $request)
    {
        Log::info("👉 Request masuk ke makePayment", $request->all());
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        Log::info("👉 Request masuk ke makePayment", $request->all());
        $request->validate([
            'token_amount' => 'required|integer|min:1',
            'total' => 'required|integer|min:1000'
        ]);

        $orderId = uniqid();
        $grossAmount = (int) $request->total;

        $payment = PaymentReport::create([
            'user_id' => Auth::id(),
            'user_username' => Auth::user()->username,
            'midtrans_id' => $orderId,
            'qty_bill' => $grossAmount,
            'token_amount' => $request->token_amount,
            'payment_method' => 'online',
            'midtrans_payment_type' => null,
            'status' => 'pending',
            'payment_start' => now(),
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name ?? 'Guest',
                'email' => Auth::user()->email ?? 'guest@example.com',
            ]
        ];

        try {
            Log::info("📦 Params ke Midtrans", $params);
            $snapToken = Snap::getSnapToken($params);
            Log::info("✅ Snap Token Created", ['order_id' => $orderId, 'token' => $snapToken]);

            Log::info("Snap Token Response", [
                'token' => $snapToken,
                'params' => $params
            ]);

            return response()->json([
                'snap_token' => $snapToken,
                'redirect_url' => route('topup.success', ['paymentId' => $payment->id]),
            ]);
        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
            return response()->json(['message' => 'Gagal membuat Snap token'], 500);
        }
    }

    public function index()
    {
        return view('pages.payment');
    }
}
