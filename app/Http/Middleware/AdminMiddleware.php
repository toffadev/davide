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
        if (!$request->user()) {
            return redirect()->route('admin.login');
        }

        if (!$request->user()->isAdmin()) {
            if ($request->wantsJson()) {
                return response()->json(['message' => 'Accès non autorisé. Veuillez contacter l\'administrateur.'], 403);
            }
            return redirect('/')
                ->with('error', 'Accès non autorisé. Veuillez contacter l\'administrateur pour obtenir les droits d\'accès.')
                ->with('notification', [
                    'type' => 'error',
                    'message' => 'Accès non autorisé. Veuillez contacter l\'administrateur pour obtenir les droits d\'accès.'
                ]);
        }

        return $next($request);
    }
}
