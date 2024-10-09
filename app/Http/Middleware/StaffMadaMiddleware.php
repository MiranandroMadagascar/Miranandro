<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffMadaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('staffmada')->check()) {
            return redirect()->route('login.inscription'); // Redirigez vers la page de connexion pour staffmada
        }

        return $next($request);
    }
}
