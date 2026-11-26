<?php

namespace App\Http\Controllers\Entreprises;


use App\Http\Controllers\Controller;
use App\Models\Entreprises\Domaine;
use Illuminate\Http\Request;

class DomaineController extends Controller
{
    /**
     * Affiche la liste des domaines
     */
    public function index()
    {
        $domaines = Domaine::all();
        return view('entreprises.domaines.index', compact('domaines'));
    }

    /**
     * Affiche le formulaire de création d’un domaine
     */
    public function create()
    {
        return view('entreprises.domaines.create');
    }

    /**
     * Enregistre un nouveau domaine
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
        ]);

        Domaine::create([
            'titre' => $request->titre,
        ]);

        return redirect()->route('entreprises.domaines.index')->with('success', 'Domaine créé avec succès.');
    }

    /**
     * Affiche le détail d’un domaine spécifique
     */
    public function show($id)
    {
        // Récupère le domaine avec ses formations
        $domaine = Domaine::with('formations')->findOrFail($id);

        return view('entreprises.domaines.show', compact('domaine'));
    }

    /**
     * Affiche le formulaire d’édition d’un domaine
     */
    public function edit(Domaine $domaine)
    {
        return view('entreprises.domaines.edit', compact('domaine'));
    }

    /**
     * Met à jour un domaine
     */
    public function update(Request $request, Domaine $domaine)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
        ]);

        $domaine->update([
            'titre' => $request->titre,
        ]);

        return redirect()->route('entreprises.domaines.index')->with('success', 'Domaine mis à jour avec succès.');
    }

    /**
     * Supprime un domaine
     */
    public function destroy(Domaine $domaine)
    {
        $domaine->delete();

        return redirect()->route('entreprises.domaines.index')->with('success', 'Domaine supprimé avec succès.');
    }
}
