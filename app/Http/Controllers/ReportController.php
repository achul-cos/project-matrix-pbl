<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function liveRentReport()
    {
        return view('live_rent_report');
    }
}
