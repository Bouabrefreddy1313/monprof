<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Cours;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ReservationConfirmation;
use App\Mail\ReservationNotificationAdmin;

class ReservationController extends Controller
{
    /**
     * Calcul dynamique du prix (API)
     */
    public function calcul(Request $request)
    {
        $cours = Cours::findOrFail($request->cours_id);
        $formule = $request->formule;

        $montantTotal = $formule === 'groupe' ? $cours->prix * 0.5 : $cours->prix;
        $acompte = $montantTotal * 0.3;
        $solde = $montantTotal * 0.7;

        return response()->json([
            'montant_total' => $montantTotal,
            'acompte' => $acompte,
            'solde' => $solde,
            'acompte_formate' => number_format($acompte, 0, '', ' '),
            'montant_total_formate' => number_format($montantTotal, 0, '', ' '),
            'solde_formate' => number_format($solde, 0, '', ' '),
        ]);
    }

    /**
     * Création de la réservation (étape 1)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cours_id' => 'required|exists:cours,id',
            'formule' => 'required|in:individuel,groupe',
            'nom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'ville' => 'required|string|max:255',
            'message' => 'nullable|string',
            'conditions' => 'required|accepted',
        ]);

        $cours = Cours::findOrFail($validated['cours_id']);
        $isFormation3h = preg_match('/3\s*(h|heure)/i', $cours->heure);

        // Calcul des montants (acompte de 30%, solde de 70% quelle que soit la durée)
        $montantTotal = $validated['formule'] === 'groupe'
            ? $cours->prix * 0.5
            : $cours->prix;
        $acompte = $montantTotal * 0.3;
        $solde = $montantTotal * 0.7;

        // Vérification places disponibles (groupe) - seulement pour formations non 3h
        if (!$isFormation3h && $validated['formule'] === 'groupe') {
            $placesOccupees = Reservation::where('cours_id', $cours->id)
                ->where('formule', 'groupe')
                ->whereIn('statut', ['en_attente', 'acompte_paye', 'paye'])
                ->sum('places_reservees');

            if ($placesOccupees >= 8) {
                return back()->with('error', 'Désolé, le groupe est complet. Choisissez la formule individuelle ou contactez-nous.');
            }
        }

        // Création du token unique
        $token = Str::random(64);

        $reservation = Reservation::create([
            'cours_id' => $validated['cours_id'],
            'token' => $token,
            'nom' => $validated['nom'],
            'telephone' => $validated['telephone'],
            'email' => $validated['email'],
            'ville' => $validated['ville'],
            'message' => $validated['message'] ?? null,
            'formule' => $validated['formule'],
            'montant_total' => $montantTotal,
            'acompte' => $acompte,
            'solde' => $solde,
            'statut' => 'en_attente',
            'places_reservees' => 1,
        ]);

        // Envoi emails
        try {
            Mail::to($reservation->email)->send(new ReservationConfirmation($reservation));

            $mailable = new \App\Mail\CommandeAdminNotification('Réservation', [
                'ID' => $reservation->id,
                'Nom' => $reservation->nom,
                'Email' => $reservation->email,
                'Téléphone' => $reservation->telephone,
                'Ville' => $reservation->ville,
                'Message' => $reservation->message ?? '-',
                'Cours' => $reservation->cours->titre ?? 'N/A',
                'Formule' => $reservation->formule === 'groupe' ? 'Petit groupe' : 'Individuelle',
                'Session choisie' => $reservation->session ?? '-',
                'Montant total' => number_format($reservation->montant_total, 0, ',', ' ') . ' F',
                'Acompte payé' => number_format($reservation->acompte, 0, ',', ' ') . ' F',
                'Solde restant' => number_format($reservation->solde, 0, ',', ' ') . ' F',
                'Statut' => $reservation->statut,
                'Date' => $reservation->created_at->format('d/m/Y H:i'),
            ]);

            Mail::to([
                env('NOTIFICATION_EMAIL_FORMATION', 'formation@monprofchezmoi-ci.com'),
                env('NOTIFICATION_EMAIL_INSCRIPTION', 'inscription@monprofchezmoi-ci.com'),
            ])->send($mailable);
        } catch (\Exception $e) {
            \Log::error('Erreur envoi email: ' . $e->getMessage());
        }

        // Redirection automatique vers CinetPay pour le paiement de l'acompte
        return view('reservation.redirect-payment', compact('token'));
    }

    /**
     * Page de confirmation et paiement
     */
    public function confirmation($token)
    {
        $reservation = Reservation::where('token', $token)
            ->with('cours')
            ->firstOrFail();

        return view('reservation.confirmation', compact('reservation'));
    }

