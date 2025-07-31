<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek jika peran pengguna tidak sesuai dengan peran yang dibutuhkan
        if ($request->user()->role !== $role) {
            // Jika tidak sesuai, hentikan request dan beri pesan error 403 (Forbidden)
            abort(403, 'UNAUTHORIZED ACTION.');
        }

        // Jika peran sesuai, lanjutkan request ke tujuan berikutnya
        return $next($request);
    }
}