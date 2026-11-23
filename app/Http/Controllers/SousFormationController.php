<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SousFormation;
use App\Models\Formation;

class SousFormationController extends Controller
{
   
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'titre' => 'required|string|max:255',
           
            'formation_id' => 'required|exists:formations,id',
        ]);

        // Créer une nouvelle instance de SousFormation avec les données validées
        $sousFormation = new SousFormation();
        $sousFormation->titre = $request->titre;
       
        $sousFormation->formation_id = $request->formation_id;

        // Enregistrer la nouvelle sous-formation dans la base de données
        $sousFormation->save();

        // Retourner une réponse avec un message de succès
        return view('/valider')->with('success', 'Le cours a été ajouté avec succès.');
    }
    public function souscreate()
    {
        $formations = Formation::all();
        $sousFormations = SousFormation::all();

        return view('/souscreate', compact('formations', 'sousFormations'));
    }
}