    /**
     * Traitement du paiement (à intégrer avec CinetPay, PayPal, etc.)
     */
    public function processPayment(Request $request, $token)
    {
        $reservation = Reservation::where('token', $token)->firstOrFail();

        // TODO: Intégrer ici la logique de paiement avec CinetPay, Stripe, etc.
        // Exemple avec CinetPay:
        /*
        $cinetpay = new CinetPay(config('services.cinetpay.api_key'), config('services.cinetpay.site_id'));
        $payment = $cinetpay->initPayment([
            'amount' => $reservation->acompte,
            'currency' => 'XOF',
            'transaction_id' => 'RES_' . $reservation->id . '_' . time(),
            'description' => 'Acompte formation ' . $reservation->cours->titre,
            'return_url' => route('reservation.success', ['token' => $token]),
            'notify_url' => route('reservation.webhook'),
            'customer_name' => $reservation->nom,
            'customer_email' => $reservation->email,
            'customer_phone_number' => $reservation->telephone,
        ]);
        */

        // Simulation paiement réussi (à remplacer par vrai traitement)
        $reservation->update([
            'statut' => 'acompte_paye',
            'transaction_id' => 'SIM_' . time(),
            'date_paiement_acompte' => now(),
        ]);

        // Envoi email confirmation paiement
        try {
            Mail::to($reservation->email)->send(new \App\Mail\PaiementRecu($reservation));
        } catch (\Exception $e) {
            \Log::error('Erreur envoi email paiement: ' . $e->getMessage());
        }

        return redirect()->route('reservation.success', ['token' => $token]);
    }

    /**
     * Choix de la session après paiement de l'acompte (formations flash / 3h / 3h chrono)
     */
    public function chooseSession(Request $request, $token)
    {
        $validated = $request->validate([
            'session' => 'required|in:Mardi,Jeudi,Samedi',
        ]);

        $reservation = Reservation::where('token', $token)->firstOrFail();
        $reservation->update(['session' => $validated['session']]);

        try {
            $mailable = new \App\Mail\CommandeAdminNotification('Réservation - Session choisie', [
                'ID' => $reservation->id,
                'Nom' => $reservation->nom,
                'Email' => $reservation->email,
                'Téléphone' => $reservation->telephone,
                'Cours' => $reservation->cours->titre ?? 'N/A',
                'Formule' => $reservation->formule === 'groupe' ? 'Petit groupe' : 'Individuelle',
                'Session choisie' => $reservation->session,
                'Acompte payé' => number_format($reservation->acompte, 0, ',', ' ') . ' F',
                'Solde restant' => number_format($reservation->solde, 0, ',', ' ') . ' F',
                'Date' => now()->format('d/m/Y H:i'),
            ]);

            Mail::to([
                env('NOTIFICATION_EMAIL_FORMATION', 'formation@monprofchezmoi-ci.com'),
                env('NOTIFICATION_EMAIL_INSCRIPTION', 'inscription@monprofchezmoi-ci.com'),
            ])->send($mailable);
        } catch (\Exception $e) {
            \Log::error('Erreur envoi email session choisie: ' . $e->getMessage());
        }

        return redirect()->route('payment.success', [
            'type' => 'reservation',
            'token' => $token,
            'reference' => $reservation->transaction_id,
        ])->with('session_choisie', $validated['session']);
    }

    /**
     * Page de succès après paiement
     */
    public function success($token)
    {
        $reservation = Reservation::where('token', $token)
            ->with('cours')
            ->firstOrFail();

        return view('reservation.success', compact('reservation'));
    }
      public function storextra(Request $request)
{
    $validated = $request->validate([
        'nom_parent' => 'required|string|max:255',
        'nom_enfant' => 'required|string|max:255',
        'age_enfant' => 'required|integer|min:3|max:18',
        'telephone' => 'required|string',
        'email' => 'nullable|email',
        'activite' => 'required|string',
        'date_debut' => 'nullable|date',
        'lieu' => 'required|in:domicile,en_ligne,centre',
        'jours' => 'required',
        'horaire' => 'nullable|string',
        'type_paiement' => 'required|in:unique,seance,abonnement',
        'mode_paiement' => 'required|in:mobile_money,virement',
    ]);

    // Convertir le prix
    $prixRaw = $request->input('prix_formule', '0');
    $prixNumerique = (float) preg_replace('/[^0-9]/', '', $prixRaw);
    $validated['prix_formule'] = $prixNumerique > 0 ? $prixNumerique : 0;

    // Frais de réservation
    $validated['frais_reservation'] = (float) ($request->input('frais_reservation', 10000));

    // Statut par défaut
    $validated['statut'] = 'en_attente';

    // Convertir les jours (peut venir en JSON string ou array)
    $jours = $request->input('jours', []);
    if (is_string($jours)) {
        $jours = json_decode($jours, true) ?? [];
    }
    $validated['jours'] = $jours;

    // Générer un token unique
    $validated['token'] = \Illuminate\Support\Str::random(64);

    // Sauvegarder
    $inscription = Inscription::create($validated);

    // ✅ Retourner JSON pour le JS AJAX
    return response()->json([
        'success' => true,
        'token' => $inscription->token,
        'message' => 'Inscription enregistrée. Redirection vers le paiement...'
    ]);
}
}
