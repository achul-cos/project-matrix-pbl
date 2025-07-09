<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RentalsTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $products = Product::all();
        
        // Tanggal saat seeder dijalankan
        $today = Carbon::today();

        for ($i = 0; $i < 100; $i++) {
            $user = $users->random();
            $product = $products->random();
            
            // 1. Gunakan tanggal hari ini (tanggal seeder dijalankan)
            $baseDate = $today->copy();
            
            // 2. Generate jam acak antara 0-22 (untuk memastikan jam berikutnya masih di hari yang sama)
            $randomHour = rand(0, 22);
            
            // 3. Buat waktu mulai dengan menit acak
            $start = $baseDate->copy()
                ->addHours($randomHour)
                ->addMinutes(rand(0, 59));
            
            // 4. Bulatkan ke jam berikutnya di hari yang sama
            $start = $this->roundToNextHourSameDay($start);
            
            $duration = rand(1, 12); // Durasi 1-12 jam
            $end = (clone $start)->addHours($duration);
            
            $status = ['pending', 'active', 'completed', 'cancelled'][rand(0, 3)];
            
            $rental = Rental::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
                'booked_start' => $start,
                'booked_end' => $end,
                'duration' => $duration,
                'total_price' => $product->price * $duration,
                'status' => $status,
                'activation_code' => $this->generateActivationCode(),
                'activation_status' => $status === 'completed' ? 'activated' : 'pending',
                'activated_at' => $status === 'completed' ? (clone $start)->addMinutes(rand(5, 30)) : null,
            ]);
            
            if ($status === 'completed') {
                $this->createRentalReport($rental);
            }
        }
    }
    
    // Fungsi untuk membulatkan ke jam berikutnya di hari yang sama
    private function roundToNextHourSameDay(Carbon $time): Carbon
    {
        // Jika sudah jam 23:xx, kita tidak bisa ke jam berikutnya karena akan pindah hari
        if ($time->hour >= 23) {
            return $time->startOfHour(); // Tetap di hari yang sama, jam 23:00
        }
        
        // Jika bukan jam bulat, bulatkan ke jam berikutnya
        if ($time->minute > 0) {
            return $time->addHour()->startOfHour();
        }
        
        // Jika sudah jam bulat, gunakan jam saat ini
        return $time->startOfHour();
    }
    
    private function generateActivationCode()
    {
        return substr(strtoupper(md5(uniqid())), 0, 6);
    }
    
    private function createRentalReport(Rental $rental)
    {
        $overtime = rand(0, 1) ? rand(10, 120) : 0; // 0-120 menit overtime
        
        \App\Models\RentalReport::create([
            'rental_id' => $rental->id,
            'product_id' => $rental->product_id,
            'user_id' => $rental->user_id,
            'start_time' => $rental->booked_start,
            'end_time' => $rental->booked_end->copy()->addMinutes($overtime),
            'duration' => $rental->duration + ($overtime / 60),
            'total_price' => $rental->total_price + ($overtime * ($rental->product->price / 60)),
            'status' => $overtime > 0 ? 'overtime' : 'completed',
            'overtime_minutes' => $overtime,
            'overtime_charge' => $overtime * ($rental->product->price / 60),
        ]);
    }
}