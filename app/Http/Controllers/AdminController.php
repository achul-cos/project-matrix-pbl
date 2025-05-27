<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mencari admin berdasarkan username
        $admin = Admin::where('username', $request->username)->first();

        // Memeriksa apakah admin ditemukan dan password cocok
        if ($admin && password_verify($request->password, $admin->password)) {
            // Jika cocok, set session dan redirect ke halaman monitoring computer
            Auth::login($admin);
            return redirect()->route('admin.dashboard'); // Redirect ke monitoring_computer
        }

        // Jika tidak cocok, kembali ke form dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function dashboard()
    {
        return view('pages.admin_monitoring_computer');
    }

    public function loginPage()
    {
        return view('pages.admin');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/admin')->with('success', 'Anda telah berhasil logout.');
    }
}
