<?php

namespace App\Services;

use App\Models\Cours;
use App\Models\CoursDiagnosticSetting;
use App\Models\CoursDiagnosticTag;
use App\Models\DiagnosticConfig;
use App\Models\FormationParcoursMapping;
use App\Models\RecommendationRule;
use Illuminate\Support\Str;

class DiagnosticRecommendationService
{
    /**
     * Calcule la recommandation personnalisée basée sur les réponses de l'utilisateur.
     *
     * @param array $answers Clé-valeur des réponses (ex: ['q_parcours' => 'scolaire', 'q_scolaire_niveau' => 'college', ...])
     * @return array
     */
    public function calculateRecommendation(array $answers): array
    {
        $parcours = $this->extractParcours($answers);

        // Récupérer les règles de pondération configurées en base
        $rules = RecommendationRule::all()->keyBy('type_critere');
        $poidsDomaine = $rules->get('domaine_matiere')?->poids ?? 40;
        $poidsNiveau = $rules->get('niveau')?->poids ?? 25;
        $poidsDispo = $rules->get('disponibilite')?->poids ?? 15;
        $poidsFormat = $rules->get('format')?->poids ?? 10;
        $poidsObjectif = $rules->get('objectif')?->poids ?? 10;
        $poidsMotsCles = $rules->get('mots_cles')?->poids ?? 10;

        $seuilMinimum = (int)DiagnosticConfig::get('score_minimum_recommandation', 25);

        // 1. Filtrer uniquement les cours avec actif_diagnostic = true
        $eligibleCoursesQuery = Cours::with(['diagnosticSetting', 'diagnosticTags', 'formation', 'sousFormation'])
            ->whereHas('diagnosticSetting', function ($q) {
                $q->where('actif_diagnostic', true);
            });

        // 2. FILTRE STRICT PAR PARCOURS (au niveau SQL pour la performance)
        // Un cours ne peut être recommandé QUE s'il appartient au parcours choisi :
        // sa formation est mappée à ce parcours (FormationParcoursMapping)
        // OU il porte un tag diagnostic 'parcours' correspondant.
        // Cela empêche par exemple de proposer une formation professionnelle
        // à un utilisateur qui cherche un accompagnement scolaire pour son enfant.
        $formationIdsForParcours = FormationParcoursMapping::where('parcours', $parcours)
            ->pluck('formation_id')
            ->unique()
            ->toArray();

        $courses = $eligibleCoursesQuery
            ->where(function ($query) use ($formationIdsForParcours, $parcours) {
                $query->whereIn('formation_id', $formationIdsForParcours)
                    ->orWhereHas('diagnosticTags', function ($t) use ($parcours) {
                        $t->where('type_tag', 'parcours')->where('valeur', $parcours);
                    });
            })
            ->get();

        $scoredCourses = [];

        // Extraire critères utilisateur
        $userMatières = $this->extractArray($answers, ['q_scolaire_matieres', 'q_formation_domaine', 'q_activite_enfant_interets', 'q_activite_adulte_type']);
        $userNiveau = $this->extractString($answers, ['q_scolaire_niveau', 'q_scolaire_classe', 'q_formation_niveau', 'q_activite_adulte_niveau']);
        $userDispo = $this->extractArray($answers, ['q_scolaire_dispo', 'q_formation_dispo', 'q_activite_enfant_dispo', 'q_activite_adulte_dispo']);
        $userFormat = $this->extractString($answers, ['q_scolaire_format', 'q_formation_format']);
        $userObjectif = $this->extractString($answers, ['q_scolaire_objectif', 'q_formation_objectif', 'q_activite_enfant_objectif', 'q_activite_adulte_objectif']);

        foreach ($courses as $cours) {
            $score = 0;
            $tags = $cours->diagnosticTags->groupBy('type_tag');

            // Critère 1 : Parcours
            $coursParcoursTags = $tags->get('parcours')?->pluck('valeur')->toArray() ?? [];
            $isInParcoursMapping = in_array($cours->formation_id, $formationIdsForParcours, true);
            $hasParcoursTag = in_array($parcours, $coursParcoursTags, true);

            if ($isInParcoursMapping || $hasParcoursTag) {
                $score += 30;
            }

            // Critère 2 : Matière / Domaine d'intérêt
            $matiereScore = 0;
            $coursMatiereTags = array_merge(
                $tags->get('matiere')?->pluck('valeur')->toArray() ?? [],
                $tags->get('domaine')?->pluck('valeur')->toArray() ?? [],
                $tags->get('centre_interet')?->pluck('valeur')->toArray() ?? []
            );

            foreach ($userMatières as $m) {
                if ($this->inArrayFuzzy($m, $coursMatiereTags) ||
                    ($cours->formation && Str::contains(mb_strtolower($cours->formation->titre), mb_strtolower($m))) ||
                    ($cours->sousFormation && Str::contains(mb_strtolower($cours->sousFormation->titre), mb_strtolower($m))) ||
                    Str::contains(mb_strtolower($cours->titre), mb_strtolower($m))) {
                    $matiereScore = max($matiereScore, $poidsDomaine);
                }
            }
            $score += $matiereScore;

            // Critère 3 : Niveau
            if (!empty($userNiveau)) {
                $coursNiveauTags = $tags->get('niveau')?->pluck('valeur')->toArray() ?? [];
                if ($this->inArrayFuzzy($userNiveau, $coursNiveauTags) ||
                    Str::contains(mb_strtolower($cours->titre . ' ' . $cours->cible . ' ' . $cours->description), mb_strtolower($userNiveau))) {
                    $score += $poidsNiveau;
                }
            }

            // Critère 4 : Disponibilités & créneaux
            if (!empty($userDispo)) {
                $coursDispoTags = $tags->get('disponibilite')?->pluck('valeur')->toArray() ?? [];
                $heureField = mb_strtolower($cours->heure ?? '');
                $dispoMatched = false;

                foreach ($userDispo as $d) {
                    if ($this->inArrayFuzzy($d, $coursDispoTags) || Str::contains($heureField, mb_strtolower($d))) {
                        $dispoMatched = true;
                        break;
                    }
                }
                if ($dispoMatched) {
                    $score += $poidsDispo;
                }
            }

            // Critère 5 : Format (en ligne / à domicile / présentiel)
            if (!empty($userFormat)) {
                $coursFormatTags = $tags->get('format')?->pluck('valeur')->toArray() ?? [];
                $lieuField = mb_strtolower($cours->lieu ?? '');
                if ($this->inArrayFuzzy($userFormat, $coursFormatTags) || Str::contains($lieuField, mb_strtolower($userFormat))) {
                    $score += $poidsFormat;
                }
            }

            // Critère 6 : Objectif
            if (!empty($userObjectif)) {
                $coursObjTags = $tags->get('objectif')?->pluck('valeur')->toArray() ?? [];
                if ($this->inArrayFuzzy($userObjectif, $coursObjTags) ||
                    Str::contains(mb_strtolower($cours->objectif . ' ' . $cours->description), mb_strtolower($userObjectif))) {
                    $score += $poidsObjectif;
                }
            }

            // Critère 7 : Mots-clés libres complémentaires
            $keywords = array_filter(array_merge($userMatières, [$userNiveau, $userFormat, $userObjectif]));
            $content = mb_strtolower($cours->titre . ' ' . $cours->description . ' ' . $cours->objectif . ' ' . $cours->cible . ' ' . $cours->prerequis);
            $keywordHits = 0;
            foreach ($keywords as $kw) {
                if (is_string($kw) && strlen($kw) > 3 && Str::contains($content, mb_strtolower($kw))) {
                    $keywordHits++;
                }
            }
            $score += min($poidsMotsCles, $keywordHits * 4);

            $priorite = $cours->diagnosticSetting?->priorite ?? 0;

            $scoredCourses[] = [
                'cours' => $cours,
                'score' => $score,
                'priorite' => $priorite,
            ];
        }

        // Tri par score décroissant, puis par priorité décroissante
        usort($scoredCourses, function ($a, $b) {
            if ($a['score'] === $b['score']) {
                return $b['priorite'] <=> $a['priorite'];
            }
            return $b['score'] <=> $a['score'];
        });

        // Vérifier si un cours atteint le seuil minimum
        $topMatch = $scoredCourses[0] ?? null;

        if (!$topMatch || $topMatch['score'] < $seuilMinimum) {
            return [
                'aucune_correspondance' => true,
                'primary_course' => null,
                'alternatives' => [],
                'score' => $topMatch['score'] ?? 0,
                'parcours' => $parcours,
                'texte_recommandation' => "Nos conseillers pédagogiques vont analyser votre profil et vous orienter personnellement vers la solution la plus adaptée.",
                'conseil_depart' => "Laissez vos coordonnées ci-dessous pour recevoir une orientation sur mesure et un bilan d'évaluation gratuit.",
            ];
        }

        $primaryCourse = $topMatch['cours'];
        $alternatives = [];
        for ($i = 1; $i < min(3, count($scoredCourses)); $i++) {
            if ($scoredCourses[$i]['score'] >= ($seuilMinimum - 10)) {
                $alternatives[] = $this->formatCourseData($scoredCourses[$i]['cours']);
            }
        }

        // Construction du texte de recommandation personnalisé
        $customText = $primaryCourse->diagnosticSetting?->message_recommandation;
        if (empty($customText)) {
            $customText = $this->generatePersonalizedText($parcours, $primaryCourse, $answers);
        }

        $conseilDepart = $this->generateStartingTip($parcours, $primaryCourse);

        return [
            'aucune_correspondance' => false,
            'primary_course' => $this->formatCourseData($primaryCourse),
            'alternatives' => $alternatives,
            'score' => $topMatch['score'],
            'parcours' => $parcours,
            'texte_recommandation' => $customText,
            'conseil_depart' => $conseilDepart,
        ];
    }

