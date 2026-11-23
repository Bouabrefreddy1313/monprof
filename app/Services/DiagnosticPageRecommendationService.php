<?php

namespace App\Services;

use App\Models\Cours;
use App\Models\Formation;
use Illuminate\Support\Str;

/**
 * Recommande une PAGE du site (parmi les 22 soutiens scolaires et 11 activités)
 * en fonction des réponses au diagnostic, selon le niveau scolaire et la matière
 * (parcours "scolaire") ou l'âge et les centres d'intérêt (parcours "activité enfant").
 *
 * Fonctionne en complément du moteur existant DiagnosticRecommendationService
 * (qui recommande des cours de la base de données) : ce service recommande la
 * page vitrine la plus pertinente à consulter.
 */
class DiagnosticPageRecommendationService
{
    /** Poids du critère « niveau scolaire correspondant » */
    protected const POIDS_NIVEAU = 40;

    /** Poids du critère « matière choisie correspondante » */
    protected const POIDS_MATIERE = 30;

    /** Poids réduit quand seule la matière générique (toutes matières) matche */
    protected const POIDS_MATIERE_GENERIQUE = 18;

    /** Poids du critère « difficulté déclarée correspondante » */
    protected const POIDS_DIFFICULTE = 15;

    /** Poids du critère « centre d'intérêt de l'enfant » (parcours activité) */
    protected const POIDS_CENTRE_INTERET = 35;

    /** Poids du critère « tranche d'âge de l'enfant » (parcours activité) */
    protected const POIDS_AGE = 30;

    /** Poids du critère « centre d'intérêt adulte » (parcours activite_adulte) */
    protected const POIDS_INTERET_ADULTE = 50;

    /** Bonus si le type de page (soutien/activite) correspond au parcours */
    protected const BONUS_TYPE_PARCOURS = 12;

    /** Priorité éditoriale utilisée pour départager les ex æquo (facteur réduit) */
    protected const POIDS_PRIORITE = 0.1;

