<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffNiceMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('staffnice')->check()) {
            return redirect()->route('login.staffnice'); // Redirigez vers la page de connexion pour staffnice
        }

        return $next($request);
    }
}
