<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductStatusTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    public function test_status_calculation()
    {
        $product = Product::factory()->create(['status' => 'available']);
        
        // Buat rental yang akan mulai dalam 30 menit
        $rental = Rental::factory()->create([
            'product_id' => $product->id,
            'status' => 'pending',
            'booked_start' => now()->addMinutes(30),
            'booked_end' => now()->addHours(2),
        ]);
        
        $this->assertEquals('prepare', $product->calculateRealTimeStatus());
    }    
}
