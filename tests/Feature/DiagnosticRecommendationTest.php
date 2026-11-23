<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Cours;
use App\Models\CoursDiagnosticSetting;
use App\Models\CoursDiagnosticTag;
use App\Models\DiagnosticConfig;
use App\Models\DiagnosticSession;
use App\Models\Lead;
use App\Models\Notification;
use App\Services\DiagnosticRecommendationService;
use Tests\TestCase;

class DiagnosticRecommendationTest extends TestCase
{
    public function test_init_diagnostic_session()
    {
        $response = $this->postJson('/api/diagnostic/init', [
            'utm_source' => 'facebook',
            'utm_medium' => 'cpc',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'active',
            'session_token',
            'first_question',
            'real_formations',
        ]);

        $token = $response->json('session_token');
        $this->assertDatabaseHas('diagnostic_sessions', [
            'session_token' => $token,
            'utm_source' => 'facebook',
        ]);
    }

    public function test_save_diagnostic_answer()
    {
        $session = DiagnosticSession::create([
            'session_token' => 'test_token_' . uniqid(),
            'statut' => 'en_cours',
        ]);

        $response = $this->postJson('/api/diagnostic/answer', [
            'session_token' => $session->session_token,
            'question_identifier' => 'q_parcours',
            'reponse' => 'scolaire',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $this->assertDatabaseHas('diagnostic_answers', [
            'session_id' => $session->id,
            'question_identifier' => 'q_parcours',
            'reponse' => 'scolaire',
        ]);
    }

    public function test_recommendation_matching_logic()
    {
        // Créer un cours de test
        $cours = Cours::first();
        if (!$cours) {
            $formation = \App\Models\Formation::firstOrCreate(
                ['titre' => 'Soutien Scolaire Test'],
                ['pourquoi' => 'Test', 'qui' => 'Test', 'importance' => 'Test']
            );
            $cours = Cours::create([
                'titre' => 'Cours de Mathématiques Collège Test',
                'formation_id' => $formation->id,
                'sous_formation_id' => 1,
                'heure' => 'mercredi 14h',
                'lieu' => 'en ligne',
            ]);
        }
        $this->assertNotNull($cours, 'Au moins un cours doit être présent dans la table cours');

        CoursDiagnosticSetting::updateOrCreate(
            ['cours_id' => $cours->id],
            [
                'actif_diagnostic' => true,
                'priorite' => 10,
                'message_recommandation' => 'Recommandation test unitaire.',
            ]
        );

        CoursDiagnosticTag::updateOrCreate(
            ['cours_id' => $cours->id, 'type_tag' => 'parcours', 'valeur' => 'scolaire'],
            ['est_valide' => true]
        );
        CoursDiagnosticTag::updateOrCreate(
            ['cours_id' => $cours->id, 'type_tag' => 'matiere', 'valeur' => 'Mathématiques'],
            ['est_valide' => true]
        );

        $service = new DiagnosticRecommendationService();
        $answers = [
            'q_parcours' => 'scolaire',
            'q_scolaire_matieres' => ['Mathématiques'],
            'q_scolaire_niveau' => 'collège',
        ];

        $res = $service->calculateRecommendation($answers);

        $this->assertFalse($res['aucune_correspondance']);
        $this->assertNotNull($res['primary_course']);
        $this->assertEquals($cours->id, $res['primary_course']['id']);
        $this->assertGreaterThanOrEqual(25, $res['score']);
    }

    public function test_submit_lead_with_honeypot_rejection()
    {
        $session = DiagnosticSession::create([
            'session_token' => 'token_bot_' . uniqid(),
            'statut' => 'en_cours',
        ]);

        $response = $this->postJson('/api/diagnostic/submit-lead', [
            'session_token' => $session->session_token,
            'prenom' => 'Robot Spammer',
            'telephone' => '0102030405',
            'consentement' => true,
            'moyen_contact_prefere' => 'appel',
            'website_verify_hp' => 'http://spam.com', // Honeypot rempli
        ]);

        $response->assertStatus(200);

        // Vérifier que le lead n'a PAS été créé en base
        $this->assertDatabaseMissing('leads', [
            'prenom' => 'Robot Spammer',
        ]);
    }

    public function test_submit_lead_success_and_creates_notification()
    {
        $session = DiagnosticSession::create([
            'session_token' => 'token_real_' . uniqid(),
            'statut' => 'en_cours',
        ]);

        $response = $this->postJson('/api/diagnostic/submit-lead', [
            'session_token' => $session->session_token,
            'prenom' => 'Amadou',
            'telephone' => '+2250711223344',
            'email' => 'amadou.test@example.com',
            'consentement' => true,
            'moyen_contact_prefere' => 'whatsapp',
            'creneau_rappel' => 'Matinée',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $this->assertDatabaseHas('leads', [
            'prenom' => 'Amadou',
            'telephone' => '+2250711223344',
            'email' => 'amadou.test@example.com',
            'moyen_contact_prefere' => 'whatsapp',
        ]);

        // Vérifier notification in-app
        $this->assertDatabaseHas('notifications', [
            'type' => 'new_lead',
        ]);
    }
}
