<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InformasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\SuggestController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\XenditPaymentController;
use App\Http\Middleware\VerifyCsrfToken;

// Route::get('/', function () {
//     return view('pages.landing');
// });

Route::get('/', [ProductController::class, 'LandingPage'])->name('pages.landing');

Route::get('/register', [AuthController::class, 'register'])->name('register');


Route::get('/login', [AuthController::class, 'login'])->name('login');


Route::post('/simpanuser', [AuthController::class, 'simpanuser'])->name('registerAccount');


Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');


Route::get('/logout', [AuthController::class, 'logout'])->name('logoutAccount');


Route::post('/settingacount', [UserController::class, 'updateAccount'])->middleware('auth')->name('update.account');


Route::get('login/google', [AuthController::class, 'redirectToGoogle']);


Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/forgot-password', [OtpController::class, 'showForgetForm'])->name('forget.form');
Route::post('/forgot-password', [OtpController::class, 'submitEmail'])->name('forgot.submit');

Route::get('/otp-verification', [OtpController::class, 'showOtpForm'])->name('otp.form');
Route::post('/otp-verification', [OtpController::class, 'verifyOtp'])->name('verify.otp');

Route::get('/reset-password', [OtpController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset-password', [OtpController::class, 'storeNewPassword'])->name('password.store');

Route::get('/otp', [OtpController::class, 'showOtpForm'])->name('otp.form');
Route::post('/resend-otp', [OtpController::class, 'resendOtp'])->name('resend.otp');

Route::get('/reset', function () {
    return view('pages.reset');
});


Route::get('/forget', function () {
    return view('pages.forget');
});


Route::get('/otp', function () {
    return view('pages.otp');
});

Route::post('/midtrans/callback', [TopupController::class, 'midtransCallback'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::middleware(['auth:user', 'update_last_online'])->prefix('')->group(function () {

    Route::get('/home', [ProductController::class, 'homePage'])->name('home');

    Route::get('/product/{id}', [ProductController::class, 'showTop'])->name('products.top');

    Route::get('/topup', function () {
        return view('pages.topup');
    })->name('topup');

    Route::get('/profile', function () {
        return view('pages.profile');
    })->name('profile');

    Route::get('/profile/topup', [TopupController::class, 'userTopupHistory'])->name('profile.history_topup');

    Route::get('/profile/rent', function () {
        return view('pages.history_rent');
    })->name('profile.history_rent');

    // Route::get('/topup-riwayat', [UserController::class, 'showRiwayat'])->middleware('auth');

    Route::get('/profile/change_password', function () {
        return view('pages.change_pw');
    })->name('profile.password');

    Route::get('/search', [ProductController::class, 'showSearchPage'])->name('search.page');

    Route::delete('/profile/delete-account', [ProfileController::class, 'hapusAkun'])->name('hapus.akun')->middleware('auth');

    Route::get('/developer', function () {
        return view('pages.developer');
    })->name('developer');

    Route::get('/faq', function () {
        return view('pages.faq');
    })->name('faq');

    Route::get('/invoice', function () {
        return view('pages.invoice_pc');
    })->name('invoice');

    Route::post('/updateprofile', [ProfileController::class, 'updateProfilePhoto'])->middleware('auth')->name('profile.photo.update');

    Route::get('/product/{id}', [ProductController::class, 'show'])->name('productPage.show');

    Route::post('/profile/change_pw', [ProfileController::class, 'changePassword'])->name('profile.change_password')->middleware('auth');

    Route::post('/change_pw', [ProfileController::class, 'changePassword'])->name('change_pw');

    Route::get('/payment', [PaymentController::class, 'index']);

    // Ini redirect ke halaman sukses, bawa ID
    Route::get('/topup-success/{paymentId}', [TopupController::class, 'showSuccessPage'])->name('topup.success');

    // Unduh struk
    Route::get('/download-receipt/{id}', [TopupController::class, 'downloadReceipt'])->name('topup.download-receipt');
    Route::post('/suggest/store', [SuggestController::class, 'store'])->name('suggest.store');

    Route::post('/topup/redeem-coupon', [TopupController::class, 'redeemCoupon'])->name('user.redeem-coupon');

    Route::post('/payment-process', [XenditPaymentController::class, 'makePayment']);
    Route::post('/xendit/webhook', [XenditPaymentController::class, 'handleCallback']);

    Route::get('/topup-success', [XenditPaymentController::class, 'topupSuccess'])->name('topup.success');
    Route::get('/topup-fail', [XenditPaymentController::class, 'topupFail'])->name('topup.fail');

    // Tambahkan route baru untuk check status
    Route::get('/payment-status/{paymentId}', [XenditPaymentController::class, 'checkPaymentStatus'])->name('payment.status');    
});


// Route untuk authentication admin
Route::get('/admin', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


// Route admin yang sudah ada dengan middleware
Route::middleware(['auth:admin', 'is_admin'])->group(function () {

    Route::get('/admin/live_rent_report', function () {
        return view('pages.admin_live_rent_report');
    })->name('admin.live_rent_report');

    Route::get('/admin/rent_report', function () {
        return view('pages.admin_rent_report');
    })->name('admin.rent_report');

    Route::get('/admin/management_warnet', function () {
        return view('pages.admin_management_warnet');
    })->name('admin.management_warnet');

    Route::get('/admin/management_admin', [AdminController::class, 'index'])->name('admin.management_admin');

    // Route::put('/admin/management_admin/update_admin/{admin}', [AdminController::class, 'update'])->name('admin.update');

    Route::put('/admin/management_admin/edit_admin/{id}', [AdminController::class, 'update'])->name('admin.update');

    Route::post('/admin/management_admin/add_admin', [AdminController::class, 'add'])->name('admin.add');

    Route::delete('/admin/management_admin/delete_admin/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::get('/admin/management_computer', [ProductController::class, 'readProductManagement'])->name('admin.management_computer');

    Route::post('/admin/management_computer/add_product', [ProductController::class, 'store'])->name('products.store');

    Route::delete('/admin/management_computer/delete_all', [ProductController::class, 'deleteAll'])->name('products.deleteAll');

    Route::put('/admin/management_computer/edit_product/{id}', [ProductController::class, 'update'])->name('products.update');

    Route::delete('/admin/management_computer/delete_product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/admin/monitoring_computer', [ProductController::class, 'monitoringComputer'])->name('admin.monitoring_computer');

    Route::get('/admin/management_account', [UserController::class, 'readUserManagement'])->name('admin.management_account');

    Route::post('/admin/management_account/add_user', [UserController::class, 'simpanUserAdmin'])->name('admin.tambahUser');

    Route::post('admin/management_account/ban_user/{id}', [UserController::class, 'ban'])->name('account.ban');;

    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->middleware('auth')->name('profile.destroy');

    Route::put('/admin/management_information/{id}', [AdminController::class, 'update'])->name('informasi.update');

    Route::get('/admin/management_information', [InformasiController::class, 'index'])->name('admin.management_information');

    Route::post('/admin/management_information', [InformasiController::class, 'store'])->name('events.store');

    Route::patch('/admin/management_account/unban_user/{id}', [UserController::class, 'unban'])->name('account.unban');

    Route::delete('/admin/management_account/delete_user/{id}', [UserController::class, 'deleteUser'])->name('admin.deleteUser');

    Route::delete('/admin/management_account/delete-all_user', [UserController::class, 'deleteAllUsers'])->name('admin.users.deleteAll');

    Route::put('/admin/management_account/edit_user/{id}', [UserController::class, 'updateUser'])->name('admin.updateUser');

    // Topup melalui admin
    Route::post('/admin/management_account/topup_user', [TopupController::class, 'adminTopup'])->name('admin.topup');

    // Validasi kupon dari admin
    Route::post('/admin/management_account/validate-coupon', [TopupController::class, 'validateCoupon'])->name('admin.validate-coupon');

    // Konfirmasi pembayaran
    Route::post('/admin/confirm-payment/{paymentId}', [TopupController::class, 'confirmPayment'])->name('admin.confirm-payment');

    // Lihat Riwayat Topup dan Pembayaran
    Route::get('/admin/topup_report', [TopupController::class, 'getAllTopupAndPayments'])->name('admin.topup_report');

    Route::get('/admin/management_kritik', [SuggestController::class, 'index'])->name('admin.management_kritik');

    Route::delete('/admin/saran-kritik/{id}', [SuggestController::class, 'destroy'])->name('suggest.destroy');

    Route::get('/admin/saran-kritik/export', [SuggestController::class, 'export'])->name('suggest.export');

    Route::get('/admin/saran-kritik/export-pdf', [SuggestController::class, 'exportPdf'])->name('suggest.export_pdf');
});

// API Routes untuk AJAX
Route::middleware(['auth'])->group(function () {
    // Check user by username/email (untuk admin)
    Route::post('/api/check-user', function (Request $request) {
        $user = \App\Models\User::where('username', $request->login)
            ->orWhere('email', $request->login)
            ->first();

        if ($user) {
            return response()->json([
                'found' => true,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                    'token' => $user->token
                ]
            ]);
        }

        return response()->json(['found' => false]);
    })->name('api.check-user');
});

Route::get('/test-log', function () {
    Log::info('✅ Log jalan dari route test-log');
    return 'Cek laravel.log sekarang';
});

Route::get('/cek-session', function () {
    session(['coba' => 'testing']);
    return session('coba', 'tidak ada session');
});

// Aktivasi penyewaan
Route::get('/activate', function () {
    return view('pages.activation_form');
})->name('activation.form');

Route::post('/activate', [RentalController::class, 'activateComputer'])
    ->name('activate');

Route::get('/activation/success', [RentalController::class, 'activationSuccess'])
    ->name('activation.success');

// Konfirmasi penyewaan
Route::get('/rental/confirmation/{rental}', [RentalController::class, 'showConfirmation'])
    ->name('user.rental.confirmation');

Route::get('/product/rent/{product}', [RentalController::class, 'rentComputer'])->name('rent.computer');