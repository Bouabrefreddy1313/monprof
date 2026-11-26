<?php

namespace App\Http\Middleware\Entreprises;

use App\Support\Entreprises\InfosVisiteur;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

/**
 * Enregistre chaque page publique consultée, pour les statistiques de visites du dashboard.
 * Ne compte pas : l'administration, les utilisateurs connectés, les robots, les requêtes AJAX.
 */
class EnregistrerVisite
{
    private const PAGES_EXCLUES = [
        'entreprises/dashboard', 'entreprises/dashboard/*', 'entreprises/admin', 'entreprises/admin/*',
        'entreprises/commercial', 'entreprises/commercial/*', 'entreprises/login', 'entreprises/register',
        'entreprises/logout', 'entreprises/profile', 'entreprises/profile/*', 'entreprises/password/*',
        'entreprises/forgot-password', 'entreprises/reset-password/*', 'entreprises/verify-email',
        'entreprises/verify-email/*', 'entreprises/confirm-password', 'entreprises/*/create',
        'entreprises/*/edit', 'entreprises/*/*/create', 'entreprises/*/*/edit',
    ];

    private const ROBOTS = '/bot|crawl|spider|slurp|facebookexternalhit|whatsapp|preview|curl|wget|python|headless|lighthouse|monitor/i';

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        try {
            if ($this->doitEtreCompte($request, $response)) {
                DB::table('pro_visites')->insert(array_merge([
                    'visiteur'   => hash('sha256', $request->ip() . '|' . $request->userAgent() . '|' . config('app.key')),
                    'page'       => mb_substr('/' . ltrim($request->path(), '/'), 0, 255),
                    'jour'       => now()->toDateString(),
                    'created_at' => now(),
                ], InfosVisiteur::depuis($request)));
            }
        } catch (\Throwable $e) {
            // Le comptage ne doit jamais bloquer l'affichage du site
            report($e);
        }

        return $response;
    }

    private function doitEtreCompte(Request $request, Response $response): bool
    {
        return $request->isMethod('GET')
            && ! $request->ajax()
            && ! $request->expectsJson()
            && $response->getStatusCode() === 200
            && str_contains((string) $response->headers->get('Content-Type'), 'text/html')
            && ! $request->is(...self::PAGES_EXCLUES)
            && ! auth('entreprise')->check()
            && ! preg_match(self::ROBOTS, (string) $request->userAgent());
    }
}
