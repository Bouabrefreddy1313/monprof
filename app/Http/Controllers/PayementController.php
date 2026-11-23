<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\PayementGateway;
use App\Models\Payement;
use App\Models\Payment;
use App\Models\Lecons;
use App\Services\GeniusPayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception; // Ajout de l'import de l'exception

class PayementController extends Controller
{
    public function getAccountInfo()
    {
        $adminId = auth('admin')->id();
        
        return view('admin.payement');
    }
public function paymentNotify(Request $request)
{
    $geniuspay = app(GeniusPayService::class);

    // Vérifier la signature du webhook GeniusPay
    if (!$geniuspay->verifyWebhookSignature($request)) {
        return response()->json(['status' => 'invalid_signature'], 401);
    }

    $payload   = $request->all();
    $data      = $payload['data'] ?? [];
    $reference = $data['reference'] ?? null;
    $status    = $data['status'] ?? null;

    // Vérifiez les données reçues
    if ($reference && $status === 'completed') {
        // Mettre à jour le statut du paiement dans la base de données
        $payment = Payment::where('transaction_id', $reference)->first();

        if ($payment) {
            // Mettre à jour le statut du paiement à 'completed'
            $payment->update(['status' => 'completed']);
            
            // Associer les leçons payées au paiement
            $lecons = Lecons::where('matiere_id', $payment->matiere_id ?? $payment->description)->get(); // Récupérer les leçons associées
            if ($lecons->isNotEmpty()) {
                $payment->lecons()->attach($lecons->pluck('id'));
            }
        }
    }

    // Répondre à GeniusPay pour confirmer que la notification a été reçue
    return response()->json(['success' => true]);
}
    public function handleUpdateInfo(Request $request)
    {
        //DB::beginTransaction();

        $request->validate(
        [
            'site_id' => 'required',
            'api_key' => 'required',
            'secret_key' => 'required',
        ],
        [
            'site_id.required' => 'L\'id du site est requis',
            'api_key.required' => 'La clé API est requise',
            'secret_key.required' => 'La clé sécrète est requise',
        ]);

        try {
            $adminId = auth('admin')->id();
            $existingAccount = PayementGateway::where('admin_id', $adminId)->first();

            if ($existingAccount) {
                // Mettre à jour les informations existantes si nécessaire
            } else {
                PayementGateway::create([
                    'admin_id' => $adminId,
                    'site_id' => $request->site_id,
                    'api_key' => $request->api_key,
                    'secret_key' => $request->secret_key,
                ]);
            }
//DB::rollback();
            //DB::commit();
             // Redirection avec un message de succès
    return redirect()->back()->with('success', 'Données enregistrées');
} catch (Exception $e) {
    // Capture et affichage de l'erreur
    return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
}
    }


    public function paymentReturn(Request $request)
    {
        // Récupérer la référence GeniusPay depuis la requête
        $reference = $request->input('reference') ?? $request->input('transaction_id');

        // Assurez-vous que l'utilisateur est authentifié
        if (Auth::check()) {
            $geniuspay = app(GeniusPayService::class);

            try {
                // Si l'utilisateur a annulé, marquer le paiement comme échoué
                if ($request->input('status') === 'cancel') {
                    $latest = Payment::where('user_id', Auth::id())
                        ->where('status', 'pending')
                        ->orderByDesc('id')
                        ->first();
                    if ($latest) {
                        $latest->update(['status' => 'failed']);
                    }
                    return redirect()->route('home')->with('error', 'Paiement annulé.');
                }

                // La référence reçue peut être l'id de transaction interne (date YmdHis).
                // On retrouve donc le paiement le plus récent de l'utilisateur.
                $payment = $reference
                    ? Payment::where('transaction_id', $reference)->first()
                    : null;

                if (!$payment) {
                    $payment = Payment::where('user_id', Auth::id())
                        ->orderByDesc('id')
                        ->first();
                }

                if ($payment) {
                    // Vérifier le statut via GeniusPay avec la référence stockée
                    $checkResult = $geniuspay->checkPaymentStatus($payment->transaction_id);

                    if ($checkResult['success'] && $checkResult['status'] === 'completed') {
                        $payment->status = 'completed';
                    } elseif ($checkResult['success']) {
                        $payment->status = 'failed';
                    }

                    $payment->save();
                }

            } catch (Exception $e) {
                // Gérer les erreurs (par exemple, journaliser l'erreur)
                \Log::error('Erreur lors de la vérification du statut de paiement : ' . $e->getMessage());
                return redirect()->route('home')->with('error', 'Erreur lors de la vérification du statut du paiement.');
            }
        }

        // Rediriger l'utilisateur vers une page de confirmation ou d'erreur
        return redirect()->route('home')->with('success', 'Merci, votre paiement a été traité.');
    }
    
  
}
