<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RentQueueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = DB::table('products')->get();

        foreach ($products as $product) {
            // Buat waktu random mulai sewa dari sekarang
            $startHour = rand(8, 18); // Antara jam 8 pagi sampai 6 sore
            $bookedStart = Carbon::today()->addHours($startHour);
            $bookedEnd = (clone $bookedStart)->addHours(rand(1, 4)); // Sewa antara 1-4 jam

            DB::table('rent_queue')->insert([
                'product_id' => $product->id,
                'booked_start' => $bookedStart,
                'booked_end' => $bookedEnd,
                'user_id' => '1', // Ganti dengan user ID yang valid jika tersedia
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