    /**
     * Retourne la meilleure page + les alternatives compatibles.
     *
     * @param  array  $answers  Map question => réponse (issue de DiagnosticAnswer::parsed_reponse)
     */
    public function recommend(array $answers): array
    {
        $pages = config('diagnostic_catalog.pages', []);
        if (empty($pages)) {
            return ['page_recommandee' => null, 'pages_alternatives' => []];
        }

        $parcours = $this->extractParcours($answers);
        if (str_starts_with($parcours, 'formation')) {
            $parcoursType = 'formation';
        } elseif (str_starts_with($parcours, 'activite')) {
            $parcoursType = 'activite';
        } else {
            $parcoursType = 'soutien';
        }

        $userSituation = (string) ($answers['q_formation_situation'] ?? '');
        $userObjectif = (string) ($answers['q_formation_objectif'] ?? '');
        $userFormat = (string) ($answers['q_formation_format'] ?? '');
        $isEntreprise = $parcours === 'formation_entreprise'
            || in_array($userSituation, ['entreprise', 'dirigeant'], true)
            || in_array($userObjectif, ['equipe', 'performance_entreprise'], true)
            || $userFormat === 'en entreprise';

        $userNiveaux = $this->extractNiveaux($answers, $parcours);
        $userMatieres = $parcoursType === 'formation'
            ? $this->extractArray($answers, ['q_formation_domaine'])
            : $this->extractArray($answers, ['q_scolaire_matieres']);
        $userDifficultes = $this->extractArray($answers, ['q_scolaire_difficultes']);
        $userAges = $this->extractArray($answers, ['q_activite_enfant_age']);
        $userInterets = $this->extractArray($answers, ['q_activite_enfant_interets']);
        $userInteretsAdulte = $this->extractArray($answers, ['q_activite_adulte_type']);

        // Pour le parcours formation (particulier ou entreprise), puiser directement dans la table cours
        // afin de varier les cours réels correspondant au domaine choisi ou aux besoins de l'entreprise
        if ($parcoursType === 'formation') {
            $domaineQuery = !empty($userMatieres) ? trim((string) $userMatieres[0]) : '';

            $coursesQuery = Cours::with(['formation', 'sousFormation']);

            if ($domaineQuery !== '') {
                $dbFormation = Formation::where('titre', 'LIKE', '%' . $domaineQuery . '%')
                    ->orWhere('id', is_numeric($domaineQuery) ? (int) $domaineQuery : 0)
                    ->first();

                if ($dbFormation) {
                    $coursesQuery->where('formation_id', $dbFormation->id);
                } else {
                    $coursesQuery->where(function ($q) use ($domaineQuery) {
                        $q->where('titre', 'LIKE', '%' . $domaineQuery . '%')
                          ->orWhere('description', 'LIKE', '%' . $domaineQuery . '%');
                    });
                }
            } else {
                // Si aucun domaine spécifique sélectionné, varier parmi les grands pôles de formation continue
                $coursesQuery->whereIn('formation_id', [68, 76, 72, 77, 73, 17, 85, 88, 81]);
            }

            $dbCourses = $coursesQuery->inRandomOrder()->take(5)->get();

            // Si pour une raison quelconque la sélection est vide, piocher aléatoirement parmi l'ensemble des cours
            if ($dbCourses->isEmpty()) {
                $dbCourses = Cours::with(['formation', 'sousFormation'])
                    ->whereNotNull('formation_id')
                    ->inRandomOrder()
                    ->take(5)
                    ->get();
            }

            if ($dbCourses->isNotEmpty()) {
                $primaryCourse = $dbCourses->first();
                $otherCourses = $dbCourses->slice(1)->values();

                $primaryFormatted = [
                    'key' => 'cours_' . $primaryCourse->id,
                    'titre' => 'Formation : ' . $primaryCourse->titre,
                    'type' => 'formation',
                    'type_label' => $isEntreprise ? 'Formation Entreprise & Équipes' : 'Formation Professionnelle',
                    'url' => url('/cours/' . $primaryCourse->id),
                    'icone' => $isEntreprise ? 'fas fa-building' : 'fas fa-briefcase',
                    'description' => Str::limit(strip_tags($primaryCourse->description ?: ($primaryCourse->formation?->description ?: 'Formation professionnelle certifiante.')), 180),
                    'score' => 95,
                ];

                $altsFormatted = [];
                foreach ($otherCourses as $c) {
                    $altsFormatted[] = [
                        'key' => 'cours_' . $c->id,
                        'titre' => $c->titre,
                        'type' => 'formation',
                        'type_label' => $isEntreprise ? 'Formation Entreprise' : 'Formation Professionnelle',
                        'url' => url('/cours/' . $c->id),
                        'icone' => 'fas fa-graduation-cap',
                        'description' => Str::limit(strip_tags($c->description ?: ($c->formation?->description ?: 'Programme certifiant.')), 140),
                        'score' => 90,
                    ];
                }

                // Ajouter la vue catalogue de la formation si disponible
                if ($primaryCourse->formation_id) {
                    $formationNom = $primaryCourse->formation->titre ?? 'cette spécialité';
                    $altsFormatted[] = [
                        'key' => 'formation_sf_' . $primaryCourse->formation_id,
                        'titre' => 'Toutes les filières en ' . mb_convert_case($formationNom, MB_CASE_TITLE, 'UTF-8'),
                        'type' => 'formation',
                        'type_label' => 'Catalogue thématique',
                        'url' => url('/formations/' . $primaryCourse->formation_id . '/sous-formations'),
                        'icone' => 'fas fa-layer-group',
                        'description' => 'Découvrez l\'ensemble des sous-formations et modules disponibles dans cette spécialité.',
                        'score' => 85,
                    ];
                }

                return [
                    'page_recommandee' => $primaryFormatted,
                    'pages_alternatives' => array_slice($altsFormatted, 0, 3),
                ];
            }
        }

        $scored = [];

        foreach ($pages as $page) {
            $pageType = $page['type'] ?? '';

            // Isolation stricte des univers : une formation ne doit jamais recevoir
            // du soutien scolaire ou des activités enfants (et inversement)
            if ($pageType !== $parcoursType) {
                continue;
            }

            $score = 0;

            // 1) Niveau scolaire / tranche d'âge
            $score += $this->scoreNiveau($page, $userNiveaux);

            // 2) Matières + 3) Difficultés (parcours scolaire)
            if ($parcoursType === 'soutien') {
                $score += $this->scoreMatieres($page, $userMatieres);
                $score += $this->scoreDifficultes($page, $userDifficultes);
            }

            // 4) Centres d'intérêt + âge (parcours activité enfant)
            if ($parcours === 'activite_enfant') {
                $score += $this->scoreCentresInteret($page, $userInterets);
                $score += $this->scoreAge($page, $userAges);
            }

            // 4bis) Intérêts adulte (parcours activite_adulte)
            if ($parcours === 'activite_adulte') {
                $score += $this->scoreInteretsAdulte($page, $userInteretsAdulte);
            }

            // 4ter) Parcours formation professionnelle & entreprise
            if ($parcoursType === 'formation') {
                $score += $this->scoreMatieres($page, $userMatieres);
                if ($isEntreprise && Str::contains($page['key'] ?? '', ['transversales', 'management', 'rh', 'qhse', 'gestion_projet'])) {
                    $score += 15;
                }
            }

            // Score « critères » : ce que la page a réellement matché
            $critere = $score;

            // 5) Bonus si le type de page correspond au parcours
            if (($page['type'] ?? '') === $parcoursType) {
                $score += self::BONUS_TYPE_PARCOURS;
            }

            // 6) Priorité éditoriale (départage des ex æquo)
            $score += ((int) ($page['priorite'] ?? 0)) * self::POIDS_PRIORITE;

            $scored[] = [
                'page' => $page,
                'score' => round($score, 2),
                'critere' => round($critere, 2),
            ];
        }

        // Tri : score décroissant puis priorité décroissante
        usort($scored, fn ($a, $b) => $b['score'] <=> $a['score']);

        return $this->buildResult($scored, $parcoursType, $isEntreprise);
    }

