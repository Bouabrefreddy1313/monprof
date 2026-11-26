<?php

namespace App\Http\Controllers\Entreprises\Commercial;

use App\Http\Controllers\Controller;
use App\Models\Entreprises\FormationClient;
use App\Models\Entreprises\Commande;
use App\Models\Entreprises\UtilisationBon;
use App\Models\Entreprises\DemandeDevis;
use App\Models\Entreprises\Formateur;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommercialDashboardController extends Controller
{
    /**
     * Display the commercial dashboard.
     */
    public function index(): View
    {
        $stats = [
            'commandes_formations' => FormationClient::count(),
            'commandes_bons' => Commande::count(),
            'bons_actifs' => UtilisationBon::count(),
            'demandes_cours' => DemandeDevis::count(),
            'formateurs' => Formateur::count(),
        ];

        return view('entreprises.commercial.dashboard', compact('stats'));
    }
}
