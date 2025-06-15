<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UpdateLastOnline
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            Log::info('Middleware UpdateLastOnline dijalankan untuk user ID: ' . auth()->id());

            auth()->user()->forceFill([
                'last_online' => now(),
            ])->saveQuietly(); // hindari triggering observer
        }

        return $next($request);
    }
}
