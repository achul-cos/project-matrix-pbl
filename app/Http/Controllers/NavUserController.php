<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavUserController extends Controller
{
    public function index()
    {
        return view('nav_user');
    }
}
