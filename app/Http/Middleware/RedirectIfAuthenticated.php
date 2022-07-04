<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
	public function handle($request, Closure $next, $guard = null)
	{
		if (Auth::guard($guard)->check()) {
			switch ($guard) {
				case 'admin':
				$route = 'admin.dashboard';
				break;
				default:
				$route = 'home';
				break;
			}
			return redirect()->route($route);
			// return redirect(RouteServiceProvider::HOME);
		}

		return $next($request);
	}
}
