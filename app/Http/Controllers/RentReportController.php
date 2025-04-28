<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent; // ini model data kamu, sesuaikan kalau beda

class RentReportController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $rents = Rent::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                ->orWhere('komputer', 'like', "%{$search}%");
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.admin_rent_report', compact('rents', 'search'));
    }
}
