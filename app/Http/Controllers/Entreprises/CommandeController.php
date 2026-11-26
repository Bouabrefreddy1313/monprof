<?php

namespace App\Http\Controllers\Entreprises;


use App\Http\Controllers\Controller;
use App\Models\Entreprises\Commande;
use App\Models\Entreprises\Bon;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function create(Bon $bon)
    {
        return view('entreprises.commandes.create', compact('bon'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'telephone' => 'required|string',
            'montant' => 'required|numeric',
            'email' => 'required|email',
        ]);

        Commande::create([
            'bon_id' => $request->bon_id,
            'telephone' => $request->telephone,
            'montant' => $request->montant,
            'email' => $request->email,
            'statut' => 'en attente',
        ]);

        return redirect()->route('entreprises.bons.index')->with('success', 'Commande soumise avec succès.');
    }

   public function index()
{
    $commandes = Commande::has('bon')->with('bon')->get();
    return view('entreprises.commandes.index', compact('commandes'));
}

    public function validateCommande(Commande $commande)
    {
        $commande->update(['statut' => 'validée']);
        // Envoi d'email optionnel ici
        return redirect()->route('entreprises.commandes.index')->with('success', 'Commande validée.');
    }

    public function rejectCommande(Commande $commande)
    {
        $commande->update(['statut' => 'rejetée']);
        return redirect()->route('entreprises.commandes.index')->with('success', 'Commande rejetée.');
    }
}
