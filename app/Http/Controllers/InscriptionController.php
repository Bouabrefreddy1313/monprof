<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NouvelleInscription;
use App\Mail\ConfirmationInscription;

class InscriptionController extends Controller
{
    /**
     * Stocke une nouvelle inscription (appelé depuis le modal)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_parent' => 'required|string|max:255',
            'nom_enfant' => 'required|string|max:255',
            'age_enfant' => 'required|integer|min:3|max:18',
            'telephone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'activite' => 'required|string|max:255',
            'date_debut' => 'nullable|date',
            'lieu' => 'required|in:domicile,en_ligne,centre',
            'jours' => 'required|array|min:1',
            'jours.*' => 'in:Lundi,Mardi,Mercredi,Jeudi,Vendredi,Samedi,Dimanche',
            'horaire' => 'nullable|string|max:100',
            'type_paiement' => 'required|in:unique,seance,abonnement',
            'mode_paiement' => 'required|in:mobile_money,virement',
            'frais_reservation' => 'required|numeric',
            'prix_formule' => 'required|string|max:255',
        ]);

        // Nettoyer le prix pour stockage decimal (extraire le montant avant FCFA)
        if (preg_match('/^([0-9\s]+)/', trim($request->prix_formule), $matches)) {
            $prixNumeric = (float) str_replace(' ', '', $matches[1]);
        } else {
            $prixNumeric = (float) preg_replace('/[^0-9]/', '', $request->prix_formule);
        }

        $inscription = Inscription::create([
            'nom_parent' => $validated['nom_parent'],
            'nom_enfant' => $validated['nom_enfant'],
            'age_enfant' => $validated['age_enfant'],
            'telephone' => $validated['telephone'],
            'email' => $validated['email'],
            'activite' => $validated['activite'],
            'date_debut' => $validated['date_debut'],
            'lieu' => $validated['lieu'],
            'jours' => $validated['jours'],
            'horaire' => $validated['horaire'],
            'type_paiement' => $validated['type_paiement'],
            'mode_paiement' => $validated['mode_paiement'],
            'frais_reservation' => $validated['frais_reservation'],
            'prix_formule' => $prixNumeric,
        ]);

        // Envoyer email aux équipes
        try {
            $mailable = new \App\Mail\CommandeAdminNotification('Inscription', [
                'ID' => $inscription->id,
                'Parent' => $inscription->nom_parent,
                'Enfant' => $inscription->nom_enfant,
                'Email' => $inscription->email,
                'Téléphone' => $inscription->telephone,
                'Activité' => $inscription->activite,
                'Lieu' => $inscription->lieu,
                'Jours' => implode(', ', $inscription->jours ?? []),
                'Type' => $inscription->type_paiement,
                'Mode' => $inscription->mode_paiement,
                'Date' => $inscription->created_at->format('d/m/Y H:i'),
            ]);

            Mail::to([
                env('NOTIFICATION_EMAIL_FORMATION', 'formation@monprofchezmoi-ci.com'),
                env('NOTIFICATION_EMAIL_INSCRIPTION', 'inscription@monprofchezmoi-ci.com'),
            ])->send($mailable);
        } catch (\Exception $e) {
            Log::error('Erreur envoi email inscription: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Inscription enregistrée avec succès',
            'inscription_id' => $inscription->id,
        ]);
    }

    /**
     * Liste des inscriptions (pour le dashboard admin)
     */
    public function index()
    {
        $inscriptions = Inscription::latest()->paginate(20);
        $stats = [
            'total' => Inscription::count(),
            'en_attente' => Inscription::enAttente()->count(),
            'contactes' => Inscription::contactes()->count(),
            'confirmes' => Inscription::confirmes()->count(),
        ];

        return view('inscriptions.index', compact('inscriptions', 'stats'));
    }

    /**
     * Détails d'une inscription
     */
    public function show(Inscription $inscription)
    {
        return view('inscriptions.show', compact('inscription'));
    }

    /**
     * Marquer comme contacté
     */
    public function marquerContacte(Inscription $inscription)
    {
        $inscription->update([
            'statut' => 'contacte',
            'date_contact' => now(),
        ]);

        return back()->with('success', 'Inscription marquée comme contactée');
    }

    /**
     * Marquer comme confirmée
     */
    public function marquerConfirme(Inscription $inscription)
    {
        $inscription->update([
            'statut' => 'confirme',
        ]);

        return back()->with('success', 'Inscription confirmée');
    }

    /**
     * Annuler une inscription
     */
    public function annuler(Inscription $inscription)
    {
        $inscription->update([
            'statut' => 'annule',
        ]);

        return back()->with('success', 'Inscription annulée');
    }

    /**
     * Ajouter des notes admin
     */
    public function ajouterNotes(Request $request, Inscription $inscription)
    {
        $validated = $request->validate([
            'notes_admin' => 'required|string|max:1000',
        ]);

        $inscription->update([
            'notes_admin' => $validated['notes_admin'],
        ]);

        return back()->with('success', 'Notes ajoutées');
    }

    /**
     * Supprimer une inscription
     */
    public function destroy(Inscription $inscription)
    {
        $inscription->delete();
        return back()->with('success', 'Inscription supprimée');
    }
}
