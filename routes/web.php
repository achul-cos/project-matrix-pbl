<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('pages.landing');
});

Route::get('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/simpanuser', [AuthController::class, 'simpanuser']);

Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/settingacount', [UserController::class, 'updateAccount'])->middleware('auth')->name('update.account');

Route::get('login/google', [AuthController::class, 'redirectToGoogle']);

Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/admin', function () {
    return view('pages.admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('pages.home');
    });
    Route::get('/product', function () {
        return view('pages.product');
    });
    Route::get('/payment', function () {
        return view('pages.payment');
    });
    Route::get('/topup', function () {
        return view('pages.topup');
    });
    Route::get('/profile', function () {
        return view('pages.profile');
    });
    Route::get('/profile/topup', function () {
        return view('pages.history_topup');
    });
    Route::get('/profile/rent', function () {
        return view('pages.history_rent');
    });
    Route::get('/search', function () {
        return view('pages.search');
    });
    Route::get('/developer', function () {
        return view('pages.developer');
    });

});

Route::get('/admin/management_computer', function () {
    return view('pages.admin_management_computer');
});

Route::get('/admin/live_rent_report', function () {
    return view('pages.admin_live_rent_report');
});

Route::get('/admin/management_account', function () {
    return view('pages.admin_management_account');
});
 
Route::get('/admin/management_admin', function () {
    return view('pages.admin_management_admin');
});

Route::get('/admin/rent_report', function () {
    return view('pages.admin_rent_report');
});

Route::get('/admin/monitoring_computer', function () {
    return view('pages.admin_monitoring_computer');
});

Route::get('/admin/topup_report', function () {
    return view('pages.admin_topup_report');
});

Route::get('/admin/management_information', function () {
    return view('pages.admin_management_information');
});

Route::get('/admin/management_warnet', function () {
    return view('pages.admin_management_warnet');
});

 Route::get('/reset', function () {
        return view('pages.reset');
    });
