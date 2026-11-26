<?php

namespace App\Http\Controllers\Entreprises;


use App\Http\Controllers\Controller;
use App\Models\Entreprises\Cours;
use App\Models\Entreprises\DemandeDevis;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    public function create(Cours $cours)
    {
        return view('entreprises.devis.create', compact('cours'));
    }

    public function store(Request $request)
    {
        // Valider les informations du formulaire
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'numero' => 'required|string',
            'email' => 'required|email',
            'ville' => 'required|string',
        ]);

        // Créer la demande de devis
        DemandeDevis::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'numero' => $request->numero,
            'email' => $request->email,
            'ville' => $request->ville,
            'cours_id' => $request->cours_id, // Assurez-vous d'inclure le champ cours_id
        ]);

        return redirect()->route('entreprises.home')->with('success', 'Demande de devis envoyée avec succès.');
    }
}