<?php

namespace Tests\Feature;

use App\Models\DiagnosticAnswer;
use App\Models\DiagnosticSession;
use App\Services\DiagnosticPageRecommendationService;
use Illuminate\Http\Request;
use Tests\TestCase;

/**
 * Tests du moteur de recommandation de PAGES du site
 * (soutien scolaire / activités) : App\Services\DiagnosticPageRecommendationService
 * + config/diagnostic_catalog.php.
 */
class DiagnosticPageRecommendationTest extends TestCase
{
    /** Champs obligatoires de chaque fiche du catalogue. */
    protected const CHAMPS_OBLIGATOIRES = [
        'key', 'titre', 'type', 'url', 'icone', 'description', 'priorite',
    ];

    protected function service(): DiagnosticPageRecommendationService
    {
        return new DiagnosticPageRecommendationService();
    }

    protected function catalogue(): array
    {
        return config('diagnostic_catalog.pages', []);
    }

    protected function urlCorrespondAUneRoute(string $url): bool
    {
        try {
            app('router')->getRoutes()->match(Request::create($url, 'GET'));

            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    public function test_catalogue_pages_est_complet_et_sans_doublon()
    {
        $pages = $this->catalogue();

        $this->assertGreaterThanOrEqual(
            30,
            count($pages),
            'Le catalogue doit contenir les pages soutien scolaire + activités'
        );

        $keys = [];
        $urls = [];

        foreach ($pages as $page) {
            foreach (self::CHAMPS_OBLIGATOIRES as $champ) {
                $this->assertArrayHasKey(
                    $champ,
                    $page,
                    'Champ manquant « ' . $champ . ' » dans la page ' . ($page['key'] ?? '?')
                );
            }

            $this->assertContains($page['type'], ['soutien', 'activite', 'formation'], 'Type inconnu : ' . $page['type']);

            $this->assertArrayNotHasKey($page['key'], $keys, 'Clé dupliquée : ' . $page['key']);
            $keys[$page['key']] = true;

            $this->assertArrayNotHasKey($page['url'], $urls, 'URL dupliquée : ' . $page['url']);
            $urls[$page['url']] = true;
        }

        foreach (['soutien_reponse', 'orientation_terminale', 'soutien_dys_primaire', 'petits_bilingues', 'prepa_oraux'] as $attendue) {
            $this->assertArrayHasKey($attendue, $keys, 'Page attendue absente du catalogue : ' . $attendue);
        }
    }

    public function test_chaque_url_du_catalogue_correspond_a_une_route()
    {
        foreach ($this->catalogue() as $page) {
            $this->assertTrue(
                $this->urlCorrespondAUneRoute($page['url']),
                'Aucune route ne correspond à ' . $page['url'] . ' (page ' . $page['key'] . ')'
            );
        }
    }

    public function test_recommandation_parcours_scolaire_par_niveau()
    {
        $profils = [
            ['primaire', ['lacunes'], 'soutien_primaire'],
            ['collège', ['examen'], 'soutien_brevet'],
            ['lycée', ['examen'], 'preparation_bac'],
            ['supérieur', ['méthode'], 'methode_superieur'],
        ];

        foreach ($profils as [$niveau, $difficultes, $cleAttendue]) {
            $res = $this->service()->recommend([
                'q_parcours' => 'scolaire',
                'q_scolaire_niveau' => $niveau,
                'q_scolaire_matieres' => ['Mathématiques'],
                'q_scolaire_difficultes' => $difficultes,
            ]);

            $this->assertNotNull($res['page_recommandee'], 'Aucune page pour le niveau ' . $niveau);
            $this->assertSame($cleAttendue, $res['page_recommandee']['key'], 'Mauvaise page pour le niveau ' . $niveau);
        }
    }

    public function test_recommandation_activite_enfant_par_age_et_centre_interet()
    {
        $profils = [
            ['3-6 ans', ['Anglais'], 'petits_bilingues_3_4'],
            ['7-10 ans', ['Informatique'], 'codage_robotique_enfant'],
            ['11-14 ans', ['Sport'], 'sport_enfant'],
            ['15-18 ans', ['Musique'], 'musique_chant'],
        ];

        foreach ($profils as [$age, $interets, $cleAttendue]) {
            $res = $this->service()->recommend([
                'q_parcours' => 'activite_enfant',
                'q_activite_enfant_age' => $age,
                'q_activite_enfant_interets' => $interets,
            ]);

            $this->assertNotNull($res['page_recommandee'], 'Aucune activité pour ' . $age);
            $this->assertSame(
                $cleAttendue,
                $res['page_recommandee']['key'],
                'Mauvaise activité pour ' . $age . ' / ' . implode(',', $interets)
            );
        }
    }

    public function test_recommandation_activite_adulte()
    {
        $res = $this->service()->recommend([
            'q_parcours' => 'activite_adulte',
            'q_activite_adulte_type' => 'Sport',
        ]);

        $this->assertNotNull($res['page_recommandee']);
        $this->assertSame('sport_adulte', $res['page_recommandee']['key']);
        $this->assertSame('activite', $res['page_recommandee']['type']);
    }

    public function test_la_page_principale_reste_dans_l_univers_du_parcours()
    {
        // Un élève en difficulté scolaire ne doit jamais recevoir une page
        // d'activité comme recommandation principale.
        $res = $this->service()->recommend([
            'q_parcours' => 'scolaire',
            'q_scolaire_niveau' => 'primaire',
            'q_scolaire_matieres' => ['Français'],
            'q_scolaire_difficultes' => ['confiance'],
        ]);

        $this->assertSame('soutien', $res['page_recommandee']['type']);

        // Les alternatives ne reprennent jamais la page principale
        $clesAlternatives = array_column($res['pages_alternatives'], 'key');
        $this->assertNotContains($res['page_recommandee']['key'], $clesAlternatives);

        // Les déclinaisons « Petits Bilingues » par âge ne doivent pas être
        // proposées plusieurs fois de suite dans les alternatives.
        $resEnfant = $this->service()->recommend([
            'q_parcours' => 'activite_enfant',
            'q_activite_enfant_age' => '3-6 ans',
            'q_activite_enfant_interets' => ['Anglais'],
        ]);
        $clesEnfant = array_column($resEnfant['pages_alternatives'], 'key');
        $bilingues = array_filter($clesEnfant, fn ($cle) => str_starts_with($cle, 'petits_bilingues'));

        $this->assertCount(0, $bilingues, 'Les variantes Petits Bilingues ne doivent pas polluer les alternatives');
    }

    public function test_repli_par_univers_quand_aucun_critere_ne_correspond()
    {
        $scolaire = $this->service()->recommend([]);
        $this->assertNotNull($scolaire['page_recommandee']);
        $this->assertSame('soutien_reponse', $scolaire['page_recommandee']['key']);
        $this->assertSame([], $scolaire['pages_alternatives']);

        $activite = $this->service()->recommend(['q_parcours' => 'activite_enfant']);
        $this->assertSame('mini_metiers', $activite['page_recommandee']['key']);

        $formation = $this->service()->recommend(['q_parcours' => 'formation']);
        $this->assertNotNull($formation['page_recommandee']);
        $this->assertSame('formation', $formation['page_recommandee']['type']);
        $this->assertTrue(
            str_starts_with($formation['page_recommandee']['key'], 'cours_') || $formation['page_recommandee']['key'] === 'formations_catalogue'
        );
    }

    public function test_recommandation_formation_entreprise_ne_propose_jamais_du_scolaire()
    {
        // Un choix de formation pour son entreprise ne doit JAMAIS recommander du soutien ou coaching scolaire
        $res = $this->service()->recommend([
            'q_parcours' => 'formation_entreprise',
            'q_formation_situation' => 'entreprise',
            'q_formation_domaine' => 'GESTION DE PROJET',
            'q_formation_objectif' => 'equipe',
            'q_formation_format' => 'en entreprise',
        ]);

        $this->assertNotNull($res['page_recommandee']);
        $this->assertSame('formation', $res['page_recommandee']['type']);
        $this->assertStringNotContainsString('scolaire', strtolower($res['page_recommandee']['titre']));
        $this->assertStringNotContainsString('scolaire', strtolower($res['page_recommandee']['type_label']));

        foreach ($res['pages_alternatives'] as $alt) {
            $this->assertSame('formation', $alt['type']);
            $this->assertStringNotContainsString('scolaire', strtolower($alt['titre']));
        }
    }

    public function test_endpoint_recommendation_expose_la_page_du_site()
    {
        $session = DiagnosticSession::create([
            'session_token' => 'token_page_' . uniqid(),
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

        try {
            $response = $this->postJson('/api/diagnostic/recommendation', [
                'session_token' => $session->session_token,
            ]);

            $response->assertStatus(200);
            $response->assertJsonPath('recommendation.page_recommandee.key', 'soutien_brevet');
            $response->assertJsonPath('recommendation.page_recommandee.type', 'soutien');
            $response->assertJsonStructure([
                'recommendation' => [
                    'page_recommandee' => ['key', 'titre', 'type', 'type_label', 'url', 'icone', 'description', 'score'],
                    'pages_alternatives',
                ],
            ]);
        } finally {
            DiagnosticAnswer::where('session_id', $session->id)->delete();
            $session->delete();
        }
    }
}
