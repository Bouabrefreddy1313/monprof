<?php

namespace App\Services;

use App\Models\Formation;
use App\Models\SousFormation;
use App\Models\Cours;
use App\Models\Reponse;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Video;
use Illuminate\Support\Facades\Cache;

class ContentIndexerService
{
    /**
     * Index all website content for search - version optimisée mémoire
     */
    public function indexAllContent()
    {
        $index = [];

        // Index formations (avec contenu limité pour mémoire)
        $formations = Formation::select(['id', 'titre', 'description', 'prix', 'duree', 'niveau', 'pourquoi', 'importance', 'qui'])
            ->get();

        foreach ($formations as $formation) {
            $searchable = $this->buildSearchableText($formation->titre, $formation->description ?? '');
            $index[] = [
                'type' => 'formation',
                'id' => $formation->id,
                'title' => $formation->titre,
                'content' => substr($formation->description ?? '', 0, 500),
                'url' => url('/formation?formation_id=' . $formation->id),
                'searchable_text' => $searchable,
                'metadata' => [
                    'prix' => $formation->prix ?? null,
                    'duree' => $formation->duree ?? null,
                    'niveau' => $formation->niveau ?? null,
                ]
            ];
        }

        // Index sous-formations (sans les cours imbriqués - on fait une requête séparée)
        try {
            $sousFormations = SousFormation::select(['id', 'titre', 'description', 'formation_id'])
                ->get();
            foreach ($sousFormations as $sf) {
                $formation = $formations->find($sf->formation_id);
                $index[] = [
                    'type' => 'sous_formation',
                    'id' => $sf->id,
                    'title' => $sf->titre,
                    'content' => substr($sf->description ?? $sf->titre, 0, 300),
                    'url' => url('/formations'),
                    'searchable_text' => $this->buildSearchableText($sf->titre, $sf->description ?? ''),
                    'metadata' => [
                        'formation_id' => $sf->formation_id,
                        'formation_name' => $formation->titre ?? '',
                    ]
                ];
            }
        } catch (\Exception $e) {}

        // Index cours (requête séparée pour éviter l'imbrication mémoire)
        try {
            $coursList = Cours::select([
                    'id', 'titre', 'description', 'formation_id', 'sous_formation_id',
                    'prix', 'heure', 'lieu', 'formateur', 'prerequis', 'objectif', 'cible'
                ])
                ->get();
            foreach ($coursList as $cours) {
                $index[] = [
                    'type' => 'cours',
                    'id' => $cours->id,
                    'title' => $cours->titre,
                    'content' => substr($cours->description ?? $cours->titre, 0, 300),
                    'url' => url('/cours/' . $cours->id),
                    'searchable_text' => $this->buildSearchableText($cours->titre, $cours->description ?? ''),
                    'metadata' => [
                        'formation_id' => $cours->formation_id,
                        'prix' => $cours->prix ?? null,
                        'heure' => $cours->heure ?? null,
                        'lieu' => $cours->lieu ?? null,
                        'formateur' => $cours->formateur ?? null,
                    ]
                ];
            }
        } catch (\Exception $e) {}

        // Index pages statiques
        $index = array_merge($index, $this->indexStaticPages());

        // Index videos (limité)
        try {
            $videos = Video::select(['id', 'titre', 'description', 'prix'])
                ->get();
            foreach ($videos as $video) {
                $index[] = [
                    'type' => 'video',
                    'id' => $video->id,
                    'title' => $video->titre ?? 'Vidéo ' . $video->id,
                    'content' => substr($video->description ?? '', 0, 300),
                    'url' => url('/video/' . $video->id),
                    'searchable_text' => $this->buildSearchableText($video->titre ?? '', $video->description ?? ''),
                    'metadata' => [
                        'prix' => $video->prix ?? null,
                    ]
                ];
            }
        } catch (\Exception $e) {}

        return $index;
    }

    /**
     * Build searchable text from title and content (optimisé mémoire)
     */
    private function buildSearchableText($title, $content)
    {
        $text = strtolower($title . ' ' . ($content ?? ''));
        return substr($text, 0, 1000); // Limiter à 1000 caractères
    }

