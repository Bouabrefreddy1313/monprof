<?php

namespace App\Services;

use App\Models\Formation;
use App\Models\SousFormation;
use App\Models\Cours;
use App\Models\Contact;
use App\Models\KnowledgeBase;

class EnhancedChatbotService
{
    private $contentIndexer;

    private $keywords = [
        'prix' => ['prix','cout','coût','tarif','combien','cher','fcfa','argent','paiement','payer','euros','tarifs','coute','coûte'],
        'contact' => ['contact','telephone','téléphone','email','adresse','joindre','appeler','trouver','localisation','situé'],
        'inscription' => ['inscrire','inscription','comment','procedure','procédure','etape','étape','commencer','debuter','démarrer','rejoindre'],
        'horaire' => ['horaire','heure','quand','date','planning','jour','temps','calendrier','emploi','disponible','disponibilité'],
        'formation' => ['formation','cours','apprendre','etude','étude','programme','proposez','offrez','avez','domaine','specialite','spécialité'],
        'duree' => ['duree','durée','long','mois','semaine','trimestre','annee','année','temps','session'],
        'niveau' => ['niveau','debutant','débutant','intermediaire','intermédiaire','avance','avancé','expert'],
        'age' => ['age','âge','ados','adolescent','jeune'],
        'certification' => ['certification','certificat','diplome','diplôme','attestation','reconnaissance','officiel'],
        'formateur' => ['formateur','professeur','enseignant','coach','instructeur','intervenant','prof'],
        'lieu' => ['lieu','localisation','adresse','endroit','salle','classe','site','ou','location']
    ];

    public function __construct(ContentIndexerService $contentIndexer)
    {
        $this->contentIndexer = $contentIndexer;
    }

    public function findAnswer(string $question): array
    {
        $q = $this->normalizeText($question);
        $words = $this->extractKeywords($q);

        if (empty($q) || empty($words)) {
            return ['type' => 'fallback', 'message' => "Je n'ai pas compris votre question.", 'suggestions' => $this->getSuggestions(), 'confidence' => 0];
        }

        // Intentions simples (contact, inscription, horaire, prix général)
        $r = $this->checkSimpleIntents($q, $words);
        if ($r) return $r;

        // Recherche dans les services extrascolaires, soutien scolaire & accompagnements
        $services = $this->searchServices($q, $words);
        if ($services) return $services;

        // Recherche de formations par mot-clé dans le titre
        $formations = $this->searchFormations($q, $words);
        if ($formations) return $formations;

        // Recherche dans les cours
        $coursResult = $this->searchCours($q, $words);
        if ($coursResult) return $coursResult;

        // Base de connaissances
        $kb = $this->searchKB($q, $words);
        if ($kb) return $kb;

        return $this->fallback($q, $words);
    }

    // ===== RECHERCHE SERVICES EXTRASCOLAIRES & ACCOMPAGNEMENTS =====

