<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('pages.register');
    }

    public function simpanuser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'password' => [
                'required',
                'string',
                'min:8', // Minimal 8 karakter
                'regex:/[a-z]/', // Minimal 1 huruf kecil
                'regex:/[A-Z]/', // Minimal 1 huruf besar
                'regex:/[0-9]/', // Minimal 1 angka
                'confirmed', // Pastikan password konfirmasi sama
            ],
        ], [
            'password.regex' => 'Password harus mengandung minimal 1 huruf besar, 1 huruf kecil dan 1 angka.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // Buat user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'photo' => null,
            'token' => 0,
        ]);
        return redirect('/register')->with('success', 'Registrasi berhasil! Silakan Login.');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|string',    // email atau username
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // Tentukan field login: apakah input berupa email atau username
        $login_type = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [
            $login_type => $request->login,
            'password' => $request->password,
        ];
        // Ambil nilai dari checkbox "Ingat Saya"
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            // Redirect ke halaman dashboard atau home
            return redirect()->intended('/home')->with('success', 'Login berhasil!');
        }
        return redirect()->back()
            ->withErrors(['login' => 'Email/Username atau password salah'])
            ->withInput();
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }
}
