<?php

namespace App\Http\Middleware\Entreprises;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Appliqué à toutes les routes /entreprises/*.
 *
 * Les comptes de l'espace entreprises sont dans la table pro_users (garde "entreprise"),
 * séparés des comptes particuliers (table users, garde "web"). Ce middleware fait de
 * "entreprise" la garde et le broker de mots de passe par défaut pour la requête, afin
 * que auth(), @auth, $request->user(), le middleware "auth", "guest", "current_password"
 * et les réinitialisations de mot de passe du code entreprises visent les bons comptes.
 */
class EspaceEntreprise
{
    public function handle(Request $request, Closure $next): Response
    {
        Auth::shouldUse('entreprise');
        config(['auth.defaults.passwords' => 'pro_users']);

        return $next($request);
    }
}