    /**
     * Définit tous les services (extrascolaire, accompagnement, soutien) accessibles sur le site.
     * Ces données proviennent des vues/pages du site.
     */
    private function getAllServices(): array
    {
        return [
            // === EXTRASCOLAIRE ===
            [
                'categorie' => 'Extrascolaire',
                'titre' => 'Musique et chant',
                'slug' => 'musique',
                'url' => url('/musique'),
                'public' => 'Enfants et adultes',
                'description' => 'Cours de musique : piano, guitare, chant, solfège. Éveil musical pour enfants.',
                'mots_cles' => ['musique', 'chant', 'piano', 'guitare', 'solfège', 'éveil musical', 'instrument', 'chanteur']
            ],
            [
                'categorie' => 'Extrascolaire',
                'titre' => 'Coaching sportif à domicile',
                'slug' => 'sportif',
                'url' => url('/sportif'),
                'public' => 'Adultes et enfants',
                'description' => 'Coaching sportif personnalisé à domicile : fitness, musculation, remise en forme.',
                'mots_cles' => ['sport', 'coaching sportif', 'fitness', 'musculation', 'remise en forme', 'perte poids', 'entraînement']
            ],
            [
                'categorie' => 'Extrascolaire',
                'titre' => 'Sports pour enfants',
                'slug' => 'sport-enfant',
                'url' => url('/sportenf'),
                'public' => 'Enfants',
                'description' => 'Activités sportives pour enfants : découverte, éveil sportif, coordination.',
                'mots_cles' => ['sport enfant', 'enfant sport', 'éveil sportif', 'activité sportive enfant']
            ],
            [
                'categorie' => 'Extrascolaire',
                'titre' => 'Les petits bilingues',
                'slug' => 'petit',
                'url' => url('/petit'),
                'public' => 'Enfants',
                'description' => 'Cours de langues étrangères pour enfants : anglais, initiation linguistique.',
                'mots_cles' => ['bilingue', 'langue enfant', 'anglais enfant', 'petit bilingue', 'langue étrangère enfant']
            ],
            [
                'categorie' => 'Extrascolaire',
                'titre' => 'Bouge ta grammaire',
                'slug' => 'bouge',
                'url' => url('/bouge'),
                'public' => 'Enfants',
                'description' => 'Français ludique : apprendre la grammaire en s\'amusant, ateliers interactifs.',
                'mots_cles' => ['grammaire', 'français ludique', 'orthographe', 'jeu éducatif', 'atelier français']
            ],
            // === SOUTIEN SCOLAIRE ===
            [
                'categorie' => 'Soutien scolaire',
                'titre' => 'Soutien scolaire Primaire',
                'slug' => 'primaire',
                'url' => url('/primaire'),
                'public' => 'CP, CE1, CE2, CM1, CM2',
                'description' => 'Soutien scolaire toutes matières pour le primaire. Accompagnement personnalisé.',
                'mots_cles' => ['primaire', 'cp', 'ce1', 'ce2', 'cm1', 'cm2', 'soutien primaire', 'école primaire']
            ],
            [
                'categorie' => 'Soutien scolaire',
                'titre' => 'Soutien scolaire Collège',
                'slug' => 'soutien-college',
                'url' => url('/soutien-collège'),
                'public' => '6ème à 3ème',
                'description' => 'Soutien scolaire par matière pour le collège. Préparation aux examens.',
                'mots_cles' => ['collège', 'college', '6eme', '5eme', '4eme', '3eme', 'soutien collège']
            ],
            [
                'categorie' => 'Soutien scolaire',
                'titre' => 'Préparation au Brevet',
                'slug' => 'soutien-brevet',
                'url' => url('/soutien-brevet'),
                'public' => '3ème',
                'description' => 'Préparation structurée pour réussir le Brevet des collèges.',
                'mots_cles' => ['brevet', 'dnb', 'examen', 'préparation brevet', '3eme']
            ],
            [
                'categorie' => 'Soutien scolaire',
                'titre' => 'Soutien aux études supérieures',
                'slug' => 'soutien-superieur',
                'url' => url('/soutien-superieur'),
                'public' => 'Étudiants',
                'description' => 'Accompagnement pour les études supérieures : remise à niveau, préparation examens, mémoire.',
                'mots_cles' => ['supérieur', 'superieur', 'université', 'fac', 'étude supérieure', 'licence', 'master', 'mémoire']
            ],
            // === ACCOMPAGNEMENT ===
            [
                'categorie' => 'Accompagnement',
                'titre' => 'Orientation en Seconde',
                'slug' => 'seconde',
                'url' => url('/seconde'),
                'public' => 'Seconde',
                'description' => 'Accompagnement à l\'orientation pour les élèves de Seconde. Choix des spécialités.',
                'mots_cles' => ['seconde', 'orientation seconde', 'spécialité', 'choix orientation']
            ],
            [
                'categorie' => 'Accompagnement',
                'titre' => 'Orientation en Première',
                'slug' => 'premiere',
                'url' => url('/premiere'),
                'public' => 'Première',
                'description' => 'Accompagnement à l\'orientation pour les élèves de Première. Projet post-Bac.',
                'mots_cles' => ['première', 'premiere', 'orientation première', 'post-bac', 'parcoursup']
            ],
            [
                'categorie' => 'Accompagnement',
                'titre' => 'Orientation en Terminale',
                'slug' => 'terminale',
                'url' => url('/terminale'),
                'public' => 'Terminale',
                'description' => 'Accompagnement à l\'orientation pour les élèves de Terminale. Projet d\'études supérieures.',
                'mots_cles' => ['terminale', 'terminal', 'orientation terminale', 'post bac', 'parcoursup', 'bac']
            ],
            [
                'categorie' => 'Accompagnement',
                'titre' => 'Préparation aux oraux et entretiens',
                'slug' => 'reussir',
                'url' => url('/reussir'),
                'public' => 'Tous niveaux',
                'description' => 'Préparation aux oraux d\'admission, entretiens de stage, concours.',
                'mots_cles' => ['oral', 'entretien', 'admission', 'stage', 'concours', 'expression orale', 'confiance']
            ],
            [
                'categorie' => 'Accompagnement',
                'titre' => 'Coaching scolaire',
                'slug' => 'coaching',
                'url' => url('/coaching'),
                'public' => 'Tous niveaux',
                'description' => 'Coaching scolaire personnalisé : motivation, organisation, méthodes de travail.',
                'mots_cles' => ['coaching scolaire', 'motivation', 'organisation', 'méthode travail', 'accompagnement scolaire']
            ],
            [
                'categorie' => 'Accompagnement',
                'titre' => 'Accompagnement DYS',
                'slug' => 'accompagnement',
                'url' => url('/accompagnement'),
                'public' => 'Élèves DYS',
                'description' => 'Méthodes adaptées pour les élèves avec troubles DYS (dyslexie, dyspraxie, etc.).',
                'mots_cles' => ['dys', 'dyslexie', 'dyspraxie', 'trouble apprentissage', 'accompagnement dys']
            ],
            [
                'categorie' => 'Accompagnement',
                'titre' => 'Méthodologie et organisation',
                'slug' => 'methode',
                'url' => url('/methode'),
                'public' => 'Tous niveaux',
                'description' => 'Méthodologie pour mieux apprendre, s\'organiser et gagner en autonomie.',
                'mots_cles' => ['méthodologie', 'méthode', 'organisation', 'autonomie', 'apprendre', 'révision']
            ],
            [
                'categorie' => 'Accompagnement',
                'titre' => 'Orientation aux études supérieures',
                'slug' => 'orientation-superieur',
                'url' => url('/orientation-superieur'),
                'public' => 'Étudiants',
                'description' => 'Accompagnement à l\'orientation dans les études supérieures : choix de filière, projet professionnel.',
                'mots_cles' => ['orientation supérieur', 'filière', 'choix étude', 'projet professionnel']
            ],
        ];
    }

