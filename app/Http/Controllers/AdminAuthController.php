<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.admin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        // Tambahkan kondisi admin aktif
        $credentials['is_active'] = true;

        // Attempt login dengan guard admin
        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            $admin = Auth::guard('admin')->user();
            
            return redirect()->intended('/admin/dashboard')->with('success', 'Selamat datang, ' . $admin->name);
        }

        throw ValidationException::withMessages([
            'email' => 'Email atau password salah, atau akun tidak aktif.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login');
    }
}