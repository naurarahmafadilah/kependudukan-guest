<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\CheckIsLogin;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\RedirectGuestToLogin;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // Daftar alias middleware
        $middleware->alias([
            'checkIsLogin' => CheckIsLogin::class,
            'checkRole'    => CheckRole::class,
            'redirect.guest' => RedirectGuestToLogin::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // (biarkan kosong, tidak menaruh alias di sini)
    })
    ->create();
