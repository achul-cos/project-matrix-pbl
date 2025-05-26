<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin; // Pastikan Anda mengimpor model Admin

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'password' => Hash::make('Admin1234#'), // Gantilah dengan password yang lebih kuat
            'role' => 'super admin',
            'last_online' => now(), // Atur waktu terakhir online ke waktu sekarang
            'photo' => NULL,
        ]);
    }
}