    /**
     * Index static pages
     */
    private function indexStaticPages()
    {
        $pages = [
            [
                'type' => 'page',
                'title' => 'Contact',
                'content' => 'Page de contact pour nous joindre par téléphone, email ou visiter nos locaux. Adresse, numéro de téléphone, email.',
                'url' => url('/contact'),
                'keywords' => ['contact', 'téléphone', 'email', 'adresse', 'joindre', 'appeler', 'localisation']
            ],
            [
                'type' => 'page',
                'title' => 'Formations',
                'content' => 'Liste de toutes nos formations disponibles. Découvrez nos programmes de formation professionnelle.',
                'url' => url('/formations'),
                'keywords' => ['formations', 'programmes', 'catalogue', 'liste']
            ],
            [
                'type' => 'page',
                'title' => 'Accueil',
                'content' => 'Page d\'accueil du site. Informations générales sur nos services de formation et de soutien scolaire.',
                'url' => url('/'),
                'keywords' => ['accueil', 'home', 'présentation']
            ],
            [
                'type' => 'page',
                'title' => 'Soutien scolaire',
                'content' => 'Soutien scolaire pour tous les niveaux: primaire, collège, lycée. Aide aux devoirs, cours particuliers.',
                'url' => url('/soutien-collège'),
                'keywords' => ['soutien', 'scolaire', 'aide', 'devoirs', 'primaire', 'collège', 'lycée']
            ],
            [
                'type' => 'page',
                'title' => 'Sport',
                'content' => 'Activités sportives pour adultes et enfants. Cours de sport, activités physiques.',
                'url' => url('/sport-adulte'),
                'keywords' => ['sport', 'activité', 'physique', 'adulte', 'enfant']
            ],
            [
                'type' => 'page',
                'title' => 'Musique',
                'content' => 'Cours de musique, apprentissage d\'instruments, formation musicale.',
                'url' => url('/musique'),
                'keywords' => ['musique', 'instrument', 'chant', 'formation musicale']
            ],
            [
                'type' => 'page',
                'title' => 'Inscription',
                'content' => 'Procédure d\'inscription aux formations. Comment s\'inscrire, étapes, documents requis, frais d\'inscription.',
                'url' => url('/contact'),
                'keywords' => ['inscription', 's\'inscrire', 'inscrire', 'procédure', 'étapes', 'documents']
            ],
            [
                'type' => 'page',
                'title' => 'Paiement',
                'content' => 'Modes de paiement acceptés: carte bancaire, mobile money, espèces. Informations sur les tarifs et prix.',
                'url' => url('/contact'),
                'keywords' => ['paiement', 'prix', 'tarif', 'coût', 'argent', 'fcfa', 'carte', 'mobile']
            ],
            [
                'type' => 'page',
                'title' => 'Horaires',
                'content' => 'Horaires des cours et formations. Planning des sessions, jours et heures des cours.',
                'url' => url('/contact'),
                'keywords' => ['horaire', 'heure', 'planning', 'quand', 'date', 'jour', 'temps']
            ],
        ];

        $index = [];
        foreach ($pages as $page) {
            $index[] = [
                'type' => $page['type'],
                'title' => $page['title'],
                'content' => $page['content'],
                'url' => $page['url'],
                'searchable_text' => strtolower($page['title'] . ' ' . $page['content'] . ' ' . implode(' ', $page['keywords'])),
                'metadata' => []
            ];
        }

        return $index;
    }

    /**
     * Get cached index or rebuild it
     * Le cache est désactivé pour éviter les problèmes de mémoire,
     * l'index est régénéré à chaque appel mais la recherche se fait
     * surtout via la base de données directement maintenant.
     */
    public function getIndex()
    {
        // Limiter la taille pour éviter les problèmes de mémoire
        return $this->indexAllContent();
    }

    /**
     * Clear the index cache
     */
    public function clearIndex()
    {
        // Cache désactivé, rien à faire
    }
}
