<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all(); // Ambil semua data admin
        return view('pages.admin_management_admin', compact('admins')); // Kirim data ke view
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8',
            'role' => 'required|in:super_admin,admin',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'is_active' => true, // Atur status aktif
        ]);

        return redirect()->route('pages.admin_management_admin')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'role' => 'required|in:super_admin,admin',
        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'is_active' => $request->is_active ? true : false, // Atur status aktif
        ]);

        $admin = Auth::admin();

        // Update informasi user
        $admin->username = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;

        $admin->save();

        return redirect()->back()->with('success', 'Admin berhasil diperbarui.');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete(); // Hapus admin
        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus.');
    }
}
