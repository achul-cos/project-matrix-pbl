<?php
Route::get('/', function () {
    return view('pages/landing');
});

Route::get('/home', function () {
    return view('pages/home');
});

Route::get('/login', function () {
    return view('pages/login');
});

Route::get('/register', function () {
    return view('pages/register');
});

Route::get('/admin', function () {
    return view('pages/admin');
});

Route::get('/product', function () {
    return view('pages/product');
});

Route::get('/payment', function () {
    return view('pages/payment');
});

Route::get('/topup', function () {
    return view('pages/topup');
});

Route::get('/profile', function () {
    return view('pages/profile');
});

Route::get('/history_topup', function () {
    return view('pages/history_topup');
});

Route::get('/history_rent', function () {
    return view('pages/history_rent');
});