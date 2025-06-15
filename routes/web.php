<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {return view('pages.landing');});

Route::get('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/simpanuser', [AuthController::class, 'simpanuser']);

Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/settingacount', [UserController::class, 'updateAccount'])->middleware('auth')->name('update.account');

Route::get('login/google', [AuthController::class, 'redirectToGoogle']);

Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/reset', function () {return view('pages.reset');});

Route::get('/forget', function () {return view('pages.forget');});

Route::get('/otp', function () {return view('pages.otp');});

Route::middleware(['auth:user', 'update_last_online'])->prefix('')->group(function () {
    Route::get('/home', function () {
        return view('pages.home');
    })->name('home');
    Route::get('/product', [ProductController::class, 'productPage'])->name('product');

    Route::get('/payment', function () {
        return view('pages.payment');
    })->name('payment');

    Route::get('/topup', function () {
        return view('pages.topup');
    })->name('topup');

    Route::get('/profile', function () {
        return view('pages.profile');
    })->name('profile');

    Route::get('/profile/topup', function () {
        return view('pages.history_topup');
    })->name('profile.history_topup');

    Route::get('/profile/rent', function () {
        return view('pages.history_rent');
    })->name('profile.history_rent');

    Route::get('/profile/change_password', function () {
        return view('pages.change_pw');
    })->name('profile.password');

    Route::get('/search', function () {
        return view('pages.search');
    })->name('search');

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
});

// Route untuk authentication admin
Route::get('/admin', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Route admin yang sudah ada dengan middleware
Route::middleware(['auth:admin', 'is_admin'])->group(function () {
    Route::get('/admin/monitoring_computer', function () {
        return view('pages.admin_monitoring_computer');
    })->name('admin.dashboard');

    Route::get('/admin/management_computer', function () {
        return view('pages.admin_management_computer');
    })->name('admin.management_computer');

    Route::get('/admin/live_rent_report', function () {
        return view('pages.admin_live_rent_report');
    })->name('admin.live_rent_report');

    Route::get('/admin/management_account', function () {
        return view('pages.admin_management_account');
    })->name('admin.management_account');

    Route::get('/admin/management_admin', function () {
        return view('pages.admin_management_admin');
    })->name('admin.management_admin');

    Route::get('/admin/rent_report', function () {
        return view('pages.admin_rent_report');
    })->name('admin.rent_report');

    Route::get('/admin/management_account', [UserController::class, 'readUserManagement'])->name('admin.management_account');

    Route::get('/admin/topup_report', function () {
        return view('pages.admin_topup_report');
    })->name('admin.topup_report');

    Route::get('/admin/management_information', function () {
        return view('pages.admin_management_information');
    })->name('admin.management_information');

    Route::get('/admin/management_warnet', function () {
        return view('pages.admin_management_warnet');
    })->name('admin.management_warnet');

    Route::post('/admin/management_computer/add_product', [ProductController::class, 'store'])->name('products.store');

    Route::delete('/admin/management_computer/delete_all', [ProductController::class, 'deleteAll'])->name('products.deleteAll');

    Route::get('/admin/management_computer', [ProductController::class, 'readProductManagement'])->name('admin.management_computer');

    Route::put('/admin/management_computer/edit_product/{id}', [ProductController::class, 'update'])->name('products.update');

    Route::delete('/admin/management_computer/delete_product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/admin/monitoring_computer', [ProductController::class, 'monitoringComputer'])->name('admin.monitoring_computer');

    Route::post('/admin/management_account/add_user', [UserController::class, 'simpanUserAdmin'])->name('admin.tambahUser');

    Route::post('admin/management_account/ban_user/{id}', [UserController::class, 'ban'])->name('account.ban');

    Route::patch('/account/unban/{id}', [UserController::class, 'unban'])->name('account.unban');

});