    /* -----------------------------------------------------------------
     |  Scoring par critère
     ----------------------------------------------------------------- */

    protected function scoreNiveau(array $page, array $userNiveaux): float
    {
        if (empty($userNiveaux)) {
            return 0;
        }

        $pageNiveaux = $page['niveaux'] ?? [];

        $best = 0;
        foreach ($userNiveaux as $niveau) {
            if ($this->inArrayFuzzy($niveau, $pageNiveaux)) {
                $best = max($best, self::POIDS_NIVEAU);
            }
        }

        return $best;
    }

    protected function scoreMatieres(array $page, array $userMatieres): float
    {
        if (empty($userMatieres)) {
            return 0;
        }

        $pageMatieres = $page['matieres'] ?? [];
        $best = 0;

        foreach ($userMatieres as $matiere) {
            if ($this->inArrayFuzzy($matiere, $pageMatieres)) {
                // Une page « toutes matières » (Général seul) rapporte moins
                // qu'une page dédiée à la matière précise choisie.
                $isGeneric = in_array('Général', $pageMatieres, true)
                    && count($pageMatieres) === 1;
                $poids = $isGeneric ? self::POIDS_MATIERE_GENERIQUE : self::POIDS_MATIERE;
                $best = max($best, $poids);
            }
        }

        return $best;
    }

    protected function scoreDifficultes(array $page, array $userDifficultes): float
    {
        if (empty($userDifficultes)) {
            return 0;
        }

        $pageDiff = $page['difficultes'] ?? [];
        $best = 0;
        foreach ($userDifficultes as $d) {
            if ($this->inArrayFuzzy($d, $pageDiff)) {
                $best = max($best, self::POIDS_DIFFICULTE);
            }
        }

        return $best;
    }

    protected function scoreCentresInteret(array $page, array $userInterets): float
    {
        if (empty($userInterets)) {
            return 0;
        }

        $pageInterets = array_merge(
            $page['centres_interet'] ?? [],
            $page['matieres'] ?? []
        );
        $best = 0;
        foreach ($userInterets as $i) {
            if ($this->inArrayFuzzy($i, $pageInterets)) {
                $best = max($best, self::POIDS_CENTRE_INTERET);
            }
        }

        return $best;
    }

    protected function scoreAge(array $page, array $userAges): float
    {
        if (empty($userAges)) {
            return 0;
        }

        $pageAges = $page['tranches_age'] ?? [];
        $best = 0;
        foreach ($userAges as $age) {
            if ($this->inArrayFuzzy($age, $pageAges)) {
                $best = max($best, self::POIDS_AGE);
            }
        }

        return $best;
    }

