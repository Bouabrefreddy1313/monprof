<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Formation;
use App\Models\SousFormation;
class CoursController extends Controller
{
    public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'titre' => 'required|string|max:255',
        'formation_id' => 'required|exists:formations,id',
        'sous_formation_id' => 'required|exists:sous_formations,id',
        'heure' => 'required|string',
        'description' => 'required|string',
        'lieu' => 'required|string',
       
        'programme' => 'required|string',
        'objectif' => 'required|string',
        'cible' => 'required|string',
         'prerequis' => 'nullable|string',
    'formateur' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:30048', 
        'methodes_pedagogiques' => 'nullable|string',
    'evaluation' => 'nullable|string',// Réduisez la taille maximale si nécessaire
    ]);


     // Traitement de l'image
     if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    } else {
        $imagePath = null;
    }

    // Création d'une nouvelle instance de Cours avec les données validées
    $cours = new Cours();
    $cours->titre = $request->titre;
    $cours->formation_id = $request->formation_id;
    $cours->sous_formation_id = $request->sous_formation_id;
    $cours->heure = $request->heure;
    $cours->description = $request->description;
    $cours->lieu = $request->lieu;
    $cours->prix = $request->prix;
    $cours->programme = $request->programme;
    $cours->objectif = $request->objectif;
    $cours->cible = $request->cible;
    $cours->prerequis = $request->prerequis;   // ➕ ajouté
$cours->formateur = $request->formateur;   // ➕ ajouté
    $cours->image = $imagePath;
    $cours->methodes_pedagogiques = $request->methodes_pedagogiques;
$cours->evaluation = $request->evaluation;

    // Enregistrement du cours dans la base de données
    $cours->save();

    return view('valider')->with('success', 'Le cours a été ajouté avec succès.');
}

public function create()
    {
        $formations = Formation::all();
        $sousFormations = SousFormation::all();

        return view('/create', compact('formations', 'sousFormations'));
    }
    
    public function getSousFormations($formation_id)
{
    $sousFormations = SousFormation::where('formation_id', $formation_id)->get();
    return response()->json($sousFormations);
}

public function edit($id)
{
    $cours = Cours::findOrFail($id);
    return view('cours.edit', compact('cours'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'prerequis' => 'nullable|string',
        'formateur' => 'nullable|string|max:255',
        'prix' => 'nullable|numeric|min:0', // ✅ validation du prix
    ]);

    $cours = Cours::findOrFail($id);

    $cours->update([
        'prerequis' => $request->prerequis,
        'formateur' => $request->formateur,
        'prix' => $request->prix, // ✅ ajout prix
    ]);

    return redirect()->route('particuliers.cours.index')->with('success', 'Cours mis à jour avec succès.');
}

public function index()
{
    $cours = Cours::with('formation', 'sousFormation')->get(); // récupère les cours avec leurs formations
    return view('cours.index', compact('cours'));
}

}
