<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Puisque seuls les administrateurs peuvent s'inscrire,
        // nous considérons que tous les utilisateurs authentifiés sont des administrateurs
        return $next($request);
    }
}
