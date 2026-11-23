<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Cours;
use App\Models\CoursDiagnosticSetting;
use App\Models\CoursDiagnosticTag;
use App\Models\DiagnosticConfig;
use App\Models\DiagnosticSession;
use App\Models\DiagnosticAnswer;
use App\Models\Formation;
use App\Models\FormationParcoursMapping;
use App\Models\Lead;
use App\Models\LeadActivity;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\QuestionRule;
use App\Models\RecommendationRule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DiagnosticSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedConfigs();
        $this->seedRecommendationRules();
        $this->seedFormationMapping();
        $this->seedQuestions();
        $this->seedDemoCourses();
        $this->seedDemoLeads();
    }

    protected function seedConfigs(): void
    {
        $configs = [
            [
                'cle' => 'titre_accroche',
                'valeur' => "Vous recherchez une solution pour vous, votre enfant ou toute la famille ? Répondez à quelques questions et découvrez gratuitement les activités, accompagnements ou formations qui pourraient vous correspondre.",
                'type' => 'string',
                'description' => "Titre d'accroche affiché en tête du modal diagnostic",
            ],
            [
                'cle' => 'delai_reaffichage_jours',
                'valeur' => '7',
                'type' => 'integer',
                'description' => "Délai en jours avant de réafficher automatiquement le diagnostic si le visiteur a cliqué sur 'Plus tard'",
            ],
            [
                'cle' => 'whatsapp_contact_number',
                'valeur' => '2250700000000',
                'type' => 'string',
                'description' => "Numéro WhatsApp pour le bouton de contact direct (avec indicatif pays, sans symboles)",
            ],
            [
                'cle' => 'whatsapp_default_message',
                'valeur' => "Bonjour MonProfChezMoi ! Je viens de réaliser mon diagnostic personnalisé sur votre site et je souhaite échanger avec un conseiller.",
                'type' => 'string',
                'description' => "Message pré-rempli dans le lien WhatsApp",
            ],
            [
                'cle' => 'indicatif_pays_defaut',
                'valeur' => '+225',
                'type' => 'string',
                'description' => "Indicatif téléphonique par défaut dans le formulaire de capture",
            ],
            [
                'cle' => 'module_actif',
                'valeur' => '1',
                'type' => 'boolean',
                'description' => "Activer ou désactiver globalement l'apparition du diagnostic sur le site",
            ],
            [
                'cle' => 'emails_notification',
                'valeur' => 'info@monprofchezmoi-ci.com,formation@monprofchezmoi-ci.com',
                'type' => 'string',
                'description' => "Adresses e-mails (séparées par virgule) recevant les alertes de nouveaux leads",
            ],
            [
                'cle' => 'score_minimum_recommandation',
                'valeur' => '25',
                'type' => 'integer',
                'description' => "Score de matching minimal en dessous duquel le statut 'aucune correspondance' est attribué",
            ],
        ];

        foreach ($configs as $cfg) {
            DiagnosticConfig::updateOrCreate(['cle' => $cfg['cle']], $cfg);
        }
    }

    protected function seedRecommendationRules(): void
    {
        $rules = [
            ['nom_critere' => 'Correspondance du Parcours', 'type_critere' => 'parcours', 'poids' => 30, 'est_obligatoire' => true, 'description' => 'Filtre obligatoire basé sur la formation et les tags de parcours'],
            ['nom_critere' => 'Domaine & Matière', 'type_critere' => 'domaine_matiere', 'poids' => 40, 'est_obligatoire' => false, 'description' => 'Correspondance exacte ou sémantique du domaine de formation ou de la matière'],
            ['nom_critere' => 'Niveau Scolaire ou Professionnel', 'type_critere' => 'niveau', 'poids' => 25, 'est_obligatoire' => false, 'description' => 'Adéquation du niveau (primaire, collège, lycée, débutant, etc.)'],
            ['nom_critere' => 'Disponibilités & Créneaux', 'type_critere' => 'disponibilite', 'poids' => 15, 'est_obligatoire' => false, 'description' => 'Compatibilité des jours et heures'],
            ['nom_critere' => 'Format Préféré', 'type_critere' => 'format', 'poids' => 10, 'est_obligatoire' => false, 'description' => 'En ligne, à domicile ou en centre'],
            ['nom_critere' => 'Objectif Visé', 'type_critere' => 'objectif', 'poids' => 10, 'est_obligatoire' => false, 'description' => 'Alignement avec l objectif principal du prospect'],
            ['nom_critere' => 'Mots-clés Complémentaires', 'type_critere' => 'mots_cles', 'poids' => 10, 'est_obligatoire' => false, 'description' => 'Recherche contextuelle dans titre, description, cible et objectif'],
        ];

        foreach ($rules as $r) {
            RecommendationRule::updateOrCreate(['type_critere' => $r['type_critere']], $r);
        }
    }

    protected function seedFormationMapping(): void
    {
        $formations = Formation::all();
        foreach ($formations as $f) {
            $titre = mb_strtoupper($f->titre);

            $parcours = 'formation';
            if (Str::contains($titre, ['SOUTIEN', 'SCOLAIRE', 'FRANÇAIS', 'MATHÉMATIQUES', 'LANGUES'])) {
                $parcours = 'scolaire';
            } elseif (Str::contains($titre, ['SPORT', 'LOISIRS', 'ART', 'CUISINE'])) {
                $parcours = 'activite_adulte';
            }

            FormationParcoursMapping::firstOrCreate([
                'formation_id' => $f->id,
                'sous_formation_id' => null,
                'parcours' => $parcours,
            ]);

            if (Str::contains($titre, ['SPORT', 'ART', 'INFORMATIQUE', 'LANGUES'])) {
                FormationParcoursMapping::firstOrCreate([
                    'formation_id' => $f->id,
                    'sous_formation_id' => null,
                    'parcours' => 'activite_enfant',
                ]);
            }
        }
    }

    protected function seedQuestions(): void
    {
        // -------------------------------------------------------------
        // QUESTION COMMUNE 1
        // -------------------------------------------------------------
        $q1 = Question::updateOrCreate(
            ['code_identifiant' => 'q_parcours'],
            [
                'parcours' => 'commun',
                'titre' => 'Que recherchez-vous aujourd\'hui ?',
                'description' => 'Choisissez la formule qui correspond à votre situation pour un diagnostic sur mesure.',
                'type_champ' => 'single_choice',
                'est_obligatoire' => true,
                'ordre' => 1,
                'est_actif' => true,
            ]
        );

        $q1Options = [
            ['label' => 'Un accompagnement scolaire', 'valeur' => 'scolaire', 'next_parcours' => 'scolaire', 'icone' => 'fas fa-graduation-cap', 'ordre' => 1],
            ['label' => 'Une formation pour moi', 'valeur' => 'formation', 'next_parcours' => 'formation', 'icone' => 'fas fa-user-tie', 'ordre' => 2],
            ['label' => 'Une formation pour mon entreprise / mes équipes', 'valeur' => 'formation_entreprise', 'next_parcours' => 'formation', 'icone' => 'fas fa-building', 'ordre' => 3],
            ['label' => 'Une activité pour mon enfant', 'valeur' => 'activite_enfant', 'next_parcours' => 'activite_enfant', 'icone' => 'fas fa-child', 'ordre' => 4],
            ['label' => 'Une activité pour moi', 'valeur' => 'activite_adulte', 'next_parcours' => 'activite_adulte', 'icone' => 'fas fa-heart', 'ordre' => 5],
            ['label' => 'Je ne sais pas encore, j\'ai besoin d\'être conseillé(e)', 'valeur' => 'indecis', 'next_parcours' => 'indecis', 'icone' => 'fas fa-compass', 'ordre' => 6],
        ];
        foreach ($q1Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $q1->id, 'valeur' => $opt['valeur']], $opt);
        }

        // -------------------------------------------------------------
        // PARCOURS A : ACCOMPAGNEMENT SCOLAIRE
        // -------------------------------------------------------------
        $qa1 = Question::updateOrCreate(
            ['code_identifiant' => 'q_scolaire_niveau'],
            [
                'parcours' => 'scolaire',
                'titre' => 'Quel est le niveau scolaire de l\'élève ?',
                'description' => 'Sélectionnez le cycle pour adapter les méthodes pédagogiques.',
                'type_champ' => 'single_choice',
                'est_obligatoire' => true,
                'ordre' => 2,
                'est_actif' => true,
            ]
        );
        $qa1Options = [
            ['label' => 'Primaire (CP au CM2)', 'valeur' => 'primaire', 'tag_type' => 'niveau', 'tag_valeur' => 'primaire', 'icone' => 'fas fa-pencil-alt', 'ordre' => 1],
            ['label' => 'Collège (6ème à la 3ème)', 'valeur' => 'collège', 'tag_type' => 'niveau', 'tag_valeur' => 'collège', 'icone' => 'fas fa-book-open', 'ordre' => 2],
            ['label' => 'Lycée (2nde, 1ère, Terminale)', 'valeur' => 'lycée', 'tag_type' => 'niveau', 'tag_valeur' => 'lycée', 'icone' => 'fas fa-university', 'ordre' => 3],
            ['label' => 'Études Supérieures / Prépa', 'valeur' => 'supérieur', 'tag_type' => 'niveau', 'tag_valeur' => 'supérieur', 'icone' => 'fas fa-award', 'ordre' => 4],
        ];
        foreach ($qa1Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qa1->id, 'valeur' => $opt['valeur']], $opt);
        }

        $qa2 = Question::updateOrCreate(
            ['code_identifiant' => 'q_scolaire_matieres'],
            [
                'parcours' => 'scolaire',
                'titre' => 'Quelles matières souhaitez-vous renforcer ?',
                'description' => 'Sélectionnez une ou plusieurs matières prioritaires.',
                'type_champ' => 'multiple_choice',
                'est_obligatoire' => true,
                'ordre' => 3,
                'est_actif' => true,
            ]
        );
        $qa2Options = [
            ['label' => 'Mathématiques', 'valeur' => 'Mathématiques', 'tag_type' => 'matiere', 'tag_valeur' => 'Mathématiques', 'icone' => 'fas fa-calculator', 'ordre' => 1],
            ['label' => 'Français / Expression', 'valeur' => 'Français', 'tag_type' => 'matiere', 'tag_valeur' => 'Français', 'icone' => 'fas fa-feather', 'ordre' => 2],
            ['label' => 'Anglais / Langues vivantes', 'valeur' => 'Anglais', 'tag_type' => 'matiere', 'tag_valeur' => 'Anglais', 'icone' => 'fas fa-globe', 'ordre' => 3],
            ['label' => 'Sciences (Physique-Chimie / SVT)', 'valeur' => 'Sciences', 'tag_type' => 'matiere', 'tag_valeur' => 'Sciences', 'icone' => 'fas fa-atom', 'ordre' => 4],
            ['label' => 'Informatique & Codage', 'valeur' => 'Informatique', 'tag_type' => 'matiere', 'tag_valeur' => 'Informatique', 'icone' => 'fas fa-laptop-code', 'ordre' => 5],
            ['label' => 'Toutes matières / Suivi global des devoirs', 'valeur' => 'Toutes matières', 'tag_type' => 'matiere', 'tag_valeur' => 'Général', 'icone' => 'fas fa-clipboard-list', 'ordre' => 6],
        ];
        foreach ($qa2Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qa2->id, 'valeur' => $opt['valeur']], $opt);
        }

        $qa3 = Question::updateOrCreate(
            ['code_identifiant' => 'q_scolaire_difficultes'],
            [
                'parcours' => 'scolaire',
                'titre' => 'Quelles sont les principales difficultés rencontrées ?',
                'description' => 'Ceci nous aide à définir l\'approche pédagogique la plus efficace.',
                'type_champ' => 'multiple_choice',
                'est_obligatoire' => false,
                'ordre' => 4,
                'est_actif' => true,
            ]
        );
        $qa3Options = [
            ['label' => 'Manque de méthode & d\'organisation', 'valeur' => 'méthode', 'icone' => 'fas fa-tasks', 'ordre' => 1],
            ['label' => 'Perte de confiance en soi', 'valeur' => 'confiance', 'icone' => 'fas fa-user-shield', 'ordre' => 2],
            ['label' => 'Lacunes accumulées dans les bases', 'valeur' => 'lacunes', 'icone' => 'fas fa-exclamation-triangle', 'ordre' => 3],
            ['label' => 'Notes en baisse récente', 'valeur' => 'notes', 'icone' => 'fas fa-chart-line', 'ordre' => 4],
            ['label' => 'Préparation d\'un examen (Brevet, Bac, Concours)', 'valeur' => 'examen', 'icone' => 'fas fa-award', 'ordre' => 5],
            ['label' => 'Manque de motivation ou distraction', 'valeur' => 'motivation', 'icone' => 'fas fa-bolt', 'ordre' => 6],
        ];
        foreach ($qa3Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qa3->id, 'valeur' => $opt['valeur']], $opt);
        }

        $qa4 = Question::updateOrCreate(
            ['code_identifiant' => 'q_scolaire_format'],
            [
                'parcours' => 'scolaire',
                'titre' => 'Quel format d\'accompagnement préférez-vous ?',
                'description' => 'Nos enseignants interviennent à domicile, en centre ou en visioconférence interactive.',
                'type_champ' => 'single_choice',
                'est_obligatoire' => true,
                'ordre' => 5,
                'est_actif' => true,
            ]
        );
        $qa4Options = [
            ['label' => 'À domicile (enseignant chez vous)', 'valeur' => 'à domicile', 'tag_type' => 'format', 'tag_valeur' => 'à domicile', 'icone' => 'fas fa-home', 'ordre' => 1],
            ['label' => 'En ligne (visioconférence interactive)', 'valeur' => 'en ligne', 'tag_type' => 'format', 'tag_valeur' => 'en ligne', 'icone' => 'fas fa-laptop', 'ordre' => 2],
            ['label' => 'En centre de formation', 'valeur' => 'en centre', 'tag_type' => 'format', 'tag_valeur' => 'en centre', 'icone' => 'fas fa-building', 'ordre' => 3],
            ['label' => 'Peu importe / À voir selon les conseils', 'valeur' => 'peu importe', 'tag_type' => 'format', 'tag_valeur' => '', 'icone' => 'fas fa-random', 'ordre' => 4],
        ];
        foreach ($qa4Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qa4->id, 'valeur' => $opt['valeur']], $opt);
        }

        $qa5 = Question::updateOrCreate(
            ['code_identifiant' => 'q_scolaire_dispo'],
            [
                'parcours' => 'scolaire',
                'titre' => 'Quelles sont vos disponibilités ?',
                'description' => 'Sélectionnez les moments idéaux pour les séances.',
                'type_champ' => 'multiple_choice',
                'est_obligatoire' => true,
                'ordre' => 6,
                'est_actif' => true,
            ]
        );
        $qa5Options = [
            ['label' => 'Mercredi après-midi', 'valeur' => 'mercredi', 'tag_type' => 'disponibilite', 'tag_valeur' => 'mercredi', 'icone' => 'fas fa-calendar-day', 'ordre' => 1],
            ['label' => 'Samedi', 'valeur' => 'samedi', 'tag_type' => 'disponibilite', 'tag_valeur' => 'samedi', 'icone' => 'fas fa-calendar-alt', 'ordre' => 2],
            ['label' => 'Dimanche', 'valeur' => 'dimanche', 'tag_type' => 'disponibilite', 'tag_valeur' => 'week-end', 'icone' => 'fas fa-sun', 'ordre' => 3],
            ['label' => 'En semaine après les cours (17h - 20h)', 'valeur' => 'soir', 'tag_type' => 'disponibilite', 'tag_valeur' => 'soir', 'icone' => 'fas fa-clock', 'ordre' => 4],
            ['label' => 'Pendant les vacances scolaires (stages intensifs)', 'valeur' => 'vacances', 'tag_type' => 'disponibilite', 'tag_valeur' => 'vacances', 'icone' => 'fas fa-umbrella-beach', 'ordre' => 5],
        ];
        foreach ($qa5Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qa5->id, 'valeur' => $opt['valeur']], $opt);
        }

        // -------------------------------------------------------------
        // PARCOURS B : FORMATION POUR MOI
        // -------------------------------------------------------------
        $qb1 = Question::updateOrCreate(
            ['code_identifiant' => 'q_formation_situation'],
            [
                'parcours' => 'formation',
                'titre' => 'Quelle est votre situation actuelle ?',
                'description' => 'Pour orienter vers des modules adaptés à votre statut et rythme.',
                'type_champ' => 'single_choice',
                'est_obligatoire' => true,
                'ordre' => 2,
                'est_actif' => true,
            ]
        );
        $qb1Options = [
            ['label' => 'Entreprise / DRH / Manager (formation pour mes équipes)', 'valeur' => 'entreprise', 'icone' => 'fas fa-building', 'ordre' => 1],
            ['label' => 'Chef d\'entreprise / Dirigeant', 'valeur' => 'dirigeant', 'icone' => 'fas fa-briefcase', 'ordre' => 2],
            ['label' => 'En emploi / Salarié(e) en poste', 'valeur' => 'en_emploi', 'icone' => 'fas fa-user-tie', 'ordre' => 3],
            ['label' => 'En recherche d\'emploi / En reconversion', 'valeur' => 'reconversion', 'icone' => 'fas fa-sync-alt', 'ordre' => 4],
            ['label' => 'Étudiant(e) / Jeune diplômé(e)', 'valeur' => 'etudiant', 'icone' => 'fas fa-user-graduate', 'ordre' => 5],
            ['label' => 'Entrepreneur / Indépendant', 'valeur' => 'entrepreneur', 'icone' => 'fas fa-lightbulb', 'ordre' => 6],
        ];
        foreach ($qb1Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qb1->id, 'valeur' => $opt['valeur']], $opt);
        }

        $qb2 = Question::updateOrCreate(
            ['code_identifiant' => 'q_formation_domaine'],
            [
                'parcours' => 'formation',
                'titre' => 'Quel domaine vous intéresse en priorité ?',
                'description' => 'Sélectionnez la filière professionnelle que vous souhaitez développer.',
                'type_champ' => 'dynamic_domain', // géré dynamiquement dans le composant avec les vraies formations !
                'est_obligatoire' => true,
                'ordre' => 3,
                'est_actif' => true,
            ]
        );

        $qb3 = Question::updateOrCreate(
            ['code_identifiant' => 'q_formation_niveau'],
            [
                'parcours' => 'formation',
                'titre' => 'Quel est votre niveau actuel dans ce domaine ?',
                'description' => 'Comparé aux prérequis techniques requis.',
                'type_champ' => 'single_choice',
                'est_obligatoire' => true,
                'ordre' => 4,
                'est_actif' => true,
            ]
        );
        $qb3Options = [
            ['label' => 'Débutant complet (découverte totale)', 'valeur' => 'débutant', 'tag_type' => 'niveau', 'tag_valeur' => 'débutant', 'icone' => 'fas fa-seedling', 'ordre' => 1],
            ['label' => 'Intermédiaire (notions de base à consolider)', 'valeur' => 'intermédiaire', 'tag_type' => 'niveau', 'tag_valeur' => 'intermédiaire', 'icone' => 'fas fa-layer-group', 'ordre' => 2],
            ['label' => 'Avancé (perfectionnement & expertise)', 'valeur' => 'avancé', 'tag_type' => 'niveau', 'tag_valeur' => 'avancé', 'icone' => 'fas fa-trophy', 'ordre' => 3],
        ];
        foreach ($qb3Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qb3->id, 'valeur' => $opt['valeur']], $opt);
        }

        $qb4 = Question::updateOrCreate(
            ['code_identifiant' => 'q_formation_objectif'],
            [
                'parcours' => 'formation',
                'titre' => 'Quel est votre objectif principal ?',
                'description' => 'Quel résultat attendez-vous de cette formation ?',
                'type_champ' => 'single_choice',
                'est_obligatoire' => true,
                'ordre' => 5,
                'est_actif' => true,
            ]
        );
        $qb4Options = [
            ['label' => 'Former et monter en compétences mes collaborateurs', 'valeur' => 'equipe', 'icone' => 'fas fa-users', 'ordre' => 1],
            ['label' => 'Optimiser la performance et l\'organisation de mon entreprise', 'valeur' => 'performance_entreprise', 'icone' => 'fas fa-chart-line', 'ordre' => 2],
            ['label' => 'Évoluer dans mon poste actuel / Promotion', 'valeur' => 'promotion', 'icone' => 'fas fa-trophy', 'ordre' => 3],
            ['label' => 'Changer de métier / Me reconvertir', 'valeur' => 'reconversion', 'icone' => 'fas fa-exchange-alt', 'ordre' => 4],
            ['label' => 'Lancer mon entreprise / Développer une activité', 'valeur' => 'creer_activite', 'icone' => 'fas fa-rocket', 'ordre' => 5],
            ['label' => 'Acquérir une compétence concrète rapidement', 'valeur' => 'competence', 'icone' => 'fas fa-check-circle', 'ordre' => 6],
            ['label' => 'Passion personnelle & culture', 'valeur' => 'passion', 'icone' => 'fas fa-heart', 'ordre' => 7],
        ];
        foreach ($qb4Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qb4->id, 'valeur' => $opt['valeur']], $opt);
        }

        $qb5 = Question::updateOrCreate(
            ['code_identifiant' => 'q_formation_format'],
            [
                'parcours' => 'formation',
                'titre' => 'Quel format d\'apprentissage vous convient le mieux ?',
                'description' => '',
                'type_champ' => 'single_choice',
                'est_obligatoire' => true,
                'ordre' => 6,
                'est_actif' => true,
            ]
        );
        $qb5Options = [
            ['label' => 'Formation intra-entreprise (sur mesure, dans nos locaux)', 'valeur' => 'en entreprise', 'tag_type' => 'format', 'tag_valeur' => 'en entreprise', 'icone' => 'fas fa-building', 'ordre' => 1],
            ['label' => 'Présentiel en centre de formation (inter-entreprises)', 'valeur' => 'en centre', 'tag_type' => 'format', 'tag_valeur' => 'en centre', 'icone' => 'fas fa-users', 'ordre' => 2],
            ['label' => '100% En ligne (flexible, le soir ou le week-end)', 'valeur' => 'en ligne', 'tag_type' => 'format', 'tag_valeur' => 'en ligne', 'icone' => 'fas fa-laptop', 'ordre' => 3],
            ['label' => 'Coaching individuel personnalisé', 'valeur' => 'individuel', 'tag_type' => 'format', 'tag_valeur' => 'individuel', 'icone' => 'fas fa-user-check', 'ordre' => 4],
        ];
        foreach ($qb5Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qb5->id, 'valeur' => $opt['valeur']], $opt);
        }

        // -------------------------------------------------------------
        // PARCOURS C : ACTIVITÉ POUR MON ENFANT
        // -------------------------------------------------------------
        $qc1 = Question::updateOrCreate(
            ['code_identifiant' => 'q_activite_enfant_age'],
            [
                'parcours' => 'activite_enfant',
                'titre' => 'Quel est l\'âge de votre enfant ?',
                'description' => 'Pour lui proposer des activités adaptées à sa tranche d\'âge.',
                'type_champ' => 'single_choice',
                'est_obligatoire' => true,
                'ordre' => 2,
                'est_actif' => true,
            ]
        );
        $qc1Options = [
            ['label' => '3 à 6 ans (Petite enfance & éveil)', 'valeur' => '3-6 ans', 'tag_type' => 'tranche_age', 'tag_valeur' => '3-6 ans', 'icone' => 'fas fa-baby', 'ordre' => 1],
            ['label' => '7 à 10 ans (Primaire & découverte)', 'valeur' => '7-10 ans', 'tag_type' => 'tranche_age', 'tag_valeur' => '7-10 ans', 'icone' => 'fas fa-child', 'ordre' => 2],
            ['label' => '11 à 14 ans (Collège & pré-ados)', 'valeur' => '11-14 ans', 'tag_type' => 'tranche_age', 'tag_valeur' => '11-14 ans', 'icone' => 'fas fa-user', 'ordre' => 3],
            ['label' => '15 à 18 ans (Ados & préparation)', 'valeur' => '15-18 ans', 'tag_type' => 'tranche_age', 'tag_valeur' => '15-18 ans', 'icone' => 'fas fa-user-friends', 'ordre' => 4],
        ];
        foreach ($qc1Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qc1->id, 'valeur' => $opt['valeur']], $opt);
        }

        $qc2 = Question::updateOrCreate(
            ['code_identifiant' => 'q_activite_enfant_interets'],
            [
                'parcours' => 'activite_enfant',
                'titre' => 'Quels centres d\'intérêt souhaitez-vous stimuler ?',
                'description' => 'Choisissez une ou plusieurs thématiques d\'éveil.',
                'type_champ' => 'multiple_choice',
                'est_obligatoire' => true,
                'ordre' => 3,
                'est_actif' => true,
            ]
        );
        $qc2Options = [
            ['label' => 'Arts plastiques & Créativité (Dessin, Peinture)', 'valeur' => 'Art & Création', 'tag_type' => 'centre_interet', 'tag_valeur' => 'Art & Création', 'icone' => 'fas fa-paint-brush', 'ordre' => 1],
            ['label' => 'Sport, Motricité & Énergie', 'valeur' => 'Sport', 'tag_type' => 'centre_interet', 'tag_valeur' => 'Sport', 'icone' => 'fas fa-running', 'ordre' => 2],
            ['label' => 'Codage, Robotique & Numérique', 'valeur' => 'Informatique', 'tag_type' => 'centre_interet', 'tag_valeur' => 'Informatique', 'icone' => 'fas fa-robot', 'ordre' => 3],
            ['label' => 'Langues & Éveil bilingue (Anglais)', 'valeur' => 'Anglais', 'tag_type' => 'centre_interet', 'tag_valeur' => 'Anglais', 'icone' => 'fas fa-comments', 'ordre' => 4],
            ['label' => 'Musique & Rythme', 'valeur' => 'Musique', 'tag_type' => 'centre_interet', 'tag_valeur' => 'Musique', 'icone' => 'fas fa-music', 'ordre' => 5],
        ];
        foreach ($qc2Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qc2->id, 'valeur' => $opt['valeur']], $opt);
        }

        $qc3 = Question::updateOrCreate(
            ['code_identifiant' => 'q_activite_enfant_dispo'],
            [
                'parcours' => 'activite_enfant',
                'titre' => 'Quels jours vous arrangent le plus ?',
                'description' => '',
                'type_champ' => 'multiple_choice',
                'est_obligatoire' => true,
                'ordre' => 4,
                'est_actif' => true,
            ]
        );
        $qc3Options = [
            ['label' => 'Mercredi après-midi', 'valeur' => 'mercredi', 'tag_type' => 'disponibilite', 'tag_valeur' => 'mercredi', 'icone' => 'fas fa-calendar-day', 'ordre' => 1],
            ['label' => 'Samedi', 'valeur' => 'samedi', 'tag_type' => 'disponibilite', 'tag_valeur' => 'samedi', 'icone' => 'fas fa-calendar-alt', 'ordre' => 2],
            ['label' => 'Dimanche', 'valeur' => 'dimanche', 'tag_type' => 'disponibilite', 'tag_valeur' => 'week-end', 'icone' => 'fas fa-sun', 'ordre' => 3],
            ['label' => 'Pendant les vacances scolaires', 'valeur' => 'vacances', 'tag_type' => 'disponibilite', 'tag_valeur' => 'vacances', 'icone' => 'fas fa-campground', 'ordre' => 4],
        ];
        foreach ($qc3Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qc3->id, 'valeur' => $opt['valeur']], $opt);
        }

        // -------------------------------------------------------------
        // PARCOURS D : ACTIVITÉ POUR MOI
        // -------------------------------------------------------------
        $qd1 = Question::updateOrCreate(
            ['code_identifiant' => 'q_activite_adulte_type'],
            [
                'parcours' => 'activite_adulte',
                'titre' => 'Quel type d\'activité recherchez-vous pour vous ?',
                'description' => 'Pour votre temps libre, épanouissement ou bien-être.',
                'type_champ' => 'single_choice',
                'est_obligatoire' => true,
                'ordre' => 2,
                'est_actif' => true,
            ]
        );
        $qd1Options = [
            ['label' => 'Bien-être, Yoga, Remise en forme', 'valeur' => 'Sport', 'tag_type' => 'matiere', 'tag_valeur' => 'Sport', 'icone' => 'fas fa-spa', 'ordre' => 1],
            ['label' => 'Créativité, Peinture, Décoration', 'valeur' => 'Art & Création', 'tag_type' => 'matiere', 'tag_valeur' => 'Art & Création', 'icone' => 'fas fa-palette', 'ordre' => 2],
            ['label' => 'Cuisine & Techniques culinaires', 'valeur' => 'Cuisine', 'tag_type' => 'matiere', 'tag_valeur' => 'Cuisine', 'icone' => 'fas fa-utensils', 'ordre' => 3],
            ['label' => 'Pratique d\'une langue étrangère', 'valeur' => 'Langues', 'tag_type' => 'matiere', 'tag_valeur' => 'Langues', 'icone' => 'fas fa-language', 'ordre' => 4],
        ];
        foreach ($qd1Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qd1->id, 'valeur' => $opt['valeur']], $opt);
        }

        $qd2 = Question::updateOrCreate(
            ['code_identifiant' => 'q_activite_adulte_dispo'],
            [
                'parcours' => 'activite_adulte',
                'titre' => 'Vos créneaux préférés ?',
                'description' => '',
                'type_champ' => 'multiple_choice',
                'est_obligatoire' => true,
                'ordre' => 3,
                'est_actif' => true,
            ]
        );
        $qd2Options = [
            ['label' => 'En soirée (18h30 - 21h)', 'valeur' => 'soir', 'tag_type' => 'disponibilite', 'tag_valeur' => 'soir', 'icone' => 'fas fa-moon', 'ordre' => 1],
            ['label' => 'Le samedi matin ou après-midi', 'valeur' => 'samedi', 'tag_type' => 'disponibilite', 'tag_valeur' => 'samedi', 'icone' => 'fas fa-calendar-day', 'ordre' => 2],
            ['label' => 'Le dimanche', 'valeur' => 'dimanche', 'tag_type' => 'disponibilite', 'tag_valeur' => 'week-end', 'icone' => 'fas fa-coffee', 'ordre' => 3],
        ];
        foreach ($qd2Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qd2->id, 'valeur' => $opt['valeur']], $opt);
        }

        // -------------------------------------------------------------
        // PARCOURS E : « JE NE SAIS PAS ENCORE » (TRANSVERSAL)
        // -------------------------------------------------------------
        $qe1 = Question::updateOrCreate(
            ['code_identifiant' => 'q_indecis_cible'],
            [
                'parcours' => 'indecis',
                'titre' => 'Pour qui cherchez-vous une solution aujourd\'hui ?',
                'description' => 'Commençons par cerner la personne concernée.',
                'type_champ' => 'single_choice',
                'est_obligatoire' => true,
                'ordre' => 2,
                'est_actif' => true,
            ]
        );
        $qe1Options = [
            ['label' => 'Pour mon enfant (scolarité, activités d\'éveil)', 'valeur' => 'enfant', 'icone' => 'fas fa-child', 'ordre' => 1],
            ['label' => 'Pour moi-même (formation, compétences, loisir)', 'valeur' => 'moi', 'icone' => 'fas fa-user', 'ordre' => 2],
            ['label' => 'Pour toute la famille (formule groupée)', 'valeur' => 'famille', 'icone' => 'fas fa-users', 'ordre' => 3],
        ];
        foreach ($qe1Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qe1->id, 'valeur' => $opt['valeur']], $opt);
        }

        $qe2 = Question::updateOrCreate(
            ['code_identifiant' => 'q_indecis_preoccupation'],
            [
                'parcours' => 'indecis',
                'titre' => 'Qu\'est-ce qui vous préoccupe le plus en ce moment ?',
                'description' => '',
                'type_champ' => 'single_choice',
                'est_obligatoire' => true,
                'ordre' => 3,
                'est_actif' => true,
            ]
        );
        $qe2Options = [
            ['label' => 'Des résultats scolaires ou un examen à réussir', 'valeur' => 'scolaire', 'icone' => 'fas fa-graduation-cap', 'ordre' => 1],
            ['label' => 'Un besoin de booster ma carrière ou mon activité', 'valeur' => 'formation', 'icone' => 'fas fa-briefcase', 'ordre' => 2],
            ['label' => 'Trouver une passion ou une activité épanouissante', 'valeur' => 'activite', 'icone' => 'fas fa-heart', 'ordre' => 3],
        ];
        foreach ($qe2Options as $opt) {
            QuestionOption::updateOrCreate(['question_id' => $qe2->id, 'valeur' => $opt['valeur']], $opt);
        }
    }

    protected function seedDemoCourses(): void
    {
        // On sélectionne quelques vrais cours existants et on leur active le diagnostic avec de bons tags
        $sampleCourses = Cours::take(10)->get();

        foreach ($sampleCourses as $idx => $c) {
            CoursDiagnosticSetting::updateOrCreate(
                ['cours_id' => $c->id],
                [
                    'actif_diagnostic' => true,
                    'priorite' => 10 - $idx,
                    'message_recommandation' => "Recommandé spécialement pour vos objectifs : ce cours complet assure une prise en charge sur mesure avec suivi hebdomadaire.",
                ]
            );

            // Tags selon le type
            $parcours = ($idx % 3 === 0) ? 'scolaire' : (($idx % 3 === 1) ? 'formation' : 'activite_enfant');
            $niveau = ($idx % 2 === 0) ? 'collège' : 'débutant';
            $matiere = ($idx % 2 === 0) ? 'Mathématiques' : 'Informatique';

            CoursDiagnosticTag::updateOrCreate(
                ['cours_id' => $c->id, 'type_tag' => 'parcours', 'valeur' => $parcours],
                ['est_suggere' => false, 'est_valide' => true]
            );
            CoursDiagnosticTag::updateOrCreate(
                ['cours_id' => $c->id, 'type_tag' => 'niveau', 'valeur' => $niveau],
                ['est_suggere' => false, 'est_valide' => true]
            );
            CoursDiagnosticTag::updateOrCreate(
                ['cours_id' => $c->id, 'type_tag' => 'matiere', 'valeur' => $matiere],
                ['est_suggere' => false, 'est_valide' => true]
            );
            CoursDiagnosticTag::updateOrCreate(
                ['cours_id' => $c->id, 'type_tag' => 'format', 'valeur' => 'en ligne'],
                ['est_suggere' => false, 'est_valide' => true]
            );
            CoursDiagnosticTag::updateOrCreate(
                ['cours_id' => $c->id, 'type_tag' => 'disponibilite', 'valeur' => 'mercredi'],
                ['est_suggere' => false, 'est_valide' => true]
            );
        }
    }

    protected function seedDemoLeads(): void
    {
        $admin = Admin::first();
        $cours = Cours::whereHas('diagnosticSetting', fn($q) => $q->where('actif_diagnostic', true))->first();

        $demoLeads = [
            [
                'prenom' => 'Kouamé',
                'telephone' => '+225 07 48 92 10 33',
                'email' => 'kouame.jean@gmail.com',
                'moyen_contact_prefere' => 'whatsapp',
                'creneau_rappel' => 'Matinée (9h - 12h)',
                'consentement' => true,
                'consentement_date' => Carbon::now()->subHours(2),
                'texte_recommandation' => "Votre enfant semble avoir besoin d'un accompagnement en Mathématiques 2 fois par semaine avec un suivi méthodologique.",
                'cours_recommande_id' => $cours?->id,
                'titre_cours_recommande' => $cours?->titre ?? 'Soutien Scolaire Mathématiques Collège',
                'statut' => 'nouveau',
                'assigned_to' => $admin?->id,
                'notes_internes' => 'Prospect très intéressé, souhaite démarrer mercredi prochain.',
                'created_at' => Carbon::now()->subMinutes(35),
            ],
            [
                'prenom' => 'Aïssata',
                'telephone' => '+225 05 12 34 56 78',
                'email' => 'aissata.b@yahoo.fr',
                'moyen_contact_prefere' => 'appel',
                'creneau_rappel' => 'Après-midi (14h - 18h)',
                'consentement' => true,
                'consentement_date' => Carbon::now()->subDays(1),
                'texte_recommandation' => "Formation professionnelle idéale pour maîtriser le développement web et acquérir des compétences pratiques rapidement.",
                'cours_recommande_id' => $cours?->id,
                'titre_cours_recommande' => $cours?->titre ?? 'Formation Web & Développement',
                'statut' => 'contacte',
                'assigned_to' => $admin?->id,
                'notes_internes' => 'Premier appel effectué : devis envoyé par WhatsApp.',
                'created_at' => Carbon::now()->subDays(1),
            ],
            [
                'prenom' => 'Marc',
                'telephone' => '+225 01 98 76 54 32',
                'email' => 'marc.kouassi@outlook.com',
                'moyen_contact_prefere' => 'whatsapp',
                'creneau_rappel' => 'Soirée (18h - 20h)',
                'consentement' => true,
                'consentement_date' => Carbon::now()->subDays(3),
                'texte_recommandation' => "Activité créative et stimulante pour le développement de l'enfant le samedi matin.",
                'cours_recommande_id' => $cours?->id,
                'titre_cours_recommande' => $cours?->titre ?? 'Éveil & Robotique Enfant',
                'statut' => 'converti',
                'assigned_to' => $admin?->id,
                'notes_internes' => 'Inscription finalisée et payée.',
                'created_at' => Carbon::now()->subDays(3),
            ],
        ];

        foreach ($demoLeads as $leadData) {
            // Créer session fictive correspondante
            $session = DiagnosticSession::create([
                'session_token' => Str::random(32),
                'statut' => 'termine',
                'parcours_choisi' => 'scolaire',
                'date_debut' => $leadData['created_at']->copy()->subMinutes(3),
                'date_fin' => $leadData['created_at'],
                'derniere_question_atteinte' => 'resultats',
                'utm_source' => 'facebook',
                'utm_medium' => 'cpc',
                'appareil' => 'mobile',
            ]);

            $leadData['session_id'] = $session->id;
            $lead = Lead::create($leadData);

            // Enregistrer quelques réponses de démo
            DiagnosticAnswer::create([
                'session_id' => $session->id,
                'question_id' => null,
                'question_identifier' => 'q_parcours',
                'question_label' => 'Que recherchez-vous aujourd\'hui ?',
                'reponse' => 'scolaire',
            ]);
            DiagnosticAnswer::create([
                'session_id' => $session->id,
                'question_id' => null,
                'question_identifier' => 'q_scolaire_niveau',
                'question_label' => 'Quel est le niveau scolaire ?',
                'reponse' => 'collège',
            ]);
            DiagnosticAnswer::create([
                'session_id' => $session->id,
                'question_id' => null,
                'question_identifier' => 'q_scolaire_matieres',
                'question_label' => 'Matières concernées',
                'reponse' => json_encode(['Mathématiques', 'Français']),
            ]);

            // Enregistrer une activité
            LeadActivity::create([
                'lead_id' => $lead->id,
                'admin_id' => $admin?->id,
                'auteur_nom' => 'Système',
                'type_action' => 'creation',
                'details' => 'Lead créé via le questionnaire de diagnostic en ligne.',
                'created_at' => $lead->created_at,
            ]);

            if ($lead->statut === 'contacte') {
                LeadActivity::create([
                    'lead_id' => $lead->id,
                    'admin_id' => $admin?->id,
                    'auteur_nom' => $admin?->name ?? 'Admin',
                    'type_action' => 'appel',
                    'details' => 'Appel téléphonique effectué avec le prospect. Présentation du programme.',
                    'created_at' => $lead->created_at->copy()->addHours(2),
                ]);
            }
        }
    }
}