    private function searchServices(string $q, array $words): ?array
    {
        $services = $this->getAllServices();
        $results = [];

        foreach ($services as $s) {
            $titre = strtolower($s['titre'] ?? '');
            $desc = strtolower($s['description'] ?? '');
            $motsCles = array_map('strtolower', $s['mots_cles']);
            $categorie = strtolower($s['categorie'] ?? '');
            $public = strtolower($s['public'] ?? '');

            $searchable = $titre . ' ' . $desc . ' ' . $categorie . ' ' . $public . ' ' . implode(' ', $motsCles);

            $score = 0;
            $directMatch = false;

            foreach ($words as $w) {
                // Match direct dans le titre = très fort
                if (str_contains($titre, $w)) {
                    $score += 10;
                    $directMatch = true;
                }
                // Match dans description ou mots-clés
                if (str_contains($searchable, $w)) {
                    $score += 2;
                }
            }

            // Match public cible
            $publicWords = ['enfant', 'adulte', 'terminale', 'première', 'seconde', 'primaire', 'collège', 'college', '3eme', 'etudiant'];
            foreach ($publicWords as $pw) {
                if (in_array($pw, $words) && str_contains($public, $pw)) {
                    $score += 3;
                }
            }

            // Accepter si match direct ou score suffisant
            if ($directMatch || $score >= 1) {
                $results[] = [
                    'service' => $s,
                    'score' => $score
                ];
            }
        }

        if (count($results) > 0) {
            usort($results, fn($a, $b) => $b['score'] <=> $a['score']);
            $results = array_slice($results, 0, 4);

            // Construire le message
            $hasPrix = false;
            foreach ($words as $w) {
                if (in_array($w, $this->keywords['prix'])) {
                    $hasPrix = true;
                    break;
                }
            }

            // Si question prix + service spécifique trouvé : donner le tarif
            if ($hasPrix && count($results) >= 1) {
                $s = $results[0]['service']; // Le meilleur match
                $formationName = match($s['slug']) {
                    'musique' => 'ART',
                    'sportif', 'sport-enfant' => 'SPORT ET LOISIRS',
                    'petit' => 'LANGUES',
                    'bouge' => 'FRANÇAIS',
                    'primaire' => 'PRIMAIRE',
                    'soutien-college' => 'COLLÈGE',
                    'soutien-brevet' => 'BREVET',
                    'soutien-superieur' => 'SUPÉRIEUR',
                    default => null,
                };

                if ($formationName) {
                    $formation = Formation::where('titre', $formationName)->first();
                    if ($formation) {
                        $prixMin = $this->getPrixMin($formation->id);
                        $msg = "{$s['titre']} :\n\n";
                        $msg .= "  {$s['description']}\n";
                        if ($prixMin) {
                            $msg .= "  Tarif à partir de $prixMin FCFA.\n";
                        } else {
                            $msg .= "  Tarif : nous contacter pour un devis personnalisé.\n";
                        }
                        $msg .= "\nContactez-nous pour plus de détails !";
                        return ['type' => 'answer', 'message' => $msg, 'confidence' => 0.9, 'source' => 'services', 'url' => $s['url']];
                    }
                }
            }

            // Réponse générique pour les services
            $msg = "Voici ce que j'ai trouvé sur le site :\n\n";
            $currentCat = '';
            foreach ($results as $r) {
                $s = $r['service'];
                if ($s['categorie'] !== $currentCat) {
                    $currentCat = $s['categorie'];
                    $msg .= "  {$s['categorie']} :\n";
                }
                $msg .= "    • {$s['titre']}";
                if ($s['public']) $msg .= " ({$s['public']})";
                $msg .= "\n      {$s['description']}\n\n";
            }
            $msg .= "Dites-moi lequel vous intéresse pour en savoir plus !";

            return ['type' => 'answer', 'message' => $msg, 'confidence' => 0.85, 'source' => 'services'];
        }

        return null;
    }

