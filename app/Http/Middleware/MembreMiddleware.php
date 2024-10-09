<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembreMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('membre')->check()) {
            return redirect()->route('login.equipe'); // Redirigez vers la page de connexion pour membres
        }

        return $next($request);
    }
}
