<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah admin terautentikasi dengan guard admin
        if (!auth('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $admin = auth('admin')->user();

        // Periksa apakah admin aktif
        if (!$admin->is_active) {
            auth('admin')->logout();
            return redirect()->route('admin.login')->with('error', 'Akun admin Anda tidak aktif.');
        }

        // Periksa apakah benar-benar admin (optional, karena di tabel admin semua adalah admin)
        if (!$admin->is_admin) {
            auth('admin')->logout();
            return redirect()->route('admin.login')->with('error', 'Anda tidak memiliki akses admin.');
        }

        return $next($request);
    }
}