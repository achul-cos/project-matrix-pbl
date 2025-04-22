<?php

use App\Http\Controllers\TopupController;

Route::get('/topup', [TopupController::class, 'index']);


use App\Http\Controllers\LandingPageController;

Route::get('/landing', [LandingPageController::class, 'index']);


use App\Http\Controllers\ReportController;

Route::get('/live-rent-report', [ReportController::class, 'index']);


use App\Http\Controllers\RiwayatSewaController;

Route::get('/riwayat-sewa', [RiwayatSewaController::class, 'index']);


use App\Http\Controllers\TopupController;

Route::get('/topup', [TopupController::class, 'index'])->name('topup.index');



