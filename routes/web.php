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
use App\Http\Controllers\WarnetController;
use App\Http\Controllers\XenditPaymentController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\CouponController;

/**
 * Guest Side - No Authentication
 */

//Landing Page
Route::get('/', [ProductController::class, 'LandingPage'])->name('pages.landing');

//Register Page
Route::get('/register', [AuthController::class, 'register'])->name('register');

//Register Page - Menyimpan data kaun
Route::post('/simpanuser', [AuthController::class, 'simpanuser'])->name('registerAccount');

//Login Page
Route::get('/login', [AuthController::class, 'login'])->name('login');

//Login Page - Autentikasi Pengguna
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

//Log Out
Route::get('/logout', [AuthController::class, 'logout'])->name('logoutAccount');

//Login Page - Login with google
Route::get('login/google', [AuthController::class, 'redirectToGoogle']);

//Login Page - Callback Login Form Google
Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);

/**
 * Forget Password Section
 */

//Input Email
Route::get('/forgot-password', [OtpController::class, 'showForgetForm'])->name('forget.form');

//Input Email - Kirim Kode OTP Ke Email
Route::post('/forgot-password', [OtpController::class, 'submitEmail'])->name('forgot.submit');
// Route::post('/forgot-submit', [ProfileController::class, 'forgotSubmit'])->name('forgot.submit');

//Input OTP
Route::get('/otp-verification', [OtpController::class, 'showOtpForm'])->name('otp.form');

//Input OTP - Resend Otp
Route::post('/resend-otp', [OtpController::class, 'resendOtp'])->name('resend.otp');

//Input OTP - Verifikasi Otp
Route::post('/otp-verification', [OtpController::class, 'verifyOtp'])->name('verify.otp');

//Reset Password
Route::get('/reset-password', [OtpController::class, 'showResetForm'])->name('password.reset.form');

//Reset Password - Update Password
Route::post('/reset-password', [OtpController::class, 'storeNewPassword'])->name('password.store');

/**
 * Forget Password Section - Done
 */

/**
 * Guest Side - Done
 */

/**
 * User Side
 */

Route::middleware(['auth:user', 'update_last_online'])->prefix('')->group(function () {

    // Home Page
    Route::get('/home', [ProductController::class, 'homePage'])->name('home');

    // Search Page
    Route::get('/search', [ProductController::class, 'showSearchPage'])->name('search.page');

    //Developer Page
    Route::get('/developer', function () {
        return view('pages.developer');
    })->name('developer');

    //Faq Page
    Route::get('/faq', function () {
        return view('pages.faq');
    })->name('faq');

    //Faq Page - Make Suggestion - Function
    Route::post('/suggest/store', [SuggestController::class, 'store'])->name('suggest.store');

    /**
     * Profile Section
     */

    //Profile - Setting Account
    Route::get('/profile', function () {
        return view('pages.profile');
    })->name('profile');

    //Profile - Setting Account - Update Photo Profile - Function
    Route::post('/updateprofile', [ProfileController::class, 'updateProfilePhoto'])->name('profile.photo.update');

    //Profile - Setting Account - Update Account - Function
    Route::post('/settingacount', [UserController::class, 'updateAccount'])->name('update.account');

    //Profile - Topup History
    Route::get('/profile/topup', [TopupController::class, 'userTopupHistory'])->name('profile.history_topup');

    //Profile - Rent History
    Route::get('/profile/rent', [RentalController::class, 'rentalHistory'])->name('profile.history_rent');

    //Profile - Change Password
    Route::get('/profile/change_password', function () {
        return view('pages.change_pw');
    })->name('profile.password');

    //Profile - Change Password - Function
    Route::post('/profile/change_pw', [ProfileController::class, 'changePassword'])->name('profile.change_password');

    //Profile - Delete Account - Function
    Route::delete('/profile/delete-account', [ProfileController::class, 'hapusAkun'])->name('hapus.akun');

    /**
     * Profile Section - Done
     */

    /**
     * Topup Section
     */

    //Topup Page
    Route::get('/topup', function () {
        return view('pages.topup');
    })->name('topup');

    //Topup Page - Redeem Coupon - Function
    Route::post('/topup/redeem-coupon', [TopupController::class, 'redeemCoupon'])->name('user.redeem-coupon');

    //Payment Page
    Route::get('/payment', [PaymentController::class, 'index']);

    //Payment Page - Make Payment - Function
    Route::post('/payment-process', [XenditPaymentController::class, 'makePayment']);

    //Payment Page - Xendit Payment Page - Function
    Route::post('/xendit/webhook', [XenditPaymentController::class, 'handleCallback']);

    //Topup Success
    Route::get('/topup-success', [XenditPaymentController::class, 'topupSuccess'])->name('topup.success');

    //Topup Fail
    Route::get('/topup-fail', [XenditPaymentController::class, 'topupFail'])->name('topup.fail');

    //Unduh Struk - Functions
    Route::get('/download-receipt/{id}', [TopupController::class, 'downloadReceipt'])->name('topup.download-receipt');

    //Payment Status
    Route::get('/payment-status/{paymentId}', [XenditPaymentController::class, 'checkPaymentStatus'])->name('payment.status');

    /**
     * Topup Section - Done
     */

    /**
     * Product and Rent Section
     */

    // Product Page
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('productPage.show');

    // Product Page - Rent Computer - Function
    Route::get('/product/rent/{product}', [RentalController::class, 'rentComputer'])->name('rent.computer');

    //Rental Confirmation Page - Invoice Rent - Function
    Route::get('/rental/confirmation/{rental}', [RentalController::class, 'showConfirmation'])->name('user.rental.confirmation');

    //Activation Page
    Route::get('/activate', function () {
        return view('pages.activation_form');
    })->name('activation.form');

    //Activation Page - Activate Computer - Function
    Route::post('/activate', [RentalController::class, 'activateComputer'])->name('activate');

    //Activation Succes Page
    Route::get('/activation/success', [RentalController::class, 'activationSuccess'])->name('activation.success');

    /**
     * Product and Rent Section - Done
     */
});

