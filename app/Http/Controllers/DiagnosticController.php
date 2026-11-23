<?php

namespace App\Http\Controllers;

use App\Mail\LeadConfirmationProspectMail;
use App\Mail\NewLeadAdminNotificationMail;
use App\Models\Admin;
use App\Models\Cours;
use App\Models\DiagnosticAnswer;
use App\Models\DiagnosticConfig;
use App\Models\DiagnosticSession;
use App\Models\Formation;
use App\Models\Lead;
use App\Models\LeadActivity;
use App\Models\Notification;
use App\Models\Question;
use App\Services\DiagnosticPageRecommendationService;
use App\Services\DiagnosticRecommendationService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DiagnosticController extends Controller
{
    /**
     * Initialise la session du diagnostic et renvoie la première question.
     */
    public function init(Request $request): JsonResponse
    {
        if (!DiagnosticConfig::get('module_actif', true)) {
            return response()->json(['active' => false, 'message' => 'Module temporairement désactivé.'], 200);
        }

        $token = $request->input('session_token') ?: (string)Str::uuid();

        $userAgent = $request->header('User-Agent', '');
        $isMobile = preg_match('/(android|iphone|ipad|mobile)/i', $userAgent);
        $isTablet = preg_match('/(tablet|ipad)/i', $userAgent);
        $device = $isTablet ? 'tablette' : ($isMobile ? 'mobile' : 'desktop');

        $session = DiagnosticSession::where('session_token', $token)->first();
        if ($session && $session->statut === 'termine') {
            $token = Str::uuid()->toString();
            $session = null;
        }

        if (!$session) {
            $session = DiagnosticSession::create([
                'session_token' => $token,
                'statut' => 'en_cours',
                'date_debut' => Carbon::now(),
                'utm_source' => $request->input('utm_source'),
                'utm_medium' => $request->input('utm_medium'),
                'utm_campaign' => $request->input('utm_campaign'),
                'page_entree' => $request->input('page_entree', url()->previous()),
                'referrer' => $request->header('referer'),
                'appareil' => $device,
                'ip_address' => $request->ip(),
            ]);
        }

        // Première question commune (q_parcours)
        $firstQuestion = Question::with('options')
            ->where('code_identifiant', 'q_parcours')
            ->where('est_actif', true)
            ->first();

        // Domaines dynamiques issus des vraies formations pour le parcours B
        $realFormations = Formation::with('sousFormations')
            ->select('id', 'titre')
            ->orderBy('titre')
            ->get()
            ->map(function ($f) {
                return [
                    'id' => $f->id,
                    'titre' => $f->titre,
                    'sous_formations' => $f->sousFormations->map(fn($sf) => ['id' => $sf->id, 'titre' => $sf->titre]),
                ];
            });

        return response()->json([
            'active' => true,
            'session_token' => $session->session_token,
            'first_question' => $firstQuestion,
            'accroche' => DiagnosticConfig::get('titre_accroche'),
            'real_formations' => $realFormations,
            'indicatif_defaut' => DiagnosticConfig::get('indicatif_pays_defaut', '+225'),
            'delai_reaffichage' => (int)DiagnosticConfig::get('delai_reaffichage_jours', 7),
        ]);
    }

    /**
     * Enregistre une réponse étape par étape et détermine la prochaine question.
     */
    public function answer(Request $request): JsonResponse
    {
        $request->validate([
            'session_token' => 'required|string',
            'question_identifier' => 'required|string',
            'reponse' => 'required',
        ]);

        $session = DiagnosticSession::where('session_token', $request->input('session_token'))->firstOrFail();

        $questionIdentifier = $request->input('question_identifier');
        $reponse = $request->input('reponse');
        $rawReponse = is_array($reponse) ? json_encode($reponse) : (string)$reponse;

        $question = Question::where('code_identifiant', $questionIdentifier)->first();

        DiagnosticAnswer::updateOrCreate(
            [
                'session_id' => $session->id,
                'question_identifier' => $questionIdentifier,
            ],
            [
                'question_id' => $question?->id,
                'question_label' => $question?->titre ?? $questionIdentifier,
                'reponse' => $rawReponse,
            ]
        );

        // Si la réponse définit le parcours
        if ($questionIdentifier === 'q_parcours') {
            $session->parcours_choisi = (string)$reponse;
            // Nettoyer les anciennes réponses de cette session pour éviter de garder un ancien domaine ou choix obsolète
            DiagnosticAnswer::where('session_id', $session->id)
                ->where('question_identifier', '!=', 'q_parcours')
                ->delete();
        }

        $session->derniere_question_atteinte = $questionIdentifier;
        $session->save();

        // Déterminer la prochaine question selon le parcours et l'ordre
        $nextQuestion = $this->determineNextQuestion($session, $questionIdentifier, $reponse);

        return response()->json([
            'success' => true,
            'next_question' => $nextQuestion,
            'is_finished' => is_null($nextQuestion),
        ]);
    }

    /**
     * Calcule et renvoie la recommandation personnalisée.
     */
    public function recommendation(Request $request, DiagnosticRecommendationService $service): JsonResponse
    {
        $request->validate([
            'session_token' => 'required|string',
        ]);

        $session = DiagnosticSession::with('answers')
            ->where('session_token', $request->input('session_token'))
            ->firstOrFail();

        $answersMap = [];
        foreach ($session->answers as $ans) {
            $answersMap[$ans->question_identifier] = $ans->parsed_reponse;
        }

        $recommendation = $service->calculateRecommendation($answersMap);

        // Recommandation de PAGE du site (soutien scolaire / activité) selon
        // le niveau scolaire et la matière (ou l'âge + centres d'intérêt).
        try {
            $pageRec = app(DiagnosticPageRecommendationService::class)->recommend($answersMap);
            $recommendation['page_recommandee'] = $pageRec['page_recommandee'];
            $recommendation['pages_alternatives'] = $pageRec['pages_alternatives'];
        } catch (\Throwable $e) {
            // Le module pages ne doit jamais casser le diagnostic principal
            Log::warning('Erreur recommandation page diagnostic: ' . $e->getMessage());
            $recommendation['page_recommandee'] = null;
            $recommendation['pages_alternatives'] = [];
        }

        // Clôturer la session
        $session->statut = 'termine';
        $session->date_fin = Carbon::now();
        $session->derniere_question_atteinte = 'resultats';
        $session->save();

        return response()->json([
            'success' => true,
            'recommendation' => $recommendation,
        ]);
    }

    /**
     * Enregistre le lead qualifié et déclenche les notifications.
     */
    public function submitLead(Request $request, DiagnosticRecommendationService $service): JsonResponse
    {
        // 1. Protection Anti-spam Honeypot
        if (!empty($request->input('website_verify_hp'))) {
            // Un robot a rempli le champ caché honeypot : simuler le succès sans enregistrer
            return response()->json(['success' => true, 'message' => 'Merci !'], 200);
        }

        // 2. Validation
        $validated = $request->validate([
            'session_token' => 'required|string',
            'prenom' => 'required|string|max:100',
            'telephone' => 'required|string|min:8|max:30',
            'email' => 'nullable|email|max:150',
            'moyen_contact_prefere' => 'required|in:appel,whatsapp,sms,email',
            'creneau_rappel' => 'nullable|string|max:100',
            'consentement' => 'required|accepted',
        ]);

        $session = DiagnosticSession::with('answers')
            ->where('session_token', $validated['session_token'])
            ->firstOrFail();

        $answersMap = [];
        foreach ($session->answers as $ans) {
            $answersMap[$ans->question_identifier] = $ans->parsed_reponse;
        }

        // Calculer la recommandation
        $rec = $service->calculateRecommendation($answersMap);
        $primary = $rec['primary_course'] ?? null;

        // Recommandation de PAGE du site (soutien scolaire / activité)
        $pageRecommandee = null;
        try {
            $pageRec = app(DiagnosticPageRecommendationService::class)->recommend($answersMap);
            $pageRecommandee = $pageRec['page_recommandee'];
        } catch (\Throwable $e) {
            Log::warning('Erreur recommandation page diagnostic (lead): ' . $e->getMessage());
        }

        // Auto-assigner un admin par défaut si disponible
        $defaultAdmin = Admin::first();

        // 3. Créer le Lead
        $lead = Lead::create([
            'session_id' => $session->id,
            'prenom' => trim($validated['prenom']),
            'telephone' => trim($validated['telephone']),
            'email' => !empty($validated['email']) ? trim($validated['email']) : null,
            'moyen_contact_prefere' => $validated['moyen_contact_prefere'],
            'creneau_rappel' => $validated['creneau_rappel'] ?? null,
            'consentement' => true,
            'consentement_date' => Carbon::now(),
            'texte_recommandation' => trim(($rec['texte_recommandation'] ?? '')
                . ($pageRecommandee ? ' Page conseillée : ' . $pageRecommandee['titre'] . ' (' . $pageRecommandee['type_label'] . ' — ' . $pageRecommandee['url'] . ')' : '')),
            'cours_recommande_id' => $primary ? $primary['id'] : null,
            'titre_cours_recommande' => $primary ? $primary['titre'] : null,
            // Page du site réellement affichée au visiteur dans le modal :
            // c'est elle qui doit s'afficher comme titre dans les dashboards.
            'page_recommandee' => $pageRecommandee,
            'cours_alternatifs' => $rec['alternatives'] ?? [],
            'aucune_correspondance' => $rec['aucune_correspondance'] ?? false,
            'statut' => 'nouveau',
            'assigned_to' => $defaultAdmin?->id,
            'notes_internes' => 'Lead généré via le Diagnostic en ligne.',
        ]);

        // 4. Enregistrer l'activité initiale
        LeadActivity::create([
            'lead_id' => $lead->id,
            'admin_id' => null,
            'auteur_nom' => 'Visiteur / Diagnostic',
            'type_action' => 'creation',
            'details' => "Lead soumis avec préférence de contact par {$lead->moyen_contact_prefere}.",
        ]);

        // 5. Créer la notification interne visible dans les dashboards admin/superadmin
        try {
            Notification::create([
                'type' => 'new_lead',
                'message' => "Nouveau lead reçu : {$lead->prenom} ({$lead->telephone}) - {$lead->moyen_contact_prefere}",
                'data' => [
                    'lead_id' => $lead->id,
                    'prenom' => $lead->prenom,
                    'telephone' => $lead->telephone,
                    'cours' => $lead->titre_recommandation,
                    'url' => route('admin.leads.show', $lead->id),
                ],
            ]);
        } catch (\Throwable $e) {
            Log::error("Erreur création notification in-app lead: " . $e->getMessage());
        }

        // 6. E-mails de notification (asynchrones / tolérants)
        $emailsAdmin = array_filter(array_map('trim', explode(',', DiagnosticConfig::get('emails_notification', ''))));
        if (!empty($emailsAdmin)) {
            try {
                Mail::to($emailsAdmin)->queue(new NewLeadAdminNotificationMail($lead));
            } catch (\Throwable $e) {
                Log::warning("Notification email admin échouée: " . $e->getMessage());
            }
        }

        if (!empty($lead->email)) {
            try {
                Mail::to($lead->email)->queue(new LeadConfirmationProspectMail($lead));
            } catch (\Throwable $e) {
                Log::warning("Notification email prospect échouée: " . $e->getMessage());
            }
        }

        // 7. Préparation du lien WhatsApp direct
        $waNumber = DiagnosticConfig::get('whatsapp_contact_number', '2250700000000');
        $waCourseTitle = $lead->titre_recommandation ?: 'un accompagnement adapté';
        $waMessage = "Bonjour ! Je suis " . $lead->prenom . ". Je viens de réaliser le diagnostic sur MonProfChezMoi pour : " . $waCourseTitle . ". J'aimerais échanger avec un conseiller.";
        $waUrl = "https://wa.me/" . preg_replace('/[^0-9]/', '', $waNumber) . "?text=" . urlencode($waMessage);

        return response()->json([
            'success' => true,
            'message' => 'Votre demande a été prise en compte avec succès !',
            'lead_id' => $lead->id,
            'whatsapp_url' => $waUrl,
        ]);
    }

    /**
     * Détermine la question suivante en fonction des réponses déjà apportées.
     */
    protected function determineNextQuestion(DiagnosticSession $session, string $currentIdentifier, $currentReponse): ?Question
    {
        $parcours = $session->parcours_choisi ?? 'scolaire';

        // Cas Parcours E (Je ne sais pas encore) : redirection automatique
        if ($parcours === 'indecis' && $currentIdentifier === 'q_indecis_preoccupation') {
            if ($currentReponse === 'scolaire') {
                $session->parcours_choisi = 'scolaire';
                $session->save();
                return Question::with('options')->where('code_identifiant', 'q_scolaire_niveau')->first();
            } elseif ($currentReponse === 'formation' || $currentReponse === 'formation_entreprise' || str_contains((string)$currentReponse, 'entreprise')) {
                $session->parcours_choisi = str_contains((string)$currentReponse, 'entreprise') ? 'formation_entreprise' : 'formation';
                $session->save();
                return Question::with('options')->where('code_identifiant', 'q_formation_situation')->first();
            } else {
                $session->parcours_choisi = 'activite_enfant';
                $session->save();
                return Question::with('options')->where('code_identifiant', 'q_activite_enfant_age')->first();
            }
        }

        // Récupérer les questions du parcours choisi (formation et formation_entreprise partagent les modules de formation)
        $parcoursCible = str_starts_with($parcours, 'formation') ? 'formation' : $parcours;
        $questions = Question::with('options')
            ->where('parcours', $parcoursCible)
            ->where('est_actif', true)
            ->orderBy('ordre')
            ->get();

        $answeredIdentifiers = $session->answers()->pluck('question_identifier')->toArray();

        foreach ($questions as $q) {
            if (!in_array($q->code_identifiant, $answeredIdentifiers, true)) {
                return $q;
            }
        }

        return null; // Plus de questions : fin du questionnaire
    }
}
