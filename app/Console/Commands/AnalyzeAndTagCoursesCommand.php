<?php

namespace App\Console\Commands;

use App\Models\Cours;
use App\Models\CoursDiagnosticSetting;
use App\Models\CoursDiagnosticTag;
use App\Models\Formation;
use App\Models\FormationParcoursMapping;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class AnalyzeAndTagCoursesCommand extends Command
{
    protected $signature = 'diagnostic:tag-courses 
                            {--limit= : Limiter le nombre de cours à analyser}
                            {--activate-sample=10 : Nombre de cours échantillons à activer pour le diagnostic}';

    protected $description = 'Analyse les cours existants et génère des tags suggérés à partir de leur formation, titre, description, lieu et heure.';

    public function handle(): int
    {
        $this->info("Démarrage de l'analyse des cours pour le Diagnostic Personnalisé...");

        // Initialiser le mapping formation -> parcours si vide
        $this->ensureDefaultFormationMapping();

        $mappings = FormationParcoursMapping::all()->groupBy('formation_id');

        $query = Cours::with(['formation', 'sousFormation']);
        $limit = $this->option('limit') ? (int)$this->option('limit') : null;
        $total = $limit ? $limit : Cours::count();
        $this->info("Total des cours à traiter : {$total}");

        $bar = $this->output->createProgressBar($total);
        $bar->start();

        $activateSampleCount = (int)$this->option('activate-sample');
        $activatedSoFar = 0;

        $processCours = function ($cours) use (&$activatedSoFar, $activateSampleCount, $mappings, $bar) {
                // 1. Initialiser le setting
                $setting = CoursDiagnosticSetting::firstOrCreate(
                    ['cours_id' => $cours->id],
                    [
                        'actif_diagnostic' => false,
                        'priorite' => 0,
                        'message_recommandation' => null,
                    ]
                );

                // Optionnel : activer un petit échantillon initial pour tester immédiatement
                if ($activatedSoFar < $activateSampleCount && !$setting->actif_diagnostic) {
                    $setting->actif_diagnostic = true;
                    $setting->save();
                    $activatedSoFar++;
                }

                $textToAnalyze = mb_strtolower(implode(' ', [
                    $cours->titre ?? '',
                    $cours->description ?? '',
                    $cours->objectif ?? '',
                    $cours->cible ?? '',
                    $cours->programme ?? '',
                    $cours->prerequis ?? '',
                    $cours->public_concerne ?? '',
                ]));

                $tagsToInsert = [];

                // 2. Déterminer le parcours
                $formationId = $cours->formation_id;
                if ($formationMappings = $mappings->get($formationId)) {
                    foreach ($formationMappings as $fm) {
                        $tagsToInsert[] = ['type_tag' => 'parcours', 'valeur' => $fm->parcours];
                    }
                } else {
                    // Analyse par mots-clés
                    if (Str::contains($textToAnalyze, ['collège', 'lycée', 'primaire', 'brevet', 'bac', 'soutien scolaire', 'devoirs'])) {
                        $tagsToInsert[] = ['type_tag' => 'parcours', 'valeur' => 'scolaire'];
                    } elseif (Str::contains($textToAnalyze, ['professionnel', 'métier', 'emploi', 'carrière', 'certification', 'adulte', 'reconversion'])) {
                        $tagsToInsert[] = ['type_tag' => 'parcours', 'valeur' => 'formation'];
                    } elseif (Str::contains($textToAnalyze, ['enfant', 'éveil', 'jeunesse', 'ados', 'mercredi'])) {
                        $tagsToInsert[] = ['type_tag' => 'parcours', 'valeur' => 'activite_enfant'];
                    } else {
                        $tagsToInsert[] = ['type_tag' => 'parcours', 'valeur' => 'formation'];
                    }
                }

                // 3. Détecter le niveau
                $niveaux = [
                    'primaire' => ['primaire', 'cp', 'ce1', 'ce2', 'cm1', 'cm2'],
                    'collège' => ['collège', 'college', '6ème', '5ème', '4ème', '3ème', 'brevet'],
                    'lycée' => ['lycée', 'lycee', 'seconde', 'première', 'premiere', 'terminale', 'baccalauréat', 'bac'],
                    'supérieur' => ['supérieur', 'licence', 'master', 'bts', 'dut', 'dcg', 'dscg', 'université'],
                    'débutant' => ['débutant', 'debutant', 'initiation', 'bases', 'fondamentaux'],
                    'intermédiaire' => ['intermédiaire', 'intermediaire', 'perfectionnement'],
                    'avancé' => ['avancé', 'avance', 'expert', 'maîtrise'],
                ];
                foreach ($niveaux as $tagNiveau => $keywords) {
                    if (Str::contains($textToAnalyze, $keywords)) {
                        $tagsToInsert[] = ['type_tag' => 'niveau', 'valeur' => $tagNiveau];
                    }
                }

                // 4. Détecter la matière / domaine
                $matieres = [
                    'Mathématiques' => ['mathématiques', 'mathematiques', 'maths', 'algèbre', 'géométrie'],
                    'Français' => ['français', 'francais', 'grammaire', 'orthographe', 'littérature', 'lecture'],
                    'Anglais' => ['anglais', 'english', 'toefl', 'toeic'],
                    'Sciences' => ['physique', 'chimie', 'svt', 'biologie', 'sciences'],
                    'Informatique' => ['informatique', 'programmation', 'python', 'excel', 'bureautique', 'web', 'code'],
                    'Comptabilité' => ['comptabilité', 'comptabilite', 'gestion', 'finance', 'fiscalité'],
                    'Management' => ['management', 'leadership', 'ressources humaines', 'rh'],
                    'Sport' => ['sport', 'fitness', 'danse', 'yoga', 'gym'],
                    'Art & Création' => ['dessin', 'peinture', 'art', 'musique', 'créatif', 'couture'],
                ];
                foreach ($matieres as $tagMatiere => $keywords) {
                    if (Str::contains($textToAnalyze, $keywords)) {
                        $tagsToInsert[] = ['type_tag' => 'matiere', 'valeur' => $tagMatiere];
                    }
                }

                // 5. Détecter le lieu / format
                $lieu = mb_strtolower($cours->lieu ?? '');
                if (Str::contains($lieu . ' ' . $textToAnalyze, ['ligne', 'distance', 'zoom', 'visio', 'webinaire', 'online'])) {
                    $tagsToInsert[] = ['type_tag' => 'format', 'valeur' => 'en ligne'];
                }
                if (Str::contains($lieu . ' ' . $textToAnalyze, ['domicile', 'chez vous', 'à domicile'])) {
                    $tagsToInsert[] = ['type_tag' => 'format', 'valeur' => 'à domicile'];
                }
                if (Str::contains($lieu . ' ' . $textToAnalyze, ['centre', 'présentiel', 'salle', 'abidjan', 'plateau', 'cocody'])) {
                    $tagsToInsert[] = ['type_tag' => 'format', 'valeur' => 'en centre'];
                }

                // 6. Détecter la disponibilité (champs heure et texte)
                $heure = mb_strtolower($cours->heure ?? '');
                $dispos = [
                    'mercredi' => ['mercredi'],
                    'samedi' => ['samedi'],
                    'week-end' => ['week-end', 'weekend', 'samedi', 'dimanche'],
                    'soir' => ['soir', 'soirée', '18h', '19h', '20h'],
                    'vacances' => ['vacances', 'stage'],
                    'semaine' => ['semaine', 'lundi', 'mardi', 'jeudi', 'vendredi'],
                ];
                foreach ($dispos as $tagDispo => $keywords) {
                    if (Str::contains($heure . ' ' . $textToAnalyze, $keywords)) {
                        $tagsToInsert[] = ['type_tag' => 'disponibilite', 'valeur' => $tagDispo];
                    }
                }

                // 7. Enregistrer les tags sans doublons
                $existingTags = CoursDiagnosticTag::where('cours_id', $cours->id)
                    ->get()
                    ->groupBy('type_tag')
                    ->map(fn($group) => $group->pluck('valeur')->toArray())
                    ->toArray();

                foreach ($tagsToInsert as $tag) {
                    $type = $tag['type_tag'];
                    $val = $tag['valeur'];

                    if (!isset($existingTags[$type]) || !in_array($val, $existingTags[$type], true)) {
                        CoursDiagnosticTag::create([
                            'cours_id' => $cours->id,
                            'type_tag' => $type,
                            'valeur' => $val,
                            'est_suggere' => true,
                            'est_valide' => false,
                        ]);
                        $existingTags[$type][] = $val;
                    }
                }

                $bar->advance();
        };

        if ($limit) {
            foreach ($query->take($limit)->get() as $c) {
                $processCours($c);
            }
        } else {
            $query->chunk(300, function ($chunk) use ($processCours) {
                foreach ($chunk as $c) {
                    $processCours($c);
                }
            });
        }

        $bar->finish();
        $this->newLine();
        $this->info("Analyse terminée avec succès !");
        $this->info("{$activatedSoFar} cours échantillons ont été activés pour les tests immédiats.");
        $this->comment("Pour activer d'autres cours, rendez-vous dans le tableau de bord Superadmin (Diagnostics > Gestion des Cours).");

        return Command::SUCCESS;
    }

    /**
     * Crée un mapping initial intelligent entre les 30 formations existantes et les parcours.
     */
    protected function ensureDefaultFormationMapping(): void
    {
        $formations = Formation::all();
        if ($formations->isEmpty()) {
            return;
        }

        foreach ($formations as $formation) {
            $titre = mb_strtoupper($formation->titre);

            $parcours = 'formation'; // par défaut
            if (Str::contains($titre, ['SOUTIEN', 'SCOLAIRE', 'FRANÇAIS', 'MATHÉMATIQUES', 'LANGUES'])) {
                $parcours = 'scolaire';
            } elseif (Str::contains($titre, ['SPORT', 'LOISIRS', 'ART', 'CUISINE'])) {
                $parcours = 'activite_adulte';
            }

            FormationParcoursMapping::firstOrCreate([
                'formation_id' => $formation->id,
                'sous_formation_id' => null,
                'parcours' => $parcours,
            ]);

            // Pour certaines formations mixtes (Langues, Sport, Informatique), mapper aussi vers activité enfant
            if (Str::contains($titre, ['SPORT', 'ART', 'INFORMATIQUE', 'LANGUES'])) {
                FormationParcoursMapping::firstOrCreate([
                    'formation_id' => $formation->id,
                    'sous_formation_id' => null,
                    'parcours' => 'activite_enfant',
                ]);
            }
        }
    }
}