    protected function scoreInteretsAdulte(array $page, array $userInterets): float
    {
        if (empty($userInterets)) {
            return 0;
        }

        $pageInterets = $page['interets_adulte'] ?? [];
        $best = 0;
        foreach ($userInterets as $i) {
            if ($this->inArrayFuzzy($i, $pageInterets)) {
                $best = max($best, self::POIDS_INTERET_ADULTE);
            }
        }

        return $best;
    }

    /**
     * Construit le résultat final : page principale + alternatives.
     *
     * La page principale est cherchée en priorité dans l'univers du parcours
     * (soutien scolaire vs activités) afin de ne jamais proposer une activité
     * à un élève en difficulté scolaire (et inversement). Les alternatives,
     * elles, restent ouvertes aux deux univers.
     */
    protected function buildResult(array $scored, string $parcoursType, bool $isEntreprise = false): array
    {
        $sameUniverse = array_values(array_filter($scored, function ($entry) use ($parcoursType) {
            return $entry['critere'] > 0 && ($entry['page']['type'] ?? '') === $parcoursType;
        }));

        $primary = $sameUniverse[0] ?? null;

        // Aucune page de l'univers du parcours ne « matche » spécifiquement : page de repli
        if (! $primary) {
            $pages = config('diagnostic_catalog.pages', []);
            $fallbackKey = match ($parcoursType) {
                'formation' => (string) config('diagnostic_catalog.fallback_key_formation', 'formations_catalogue'),
                'activite' => (string) config('diagnostic_catalog.fallback_key_activite', 'mini_metiers'),
                default => (string) config('diagnostic_catalog.fallback_key', 'soutien_reponse'),
            };

            $fallback = $this->findByKey($pages, $fallbackKey) ?? ($scored[0]['page'] ?? null);
            if ($fallback) {
                return [
                    'page_recommandee' => $this->formatPage($fallback, 0, $isEntreprise),
                    'pages_alternatives' => [],
                ];
            }

            return ['page_recommandee' => null, 'pages_alternatives' => []];
        }

        // Alternatives : pages suivantes du même univers
        $family = $this->pageFamily($primary['page']);
        $primaryType = $primary['page']['type'] ?? '';

        $candidats = array_values(array_filter($scored, function ($entry) use ($primary, $family, $primaryType) {
            return ($entry['page']['type'] ?? '') === $primaryType
                && ($entry['page']['key'] ?? '') !== ($primary['page']['key'] ?? '')
                && $this->pageFamily($entry['page']) !== $family;
        }));

        usort($candidats, fn ($a, $b) => $b['score'] <=> $a['score']);

        $alternatives = [];
        foreach (array_slice($candidats, 0, 3) as $entry) {
            $alternatives[] = $this->formatPage($entry['page'], $entry['score'], $isEntreprise);
        }

        return [
            'page_recommandee' => $this->formatPage($primary['page'], $primary['score'], $isEntreprise),
            'pages_alternatives' => $alternatives,
        ];
    }

    /* -----------------------------------------------------------------
     |  Extraction / normalisation des réponses
     ----------------------------------------------------------------- */

    protected function extractParcours(array $answers): string
    {
        $choice = $this->flattenValue($answers['q_parcours'] ?? 'scolaire');
        if ($choice === '') {
            $choice = 'scolaire';
        }

        if (Str::contains($choice, 'sais pas') || $choice === 'indecis') {
            // Le contrôleur redirige déjà vers un parcours concret ; on relit
            // la préoccupation déclarée pour rester cohérent.
            $preoccupation = $this->flattenValue($answers['q_indecis_preoccupation'] ?? '');
            if (Str::contains($preoccupation, 'scolaire')) {
                return 'scolaire';
            }
            if (Str::contains($preoccupation, 'entreprise')) {
                return 'formation_entreprise';
            }
            if (Str::contains($preoccupation, 'formation')) {
                return 'formation';
            }
            if (Str::contains($preoccupation, 'activite')) {
                return 'activite_enfant';
            }

            return 'scolaire';
        }

        if (Str::contains($choice, 'activite') && Str::contains($choice, 'adulte')) {
            return 'activite_adulte';
        }

        if (Str::contains($choice, 'activite')) {
            return 'activite_enfant';
        }

        if (Str::contains($choice, 'entreprise')) {
            return 'formation_entreprise';
        }

        if (Str::contains($choice, 'formation')) {
            return 'formation';
        }

        return 'scolaire';
    }

