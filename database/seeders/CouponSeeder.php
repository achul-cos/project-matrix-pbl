<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coupons')->insert([
            [
                'name' => 'Welcome Bonus',
                'code' => 'WELCOME2025',
                'sponsor' => 'Admin',
                'desc' => 'Kupon selamat datang untuk pengguna baru',
                'qty_use' => 0,
                'qty_can_use' => 100,
                'qty_token' => 10,
                'expired' => Carbon::now()->addDays(30),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ramadhan Gift',
                'code' => 'RAMADHAN1446',
                'sponsor' => 'Politeknik Negeri Batam',
                'desc' => 'Promo spesial Ramadhan',
                'qty_use' => 0,
                'qty_can_use' => 50,
                'qty_token' => 20,
                'expired' => Carbon::now()->addDays(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
