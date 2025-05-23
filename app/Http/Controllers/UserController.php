<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function updateAccount(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'required|string|max:15',
            'password' => 'nullable|string|confirmed',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Update informasi user
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan
        $user->save();

        return redirect()->back()->with('success', 'Informasi akun berhasil diperbarui!');
    }
}
