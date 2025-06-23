<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'cropped_image' => 'required',
        ]);

        $user = Auth::user();

        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $imageData = $request->input('cropped_image');
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
        $filename = 'profile_photos/' . uniqid() . '.jpg';

        Storage::disk('public')->put($filename, $image);

        $user->photo = $filename;
        $user->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }
    public function changePassword(Request $request)
{
    $user = Auth::user();

    if ($user->is_google) {
        return back()->with('error', 'Akun Google tidak bisa ganti password.');
    }

    $validator = Validator::make($request->all(), [
        'old_password' => 'required|string',
        'new_password' => [
            'required',
            'string',
            'min:8',
            'confirmed',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ],
    ], [
        'new_password.regex' => 'Password harus ada huruf besar, kecil, dan angka.',
        'new_password.confirmed' => 'Konfirmasi password tidak cocok.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    if (!Hash::check($request->old_password, $user->password)) {
        return back()->with('error', 'Password lama salah.');
    }

    if (Hash::check($request->new_password, $user->password)) {
        return back()->with('error', 'Password baru tidak boleh sama dengan password lama.');
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('success', 'Password berhasil diganti.');
}

public function hapusAkun(Request $request)
{
    $user = Auth::user();

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    $user->forceDelete();

    return redirect('/')->with('success', 'Akun Anda berhasil dihapus.');
}
}
