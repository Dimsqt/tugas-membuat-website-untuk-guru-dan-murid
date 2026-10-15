<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    // middleware untuk memastikan hanya user biasa yang bisa akses
    public function handle(Request $request, Closure $next): Response
    {
        // cek apakah user sudah login dan role-nya user
        if (! auth()->check() || auth()->user()->role !== 'user') {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
