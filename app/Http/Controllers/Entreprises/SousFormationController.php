<?php

namespace App\Http\Controllers\Entreprises;


use App\Http\Controllers\Controller;
use App\Models\Entreprises\SousFormation;
use App\Models\Entreprises\Formation;
use Illuminate\Http\Request;

class SousFormationController extends Controller
{
    public function create()
    {
        $formations = Formation::all();
        return view('entreprises.sous_formations.create', compact('formations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
            'formation_id' => 'required|exists:pro_formations,id',
        ]);

        SousFormation::create($request->all());

        return redirect()->route('entreprises.sous_formations.index')->with('success', 'Sous-formation créée avec succès.');
    }

    public function index()
    {
        $sousFormations = SousFormation::all();
        return view('entreprises.sous_formations.index', compact('sousFormations'));
    }

    public function show(SousFormation $sousFormation)
{
    return view('entreprises.sous_formations.show', compact('sousFormation'));
}

// Liste des sous-formations pour admin
    public function adminIndex()
    {
        $sousFormations = SousFormation::with('formation')->get();
        return view('entreprises.admin.sousformations.index', compact('sousFormations'));
    }

    // Formulaire édition
    public function edit($id)
    {
        $sousFormation = SousFormation::findOrFail($id);
        $formations = Formation::all();
        return view('entreprises.admin.sousformations.edit', compact('sousFormation', 'formations'));
    }

    // Mise à jour
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
            'formation_id' => 'required|exists:pro_formations,id',
        ]);

        $sousFormation = SousFormation::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('sousformations', 'public');
            $sousFormation->image = $path;
        }

        $sousFormation->update($request->all());

        return redirect()->route('entreprises.admin.sousformations.index')->with('success', 'Sous-formation mise à jour avec succès.');
    }

    // Supprimer
    public function destroy($id)
    {
        $sousFormation = SousFormation::findOrFail($id);
        $sousFormation->delete();

        return redirect()->route('entreprises.admin.sousformations.index')->with('success', 'Sous-formation supprimée avec succès.');
    }

    // Ajoutez d'autres méthodes pour edit, update, delete, etc.
}