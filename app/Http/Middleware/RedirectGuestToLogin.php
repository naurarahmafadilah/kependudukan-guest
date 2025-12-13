<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectGuestToLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'guest') {
            Auth::logout(); // logout paksa
            return redirect()->route('login')->with('error', 'Silakan login sebagai admin untuk mengakses fitur ini.');
        }

        return $next($request);
    }
}
