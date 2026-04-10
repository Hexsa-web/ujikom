<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',     // ← Baris ini WAJIB ditambahkan
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'admin' => \App\Http\Middleware\Admin::class,
        ]);

        // Optional: tambahkan middleware api kalau butuh
        $middleware->api(prepend: []);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();