    // ===== INTENTIONS SIMPLES =====

    private function checkSimpleIntents(string $q, array $words): ?array
    {
        // PRIX (recherche d'abord si un service spécifique est mentionné)
        if (count(array_intersect($words, $this->keywords['prix'])) > 0) {
            // Vérifier si un service extrascolaire ou accompagnement correspond
            $pricesServices = $this->searchServices($q, $words);
            if ($pricesServices) {
                return $pricesServices;
            }
            // Vérifier si une formation correspond
            $pricesFormations = $this->searchFormations($q, $words);
            if ($pricesFormations) {
                return $pricesFormations;
            }
            // Sinon tous les prix
            return $this->getAllPrices();
        }

        // CONTACT
        if (count(array_intersect($words, $this->keywords['contact'])) > 0) {
            return $this->getContact();
        }

        // INSCRIPTION
        if (count(array_intersect($words, $this->keywords['inscription'])) > 0) {
            return $this->getInscription();
        }

        // HORAIRE
        if (count(array_intersect($words, $this->keywords['horaire'])) > 0) {
            return $this->getHoraires();
        }

        // DUREE
        if (count(array_intersect($words, $this->keywords['duree'])) > 0) {
            return $this->getDuree();
        }

        // NIVEAU
        if (count(array_intersect($words, $this->keywords['niveau'])) > 0) {
            return ['type' => 'answer', 'message' => "Nos formations sont adaptées à tous les niveaux, du débutant à l'avancé. Contactez-nous pour savoir quelle formation vous correspond le mieux.", 'confidence' => 0.85, 'source' => 'general'];
        }

        // AGE
        if (count(array_intersect($words, $this->keywords['age'])) > 0) {
            return ['type' => 'answer', 'message' => "Nos formations sont ouvertes à tous : enfants, adolescents, adultes et seniors. Chaque formation précise son public cible.", 'confidence' => 0.85, 'source' => 'general'];
        }

        // CERTIFICATION
        if (count(array_intersect($words, $this->keywords['certification'])) > 0) {
            return ['type' => 'answer', 'message' => "À la fin de votre formation, vous recevrez une attestation ou un certificat selon le programme. Contactez-nous pour plus de détails.", 'confidence' => 0.85, 'source' => 'general'];
        }

        // FORMATEUR
        if (count(array_intersect($words, $this->keywords['formateur'])) > 0) {
            return ['type' => 'answer', 'message' => "Nos formateurs sont des professionnels qualifiés et expérimentés dans leur domaine. Contactez-nous pour connaître les formateurs de chaque formation.", 'confidence' => 0.85, 'source' => 'general'];
        }

        // LIEU
        if (count(array_intersect($words, $this->keywords['lieu'])) > 0) {
            $lieux = Cours::whereNotNull('lieu')->pluck('lieu')->unique()->take(5);
            if ($lieux->count() > 0) {
                $msg = "Nos cours se déroulent :\n";
                foreach ($lieux as $l) $msg .= "  - $l\n";
                $msg .= "\nContactez-nous pour l'adresse exacte de chaque formation.";
                return ['type' => 'answer', 'message' => $msg, 'confidence' => 0.85, 'source' => 'cours'];
            }
            return ['type' => 'answer', 'message' => "Contactez-nous pour connaître nos adresses.", 'confidence' => 0.8, 'source' => 'general'];
        }

        return null;
    }