    /**
     * Formate un cours pour la vue publique du diagnostic.
     */
    public function formatCourseData(Cours $cours): array
    {
        return [
            'id' => $cours->id,
            'titre' => $cours->titre,
            'formation_titre' => $cours->formation?->titre ?? '',
            'sous_formation_titre' => $cours->sousFormation?->titre ?? '',
            'description' => Str::limit(strip_tags($cours->description ?? ''), 180),
            'objectif' => $cours->objectif,
            'cible' => $cours->cible,
            'heure' => $cours->heure ?? 'Horaires flexibles sur mesure',
            'lieu' => $cours->lieu ?? 'Présentiel ou en ligne',
            'prix' => $cours->prix ?? 'Tarif sur devis personnalisé',
            'formateur' => $cours->formateur ?? 'Enseignant / Formateur qualifié certifié',
            'image' => $cours->image ? asset('storage/' . $cours->image) : asset('asset/img/hero-illustration.png'),
            'url' => route('particuliers.cours', $cours->id),
        ];
    }

    /**
     * Extrait le parcours à partir des réponses.
     */
    protected function extractParcours(array $answers): string
    {
        $choice = $answers['q_parcours'] ?? $answers['parcours'] ?? 'scolaire';

        // Cas Parcours E (Je ne sais pas encore) : redirection automatique
        if ($choice === 'indecis' || Str::contains(mb_strtolower($choice), 'sais pas')) {
            $cible = $answers['q_indecis_cible'] ?? '';
            if (Str::contains(mb_strtolower($cible), 'enfant')) {
                return 'scolaire';
            }
            if (Str::contains(mb_strtolower($cible), 'moi')) {
                return 'formation';
            }
            return 'scolaire';
        }

        if (Str::contains(mb_strtolower($choice), 'scolaire')) {
            return 'scolaire';
        }
        if (Str::contains(mb_strtolower($choice), 'formation')) {
            return 'formation';
        }
        if (Str::contains(mb_strtolower($choice), 'enfant')) {
            return 'activite_enfant';
        }
        if (Str::contains(mb_strtolower($choice), 'adulte') || Str::contains(mb_strtolower($choice), 'moi')) {
            return 'activite_adulte';
        }

        return 'scolaire';
    }

