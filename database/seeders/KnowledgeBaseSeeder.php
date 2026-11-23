<?php

// database/seeders/KnowledgeBaseSeeder.php
namespace Database\Seeders;

use App\Models\KnowledgeBase;
use Illuminate\Database\Seeder;

class KnowledgeBaseSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // FORMATIONS
            [
                'category' => 'formation',
                'title' => 'Formations disponibles',
                'content' => 'Nous proposons des formations dans plusieurs domaines : Développement Web, Design Graphique, Esthétique & Coiffure, Comptabilité, Bureautique, Tourisme, Marketing Digital, Commercial, Coaching, et bien plus encore. Chaque formation est dispensée par des experts du métier.',
                'keywords' => ['formation', 'cours', 'disponible', 'domaine', 'proposer', 'offre'],
                'priority' => 10
            ],
            [
                'category' => 'formation',
                'title' => 'Durée des formations',
                'content' => 'La durée varie selon la formation : intensive (2-5 jours), standard (1-3 mois), ou flexible selon ton rythme. Les heures sont adaptées à chaque domaine : bureautique (20-40h), développement web (120-200h), design (60-120h), etc.',
                'keywords' => ['duree', 'heure', 'temps', 'long', 'rapide', 'intensif', 'mois', 'jour'],
                'priority' => 9
            ],

            // PRIX
            [
                'category' => 'prix',
                'title' => 'Tarifs des formations',
                'content' => 'Nos tarifs sont compétitifs et adaptés au marché local. Le paiement peut se faire en plusieurs fois. Contacte-nous pour un devis personnalisé selon la formation choisie.',
                'keywords' => ['prix', 'tarif', 'cout', 'argent', 'combien', 'cher', 'fcfa', 'payement'],
                'priority' => 10
            ],

            // INSCRIPTION
            [
                'category' => 'inscription',
                'title' => 'Comment s\'inscrire',
                'content' => 'Pour t\'inscrire, clique sur le bouton "S\'inscrire" de la formation qui t\'intéresse. Remplis le formulaire avec tes informations, paie les frais de réservation (10 000 FCFA), et tu recevras une confirmation par email et SMS.',
                'keywords' => ['inscrire', 'inscription', 'comment', 'procedure', 'reserver', 's\'inscrire', 'comment faire'],
                'priority' => 10
            ],
            [
                'category' => 'inscription',
                'title' => 'Frais de réservation',
                'content' => 'Les frais de réservation sont de 10 000 FCFA et sont obligatoires pour valider ton inscription. Ils garantissent ta place dans la formation. Le solde du paiement se fait avant le début du cours.',
                'keywords' => ['frais', 'reservation', '10000', 'dossier', 'inscription', 'payer'],
                'priority' => 9
            ],

            // CONTACT
            [
                'category' => 'contact',
                'title' => 'Nous contacter',
                'content' => 'Tu peux nous contacter par téléphone, WhatsApp, email, ou directement à notre siège. Nos équipes sont disponibles du lundi au samedi de 8h à 18h.',
                'keywords' => ['contact', 'telephone', 'appeler', 'email', 'adresse', 'ou', 'trouver', 'joindre'],
                'priority' => 10
            ],

            // HORAIRES
            [
                'category' => 'horaire',
                'title' => 'Horaires des cours',
                'content' => 'Les cours ont lieu du lundi au vendredi, en sessions du matin (8h-12h), de l\'après-midi (14h-18h), ou en soirée (18h-21h) selon la formation. Les week-ends sont aussi disponibles pour certaines formations.',
                'keywords' => ['horaire', 'heure', 'quand', 'matin', 'soir', 'weekend', 'planning', 'emploi du temps'],
                'priority' => 9
            ],

            // CERTIFICATION
            [
                'category' => 'formation',
                'title' => 'Certification et diplôme',
                'content' => 'À l\'issue de chaque formation, tu reçois un certificat de réussite. Certaines formations préparent également à des certifications internationales reconnues.',
                'keywords' => ['diplome', 'certificat', 'certification', 'reconnue', 'attestation', 'valider'],
                'priority' => 8
            ],

            // PRÉREQUIS
            [
                'category' => 'formation',
                'title' => 'Prérequis pour les formations',
                'content' => 'La plupart de nos formations sont accessibles sans diplôme préalable. Il te suffit d\'avoir la motivation et un niveau de français correct. Certains cursus techniques peuvent nécessiter des bases en informatique.',
                'keywords' => ['prerequis', 'condition', 'diplome', 'niveau', 'savoir', 'base', 'exiger'],
                'priority' => 8
            ],
        ];

        foreach ($data as $item) {
            KnowledgeBase::create($item);
        }
    }
}
