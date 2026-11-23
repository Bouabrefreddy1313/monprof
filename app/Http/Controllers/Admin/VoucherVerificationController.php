<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use App\Models\VoucherOrder;
use App\Models\GiftVoucher;
use Illuminate\Http\Request;

class VoucherVerificationController extends Controller
{
    /**
     * Affiche la page de vérification et liaison des bons cadeaux.
     */
    public function index(Request $request)
    {
        $formations = Formation::orderBy('titre', 'asc')->get();
        $availableVouchers = VoucherOrder::with(['voucher', 'formation'])
            ->where('is_used', false)
            ->latest()
            ->get();
        $recentVerified = VoucherOrder::with(['voucher', 'formation'])
            ->where('is_used', true)
            ->latest('used_at')
            ->take(15)
            ->get();

        $searchedOrder = null;
        $searchedCode = $request->query('code');

        if (!empty($searchedCode)) {
            $searchedCode = strtoupper(trim($searchedCode));
            $searchedOrder = VoucherOrder::with(['voucher', 'formation'])
                ->where('code', $searchedCode)
                ->first();
        }

        return view('admin.vouchers.verify', compact('formations', 'availableVouchers', 'recentVerified', 'searchedOrder', 'searchedCode'));
    }

    /**
     * Recherche d'un bon par son code.
     */
    public function search(Request $request)
    {
        $request->validate([
            'code' => 'required|string|min:3|max:50',
        ]);

        $code = strtoupper(trim($request->code));

        $order = VoucherOrder::with(['voucher', 'formation'])
            ->where('code', $code)
            ->first();

        $formations = Formation::orderBy('titre', 'asc')->get();
        $recentVerified = VoucherOrder::with(['voucher', 'formation'])
            ->where('is_used', true)
            ->latest('used_at')
            ->take(15)
            ->get();

        if (!$order) {
            // Recherche de secours dans gift_vouchers
            $voucher = GiftVoucher::where('code', $code)->first();
            if ($voucher) {
                // Trouver ou initialiser une commande associée
                $order = VoucherOrder::firstOrCreate(
                    ['voucher_id' => $voucher->id, 'code' => $code],
                    [
                        'phone' => $voucher->purchaser_phone ?? 'N/A',
                        'amount_paid' => $voucher->amount,
                        'email' => $voucher->beneficiary_email ?? ($voucher->purchaser_email ?? 'client@monprofchezmoi.ci'),
                        'status' => 'validé',
                        'is_used' => ($voucher->status === 'used'),
                    ]
                );
                $order->load(['voucher', 'formation']);
            }
        }

        $availableVouchers = VoucherOrder::with(['voucher', 'formation'])
            ->where('is_used', false)
            ->latest()
            ->get();

        return view('admin.vouchers.verify', [
            'formations' => $formations,
            'availableVouchers' => $availableVouchers,
            'recentVerified' => $recentVerified,
            'searchedOrder' => $order,
            'searchedCode' => $code,
            'hasSearched' => true,
        ]);
    }

    /**
     * Liaison directe depuis le formulaire général.
     */
    public function directLink(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'formation_id' => 'required|exists:formations,id',
            'notes' => 'nullable|string|max:1000',
        ]);

        $code = strtoupper(trim($request->code));
        $order = VoucherOrder::where('code', $code)->first();

        if (!$order) {
            $voucher = GiftVoucher::where('code', $code)->first();
            if ($voucher) {
                $order = VoucherOrder::firstOrCreate(
                    ['voucher_id' => $voucher->id, 'code' => $code],
                    [
                        'phone' => $voucher->purchaser_phone ?? 'N/A',
                        'amount_paid' => $voucher->amount,
                        'email' => $voucher->beneficiary_email ?? ($voucher->purchaser_email ?? 'client@monprofchezmoi.ci'),
                        'status' => 'validé',
                        'is_used' => ($voucher->status === 'used'),
                    ]
                );
            }
        }

        if (!$order) {
            return back()->with('error', "Aucun bon trouvé avec le code « {$code} ».");
        }

        return $this->linkFormation($request, $order);
    }

    /**
     * Lier le bon à la formation choisie par la cliente et marquer comme utilisé.
     */
    public function linkFormation(Request $request, VoucherOrder $order)
    {
        $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'notes' => 'nullable|string|max:1000',
        ]);

        if ($order->is_used) {
            $formationName = $order->formation ? $order->formation->titre : 'une formation';
            $date = $order->used_at ? $order->used_at->format('d/m/Y à H:i') : 'une date antérieure';
            return back()->with('error', "Ce bon ({$order->code}) a déjà été utilisé le {$date} pour {$formationName}.");
        }

        $formation = Formation::findOrFail($request->formation_id);

        $order->is_used = true;
        $order->used_at = now();
        $order->formation_id = $formation->id;
        $order->notes = $request->notes;
        $order->status = 'utilise';
        $order->save();

        // Mettre à jour également le gift_voucher parent si existant
        if ($order->voucher) {
            $order->voucher->update(['status' => 'used']);
        }

        return redirect()
            ->route('admin.bons.verifier', ['code' => $order->code])
            ->with('success', "✅ Le bon {$order->code} a été validé et lié avec succès à la formation « {$formation->titre} » !");
    }
}
