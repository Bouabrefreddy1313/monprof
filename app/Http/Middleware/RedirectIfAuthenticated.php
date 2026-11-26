<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // Espace entreprises : seuls les comptes entreprise (pro_users) sont concernés
        if ($request->is('entreprises', 'entreprises/*')) {
            if (Auth::guard('entreprise')->check()) {
                return redirect()->route('entreprises.dashboard');
            }

            return $next($request);
        }

        // Si superadmin connecté, rediriger vers superadmin.dashboard
        if (Auth::guard('superadmin')->check()) {
            if (!str_starts_with($request->path(), 'particuliers/superadmin')) {
                return redirect()->route('particuliers.superadmin.dashboard');
            }
            return $next($request);
        }

        // Si admin connecté, rediriger vers admin.dashboard
        if (Auth::guard('admin')->check()) {
            if (!str_starts_with($request->path(), 'particuliers/admin')) {
                return redirect()->route('particuliers.admin.dashboard');
            }
            return $next($request);
        }

        // Si client connecté, rediriger vers video.dashboard
        if (Auth::guard('web')->check()) {
            return redirect()->route('particuliers.video.dashboard');
        }

        return $next($request);
    }
}
