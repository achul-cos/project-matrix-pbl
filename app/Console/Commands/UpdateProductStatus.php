<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class UpdateProductStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:product-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update product statuses based on rental schedules';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $now = now();
        $updatedCount = 0;

        Product::chunk(100, function ($products) use ($now, &$updatedCount) {
            foreach ($products as $product) {
                $newStatus = $product->calculateRealTimeStatus();
                
                if ($product->status !== $newStatus) {
                    $product->status = $newStatus;
                    $product->save();
                    $updatedCount++;
                    
                    \Log::channel('status')->info("Product {$product->id} status updated to {$newStatus}");
                }
            }
        });

        $this->info("Updated {$updatedCount} product statuses");
    }
}
