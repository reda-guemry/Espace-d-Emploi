<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request; 

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        $middleware -> redirectTo(users: function (Request $request ) {
            if( $request -> user() -> role === 'recruiter' ) {
                return route('recruiter.dashboard') ;
            }
            return route('dashboard') ;

        });

        $middleware -> alias ([
            'role' => \App\Http\Middleware\CheckRole::class ,   
        ]) ; 

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
