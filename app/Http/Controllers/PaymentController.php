<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Tambah ini!
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function makePayment(Request $request)
    {
        Config::$serverKey = 'SB-Mid-server-idLBWpOyQV1zigXLzgqL67S7';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $orderId = uniqid();
        $grossAmount = $request->total;

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

        $snapToken = Snap::getSnapToken($params);

        session(['current_order_id' => $orderId]);

        return response()->json(['snap_token' => $snapToken]);
    }
    public function index()
{
    return view('pages.payment');
}

}
