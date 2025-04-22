<?php

use App\Http\Controllers\TopupController;
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/gambar', function () {
    return view('img'); // tanpa .blade.php
});

Route::get('/home', function () {
    return view('home');
});

use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'index']);

use App\Http\Controllers\ManagementController;

Route::get('/management', [ManagementController::class, 'index']);

use App\Http\Controllers\RegisterController;

Route::get('/register', [RegisterController::class, 'index']);


Route::get('/produk', function () {
    return view('productpage');
});

use App\Http\Controllers\UserController;

Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::get('/topup', [TopupController::class, 'index']);


use App\Http\Controllers\LandingPageController;

Route::get('/landing', [LandingPageController::class, 'index']);


use App\Http\Controllers\ReportController;

Route::get('/live-rent-report', [ReportController::class, 'index']);


use App\Http\Controllers\RiwayatSewaController;

Route::get('/riwayat-sewa', [RiwayatSewaController::class, 'index']);


use App\Http\Controllers\RiwayatTopupController;

Route::get('/riwayat-topup', [RiwayatTopupController::class, 'index']);


