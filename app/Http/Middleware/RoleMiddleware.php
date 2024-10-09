<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Traits\HasRoles;


class RoleMiddleware
{
    // public function handle(Request $request, Closure $next, $role, $guard = null)
    // {
    //     $guard = $guard ?: Auth::getDefaultDriver();
    //     Log::info('Guard utilisé : ' . $guard); // Log du guard utilisé

    //     // Vérifier si l'utilisateur est authentifié via le guard et s'il a le rôle requis
    //     if (!Auth::guard($guard)->check()) {
    //         return response()->json([
    //             'errorRole' => 'Accès refusé !'
    //         ], 403);
    //     }

    //     $user = Auth::guard($guard)->user();
    //     Log::info('Utilisateur connecté : ' . $user->email . ' avec les rôles : ' . $user->getRoleNames());

    //     if (! $user->hasRole($role)) {
    //         return response()->json([
    //             'errorRole' => 'Accès refusé !'
    //         ], 403); // 403 pour interdiction d'accès
    //     }

    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            return response()->json(['errorRole' => 'Accès refusé !'], 403);
        }

        return $next($request);
    }
}
