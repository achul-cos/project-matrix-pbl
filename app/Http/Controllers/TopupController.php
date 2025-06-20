<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use PDF;
use Carbon\Carbon;

class TopupController extends Controller
{
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
}
