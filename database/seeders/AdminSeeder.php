<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create super admin
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@warnet.com',
            'password' => Hash::make('password123'),
            'role' => 'super_admin',
            'is_admin' => true,
            'is_active' => true,
            'photo' => null, // Bisa diisi dengan nama file foto default jika ada
        ]);

        // Create regular admin
        Admin::create([
            'name' => 'Admin Warnet',
            'email' => 'admin@warnet.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_admin' => true,
            'is_active' => true,
            'photo' => null,
        ]);

        // Create another admin (inactive example)
        Admin::create([
            'name' => 'Admin Nonaktif',
            'email' => 'adminoff@warnet.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_admin' => true,
            'is_active' => false,
            'photo' => null,
        ]);
    }
}