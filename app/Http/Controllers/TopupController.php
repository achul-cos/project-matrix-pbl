<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopupController extends Controller
{
    public function show()
    {
        return view('topup_page');
    }
}