    private function getAllPrices(): array
    {
        try {
            $formations = Formation::all();
            $msg = "Voici nos formations avec leurs tarifs :\n\n";
            foreach ($formations as $f) {
                $prixMin = $this->getPrixMin($f->id);
                if ($prixMin) {
                    $msg .= "  - $f->titre : à partir de $prixMin FCFA\n";
                } else {
                    $msg .= "  - $f->titre : nous contacter\n";
                }
            }
            $msg .= "\nContactez-nous pour les facilités de paiement !";
            return ['type' => 'answer', 'message' => $msg, 'confidence' => 0.95, 'source' => 'formations', 'url' => url('/formations')];
        } catch (\Exception $e) {
            return ['type' => 'answer', 'message' => "Les tarifs varient selon la formation. Contactez-nous pour un devis personnalisé.", 'confidence' => 0.85, 'source' => 'general', 'url' => url('/contact')];
        }
    }

    private function getContact(): array
    {
        try {
            $c = Contact::first();
            $msg = "Vous pouvez nous contacter :\n";
            if ($c) {
                if ($c->telephone) $msg .= "  - Par téléphone : $c->telephone\n";
                if ($c->email) $msg .= "  - Par email : $c->email\n";
                if ($c->whatsapp) $msg .= "  - Sur WhatsApp : $c->whatsapp\n";
                if ($c->adresse) $msg .= "  - À notre adresse : $c->adresse\n";
            }
            $msg .= "\nHoraires : lundi-vendredi 08h-18h, samedi 09h-13h.";
            return ['type' => 'answer', 'message' => $msg, 'confidence' => 0.9, 'source' => 'contact', 'url' => url('/contact')];
        } catch (\Exception $e) {
            return ['type' => 'answer', 'message' => "Contactez-nous via notre page de contact du lundi au samedi.", 'confidence' => 0.85, 'source' => 'general', 'url' => url('/contact')];
        }
    }

    private function getInscription(): array
    {
        $msg = "Pour vous inscrire :\n";
        $msg .= "1. Choisissez votre formation\n";
        $msg .= "2. Contactez-nous (téléphone ou site)\n";
        $msg .= "3. Remplissez le formulaire\n";
        $msg .= "4. Effectuez le paiement\n";
        $msg .= "5. Votre inscription est confirmée !\n";
        try {
            $count = \App\Models\Inscription::count();
            if ($count > 0) $msg .= "\nDéjà $count personnes inscrites !";
        } catch (\Exception $e) {}
        return ['type' => 'answer', 'message' => $msg, 'confidence' => 0.9, 'source' => 'inscription', 'url' => url('/contact')];
    }

    private function getHoraires(): array
    {
        $msg = "Nos horaires :\n  - Lundi au vendredi : 08h00 - 18h00\n  - Samedi : 09h00 - 13h00\n  - Dimanche : fermé\n\n";
        try {
            $cours = Cours::whereNotNull('heure')->where('heure', '!=', '')->take(5)->get();
            if ($cours->count() > 0) {
                $msg .= "Quelques horaires de cours :\n";
                foreach ($cours as $c) $msg .= "  - $c->titre : $c->heure\n";
            }
        } catch (\Exception $e) {}
        return ['type' => 'answer', 'message' => $msg, 'confidence' => 0.85, 'source' => 'horaire', 'url' => url('/contact')];
    }

