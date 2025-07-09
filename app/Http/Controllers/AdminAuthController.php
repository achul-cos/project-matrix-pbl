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
            'login' => 'required|string', // Ganti 'email' menjadi 'login'
            'password' => 'required',
        ]);

        $loginField = $request->input('login');
        $password = $request->input('password');

        // Tentukan apakah input adalah email atau username
        $fieldType = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $credentials = [
            $fieldType => $loginField,
            'password' => $password,
            'is_active' => true
        ];

        // Attempt login dengan guard admin
        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            $admin = Auth::guard('admin')->user();
            
            return redirect()->intended('/admin/monitoring_computer')->with('success', 'Selamat datang, ' . $admin->name);
        }

        throw ValidationException::withMessages([
            'login' => 'Email/Nama atau password salah, atau akun tidak aktif.',
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