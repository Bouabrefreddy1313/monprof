<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Mail\CampaignMail;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SubscriberController extends Controller
{
    /**
     * Popup : inscrire un email depuis le site
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $exists = Subscriber::where('email', $request->email)->first();

        if ($exists) {
            if (!$exists->is_active) {
                $exists->update(['is_active' => true, 'subscribed_at' => now()]);
                // Envoyer l'email de bienvenue même pour une réactivation
                try {
                    Mail::to($request->email)->send(new WelcomeMail($request->email));
                } catch (\Exception $e) {
                    Log::error('WelcomeMail failed: ' . $e->getMessage());
                }
                return response()->json(['message' => 'Inscription réussie !', 'success' => true]);
            }
            return response()->json(['message' => 'Cet email est déjà inscrit.', 'success' => false]);
        }

        Subscriber::create([
            'email' => $request->email,
            'subscribed_at' => now(),
        ]);

        // Envoyer l'email de bienvenue
        try {
            Mail::to($request->email)->send(new WelcomeMail($request->email));
        } catch (\Exception $e) {
            Log::error('WelcomeMail failed: ' . $e->getMessage());
        }

        return response()->json(['message' => 'Inscription réussie ! Merci 🎉', 'success' => true]);
    }

    /**
     * Page admin : lister les abonnés
     */
    public function adminIndex()
    {
        $subscribers = Subscriber::latest()->paginate(20);
        $total = Subscriber::count();
        $active = Subscriber::where('is_active', true)->count();
        return view('admin.subscribers.index', compact('subscribers', 'total', 'active'));
    }

    /**
     * Page admin : formulaire d'envoi de campagne
     */
    public function campaignForm()
    {
        $total = Subscriber::where('is_active', true)->count();
        return view('admin.subscribers.campaign', compact('total'));
    }

    /**
     * Admin : envoyer la campagne email
     */
    public function sendCampaign(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $subscribers = Subscriber::where('is_active', true)->get();

        if ($subscribers->isEmpty()) {
            return back()->with('error', 'Aucun abonné actif trouvé.');
        }

        $subject = $request->subject;
        $body = $request->message;

        $sentCount = 0;
        foreach ($subscribers as $subscriber) {
            try {
                Mail::to($subscriber->email)->send(new CampaignMail($subject, $body));
                $sentCount++;
            } catch (\Exception $e) {
                \Log::error('Campaign mail failed for ' . $subscriber->email . ': ' . $e->getMessage());
            }
        }

        return back()->with('success', "Campagne envoyée à {$sentCount} abonné(s) !");
    }

    /**
     * Désabonnement
     */
    public function unsubscribe(Request $request)
    {
        $email = $request->email;
        $subscriber = Subscriber::where('email', $email)->first();

        if ($subscriber) {
            $subscriber->update(['is_active' => false]);
        }

        return view('unsubscribed');
    }

    /**
     * Supprimer un abonné (admin)
     */
    public function destroy($id)
    {
        Subscriber::findOrFail($id)->delete();
        return back()->with('success', 'Abonné supprimé.');
    }
}
