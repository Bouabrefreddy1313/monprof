<?php

namespace App\Http\Controllers;

use App\Models\PaiementVideo;
use App\Models\Payment;
use App\Models\VoucherOrder;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        // ============================================
        // Toutes les commandes regroupées dans "Autres"
        // ============================================
        $autresPaiements = collect();

        // 1. VIDÉOS DCG → Formation DCG
        $dcgPaiements = PaiementVideo::with(['user', 'video'])
            ->whereHas('video', fn($q) => $q->where('formation_type', 'dcg'))
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($dcgPaiements as $p) {
            $autresPaiements->push([
                'id' => 'DCG' . $p->id,
                'type' => 'Formation DCG',
                'client' => $p->user?->name ?? 'N/A',
                'email' => $p->user?->email ?? '',
                'telephone' => $p->user?->telephone ?? $p->user?->phone ?? 'N/A',
                'montant' => $p->montant,
                'statut_raw' => $p->statut,
                'statut' => $p->statut === 'complete' ? 'Complété' : ($p->statut === 'en_attente' ? 'En attente' : 'Échec'),
                'est_confirme' => $p->statut === 'complete',
                'date' => $p->created_at,
                'details' => $p->video?->titre ?? 'Vidéo supprimée',
            ]);
        }

        // 2. VIDÉOS DSCG → Formation DSCG
        $dscgPaiements = PaiementVideo::with(['user', 'video'])
            ->whereHas('video', fn($q) => $q->where('formation_type', 'dscg'))
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($dscgPaiements as $p) {
            $autresPaiements->push([
                'id' => 'DSCG' . $p->id,
                'type' => 'Formation DSCG',
                'client' => $p->user?->name ?? 'N/A',
                'email' => $p->user?->email ?? '',
                'telephone' => $p->user?->telephone ?? $p->user?->phone ?? 'N/A',
                'montant' => $p->montant,
                'statut_raw' => $p->statut,
                'statut' => $p->statut === 'complete' ? 'Complété' : ($p->statut === 'en_attente' ? 'En attente' : 'Échec'),
                'est_confirme' => $p->statut === 'complete',
                'date' => $p->created_at,
                'details' => $p->video?->titre ?? 'Vidéo supprimée',
            ]);
        }

        // 3. FORMATIONS (cours/leçons via CinetPay général) → Formation
        $formationsPaiements = Payment::with('user')
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($formationsPaiements as $p) {
            $autresPaiements->push([
                'id' => 'F' . $p->id,
                'type' => 'Formation',
                'client' => $p->user?->name ?? 'N/A',
                'email' => $p->user?->email ?? '',
                'telephone' => $p->customer_phone_number ?? $p->user?->telephone ?? 'N/A',
                'montant' => $p->amount,
                'statut_raw' => $p->status,
                'statut' => $p->status === 'ACCEPTED' ? 'Complété' : ($p->status === 'en_attente' ? 'En attente' : 'Échec'),
                'est_confirme' => $p->status === 'ACCEPTED',
                'date' => $p->created_at,
                'details' => 'Formation #' . $p->id,
            ]);
        }

        // 4. Bons d'achat → Bon d'achat
        $voucherOrders = VoucherOrder::with('voucher')->orderBy('created_at', 'desc')->get();
        foreach ($voucherOrders as $v) {
            $autresPaiements->push([
                'id' => 'V' . $v->id,
                'type' => 'Bon d\'achat',
                'client' => $v->nom ?? 'N/A',
                'email' => $v->email ?? 'N/A',
                'telephone' => $v->phone ?? 'N/A',
                'montant' => $v->amount_paid,
                'statut_raw' => $v->status,
                'statut' => $v->status === 'validé' ? 'Complété' : ($v->status === 'en_attente' ? 'En attente' : 'Échec'),
                'est_confirme' => $v->status === 'validé',
                'date' => $v->created_at,
                'details' => $v->voucher?->title ?? 'Bon #' . $v->id,
            ]);
        }

        // 5. Commandes (soutien scolaire / extrascolaire / formations)
        $ordersSoutien = Order::with('coursRelation.sousFormation.formation')->orderBy('created_at', 'desc')->get();
        foreach ($ordersSoutien as $o) {
            // Déterminer le type : si lié à une formation via cours_id → Formation, sinon Extrascolaire
            $coursRel = $o->coursRelation;
            $hasFormation = $coursRel && $coursRel->formation_id;
            $type = $hasFormation ? 'Formation' : 'Extrascolaire';

            $autresPaiements->push([
                'id' => 'O' . $o->id,
                'type' => $type,
                'client' => $o->nom ?? 'N/A',
                'email' => $o->email ?? 'N/A',
                'telephone' => $o->numero ?? 'N/A',
                'montant' => $o->prix,
                'statut_raw' => $o->etat,
                'statut' => $o->etat === 'vendu' ? 'Complété' : ($o->etat === 'en_attente' ? 'En attente' : 'Échec'),
                'est_confirme' => $o->etat === 'vendu',
                'date' => $o->created_at,
                'details' => $o->cours ?? ($coursRel?->titre ?? 'Cours'),
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

        // Total global (uniquement paiements confirmés)
        $totalGlobal = $autresStats['total'];

        return view('superadmin.dashboard', compact(
            'autresStats',
            'totalGlobal'
        ));
    }
}
