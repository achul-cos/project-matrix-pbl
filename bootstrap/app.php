<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\UpdateLastOnline;

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

        $middleware->alias([
            'is_admin' => IsAdmin::class,
            'update_last_online' => UpdateLastOnline::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();