<?php

namespace App\Http\Controllers\Entreprises;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entreprises\Catalogue;
use App\Models\Entreprises\Domaine;

class CatalogueController extends Controller
{
    public function index()
    {
        $catalogues = Catalogue::all();
        return view('entreprises.catalogues.index', compact('catalogues'));
    }

    public function create()
    {
        $domaines = Domaine::all();
        return view('entreprises.catalogues.create', compact('domaines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'domaine_id' => 'required|exists:pro_domaines,id',
            'fichier' => 'required|mimes:pdf|max:10240', // 10 MB max
        ]);

        // Upload du PDF
        $pdfPath = $request->file('fichier')->store('catalogues', 'public');

        Catalogue::create([
            'titre' => $request->titre,
            'domaine_id' => $request->domaine_id,
            'fichier' => $pdfPath,
        ]);

        return redirect()->route('entreprises.catalogues.index')->with('success', 'Catalogue créé avec succès.');
    }
}
