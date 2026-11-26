<?php

namespace App\Http\Middleware\Entreprises;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('entreprise')->check() || !Auth::guard('entreprise')->user()->isAdmin()) {
            return redirect()->route('entreprises.home'); // Redirigez vers la page d'accueil si l'utilisateur n'est pas admin
        }

        return $next($request);
    }
}
