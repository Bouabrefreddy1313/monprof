<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere;
use App\Models\Lecons;

class LeconsController extends Controller
{
    public function create()
    {
        $matieres = Matiere::all();
        return view('lecons.create', compact('matieres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'matiere_id' => 'required|exists:matieres,id',
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:20000', // Limite à 20MB et formats acceptés
        ]);
    
        // Gérer le téléchargement de la vidéo
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
        }
    
        // Créer une nouvelle leçon avec le chemin de la vidéo
        Lecons::create([
            'matiere_id' => $request->matiere_id,
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'video_url' => $videoPath,
        ]);
    
        return redirect()->route('lecons.create')->with('success', 'Leçon ajoutée avec succès.');
    }

    public function index($id)
    {
        $matiere = Matiere::findOrFail($id);
        $lecons = Lecons::where('matiere_id', $id)->get();
        
        return view('lecons.index', compact('lecons', 'matiere'));
    }
    


public function show($id)
{
    $lecon = Lecons::findOrFail($id);
    return view('lecons.show', compact('lecon'));
}
}
