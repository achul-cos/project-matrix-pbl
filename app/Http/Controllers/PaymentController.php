<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction; // <- pastikan kamu pakai model Transaction
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function makePayment(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = 'SB-Mid-server-idLBWpOyQV1zigXLzgqL67S7';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Generate ID pesanan unik
        $orderId = uniqid();
        $grossAmount = $request->total;

        // Simpan transaksi ke database
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'order_id' => $orderId,
            'token_amount' => $request->token_amount,
            'total_price' => $grossAmount,
            'status' => 'pending',
        ]);

        // Parameter untuk Midtrans Snap
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

        // Ambil Snap Token dari Midtrans
        $snapToken = Snap::getSnapToken($params);

        // Simpan order_id ke sesi (opsional)
        session(['current_order_id' => $orderId]);

        // Kirim response ke frontend berupa token + id transaksi
        return response()->json([
            'snap_token' => $snapToken,
            'redirect_url' => route('topup.success', ['transactionId' => $transaction->id]),
        ]);
    }

    public function index()
    {
        return view('pages.payment');
    }
}
