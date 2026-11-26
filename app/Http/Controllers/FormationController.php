<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Cours;
use App\Models\SousFormation;

class FormationController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'titre' => 'required|string|max:255',

            'description' => 'required|string',
        ]);

        // Créer une nouvelle instance de Formation avec les données validées
        $formation = new Formation();
        $formation->titre = $request->titre;
        $formation->pourquoi = $request->pourquoi;
        $formation->qui = $request->qui;
        $formation->importance = $request->importance;
        $formation->description = $request->description;
        $formation->categorie = $request->has('categorie')
            ? implode(',', (array) $request->input('categorie'))
            : 'transversale';

        // Enregistrer la nouvelle formation dans la base de données
        $formation->save();

        // Retourner une réponse
        return view('/valider')->with('success', 'Le cours a été ajouté avec succès.');
    }
    public function formcreate()
    {
        $formations = Formation::all();
        $sousFormations = SousFormation::all();

        return view('/formcreate', compact('formations', 'sousFormations'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return redirect()->route('particuliers.formations');
        }

        // Recherche dans les COURS (sous-formations) - simplifiée
        $cours = Cours::where('titre', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orWhere('programme', 'like', "%{$query}%")
            ->orWhere('objectif', 'like', "%{$query}%")
            ->orWhere('cible', 'like', "%{$query}%")
            ->orWhere('formateur', 'like', "%{$query}%")
            ->get();

        // Retourner la vue avec les résultats
        return view('formations.index', [
            'cours' => $cours,
            'formations' => $cours,
            'sousFormation' => null,
            'searchQuery' => $query
        ]);
    }
}


