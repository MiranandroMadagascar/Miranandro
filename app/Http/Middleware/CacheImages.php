<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CacheImages
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Appliquer les headers de cache uniquement pour les images
        if ($request->is('images/*')) {
            $response->header('Cache-Control', 'public, max-age=31536000'); // Cache d'un an
            $response->header('Expires', gmdate('D, d M Y H:i:s T', strtotime('+1 year')));
        }

        return $response;
    }
}
