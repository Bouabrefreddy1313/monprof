<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\DiagnosticAnswer;
use App\Models\DiagnosticSession;
use App\Models\Lead;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Le dashboard (section Diagnostics & Leads) doit afficher la PAGE
 * recommandée au visiteur (DiagnosticPageRecommendationService), pas le
 * titre du cours issu de l'ancien moteur (DiagnosticRecommendationService).
 */
class LeadPageRecommandeeDisplayTest extends TestCase
{
    use DatabaseTransactions;

    /** Réponses qui mènent à la page « Préparation au Brevet des collèges ». */
    protected function createSessionScolaireCollege(): DiagnosticSession
    {
        $session = DiagnosticSession::create([
            'session_token' => 'token_page_lead_' . uniqid(),
            'statut' => 'en_cours',
        ]);

        $reponses = [
            'q_parcours' => 'scolaire',
            'q_scolaire_niveau' => 'collège',
            'q_scolaire_matieres' => json_encode(['Mathématiques']),
            'q_scolaire_difficultes' => json_encode(['examen']),
        ];

        foreach ($reponses as $identifiant => $valeur) {
            DiagnosticAnswer::create([
                'session_id' => $session->id,
                'question_identifier' => $identifiant,
                'question_label' => $identifiant,
                'reponse' => $valeur,
            ]);
        }

        return $session;
    }

    public function test_submit_lead_stoque_la_page_recommandee_structuree()
    {
        $session = $this->createSessionScolaireCollege();

        $response = $this->postJson('/api/diagnostic/submit-lead', [
            'session_token' => $session->session_token,
            'prenom' => 'Koffi',
            'telephone' => '+2250700000001',
            'consentement' => true,
            'moyen_contact_prefere' => 'whatsapp',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $lead = Lead::where('telephone', '+2250700000001')->first();
        $this->assertNotNull($lead, 'Le lead doit être enregistré');

        $this->assertNotNull($lead->page_recommandee, 'La page recommandée doit être stockée');
        $this->assertSame('soutien_brevet', $lead->page_recommandee['key']);
        $this->assertSame('Préparation au Brevet des collèges', $lead->page_recommandee['titre']);
        $this->assertNotEmpty($lead->page_recommandee['url']);

        // Le titre affiché doit être celui de la page, pas celui du cours
        $this->assertSame('Préparation au Brevet des collèges', $lead->titre_recommandation);

        // La phrase « Page conseillée : … » reste en texte (historique lisible)
        $this->assertStringContainsString('Page conseillée : Préparation au Brevet des collèges', $lead->texte_recommandation);
    }

    public function test_titre_recommandation_affiche_la_page_et_non_le_cours()
    {
        $lead = Lead::create([
            'prenom' => 'Aya',
            'telephone' => '+2250700000002',
            'moyen_contact_prefere' => 'appel',
            'consentement' => true,
            'titre_cours_recommande' => 'Maîtrisez la gestion de projet',
            'page_recommandee' => [
                'key' => 'coaching',
                'titre' => 'Coaching scolaire personnalisé',
                'type' => 'soutien',
                'type_label' => 'Soutien scolaire',
                'url' => 'http://127.0.0.1:8000/coaching',
                'icone' => 'fas fa-star',
                'description' => '',
                'score' => 50,
            ],
        ]);

        $this->assertSame('Coaching scolaire personnalisé', $lead->titre_recommandation);
        $this->assertSame('http://127.0.0.1:8000/coaching', $lead->url_page_recommandee);
        $this->assertSame('Soutien scolaire', $lead->type_page_recommandee);
    }

    public function test_recommandation_manuelle_de_l_admin_prime_sur_la_page()
    {
        $lead = Lead::create([
            'prenom' => 'Yao',
            'telephone' => '+2250700000003',
            'moyen_contact_prefere' => 'sms',
            'consentement' => true,
            'titre_cours_recommande' => 'Cours choisi par l admin',
            'recommandation_manuelle' => true,
            'page_recommandee' => [
                'key' => 'coaching',
                'titre' => 'Coaching scolaire personnalisé',
                'type' => 'soutien',
                'type_label' => 'Soutien scolaire',
                'url' => 'http://127.0.0.1:8000/coaching',
            ],
        ]);

        $this->assertSame('Cours choisi par l admin', $lead->titre_recommandation);
        $this->assertNull($lead->url_page_recommandee);
    }

    public function test_lead_sans_page_recommandee_retombe_sur_le_titre_du_cours()
    {
        $lead = Lead::create([
            'prenom' => 'Mariam',
            'telephone' => '+2250700000004',
            'moyen_contact_prefere' => 'email',
            'consentement' => true,
            'titre_cours_recommande' => 'Cours de Mathématiques',
        ]);

        $this->assertSame('Cours de Mathématiques', $lead->titre_recommandation);
        $this->assertNull($lead->url_page_recommandee);
    }

    public function test_dashboard_fiche_lead_affiche_le_titre_de_la_page()
    {
        $admin = Admin::first() ?? Admin::create([
            'name' => 'Admin Test',
            'email' => 'admintest_' . uniqid() . '@test.com',
            'password' => bcrypt('password'),
        ]);

        $lead = Lead::create([
            'prenom' => 'Transfer',
            'telephone' => '+2250700000005',
            'moyen_contact_prefere' => 'whatsapp',
            'consentement' => true,
            'titre_cours_recommande' => 'Maîtrisez la gestion de projet',
            'texte_recommandation' => 'Recommandation test unitaire. Page conseillée : Coaching scolaire personnalisé (Soutien scolaire — http://127.0.0.1:8000/coaching)',
            'page_recommandee' => [
                'key' => 'coaching',
                'titre' => 'Coaching scolaire personnalisé',
                'type' => 'soutien',
                'type_label' => 'Soutien scolaire',
                'url' => 'http://127.0.0.1:8000/coaching',
            ],
        ]);

        // Fiche détaillée : le titre de la page doit être affiché
        $response = $this->actingAs($admin, 'admin')->get(route('admin.leads.show', $lead->id));
        $response->assertStatus(200);
        $response->assertSee('Coaching scolaire personnalisé', false);
        $response->assertSee('Ouvrir la page conseillée', false);

        // Liste des leads : idem
        $response = $this->actingAs($admin, 'admin')->get(route('admin.leads.index'));
        $response->assertStatus(200);
        $response->assertSee('Coaching scolaire personnalisé', false);
    }
}

