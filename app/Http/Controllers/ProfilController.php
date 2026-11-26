<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Page d'accueil "/" : le visiteur indique s'il est une entreprise ou un particulier.
 * Le choix est mémorisé 30 jours dans le cookie "profil".
 */
class ProfilController extends Controller
{
    public const COOKIE = 'profil';

    /** Durée du cookie en minutes (30 jours). */
    public const DUREE_COOKIE = 60 * 24 * 30;

    /** Profil => route d'accueil de l'espace correspondant. */
    private const ESPACES = [
        'entreprise' => 'entreprises.home',
        'particulier' => 'particuliers.home',
    ];

    /**
     * "/" : redirige directement vers l'espace mémorisé, sinon affiche le choix.
     */
    public function index(Request $request): View|RedirectResponse
    {
        $profil = $request->cookie(self::COOKIE);

        if (is_string($profil) && isset(self::ESPACES[$profil])) {
            return redirect()->route(self::ESPACES[$profil]);
        }

        return view('choix-profil', ['profilActuel' => null]);
    }

    /**
     * "/choisir-profil" : lien "changer d'espace" des headers.
     *  - avec ?profil=entreprise|particulier : bascule directement vers cet espace ;
     *  - sans paramètre : affiche la page de choix (même si un cookie existe).
     */
    public function choisir(Request $request): View|RedirectResponse
    {
        $demande = $request->query('profil');

        if (is_string($demande) && isset(self::ESPACES[$demande])) {
            return redirect()
                ->route(self::ESPACES[$demande])
                ->withCookie(cookie(self::COOKIE, $demande, self::DUREE_COOKIE));
        }

        $profil = $request->cookie(self::COOKIE);

        return view('choix-profil', [
            'profilActuel' => is_string($profil) && isset(self::ESPACES[$profil]) ? $profil : null,
        ]);
    }

    /**
     * Enregistre le choix dans le cookie et redirige vers l'espace choisi.
     */
    public function enregistrer(Request $request): RedirectResponse
    {
        $donnees = $request->validate([
            'profil' => ['required', 'in:' . implode(',', array_keys(self::ESPACES))],
        ]);

        return redirect()
            ->route(self::ESPACES[$donnees['profil']])
            ->withCookie(cookie(self::COOKIE, $donnees['profil'], self::DUREE_COOKIE));
    }
}
