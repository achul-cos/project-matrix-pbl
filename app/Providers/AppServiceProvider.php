<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        config(['app.timezone' => 'Asia/Jakarta']);
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');
        setlocale(LC_TIME, 'id_ID.UTF-8');

        // Hapus macro yang tidak perlu atau perbaiki
        \Illuminate\Support\Collection::macro('sensorNama', function () {
            return $this->map(function ($item) {
                $length = strlen($item);
                
                if ($length <= 1) {
                    return '*';
                } elseif ($length <= 3) {
                    return $item[0] . str_repeat('*', $length - 1);
                } elseif ($length == 4) {
                    return strtoupper($item[0]) . '***' . strtoupper($item[$length - 1]);
                } else {
                    $firstChars = substr($item, 0, 2);
                    $lastChars = substr($item, -2);
                    $stars = str_repeat('*', max(3, $length - 4));
                    return $firstChars . $stars . $lastChars;
                }
            });
        });
    }

    protected $listen = [
        \App\Events\RentalStatusChanged::class => [
            \App\Listeners\UpdateProductStatusCache::class,
        ],
    ];
}
