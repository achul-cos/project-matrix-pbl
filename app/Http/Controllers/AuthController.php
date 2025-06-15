<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Str;

use Laravel\Socialite\Two\InvalidStateException;

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

        // Cek jika user mencoba login pakai email guest
        if (strtolower($request->login) === 'guest@matrix.com') {
            return redirect()->back()
                ->withErrors(['login' => 'Maaf login dengan email tamu tidak bisa dilakukan. Silahkan gunakan Username.'])
                ->withInput();
        }

        // Tentukan field login: apakah input berupa email atau username
        $login_type = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';


        // Cek apakah user terdaftar
        $user = User::where($login_type, $request->login)->first();

        if ($user) {
            // Cek apakah user diblokir
            if ($user->is_block) {
                return redirect()->back()
                    ->withErrors(['login' => 'Akun Anda telah diblokir. Silakan hubungi admin.'])
                    ->withInput();
            }
        }

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

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (InvalidStateException $e) {
            return redirect('/login')->withErrors(['login' => 'Terjadi kesalahan saat login. Silakan coba lagi.']);
        }

        $email = strtolower($googleUser->getEmail());

        if ($email === 'guest@matrix.com') {
            return redirect('/login')->withErrors([
                'login' => 'Maaf login dengan email tamu tidak bisa dilakukan. Silahkan gunakan Username.'
            ]);
        }

        $user = User::where('email', $email)->first();

        if ($user) {
            // Jika akun sudah terdaftar tapi BUKAN via Google
            if (!$user->is_google) {
                return redirect('/login')->withErrors([
                    'login' => 'Login dibatalkan karena email telah terdaftar sebelumnya.'
                ]);
            }

            // Cek blokir
            if ($user->is_block) {
                return redirect('/login')->withErrors([
                    'login' => 'Akun Anda telah diblokir. Silakan hubungi admin.'
                ]);
            }

            // Login akun Google yang sudah ada
            Auth::login($user, true);
            return redirect()->intended('/home')->with('success', 'Login berhasil!');
        }

        // Buat akun baru via Google
        $baseUsername = Str::slug($googleUser->getName(), '') ?: explode('@', $email)[0];
        $username = $baseUsername;
        $count = 1;
        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $count;
            $count++;
        }

        $user = User::create([
            'name' => $googleUser->getName(),
            'username' => $username,
            'email' => $email,
            'phone' => null,
            'password' => bcrypt(Str::random(16)),
            'photo' => $googleUser->getAvatar(),
            'token' => 0,
            'is_google' => 1,
        ]);

        Auth::login($user, true);
        return redirect()->intended('/home')->with('success', 'Login berhasil!');
    }

}
