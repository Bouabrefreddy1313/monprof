<?php

namespace App\Http\Controllers;

use App\Models\PaiementVideo;
use App\Models\Payment;
use App\Models\VoucherOrder;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // ============================================
        // 1. VIDÉOS DCG - uniquement complétées pour le total
        // ============================================
        $dcgPaiements = PaiementVideo::with(['user', 'video'])
            ->whereHas('video', fn($q) => $q->where('formation_type', 'dcg'))
            ->orderBy('created_at', 'desc')
            ->get();

        $dcgConfirmes = $dcgPaiements->where('statut', 'complete');
        $dcgStats = [
            'total' => $dcgConfirmes->sum('montant'),
            'nb' => $dcgConfirmes->count(),
            'liste' => $dcgPaiements, // tous (pour affichage)
        ];

        // ============================================
        // 2. VIDÉOS DSCG
        // ============================================
        $dscgPaiements = PaiementVideo::with(['user', 'video'])
            ->whereHas('video', fn($q) => $q->where('formation_type', 'dscg'))
            ->orderBy('created_at', 'desc')
            ->get();

        $dscgConfirmes = $dscgPaiements->where('statut', 'complete');
        $dscgStats = [
            'total' => $dscgConfirmes->sum('montant'),
            'nb' => $dscgConfirmes->count(),
            'liste' => $dscgPaiements,
        ];

        // ============================================
        // 3. FORMATIONS (cours/leçons via CinetPay général)
        // ============================================
        $formationsPaiements = Payment::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $formationsConfirmes = $formationsPaiements->where('status', 'ACCEPTED');
        $formationsStats = [
            'total' => $formationsConfirmes->sum('amount'),
            'nb' => $formationsConfirmes->count(),
            'liste' => $formationsPaiements,
        ];

        // ============================================
        // 4. AUTRES (bons d'achat + soutien scolaire)
        // ============================================
        $autresPaiements = collect();

        // Bons d'achat
        $voucherOrders = VoucherOrder::with('voucher')->orderBy('created_at', 'desc')->get();
        foreach ($voucherOrders as $v) {
            $autresPaiements->push([
                'id' => 'V' . $v->id,
                'type' => 'Bon d\'achat',
                'client' => $v->email ?? 'N/A',
                'email' => $v->email ?? 'N/A',
                'montant' => $v->amount_paid,
                'statut_raw' => $v->status,
                'statut' => $v->status === 'validé' ? 'Complété' : ($v->status === 'en_attente' ? 'En attente' : 'Échec'),
                'est_confirme' => $v->status === 'validé',
                'date' => $v->created_at,
                'details' => $v->voucher?->title ?? 'Bon #' . $v->id,
            ]);
        }

        // Soutien scolaire
        $ordersSoutien = Order::with('coursRelation')->orderBy('created_at', 'desc')->get();
        foreach ($ordersSoutien as $o) {
            $autresPaiements->push([
                'id' => 'O' . $o->id,
                'type' => 'Soutien scolaire',
                'client' => $o->nom ?? 'N/A',
                'email' => $o->email ?? 'N/A',
                'montant' => $o->prix,
                'statut_raw' => $o->etat,
                'statut' => $o->etat === 'vendu' ? 'Complété' : ($o->etat === 'en_attente' ? 'En attente' : 'Échec'),
                'est_confirme' => $o->etat === 'vendu',
                'date' => $o->created_at,
                'details' => $o->cours ?? ($o->coursRelation?->titre ?? 'Cours soutien'),
            ]);
        }

        // Réservations (formations flash / 3h / 3h chrono)
        $reservations = Reservation::with('cours')->orderBy('created_at', 'desc')->get();
        foreach ($reservations as $r) {
            $autresPaiements->push([
                'id' => 'R' . $r->id,
                'type' => 'Réservation',
                'client' => $r->nom ?? 'N/A',
                'email' => $r->email ?? 'N/A',
                'telephone' => $r->telephone ?? 'N/A',
                'montant' => $r->acompte,
                'statut_raw' => $r->statut,
                'statut' => match ($r->statut) {
                    'paye' => 'Payé intégralement',
                    'acompte_paye' => 'Acompte payé',
                    'annule' => 'Annulé',
                    default => 'En attente',
                },
                'est_confirme' => in_array($r->statut, ['paye', 'acompte_paye']),
                'date' => $r->created_at,
                'details' => $r->cours?->titre ?? 'Formation',
                'session' => $r->session,
            ]);
        }

        $autresConfirmes = $autresPaiements->where('est_confirme', true);
        $autresStats = [
            'total' => $autresConfirmes->sum('montant'),
            'nb' => $autresConfirmes->count(),
            'liste' => $autresPaiements->sortByDesc('date'),
        ];

        // ============================================
        // 5. CONSOLIDATION COMPLÈTE DE LA FACTURATION (TOUS LES PAIEMENTS)
        // ============================================
        $factures = collect();

        // 1. Vidéos DCG
        foreach ($dcgPaiements as $p) {
            $factures->push([
                'id' => 'DCG' . $p->id,
                'ref_facture' => 'FAC-DCG-' . str_pad($p->id, 4, '0', STR_PAD_LEFT),
                'type' => 'Formation DCG',
                'categorie' => 'dcg',
                'client' => $p->user?->name ?? 'Client DCG',
                'email' => $p->user?->email ?? 'N/A',
                'telephone' => $p->user?->telephone ?? $p->user?->phone ?? 'N/A',
                'prestation' => $p->video?->titre ?? 'Module Vidéo DCG',
                'montant' => (float) $p->montant,
                'methode_paiement' => ucfirst($p->methode_paiement ?? 'CinetPay'),
                'transaction_id' => $p->transaction_id ?: ('TX-DCG' . $p->id),
                'statut_raw' => $p->statut,
                'statut' => $p->statut === 'complete' ? 'Payé' : ($p->statut === 'en_attente' ? 'En attente' : 'Échec'),
                'est_confirme' => $p->statut === 'complete',
                'date' => $p->created_at,
            ]);
        }

        // 2. Vidéos DSCG
        foreach ($dscgPaiements as $p) {
            $factures->push([
                'id' => 'DSCG' . $p->id,
                'ref_facture' => 'FAC-DSCG-' . str_pad($p->id, 4, '0', STR_PAD_LEFT),
                'type' => 'Formation DSCG',
                'categorie' => 'dscg',
                'client' => $p->user?->name ?? 'Client DSCG',
                'email' => $p->user?->email ?? 'N/A',
                'telephone' => $p->user?->telephone ?? $p->user?->phone ?? 'N/A',
                'prestation' => $p->video?->titre ?? 'Module Vidéo DSCG',
                'montant' => (float) $p->montant,
                'methode_paiement' => ucfirst($p->methode_paiement ?? 'CinetPay'),
                'transaction_id' => $p->transaction_id ?: ('TX-DSCG' . $p->id),
                'statut_raw' => $p->statut,
                'statut' => $p->statut === 'complete' ? 'Payé' : ($p->statut === 'en_attente' ? 'En attente' : 'Échec'),
                'est_confirme' => $p->statut === 'complete',
                'date' => $p->created_at,
            ]);
        }

        // 3. Formations CinetPay
        foreach ($formationsPaiements as $p) {
            $clientName = $p->customer_name ? trim($p->customer_name . ' ' . ($p->customer_surname ?? '')) : ($p->user?->name ?? 'Client Formation');
            $factures->push([
                'id' => 'FORM' . $p->id,
                'ref_facture' => 'FAC-FORM-' . str_pad($p->id, 4, '0', STR_PAD_LEFT),
                'type' => 'Formation en ligne',
                'categorie' => 'formation',
                'client' => $clientName,
                'email' => $p->customer_email ?? $p->user?->email ?? 'N/A',
                'telephone' => $p->customer_phone_number ?? $p->user?->telephone ?? 'N/A',
                'prestation' => $p->description ?: ('Formation en ligne #' . $p->id),
                'montant' => (float) $p->amount,
                'methode_paiement' => 'CinetPay',
                'transaction_id' => $p->transaction_id ?: ('TX-F' . $p->id),
                'statut_raw' => $p->status,
                'statut' => $p->status === 'ACCEPTED' ? 'Payé' : ($p->status === 'en_attente' ? 'En attente' : 'Échec'),
                'est_confirme' => $p->status === 'ACCEPTED',
                'date' => $p->created_at,
            ]);
        }

        // 4. Bons d'achat
        foreach ($voucherOrders as $v) {
            $factures->push([
                'id' => 'BON' . $v->id,
                'ref_facture' => 'FAC-BON-' . str_pad($v->id, 4, '0', STR_PAD_LEFT),
                'type' => 'Bon d\'achat',
                'categorie' => 'bon',
                'client' => $v->email ?? 'Client Bon',
                'email' => $v->email ?? 'N/A',
                'telephone' => $v->phone ?? 'N/A',
                'prestation' => 'Bon Cadeau - ' . ($v->voucher?->title ?? ('Code ' . $v->code)),
                'montant' => (float) $v->amount_paid,
                'methode_paiement' => 'En ligne',
                'transaction_id' => $v->code ?: ('BON-' . $v->id),
                'statut_raw' => $v->status,
                'statut' => $v->status === 'validé' ? 'Payé' : ($v->status === 'en_attente' ? 'En attente' : 'Rejeté'),
                'est_confirme' => $v->status === 'validé',
                'date' => $v->created_at,
            ]);
        }

        // 5. Soutien scolaire
        foreach ($ordersSoutien as $o) {
            $isFormation = $o->coursRelation && $o->coursRelation->formation_id;
            $factures->push([
                'id' => 'ORD' . $o->id,
                'ref_facture' => 'FAC-CMD-' . str_pad($o->id, 4, '0', STR_PAD_LEFT),
                'type' => $isFormation ? 'Formation' : 'Soutien scolaire',
                'categorie' => $isFormation ? 'formation' : 'soutien',
                'client' => $o->nom ?? 'Client Soutien',
                'email' => $o->email ?? 'N/A',
                'telephone' => $o->numero ?? 'N/A',
                'prestation' => $o->cours ?? ($o->coursRelation?->titre ?? 'Cours de soutien'),
                'montant' => (float) $o->prix,
                'methode_paiement' => ucfirst($o->mode_de_formation ?? 'Standard'),
                'transaction_id' => 'CMD-' . $o->id,
                'statut_raw' => $o->etat,
                'statut' => $o->etat === 'vendu' ? 'Payé' : ($o->etat === 'en_attente' ? 'En attente' : 'Annulé'),
                'est_confirme' => $o->etat === 'vendu',
                'date' => $o->created_at,
            ]);
        }

        // 6. Réservations Flash
        foreach ($reservations as $r) {
            $factures->push([
                'id' => 'RES' . $r->id,
                'ref_facture' => 'FAC-RES-' . str_pad($r->id, 4, '0', STR_PAD_LEFT),
                'type' => 'Réservation Flash',
                'categorie' => 'reservation',
                'client' => $r->nom ?? 'Client Réservation',
                'email' => $r->email ?? 'N/A',
                'telephone' => $r->telephone ?? 'N/A',
                'prestation' => ($r->cours?->titre ?? 'Formation flash') . ($r->session ? ' (' . $r->session . ')' : ''),
                'montant' => (float) ($r->acompte ?: $r->montant_total),
                'methode_paiement' => 'Acompte',
                'transaction_id' => $r->transaction_id ?: ('RES-' . $r->id),
                'statut_raw' => $r->statut,
                'statut' => match ($r->statut) {
                    'paye' => 'Payé',
                    'acompte_paye' => 'Acompte payé',
                    'annule' => 'Annulé',
                    default => 'En attente',
                },
                'est_confirme' => in_array($r->statut, ['paye', 'acompte_paye']),
                'date' => $r->created_at,
            ]);
        }

        $factures = $factures->sortByDesc('date')->values();

        $facturationStats = [
            'total_encaisse' => $factures->where('est_confirme', true)->sum('montant'),
            'nb_encaisse' => $factures->where('est_confirme', true)->count(),
            'total_attente' => $factures->where('est_confirme', false)->where('statut', 'En attente')->sum('montant'),
            'nb_attente' => $factures->where('est_confirme', false)->where('statut', 'En attente')->count(),
            'total_general' => $factures->sum('montant'),
            'nb_total' => $factures->count(),
            'panier_moyen' => $factures->where('est_confirme', true)->count() > 0 ? round($factures->where('est_confirme', true)->average('montant')) : 0,
        ];

        // Total global (uniquement paiements confirmés)
        $totalGlobal = $facturationStats['total_encaisse'];

        return view('admin.dashboard', compact(
            'dcgStats',
            'dscgStats',
            'formationsStats',
            'autresStats',
            'factures',
            'facturationStats',
            'totalGlobal'
        ));
    }
}
