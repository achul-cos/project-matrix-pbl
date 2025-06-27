<?php

namespace App\Listeners;

use App\Events\RentalStatusChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Product;

class UpdateProductStatusCache
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RentalStatusChanged $event)
    {
        $product = Product::find($event->productId);
        
        if ($product) {
            $newStatus = $product->calculateRealTimeStatus();
            
            if ($product->status !== $newStatus) {
                $product->status = $newStatus;
                $product->save();
                
                \Log::channel('status')->info("Event: Product {$product->id} status updated to {$newStatus}");
            }
        }
    }
}
