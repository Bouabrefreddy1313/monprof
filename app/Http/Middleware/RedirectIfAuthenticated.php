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
        // Si superadmin connecté, rediriger vers superadmin.dashboard
        if (Auth::guard('superadmin')->check()) {
            if (!str_starts_with($request->path(), 'superadmin')) {
                return redirect()->route('superadmin.dashboard');
            }
            return $next($request);
        }

        // Si admin connecté, rediriger vers admin.dashboard
        if (Auth::guard('admin')->check()) {
            if (!str_starts_with($request->path(), 'admin')) {
                return redirect()->route('admin.dashboard');
            }
            return $next($request);
        }

        // Si client connecté, rediriger vers video.dashboard
        if (Auth::check()) {
            return redirect()->route('video.dashboard');
        }

        return $next($request);
    }
}
