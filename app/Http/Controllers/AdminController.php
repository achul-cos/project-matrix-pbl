<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('pages.admin_management_admin', compact('admins'));
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8',
            'role' => 'required|in:super_admin,admin',
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'is_active' => true,
        ];

        // Handle image upload
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('admin_images', 'public');
            $data['photo'] = 'storage/' . $path;
        }

        Admin::create($data);

        return redirect()->route('admin.management_admin')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'role' => 'required|in:super_admin,admin',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'is_active' => $admin->is_active,
        ];

        if ($request->hasFile('photo')) {
            if ($admin->photo && Storage::disk('public')->exists(str_replace('storage/', '', $admin->photo))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $admin->photo));
            }

            $path = $request->file('photo')->store('admin_images', 'public');
            $data['photo'] = 'storage/' . $path;
        }

        $admin->update($data);

        return redirect()->route('admin.management_admin')->with('success', 'Admin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin->photo && Storage::disk('public')->exists(str_replace('storage/', '', $admin->photo))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $admin->photo));
        }

        $admin->delete();

        return redirect()->route('admin.management_admin')->with('success', 'Admin berhasil dihapus.');
    }
}
