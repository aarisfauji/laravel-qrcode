<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->role;
                switch ($role) {
                    case 'ADMIN':
                        return redirect('/admin');
                        break;
                    case 'CLIENT':
                        return redirect('/client');
                        break;

                    default:
                        return redirect('/home');
                        break;
                }
            }
        }

        return $next($request);
    }
}
