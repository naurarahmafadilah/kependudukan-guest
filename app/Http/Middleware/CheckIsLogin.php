<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsLogin
{
    public function handle($request, Closure $next)
    {
        // Jika belum login, redirect ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login')
                ->withErrors(['email' => 'Silakan login terlebih dahulu.']);
        }

        // Jika sudah login, lanjutkan request
        return $next($request);
    }
}
