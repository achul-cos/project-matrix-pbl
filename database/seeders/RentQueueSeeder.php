<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class RentQueueSeeder extends Seeder
{
    public function run(): void
    {
        $products = DB::table('products')->get();
        $now = Carbon::now();


        // Bulatkan waktu sekarang ke atas (jam bulat berikutnya)
        $roundedNow = $now->copy();
        if ($now->minute > 0 || $now->second > 0) {
            $roundedNow->addHour()->minute(0)->second(0);
        }


        foreach ($products as $product) {
            // Ambil jam mulai acak dari jam sekarang hingga 24 jam ke depan
            $startOffset = rand(0, 23); // 0 sampai 23 jam ke depan
            $bookedStart = $roundedNow->copy()->addHours($startOffset);


            // Lama sewa antara 1–4 jam (pastikan tidak melebihi 24 jam dari sekarang)
            $maxDuration = min(4, 24 - $startOffset);
            $duration = rand(1, $maxDuration);
            $bookedEnd = $bookedStart->copy()->addHours($duration);


            DB::table('rent_queue')->insert([
                'product_id' => $product->id,
                'booked_start' => $bookedStart,
                'booked_end' => $bookedEnd,
                'user_id' => '1', // Bisa kamu ubah sesuai user
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}



