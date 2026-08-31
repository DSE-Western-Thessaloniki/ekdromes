<?php

declare(strict_types=1);

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\EnsureCasAccountHasAccess;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Subfission\Cas\Middleware\CASAuth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => AdminMiddleware::class,
        ]);

        $middleware->priority([
            CASAuth::class,
            EnsureCasAccountHasAccess::class,
            AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request): bool => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