/**
 * User Side - Done
 */

/**
 * Admin Side
 */

/**
 * Admin Authentication - No Auth - Section
 */

//Admin Login Page
Route::get('/admin', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

//Admin Login Page - Admin Authentication - FUnction
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

//Admin Logout - Function
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

/**
 * Admin Authentication - No Auth - Section - Done
 */


Route::middleware(['auth:admin', 'is_admin'])->group(function () {

    //Live Rent Report Page
    Route::get('/admin/live_rent_report', function () {
        return view('pages.admin_live_rent_report');
    })->name('admin.live_rent_report');

    //Rent Report Page
    Route::get('/admin/rent_report', [RentalController::class, 'rentReport'])->name('admin.rent_report');

    //Monitoring Computer Page
    Route::get('/admin/monitoring_computer', [ProductController::class, 'monitoringComputer'])->name('admin.monitoring_computer');

    //Topup Report Page
    Route::get('/admin/topup_report', [TopupController::class, 'topupReport'])->name('admin.topup_report');

    //Management Coupon
    Route::resource('coupon', CouponController::class)->names('admin.coupon');

    /**
     * Management Admin Section
     */

    //Management Admin Page
    Route::get('/admin/management_admin', [AdminController::class, 'index'])->name('admin.management_admin');

    //Managenet Admin Page - Add Admin - Function
    Route::post('/admin/management_admin/add_admin', [AdminController::class, 'add'])->name('admin.add');

    //Management Admin Page - Update Admin - Function
    Route::put('/admin/management_admin/edit_admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    // Route::put('/admin/management_admin/update_admin/{admin}', [AdminController::class, 'update'])->name('admin.update');

    //Management Admin Page - Delete Admin - Function
    Route::delete('/admin/management_admin/delete_admin/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');

    /**
     * Management Admin Section - Done
     */

    /**
     * Management Computer Section
     */

    //Management Computer Page
    Route::get('/admin/management_computer', [ProductController::class, 'readProductManagement'])->name('admin.management_computer');

    //Management Computer Page - Add Computer - Function
    Route::post('/admin/management_computer/add_product', [ProductController::class, 'store'])->name('products.store');

    //Management Computer Page - Delete Computer - Function
    Route::delete('/admin/management_computer/delete_product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    //Management Computer Page - Delete All Computer - Function
    Route::delete('/admin/management_computer/delete_all', [ProductController::class, 'deleteAll'])->name('products.deleteAll');

    //Management Computer Page - Edit Computer - Function
    Route::put('/admin/management_computer/edit_product/{id}', [ProductController::class, 'update'])->name('products.update');

    /**
     * Management Computer Section - Done
     */

    /**
     * Management Account Section
     */

    //Management Account Page
    Route::get('/admin/management_account', [UserController::class, 'readUserManagement'])->name('admin.management_account');

    //Management Account Page - Add User - Function
    Route::post('/admin/management_account/add_user', [UserController::class, 'simpanUserAdmin'])->name('admin.tambahUser');

    //Management Account Page - Ban User - Function
    Route::post('admin/management_account/ban_user/{id}', [UserController::class, 'ban'])->name('account.ban');;

    //Management Account Page - Unban User - Function
    Route::patch('/admin/management_account/unban_user/{id}', [UserController::class, 'unban'])->name('account.unban');

    //Management Account Page - Edit User - Function
    Route::put('/admin/management_account/edit_user/{id}', [UserController::class, 'updateUser'])->name('admin.updateUser');

    //Management Account Page - Delete User - Function
    Route::delete('/admin/management_account/delete_user/{id}', [UserController::class, 'deleteUser'])->name('admin.deleteUser');

    //Management Account Page - Delete All User - Function
    Route::delete('/admin/management_account/delete-all_user', [UserController::class, 'deleteAllUsers'])->name('admin.users.deleteAll');

    //Management Account Page - Topup User - Function
    Route::post('/admin/management_account/topup_user', [TopupController::class, 'adminTopup'])->name('admin.topup');

    //Management Account Page - Redeem Coupon - Function
    Route::post('/admin/management_account/validate-coupon', [TopupController::class, 'validateCoupon'])->name('admin.validate-coupon');

    //Management Account Page - Confirmation Payment - Function
    Route::post('/admin/confirm-payment/{paymentId}', [TopupController::class, 'confirmPayment'])->name('admin.confirm-payment');

    //Management Account Page - Check Coupon - Function
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

    /**
     * Management Account Section - Done
     */

    /**
     * Management Information Section
     */

    //Management Information Page
    Route::get('/admin/management_information', [InformasiController::class, 'index'])->name('admin.management_information');

    //Management Information Page - Add Event - Function
    Route::post('/admin/management_information', [InformasiController::class, 'store'])->name('events.store');

    //Management Information Page - Edit Event - FUnction
    Route::put('/admin/management_information/{id}', [InformasiController::class, 'update'])->name('informasi.update');

    //Management Information Page - Delete Event - Function
    Route::delete('/admin/management_information/{id}', [InformasiController::class, 'destroy'])->name('products.destroy');

    /**
     * Management Information Section - Done
     */

    /**
     * Management Kritik Section
     */

    //Management Kritik Page 
    Route::get('/admin/management_kritik', [SuggestController::class, 'index'])->name('admin.management_kritik');

    //Management Kritik Page - Delete Kritik - Function
    Route::delete('/admin/management_kritik/{id}', [SuggestController::class, 'destroy'])->name('suggest.destroy');

    //Management Kritik Page - Export Excel - Function
    Route::get('/admin/management_kritik/export', [SuggestController::class, 'export'])->name('suggest.export');

    //Management Kritik Page - Export PDF - Function
    Route::get('/admin/management_kritik/export-pdf', [SuggestController::class, 'exportPdf'])->name('suggest.export_pdf');

    /**
     * Management Kritik Section - Done
     */

    /**
     * Management Warnet Section
     */

    //Management Warnet Page
    Route::get('/admin/management_warnet', [WarnetController::class, 'index'])->name('admin.management_warnet');

    //Management Warnet Page - Update - Function
    Route::post('/admin/management_warnet/update', [WarnetController::class, 'updateAvailableComputers'])->name('admin.management_warnet.update');

    //Management Warnet Page - Status - Function
    Route::post('/admin/management_warnet/status', [WarnetController::class, 'updateStatus'])->name('admin.management_warnet.status');

    /**
     * Management Warnet Section - Done
     */
});

/**
 * Admin Side - Done
 */
