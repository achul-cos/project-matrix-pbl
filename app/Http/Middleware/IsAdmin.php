<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah login sebagai admin
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }


        // Jika bukan admin, abort dengan HTTP 403 Forbidden
        abort(403, 'Unauthorized');
    }
}