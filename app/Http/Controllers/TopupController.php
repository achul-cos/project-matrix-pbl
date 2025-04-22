<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopupController extends Controller
{
    public function index()
    {
        // Kalau butuh data, bisa pakai compact()
        return view('topup');
    }
}
