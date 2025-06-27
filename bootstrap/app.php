<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\UpdateLastOnline;
use Illuminate\Console\Scheduling\Schedule;
use Carbon\Carbon;
use App\Models\Rental;
use App\Http\Controllers\RentalController;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Daftarkan middleware

        // Middleware global (seluruh request)
        $middleware->append(UpdateLastOnline::class);

        $middleware->validateCsrfTokens(except: [
            '/midtrans/callback',
            'midtrans/*',
            '/pembayaran',
            '/pembayaran/webhook',
            '/payment-process',
            '/xendit/webhook',
            
        ]);

        $middleware->alias([
            'is_admin' => IsAdmin::class,
            'update_last_online' => UpdateLastOnline::class,
            'csrf' => \App\Http\Middleware\VerifyCsrfToken::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    // ->withSchedule(function (Schedule $schedule) {
    //     // Aktifkan penyewaan yang sudah waktunya
    //     $schedule->call(function () {
    //         $now = Carbon::now();
    //         $rentals = Rental::where('status', 'pending')
    //             ->where('booked_start', '<=', $now->addMinutes(10))
    //             ->get();
            
    //         foreach ($rentals as $rental) {
    //             $rental->update(['status' => 'active']);
    //             $rental->product->update(['status' => 'online']);
    //         }
    //     })->everyMinute()
    //       ->name('activate-pending-rentals')
    //       ->withoutOverlapping();

    //     // Selesaikan penyewaan yang sudah berakhir
    //     $schedule->call(function () {
    //         $now = Carbon::now();
    //         $rentals = Rental::where('status', 'active')
    //             ->where('booked_end', '<=', $now)
    //             ->get();
            
    //         foreach ($rentals as $rental) {
    //             // Panggil fungsi endRental untuk setiap rental
    //             app(RentalController::class)->endRental($rental);
    //         }
    //     })->everyMinute()
    //       ->name('end-expired-rentals')
    //       ->withoutOverlapping();
    // })
    ->withSchedule(function (Schedule $schedule) { // <-- Tambahkan blok ini
        // Pindahkan logika penjadwalan Anda dari Kernel.php ke sini
        $schedule->command('update:product-status')->everyMinute();    
    })->create();
