<?php

namespace App\Http\Controllers;
use App\Models\Matiere;
use App\Models\Admin;
use App\Models\Lecons;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function index()
    {
        // Récupérer uniquement les matières de type DCG
    $matieres = Matiere::where('type', 'DCG')->get();
    
    // Passer les matières à la vue
    return view('matieres.index', compact('matieres'));
    }
    public function dscg()
    {
        // Récupérer uniquement les matières de type DCG
    $matieres = Matiere::where('type', 'DSCG')->get();
    
    // Passer les matières à la vue
    return view('matieres.dscg', compact('matieres'));
    }
    public function create()
    {
        // Récupérer tous les administrateurs à partir de la table `admins`
        $admins = Admin::all();

        // Retourner la vue avec la liste des administrateurs
        return view('matieres.create', compact('admins'));
    }

    public function store(Request $request)
    {
        // Validation des champs
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'nullable|string|max:255',    
            'prix' => 'required|numeric|min:0',
            'admin_id' => 'required|exists:admins,id',
        ]);
    
        // Gestion du téléchargement de l'image
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        } else {
            $imagePath = null; // Pas d'image téléchargée
        }
    
        // Création de la nouvelle matière
        Matiere::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'image' => $imagePath, // Stocker le chemin de l'image
            'type' => $request->type, // Stocker le type
            'prix' => $request->prix, // Stocker le prix
            'admin_id' => $request->admin_id,
        ]);
    
        return redirect()->route('matieres.index')->with('success', 'Matière ajoutée avec succès.');
    }
    public function showCours($id)
    {
        if (Auth::check()) {
            $matiere = Matiere::findOrFail($id);
            $lecons = Lecons::where('matiere_id', $id)->get();
            return view('lecons.index', compact('matiere', 'lecons'));
        } else {
            return redirect()->route('login')->with('message', 'Veuillez vous connecter pour accéder aux leçons.');
        }
    }
    
    public function show($id)
{
    // Récupérer la matière par son ID
    $matiere = Matiere::findOrFail($id);

    // Passer la matière à la vue
    return view('matieres.create', compact('matiere'));
}
}
