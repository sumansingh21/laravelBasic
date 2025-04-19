<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use \App\Http\Middleware\CanViewPostMiddleware;
use \App\Http\Middleware\IsAdminMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['can-view-post'=> CanViewPostMiddleware::class]);
        $middleware->alias(['is-admin'=> IsAdminMIddleware::class]);

   })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