    protected function extractArray(array $answers, array $keys): array
    {
        foreach ($keys as $k) {
            if (isset($answers[$k])) {
                $val = $answers[$k];
                if (is_array($val)) {
                    return $val;
                }
                $decoded = json_decode($val, true);
                if (is_array($decoded)) {
                    return $decoded;
                }
                return array_filter(array_map('trim', explode(',', (string)$val)));
            }
        }
        return [];
    }

    protected function extractString(array $answers, array $keys): string
    {
        foreach ($keys as $k) {
            if (isset($answers[$k]) && !empty($answers[$k])) {
                if (is_array($answers[$k])) {
                    return implode(', ', $answers[$k]);
                }
                return trim((string)$answers[$k]);
            }
        }
        return '';
    }

    protected function inArrayFuzzy(string $needle, array $haystack): bool
    {
        $needleLower = mb_strtolower(trim($needle));
        if ($needleLower === '') {
            return false;
        }
        foreach ($haystack as $item) {
            $itemLower = mb_strtolower(trim($item));
            if ($itemLower === $needleLower || Str::contains($itemLower, $needleLower) || Str::contains($needleLower, $itemLower)) {
                return true;
            }
        }
        return false;
    }

    protected function generatePersonalizedText(string $parcours, Cours $cours, array $answers): string
    {
        return match ($parcours) {
            'scolaire' => "Cette solution d'accompagnement répond directement aux difficultés ciblées et permettra d'instaurer une méthode de travail rigoureuse avec un suivi pédagogique individualisé.",
            'formation' => "Ce cursus est idéal pour monter en compétences rapidement, consolider vos bases et atteindre votre objectif professionnel avec des modules concrets.",
            'activite_enfant' => "Cette activité stimulante permettra à votre enfant d'explorer ses talents dans un cadre bienveillant, convivial et propice à l'apprentissage.",
            'activite_adulte' => "Un programme pensé pour vous permettre d'apprendre à votre rythme, de vous détendre et de progresser efficacement.",
            default => "Cette formation correspond parfaitement aux critères et attentes que vous avez formulés.",
        };
    }

    protected function generateStartingTip(string $parcours, Cours $cours): string
    {
        return match ($parcours) {
            'scolaire' => "Commencer par un bilan pédagogique gratuit de 30 minutes avec l'un de nos enseignants pour cibler les premiers points à travailler.",
            'formation' => "Un entretien d'orientation préalable avec notre coordinateur pour valider vos prérequis et définir votre calendrier de formation.",
            'activite_enfant' => "Participer à une séance de découverte pour tester l'activité et valider l'enthousiasme de votre enfant.",
            'activite_adulte' => "Planifier un premier créneau d'initiation adapté à vos disponibilités.",
            default => "Échanger avec notre conseiller pédagogique pour personnaliser votre parcours.",
        };
    }
}
