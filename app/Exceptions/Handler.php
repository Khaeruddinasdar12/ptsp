<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Arr;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    // public function register()
    // {
    //     $this->reportable(function (Throwable $e) {
    //         //
    //     });
    // }
    // if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
    //     return redirect()->route('login');
    // }
    
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $guard = Arr::get($exception->guards(), 0);

        switch ($guard) {
            case 'admin':
            $route = 'admin.login';
            break;
            default:
            $route = 'login';
            break;
        }

        return redirect()->route($route);
    }
}
