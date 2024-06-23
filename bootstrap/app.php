<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckUserMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(

        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            // 'admin' => CheckUserMiddleware::class,
            // 'member' => CheckUserMiddleware::class,
            // 'user' => CheckUserMiddleware::class,

            'userMiddleware' => UserMiddleware::class,
            'adminMiddleware' => AdminMiddleware::class,
            // 'role' => \App\Http\Middleware\CheckRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
