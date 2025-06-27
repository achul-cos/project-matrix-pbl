<?php
namespace Database\Seeders;

use App\Models\Rental;
use App\Models\RentalReport;
use Illuminate\Database\Seeder;

class RentalReportsTableSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua rental yang completed
        $completedRentals = Rental::where('status', 'completed')->get();
        
        foreach ($completedRentals as $rental) {
            $overtime = rand(0, 1) ? rand(10, 120) : 0;
            
            RentalReport::create([
                'rental_id' => $rental->id,
                'product_id' => $rental->product_id,
                'user_id' => $rental->user_id,
                'start_time' => $rental->booked_start, // Sudah dibulatkan
                'end_time' => $rental->booked_end->addMinutes($overtime),
                'duration' => $rental->duration + ($overtime / 60),
                'total_price' => $rental->total_price + ($overtime * ($rental->product->price / 60)),
                'status' => $overtime > 0 ? 'overtime' : 'completed',
                'overtime_minutes' => $overtime,
                'overtime_charge' => $overtime * ($rental->product->price / 60),
            ]);
        }
    }
}