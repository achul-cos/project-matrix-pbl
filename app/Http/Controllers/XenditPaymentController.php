<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PaymentReport;
use App\Models\TopUpReport;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Xendit\XenditSdk;
use Illuminate\Support\Facades\Auth;
use Xendit\Invoice\InvoiceApi;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Illuminate\Support\Facades\DB;

class XenditPaymentController extends Controller
{
    protected $invoiceApi;

    public function __construct()
    {
        $apiKey = env('XENDIT_SECRET_KEY');

        if (empty($apiKey)) {
            throw new \Exception('Xendit API key tidak ditemukan');
        }

        // Set langsung ke Configuration
        Configuration::setXenditKey($apiKey);

        // Buat instance tanpa config tambahan
        $this->invoiceApi = new InvoiceApi();
    }

    public function create(Request $request)
    {
        // Validasi data input
        $request->validate([
            'payer_email' => 'required|email',
            'description' => 'required|string',
            'amount' => 'required|numeric|min:1000'
        ]);

        $external_id = (string) Str::uuid();

        // Siapkan parameter invoice
        $params = new CreateInvoiceRequest([
            'external_id' => $external_id,
            'payer_email' => $request->payer_email,
            'description' => $request->description,
            'amount' => $request->amount,
            'success_redirect_url' => url('/topup-success')
        ]);

        try {
            // Buat invoice via API
            $invoice = $this->invoiceApi->createInvoice($params);

            // Simpan ke database
            $payment = new PaymentReport;
            $payment->status = 'pending';
            $payment->checkout_link = $invoice['invoice_url'];
            $payment->external_id = $external_id;
            $payment->save();

            // Return URL untuk frontend redirect
            return response()->json(['data' => $invoice['invoice_url']]);
        } catch (\Exception $e) {
            Log::error('Xendit create invoice error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function makePayment(Request $request)
    {
        $request->validate([
            'token_amount' => 'required|integer|min:1',
            'total' => 'required|integer|min:1000'
        ]);

        $user = Auth::user();
        $externalId = (string) Str::uuid();
        $amount = $request->total;

        // Buat payment record terlebih dahulu dengan external_id yang benar
        $payment = PaymentReport::create([
            'user_id' => $user->id,
            'user_username' => $user->username,
            'qty_bill' => $amount,
            'token_amount' => $request->token_amount,
            'payment_method' => 'online',
            'status' => 'pending',
            'payment_start' => now(),
            'external_id' => $externalId, // Pastikan ini tersimpan
            'checkout_link' => '',
        ]);

        // Log untuk memastikan payment tersimpan
        Log::info('Payment record created: ', [
            'payment_id' => $payment->id,
            'external_id' => $payment->external_id,
            'user_id' => $payment->user_id
        ]);

        $params = new CreateInvoiceRequest([
            'external_id' => $externalId,
            'payer_email' => $user->email ?? 'guest@example.com',
            'description' => 'Pembelian Token Sebanyak ' . $request->token_amount,
            'amount' => $amount,
            'success_redirect_url' => route('topup.success', ['paymentId' => $payment->id]),
            'failure_redirect_url' => route('topup.fail', ['paymentId' => $payment->id]),
        ]);

        try {
            Log::info('Creating Xendit invoice with params: ', [
                'external_id' => $externalId,
                'amount' => $amount,
                'user_email' => $user->email,
                'payment_record_id' => $payment->id
            ]);

            $invoice = $this->invoiceApi->createInvoice($params);

            // Update checkout link dan simpan invoice_id
            $payment->update([
                'checkout_link' => $invoice['invoice_url'],
                'invoice_id' => $invoice['id'] ?? null // Simpan invoice ID dari Xendit
            ]);

            Log::info('✅ Invoice Xendit berhasil dibuat: ', [
                'invoice_url' => $invoice['invoice_url'],
                'invoice_id' => $invoice['id'] ?? 'not_provided',
                'payment_id' => $payment->id
            ]);

            return response()->json([
                'checkout_url' => $invoice['invoice_url'],
                'redirect_url' => $invoice['invoice_url'],
                'payment_id' => $payment->id,
                'external_id' => $externalId
            ]);
        } catch (\Exception $e) {
            Log::error('❌ Gagal membuat invoice Xendit: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            // Hapus payment record jika gagal
            $payment->delete();

            return response()->json(['message' => 'Gagal membuat invoice: ' . $e->getMessage()], 500);
        }
    }

    public function handleCallback(Request $request)
    {
        try {
            Log::info('Xendit callback received: ', $request->all());

            // Ambil data langsung dari callback request
            $externalId = $request->external_id;
            $status = strtolower($request->status);
            $invoiceId = $request->id;
            $paidAt = $request->paid_at;

            if (empty($externalId)) {
                Log::error('External ID tidak ditemukan dalam callback');
                return response()->json(['message' => 'Invalid callback data'], 400);
            }

            // Cari payment berdasarkan external_id
            $payment = PaymentReport::where('external_id', $externalId)->first();

            if (!$payment) {
                Log::warning('Payment not found for external_id: ' . $externalId);

                // Coba cari semua payment untuk debugging
                $allPayments = PaymentReport::select('id', 'external_id', 'status')->get();
                Log::info('All payments in database: ', $allPayments->toArray());

                return response()->json(['message' => 'Payment not found'], 404);
            }

            Log::info('Payment found: ', [
                'payment_id' => $payment->id,
                'current_status' => $payment->status,
                'new_status' => $status
            ]);

            // Cek apakah sudah diproses
            if (in_array($payment->status, ['success', 'paid', 'settled'])) {
                Log::info('Payment already processed: ' . $payment->id);
                return response()->json(['message' => 'Already processed'], 200);
            }

            // Update invoice_id jika belum ada
            if (empty($payment->invoice_id) && !empty($invoiceId)) {
                $payment->invoice_id = $invoiceId;
            }

            // Update status payment
            if (in_array($status, ['paid', 'settled'])) {
                $payment->status = 'success';
                $payment->paid_at = $paidAt ? now()->parse($paidAt) : now();
                $payment->payment_end = now();
                $payment->save();

                Log::info('Payment status updated to success: ', [
                    'payment_id' => $payment->id,
                    'external_id' => $externalId
                ]);

                // Proses penambahan token
                $this->processSuccessfulPayment($payment);

                Log::info('✅ Payment processed successfully: ' . $payment->id);
            } else {
                $payment->status = $status;
                $payment->save();
                Log::info('Payment status updated to: ' . $status . ' for payment: ' . $payment->id);
            }

            return response()->json(['message' => 'Callback processed successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Xendit callback error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json(['message' => 'Internal server error'], 500);
        }
    }

    private function processSuccessfulPayment($payment)
    {
        try {
            // Cek apakah sudah diproses sebelumnya
            $existingTopup = TopupReport::where('payment_id', $payment->id)->first();
            if ($existingTopup) {
                Log::info('Topup already processed for payment: ' . $payment->id);
                return;
            }

            // Validasi data payment
            if (empty($payment->user_id) || empty($payment->qty_bill)) {
                Log::error('Invalid payment data', ['payment_id' => $payment->id]);
                return;
            }

            $jumlahToken = $this->hitungToken($payment->qty_bill);

            if ($jumlahToken <= 0) {
                Log::error('Invalid token calculation', [
                    'payment_id' => $payment->id,
                    'qty_bill' => $payment->qty_bill,
                    'calculated_token' => $jumlahToken
                ]);
                return;
            }

            // Gunakan database transaction untuk memastikan konsistensi data
            DB::transaction(function () use ($payment, $jumlahToken) {
                // Tambah token ke topup_report
                TopupReport::create([
                    'user_id' => $payment->user_id,
                    'payment_id' => $payment->id,
                    'qty_token' => $jumlahToken,
                    'qty_bill' => $payment->qty_bill,
                    'topup_method' => 'online',
                    'payment_method' => 'xendit',
                    'note' => 'Topup otomatis dari Xendit - External ID: ' . $payment->external_id,
                    'paid_at' => $payment->paid_at ?? now(),
                ]);

                // Update token user
                $user = User::find($payment->user_id);
                if (!$user) {
                    throw new \Exception('User not found: ' . $payment->user_id);
                }

                $oldToken = $user->token;
                $user->increment('token', $jumlahToken);

                Log::info('Token berhasil ditambahkan', [
                    'user_id' => $user->id,
                    'old_token' => $oldToken,
                    'added_token' => $jumlahToken,
                    'new_token' => $user->fresh()->token,
                    'payment_id' => $payment->id
                ]);
            });
        } catch (\Exception $e) {
            Log::error('Error processing successful payment: ' . $e->getMessage(), [
                'payment_id' => $payment->id,
                'stack_trace' => $e->getTraceAsString()
            ]);

            // Bisa tambahkan notifikasi ke admin atau sistem monitoring
            throw $e; // Re-throw untuk debugging jika diperlukan
        }
    }

    private function hitungToken($bill)
    {
        return intval($bill / 2000); // Rp. 2000 = 1 token
    }

    public function topupSuccess(Request $request)
    {
        $paymentId = $request->paymentId;
        $payment = PaymentReport::find($paymentId);

        if (!$payment) {
            return redirect()->route('home')->with('error', 'Data pembayaran tidak ditemukan');
        }

        // Cek status payment terbaru dari Xendit (jika ada invoice_id)
        try {
            if (!empty($payment->invoice_id)) {
                $invoice = $this->invoiceApi->getInvoiceById($payment->invoice_id); // Gunakan invoice_id, bukan external_id
                $xenditStatus = strtolower($invoice['status']);

                Log::info('Checking payment status on success page: ', [
                    'payment_id' => $payment->id,
                    'invoice_id' => $payment->invoice_id,
                    'current_status' => $payment->status,
                    'xendit_status' => $xenditStatus
                ]);

                if (in_array($xenditStatus, ['paid', 'settled']) && $payment->status !== 'success') {
                    $payment->status = 'success';
                    $payment->paid_at = now();
                    $payment->payment_end = now();
                    $payment->save();

                    $this->processSuccessfulPayment($payment);

                    Log::info('Payment status updated on success page: ' . $payment->id);
                }
            } else {
                Log::warning('Invoice ID not found for payment: ' . $payment->id);
            }
        } catch (\Exception $e) {
            Log::error('Error checking payment status on success page: ' . $e->getMessage());
            // Jangan return error, tetap tampilkan halaman success
        }

        return view('pages.topup-success', [
            'tokens' => $payment->token_amount,
            'total' => $payment->qty_bill,
            'transactionId' => $payment->external_id,
            'payment' => $payment
        ]);
    }

    public function topupFail(Request $request)
    {
        $paymentId = $request->paymentId ?? null;
        $payment = null;

        if ($paymentId) {
            $payment = PaymentReport::find($paymentId);
        }

        return view('pages.topup-fail', [
            'payment' => $payment
        ]);
    }

    // Method untuk check status pembayaran via AJAX
    // public function checkPaymentStatus($paymentId)
    // {
    //     $payment = PaymentReport::find($paymentId);

    //     if (!$payment) {
    //         return response()->json(['error' => 'Payment not found'], 404);
    //     }

    //     try {
    //         $invoice = $this->invoiceApi->getInvoiceById($payment->external_id);
    //         $xenditStatus = strtolower($invoice['status']);

    //         // Update status jika berbeda
    //         if ($xenditStatus !== $payment->status) {
    //             if (in_array($xenditStatus, ['paid', 'settled'])) {
    //                 $payment->status = 'success';
    //                 $payment->paid_at = now();
    //                 $payment->payment_end = now();
    //                 $payment->save();

    //                 $this->processSuccessfulPayment($payment);
    //             } else {
    //                 $payment->status = $xenditStatus;
    //                 $payment->save();
    //             }
    //         }

    //         return response()->json([
    //             'status' => $payment->status,
    //             'xendit_status' => $xenditStatus,
    //             'payment_url' => $payment->checkout_link,
    //             'is_success' => in_array($payment->status, ['success', 'paid', 'settled'])
    //         ]);
    //     } catch (\Exception $e) {
    //         Log::error('Check payment status error: ' . $e->getMessage());
    //         return response()->json(['error' => 'Failed to check status'], 500);
    //     }
    // }

    // Method untuk validasi webhook (opsional)
    private function validateWebhookSignature(Request $request)
    {
        $callbackToken = env('XENDIT_CALLBACK_TOKEN'); // Set di .env

        if (empty($callbackToken)) {
            Log::warning('Xendit callback token tidak ditemukan');
            return false;
        }

        $requestToken = $request->header('x-callback-token');

        if ($requestToken !== $callbackToken) {
            Log::warning('Invalid webhook signature', [
                'expected' => $callbackToken,
                'received' => $requestToken
            ]);
            return false;
        }

        return true;
    }

    public function checkPaymentStatus($paymentId)
    {
        $payment = PaymentReport::find($paymentId);

        if (!$payment || $payment->status !== 'pending') {
            return;
        }

        try {
            $invoice = $this->invoiceApi->getInvoiceById($payment->invoice_id);
            $status = strtolower($invoice['status']);

            if (in_array($status, ['paid', 'settled'])) {
                $this->processSuccessfulPayment($payment);
            }
        } catch (\Exception $e) {
            Log::error('Error checking payment status: ' . $e->getMessage());
        }
    }
}
