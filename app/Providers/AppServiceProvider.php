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

        // Atur zona waktu aplikasi
        config(['app.timezone' => 'Asia/Jakarta']);
        date_default_timezone_set('Asia/Jakarta');
        
        // Set locale Carbon ke Bahasa Indonesia
        Carbon::setLocale('id');
        setlocale(LC_TIME, 'id_ID.UTF-8'); // Untuk format tanggal terjemahan penuh

        \Illuminate\Support\Collection::macro('sensorNama', function () {
            return $this->map(function ($item) {
                $length = strlen($item);
                function sensorNama($nama) {
                    $length = strlen($nama);
                    
                    if ($length <= 1) {
                        return '*';
                    } elseif ($length <= 3) {
                        return $nama[0] . str_repeat('*', $length - 1);
                    } elseif ($length == 4) {
                        return strtoupper($nama[0]) . '***' . strtoupper($nama[$length - 1]);
                    } else {
                        $firstChars = substr($nama, 0, 2);
                        $lastChars = substr($nama, -2);
                        $stars = str_repeat('*', max(3, $length - 4));
                        return $firstChars . $stars . $lastChars;
                    }
                }
            });
        });
    }
}
