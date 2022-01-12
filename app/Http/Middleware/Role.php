<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle(Request $request, Closure $next, String $role)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();
        if (strtoupper($user->role) == strtoupper($role)) {
            return $next($request);
        }
        return redirect('/home');
    }
}
