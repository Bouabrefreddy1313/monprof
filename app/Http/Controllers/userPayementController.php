<?php

namespace App\Http\Controllers;
use App\Models\Matiere;
use App\Models\Payment;
use App\Models\Lecons;
use App\Services\GeniusPayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userPayementController extends Controller
{
    public function initPayement($id)
    {
        // Récupérer les informations de la matière
        $matiereInfo = Matiere::find($id);

        // Assurez-vous que la matière existe
        if (!$matiereInfo) {
            return redirect()->back()->with('error', 'Matière non trouvée.');
        }

        // Assurez-vous que l'utilisateur est authentifié
        if (Auth::check()) {
            $user = Auth::user();
            $customer_name = $user->name;
            $customer_surname = $user->surname ?? '';
            $customer_email = $user->email;
            $customer_phone = $user->telephone ?? '0123456789';
        } else {
            $customer_name = 'Invité';
            $customer_surname = '';
            $customer_email = 'guest@example.com';
            $customer_phone = '0123456789';
        }

        $description = $matiereInfo->nom;
        $amount = $matiereInfo->prix; // Assurez-vous que `prix` existe dans votre modèle Matiere
        $currency = "XOF";
        $id_transaction = date("YmdHis"); // Identifiant de la transaction côté application

        $geniuspay = app(GeniusPayService::class);

        // URLs de retour (contiennent l'id de transaction interne, pas la référence
        // GeniusPay qui n'est connue qu'après la création du paiement).
        $successUrl = $this->ensureAbsoluteUrl(route('particuliers.matiere.payment.return', ['transaction_id' => $id_transaction]));
        $errorUrl   = $this->ensureAbsoluteUrl(route('particuliers.matiere.payment.return', ['transaction_id' => $id_transaction, 'status' => 'cancel']));

        // Données du paiement GeniusPay
        $result = $geniuspay->initPayment([
            'transaction_id'   => $id_transaction,
            'amount'           => $amount,
            'currency'         => $currency,
            'description'      => $description,
            'success_url'      => $successUrl,
            'error_url'        => $errorUrl,
            'customer_name'    => $customer_name,
            'customer_surname' => $customer_surname,
            'customer_email'   => $customer_email,
            'customer_phone'   => $customer_phone,
            'customer_country' => 'CI',
            'metadata'         => [
                'type'         => 'matiere',
                'matiere_id'   => $id,
                'app_transaction_id' => $id_transaction,
            ],
        ]);

        if (!$result['success']) {
            return redirect()->back()->withErrors(['payment' => $result['message'] ?? 'Erreur lors de la création du lien de paiement.']);
        }

        $reference = $result['reference'];

        // Enregistrer la transaction dans la base de données
        $payment = Payment::create([
            'user_id' => Auth::check() ? $user->id : null,
            'transaction_id' => $reference,
            'amount' => $amount,
            'currency' => $currency,
            'description' => $description,
            'customer_name' => $customer_name,
            'customer_surname' => $customer_surname,
            'customer_email' => $customer_email,
            'customer_phone_number' => $customer_phone,
            'status' => 'pending',
        ]);

        // Associer les leçons payées au paiement
        $lecons = Lecons::where('matiere_id', $id)->get(); // Récupérer toutes les leçons de la matière
        if ($lecons->isNotEmpty()) {
            $payment->lecons()->attach($lecons->pluck('id'));
        }

        return redirect()->away($result['checkout_url']);
    }

    private function ensureAbsoluteUrl($url)
    {
        if (str_starts_with($url, 'http')) {
            return $url;
        }

        $baseUrl = config('app.url', 'https://monprofchezmoi-ci.com');
        return rtrim($baseUrl, '/') . '/' . ltrim($url, '/');
    }
}
