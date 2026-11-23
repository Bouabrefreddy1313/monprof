<?php

namespace App\Http\Controllers;

use App\Models\GiftVoucher;
use App\Models\VoucherOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VoucherOrderController extends Controller
{
    // Page d’achat du bon
    public function create(GiftVoucher $voucher)
    {
        return view('bons.purchase', compact('voucher'));
    }

    // Enregistrement de la commande
    public function store(Request $request, GiftVoucher $voucher)
    {
        // Validation des champs
        $request->validate([
            'phone' => 'required|string',
            'amount_paid' => 'required|integer|min:100',
            'email' => 'required|email',
        ]);

        // Création de la commande avec code unique
        $order = new VoucherOrder();
        $order->voucher_id = $voucher->id;
        $order->phone = $request->phone;
        $order->amount_paid = $request->amount_paid;
        $order->email = $request->email;
        $order->code = VoucherOrder::generateUniqueCode();
        $order->status = 'pending';
        $order->is_used = false;
        $order->save();

        // Envoi de l'email avec le code unique
        try {
            Mail::to($order->email)->send(new \App\Mail\VoucherPurchasedMail($order));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Erreur envoi email bon cadeau: ' . $e->getMessage());
        }

        // Retour sur la même page avec message de succès et code
        return back()
            ->with('success', '✅ Félicitations ! Votre bon cadeau a été généré avec succès.')
            ->with('voucher_code', $order->code)
            ->with('voucher_email', $order->email);
    }



   // Validation côté admin
public function validateOrder(VoucherOrder $order)
{
    // Changement de statut
    $order->update(['status' => 'verified']);

    // Pas d'envoi de mail, juste un message flash
    return back()->with('success', 'Commande validée !');
}

    // Liste des commandes côté admin
public function adminIndex()
{
    $orders = \App\Models\VoucherOrder::with('voucher')->latest()->get();
    return view('admin.voucher_orders.index', compact('orders'));
}

// Rejet côté admin
public function rejectOrder(VoucherOrder $order)
{
    // Changement de statut
    $order->update(['status' => 'rejected']);

    return back()->with('success', 'Commande rejetée !');
}


}