    private function getDuree(): array
    {
        try {
            $formations = Formation::all();
            $msg = "Durée de nos formations :\n";
            $count = 0;
            foreach ($formations as $f) {
                $duree = $this->getDureeFormation($f->id);
                if ($duree) {
                    $msg .= "  - $f->titre : $duree\n";
                    $count++;
                }
            }
            if ($count > 0) return ['type' => 'answer', 'message' => $msg, 'confidence' => 0.9, 'source' => 'formations'];
        } catch (\Exception $e) {}
        return ['type' => 'answer', 'message' => "La durée varie selon la formation. Contactez-nous pour plus d'informations.", 'confidence' => 0.8, 'source' => 'general'];
    }

    // ===== RECHERCHE PRINCIPALE =====

    private function searchFormations(string $q, array $words): ?array
    {
        try {
            $formations = Formation::all();
            $results = [];
            $qLower = strtolower($q);

            // Vérifier si au moins un mot-clé correspond au titre d'une formation
            // Cela permet de déterminer si on cherche une formation spécifique
            $hasTitleMatch = false;
            foreach ($formations as $f) {
                $titre = strtolower($f->titre ?? '');
                foreach ($words as $w) {
                    if (str_contains($titre, $w)) {
                        $hasTitleMatch = true;
                        break 2;
                    }
                }
            }

            foreach ($formations as $f) {
                $titre = strtolower($f->titre ?? '');
                $desc = strtolower($f->description ?? '');
                $searchable = $titre . ' ' . $desc;

                $score = 0;
                $titreMatch = false;

                // ★ BONUS MAJEUR : le titre de la formation contient exactement un mot-clé
                foreach ($words as $w) {
                    if (str_contains($titre, $w)) {
                        $score += 10;
                        $titreMatch = true;
                    }
                    if (str_contains($searchable, $w)) {
                        $score++;
                    }
                }

                // ★ BONUS : des cours de cette formation contiennent les mots-clés dans leur titre
                // MAIS seulement si la formation a matché via son titre ou si aucune formation n'a matché via titre
                if ($titreMatch || !$hasTitleMatch) {
                    try {
                        $matchingCoursCount = Cours::where('formation_id', $f->id)
                            ->where(function($query) use ($words) {
                                foreach ($words as $w) {
                                    $query->orWhere('titre', 'like', '%' . $w . '%');
                                }
                            })
                            ->count();
                        if ($matchingCoursCount > 0) {
                            $score += min($matchingCoursCount, 5);
                        }
                    } catch (\Exception $e) {}
                }

                // Bonus par catégorie de mots (uniquement si le titre a matché ou aucune titre match)
                if ($titreMatch || !$hasTitleMatch) {
                    $categoryBonus = [
                        'informatique' => ['informatique', 'codage', 'programmation', 'logiciel', 'développement web', 'digital'],
                        'compta' => ['compta', 'comptabilité', 'comptable', 'bilan', 'paie'],
                        'langue' => ['langue', 'anglais', 'français', 'espagnol', 'ecrit'],
                        'cuisine' => ['cuisine', 'culinaire', 'cuisiner', 'pâtisserie', 'gastronomie'],
                        'management' => ['management', 'leadership', 'manager', 'ressource humaine', 'rh'],
                        'commerce' => ['commerce', 'commercial', 'vente', 'marketing', 'relation client'],
                        'sport' => ['sport', 'coaching', 'fitness', 'musculation', 'danse'],
                        'art' => ['art', 'musique', 'chant', 'peinture', 'dessin', 'graphisme'],
                        'droit' => ['droit', 'juridique', 'juriste', 'loi', 'réglementation'],
                        'beaute' => ['beauté', 'beaute', 'santé', 'sante', 'bienetre', 'esthetique'],
                    ];

                    foreach ($categoryBonus as $cat => $keywords) {
                        foreach ($keywords as $kw) {
                            if (in_array($kw, $words)) {
                                $score += 2;
                            }
                        }
                    }
                }

                // Règle stricte : si l'utilisateur cherche une formation spécifique (un mot match un titre),
                // ne retourner QUE les formations dont le titre match
                if ($hasTitleMatch && !$titreMatch) {
                    continue;
                }

                if ($score > 0) {
                    $prixMin = $this->getPrixMin($f->id);
                    $nbrCours = Cours::where('formation_id', $f->id)->count();
                    // Récupérer les cours qui matchent les mots-clés en priorité
                    $courses = Cours::where('formation_id', $f->id)
                        ->where(function($query) use ($words) {
                            foreach ($words as $w) {
                                $query->orWhere('titre', 'like', '%' . $w . '%');
                            }
                        })
                        ->limit(3)
                        ->get();

                    // Si aucun cours ne matche, prendre les 2 premiers
                    if ($courses->count() === 0) {
                        $courses = Cours::where('formation_id', $f->id)->limit(2)->get();
                    }

                    $results[] = [
                        'formation' => $f,
                        'prix' => $prixMin,
                        'nbrCours' => $nbrCours,
                        'courses' => $courses,
                        'score' => $score
                    ];
                }
            }

            if (count($results) > 0) {
                usort($results, fn($a, $b) => $b['score'] <=> $a['score']);
                $results = array_slice($results, 0, 3);

                $msg = "Voici les formations que j'ai trouvées :\n\n";
                foreach ($results as $r) {
                    $f = $r['formation'];
                    $msg .= "  - $f->titre";
                    if ($r['prix']) {
                        $msg .= " - à partir de $r[prix] FCFA";
                    } else {
                        $msg .= " - nous contacter pour le prix";
                    }
                    if ($r['nbrCours'] > 0) {
                        $msg .= " ($r[nbrCours] cours)";
                    }
                    $msg .= "\n";

                    // Ajouter les cours phares (ceux qui matchent les mots-clés en premier)
                    if ($r['courses']->count() > 0) {
                        $msg .= "    Cours disponibles :\n";
                        foreach ($r['courses'] as $c) {
                            $msg .= "      * $c->titre";
                            if ($c->prix) $msg .= " - " . number_format($c->prix, 0, ',', ' ') . " FCFA";
                            $msg .= "\n";
                        }
                        $msg .= "\n";
                    }
                }
                $msg .= "\nDites-moi laquelle vous intéresse pour plus de détails !";
                return ['type' => 'answer', 'message' => $msg, 'confidence' => 0.9, 'source' => 'formations', 'url' => url('/formations')];
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Chatbot searchFormations error: ' . $e->getMessage());
        }
        return null;
    }

    private function searchCours(string $q, array $words): ?array
    {
        try {
            $cours = Cours::with('formation')->get();
            $results = [];

            foreach ($cours as $c) {
                $titre = strtolower($c->titre ?? '');
                $desc = strtolower($c->description ?? '');
                $objectif = strtolower($c->objectif ?? '');
                $cible = strtolower($c->cible ?? '');
                $searchable = $titre . ' ' . $desc . ' ' . $objectif . ' ' . $cible;

                $score = 0;
                foreach ($words as $w) {
                    if (str_contains($searchable, $w)) $score++;
                }

                // Bonus pour mots-clés spécifiques aux cours
                $courseBonus = [
                    'math' => ['math', 'mathématique', 'calcul'],
                    'francais' => ['français', 'francais', 'grammaire', 'orthographe'],
                    'anglais' => ['anglais', 'english', 'langue'],
                    'physique' => ['physique', 'chimie', 'science'],
                    'histoire' => ['histoire', 'geo', 'géographie', 'svt'],
                    'informatique' => ['informatique', 'codage', 'programmation', 'code'],
                    'musique' => ['musique', 'chant', 'piano', 'guitare'],
                    'sport' => ['sport', 'football', 'tennis', 'natation', 'gym'],
                    'commerce' => ['commerce', 'gestion', 'comptabilité', 'dcg', 'dscg'],
                ];

                foreach ($courseBonus as $bonus) {
                    foreach ($bonus as $bw) {
                        if (in_array($bw, $words)) $score += 2;
                    }
                }

                if ($score > 0) {
                    $fName = ($c->formation && is_object($c->formation)) ? $c->formation->titre : '';
                    $results[] = [
                        'titre' => $c->titre,
                        'formation' => $fName,
                        'prix' => $c->prix,
                        'lieu' => $c->lieu,
                        'objectif' => $c->objectif,
                        'cible' => $c->cible,
                        'score' => $score
                    ];
                }
            }

            if (count($results) > 0) {
                usort($results, fn($a, $b) => $b['score'] <=> $a['score']);
                $results = array_slice($results, 0, 5);

                $msg = "Voici les cours que j'ai trouvés :\n\n";
                foreach ($results as $r) {
                    $msg .= "  - $r[titre]";
                    if ($r['formation']) $msg .= " ($r[formation])";
                    if ($r['prix']) $msg .= " - $r[prix] FCFA";
                    if ($r['lieu']) $msg .= " à $r[lieu]";
                    $msg .= "\n";
                }
                $msg .= "\nDites-moi si vous voulez plus d'informations sur l'un d'eux !";
                return ['type' => 'answer', 'message' => $msg, 'confidence' => 0.85, 'source' => 'cours'];
            }
        } catch (\Exception $e) {}
        return null;
    }

    // ===== UTILITAIRES =====

    private function getPrixMin(int $formationId): ?string
    {
        try {
            $prix = Cours::where('formation_id', $formationId)
                ->whereNotNull('prix')
                ->min('prix');
            return $prix ? number_format($prix, 0, ',', ' ') : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    private function getDureeFormation(int $formationId): ?string
    {
        try {
            $cours = Cours::where('formation_id', $formationId)
                ->whereNotNull('heure')
                ->first();
            return $cours ? $cours->heure : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    private function searchKB(string $q, array $words): ?array
    {
        try {
            $entries = KnowledgeBase::where('is_active', true)->get();
            foreach ($entries as $entry) {
                $title = strtolower($entry->title);
                similar_text($q, $title, $sim);
                if ($sim > 50) {
                    return ['type' => 'answer', 'message' => $entry->content, 'confidence' => 0.85, 'source' => 'knowledge_base'];
                }
            }
        } catch (\Exception $e) {}
        return null;
    }

    private function getSuggestions(): array
    {
        try {
            $suggestions = [];

            // Suggestions basées sur les formations populaires
            $formations = Formation::take(3)->get();
            foreach ($formations as $f) {
                $suggestions[] = $f->titre;
            }

            // Suggestions contextuelles
            $suggestions[] = 'Quels sont vos tarifs ?';
            $suggestions[] = 'Comment s\'inscrire ?';
            $suggestions[] = 'Nous contacter';

            // Mélanger et retourner max 4 suggestions
            shuffle($suggestions);
            return array_slice($suggestions, 0, 4);
        } catch (\Exception $e) {
            return ['Nos formations', "S'inscrire", 'Nous contacter', 'Tarifs'];
        }
    }

    private function fallback(string $q, array $words): array
    {
        $suggestions = $this->getSuggestions();
        return ['type' => 'fallback', 'message' => "Je n'ai pas trouvé de réponse. Voici ce que je peux vous proposer :", 'suggestions' => array_slice($suggestions, 0, 6), 'confidence' => 0];
    }

    private function extractKeywords(string $text): array
    {
        $stopWords = ['le','la','les','un','une','des','et','ou','de','du','en','a','est','je','tu','il','elle','nous','vous','ils','elles','pour','par','sur','dans','ce','cet','cette','ces','mon','ton','son','ma','ta','sa','mes','tes','ses','notre','votre','leur','nos','vos','leurs','quoi','qui','que','comment','ou','quand','pourquoi','combien','y','au','aux','avec','sans','sous','chez','vers','entre','parmi','contre','devant','derriere','pendant','apres','avant','est','sont','été','etre','avoir','fait','faire','peut','plus','tout','tous','bien','aussi','comme','mais','donc','or','ni','car','si','tres','trop','juste','encore','autre','autres','meme','ainsi','alors','donc','pouvez','voudriez','souhaitez','cherchez','recherchez','demandez','posez','moi','toi','lui','eux','celui','celle','ceux','celles','ceci','cela','ça','rien','quelque','chaque','plusieurs','certains','certaines','aucun','aucune','formation','cours','apprendre','etude','étude','information','informations','liste','donne','moi','voici','trouver','proposez','offrez','avez','domaine','propos'];
        $words = preg_split('/\s+/', $text);
        return array_values(array_filter($words, fn($w) => !in_array($w, $stopWords) && strlen($w) > 1));
    }

    private function normalizeText(string $text): string
    {
        $text = mb_strtolower(trim($text), 'UTF-8');
        $text = preg_replace('/[^\w\séèêëàâäùûüôöîïç]/u', ' ', $text);
        return preg_replace('/\s+/', ' ', $text);
    }
}