    /**
     * Aplatit une réponse (scalaire ou tableau JSON) en chaîne normalisée
     * sans accents et en minuscules : « Une activité » => « une activite ».
     */
    protected function flattenValue($value): string
    {
        if (is_array($value)) {
            $flat = [];
            array_walk_recursive($value, function ($item) use (&$flat) {
                $flat[] = (string) $item;
            });
            $value = implode(' ', $flat);
        }

        return $this->normalize((string) $value);
    }

    /**
     * Normalise une chaîne pour les comparaisons : minuscules sans accents.
     */
    protected function normalize(string $value): string
    {
        return trim(Str::lower(Str::ascii($value)));
    }

    /**
     * Détermine le(x) niveau(x) scolaires ciblés à partir des réponses.
     * Pour le parcours activité enfant, on utilise la tranche d'âge.
     */
    protected function extractNiveaux(array $answers, string $parcours): array
    {
        if ($parcours === 'activite_enfant') {
            return $this->extractArray($answers, ['q_activite_enfant_age']);
        }

        $niveaux = $this->extractArray($answers, ['q_scolaire_niveau', 'q_scolaire_classe']);
        if (empty($niveaux)) {
            return [];
        }

        return [$this->flattenValue($niveaux)];
    }

    protected function extractArray(array $answers, array $keys): array
    {
        foreach ($keys as $k) {
            if (! isset($answers[$k])) {
                continue;
            }
            $val = $answers[$k];
            if (is_array($val)) {
                return $val;
            }
            $decoded = json_decode((string) $val, true);
            if (is_array($decoded)) {
                return $decoded;
            }

            return array_values(array_filter(array_map('trim', explode(',', (string) $val))));
        }

        return [];
    }

    /* -----------------------------------------------------------------
     |  Utilitaires
     ----------------------------------------------------------------- */

    protected function inArrayFuzzy(string $needle, array $haystack): bool
    {
        $needleLower = $this->normalize($needle);
        if ($needleLower === '') {
            return false;
        }

        foreach ($haystack as $item) {
            $itemLower = $this->normalize((string) $item);
            if ($itemLower === '') {
                continue;
            }
            if ($itemLower === $needleLower
                || Str::contains($itemLower, $needleLower)
                || Str::contains($needleLower, $itemLower)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Famille de page : sert à éviter de proposer 3 fois la même déclinaison
     * (ex: les 5 pages « Petits Bilingues par âge ») dans les alternatives.
     */
    protected function pageFamily(array $page): string
    {
        // Famille éditoriale explicite (déclarée dans le catalogue)
        if (! empty($page['famille'])) {
            return (string) $page['famille'];
        }

        // Déclinaisons « Petits Bilingues » par tranche d'âge
        $url = (string) ($page['url'] ?? '');
        if (preg_match('#^/petit(-[0-9]+-[0-9]+-ans)?$#', $url)) {
            return 'petits_bilingues';
        }

        return $page['key'] ?? $url;
    }

    protected function findByKey(array $pages, string $key): ?array
    {
        foreach ($pages as $page) {
            if (($page['key'] ?? '') === $key) {
                return $page;
            }
        }

        return null;
    }

    /**
     * Formate une page pour la réponse JSON du diagnostic.
     */
    public function formatPage(array $page, float $score = 0, bool $isEntreprise = false): array
    {
        $type = $page['type'] ?? 'soutien';
        $typeLabel = match ($type) {
            'formation' => $isEntreprise ? 'Formation Entreprise & Équipes' : 'Formation Professionnelle',
            'activite' => 'Activité',
            default => 'Soutien scolaire',
        };

        $titre = $page['titre'] ?? '';
        if ($isEntreprise && $type === 'formation' && !Str::contains(Str::lower($titre), 'entreprise')) {
            $titre .= ' — Solutions Entreprises';
        }

        return [
            'key' => $page['key'] ?? '',
            'titre' => $titre,
            'type' => $type,
            'type_label' => $typeLabel,
            'url' => url($page['url'] ?? '/'),
            'icone' => $page['icone'] ?? 'fas fa-star',
            'description' => $page['description'] ?? '',
            'score' => $score,
        ];
    }
}

