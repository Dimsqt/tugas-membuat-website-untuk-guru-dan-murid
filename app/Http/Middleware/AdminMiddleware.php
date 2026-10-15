<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    // middleware untuk memastikan hanya admin yang bisa akses
    public function handle(Request $request, Closure $next): Response
    {
        // cek apakah user sudah login dan role-nya admin
        if (! auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Anda bukan admin.');
        }

        return $next($request);
    }
}
