<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserOtpCode;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpCode;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class OtpController extends Controller
{
    public function showForgetForm()
    {
        return view('pages.forget');
    }

    public function submitEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $otp = rand(100000, 999999);
        $email = $request->email;

        UserOtpCode::create([
            'email' => $email,
            'otp_code' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($email)->send(new SendOtpCode($otp));

        session(['email' => $email]);

        return redirect()->route('otp.form')->with('success', 'Kode OTP telah dikirim ke email kamu.');
    }

    public function showOtpForm()
    {
        return view('pages.otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp_code' => 'required',
        ]);

        $email = session('email');

        $otpValid = UserOtpCode::where('email', $email)
            ->where('otp_code', $request->otp_code)
            ->where('expires_at', '>=', now())
            ->first();

        if (!$otpValid) {
            return back()->withErrors(['otp_code' => 'Kode OTP salah atau sudah kedaluwarsa.']);
        }

        session(['verified_email' => $email]);

        return redirect()->route('password.reset.form');
    }

    public function showResetForm()
    {
        if (!session('verified_email')) {
            return redirect()->route('forget.form')->withErrors(['email' => 'Verifikasi email dulu ya!']);
        }

        return view('pages.reset');
    }

    public function storeNewPassword(Request $request)
{
    $request->validate([
        'password' => 'required|min:8|confirmed',
    ]);

    $email = session('verified_email');
    $user = User::where('email', $email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'Akun tidak ditemukan.']);
    }

    $user->update([
        'password' => Hash::make($request->password),
    ]);

    session()->forget(['email', 'verified_email']);

    return redirect()->route('login')->with('success', 'Kata sandi berhasil diubah.');
}

    public function sendOtp(Request $request)
{
    $otp = rand(100000, 999999);
    $email = $request->email;

    PasswordOtpRequest::create([
        'email' => $email,
        'otp_code' => $otp,
        'expires_at' => now()->addMinutes(10),
    ]);

    Mail::to($email)->send(new SendOtpCode($otp));

    session(['email' => $email]);

    return redirect()->route('otp.input');
}
public function resendOtp(Request $request)
{
    $email = session('email');

    if (!$email) {
        return redirect()->route('forget.form')->with('error', 'Session email tidak ditemukan.');
    }

    $otp = rand(100000, 999999);

    UserOtpCode::updateOrCreate(
        ['email' => $email],
        ['otp_code' => $otp, 'expires_at' => now()->addMinutes(1)]
    );

    Mail::to($email)->send(new SendOtpCode($otp));

    return back()->with('success', 'Kode OTP telah dikirim ulang!');
}

}
