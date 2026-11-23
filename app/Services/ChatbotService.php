<?php

namespace App\Services;

use App\Models\KnowledgeBase;

class ChatbotService
{
    public function findAnswer(string $question): array
    {
        $question = strtolower($this->normalizeText($question));
        $questionWords = $this->extractKeywords($question);

        $entries = KnowledgeBase::where('is_active', true)->get();

        $scored = $entries->map(function ($entry) use ($question, $questionWords) {
            $score = $this->calculateRelevance($entry, $question, $questionWords);
            return ['entry' => $entry, 'score' => $score];
        })->filter(fn($item) => $item['score'] > 0)
          ->sortByDesc('score')
          ->values();

        if ($scored->isEmpty()) {
            return $this->fallbackResponse();
        }

        $best = $scored->first();

        if ($best['score'] < 0.3) {
            $suggestions = $scored->take(3)->pluck('entry.title')->toArray();
            return [
                'type' => 'suggestion',
                'message' => "Je ne suis pas sûr de comprendre. Voici ce qui pourrait t'intéresser :",
                'suggestions' => $suggestions,
                'confidence' => $best['score']
            ];
        }

        return [
            'type' => 'answer',
            'message' => $best['entry']->content,
            'category' => $best['entry']->category,
            'confidence' => $best['score'],
            'related' => $scored->slice(1, 2)->pluck('entry.title')->toArray()
        ];
    }

    private function calculateRelevance(KnowledgeBase $entry, string $question, array $questionWords): float
    {
        $score = 0;
        $totalWeight = 0;

        $title = strtolower($this->normalizeText($entry->title));
        similar_text($question, $title, $titleSimilarity);
        $score += ($titleSimilarity / 100) * 4;
        $totalWeight += 4;

        $keywords = array_map('strtolower', $entry->keywords ?? []);
        $keywordMatches = count(array_intersect($questionWords, $keywords));
        $score += ($keywordMatches / max(count($questionWords), 1)) * 3;
        $totalWeight += 3;

        $content = strtolower($this->normalizeText($entry->content));
        $contentWords = $this->extractKeywords($content);
        $contentMatches = count(array_intersect($questionWords, $contentWords));
        $score += ($contentMatches / max(count($questionWords), 1)) * 2;
        $totalWeight += 2;

        $categoryKeywords = [
            'formation' => ['formation', 'cours', 'apprendre', 'certification', 'diplome', 'programme', 'module'],
            'prix' => ['prix', 'cout', 'tarif', 'argent', 'fcfa', 'payement', 'paiement', 'combien', 'cher'],
            'inscription' => ['inscrire', 'inscription', 'reserver', 'comment', 'procedure', 'dossier', 'frais'],
            'contact' => ['contact', 'appeler', 'telephone', 'email', 'adresse', 'ou', 'trouver', 'joindre'],
            'horaire' => ['heure', 'horaire', 'quand', 'date', 'duree', 'temps', 'planning', 'emploi'],
        ];

        foreach ($categoryKeywords as $cat => $words) {
            if ($entry->category === $cat && count(array_intersect($questionWords, $words)) > 0) {
                $score += 1.5;
                $totalWeight += 1.5;
            }
        }

        return $totalWeight > 0 ? min($score / $totalWeight, 1) : 0;
    }

    private function extractKeywords(string $text): array
    {
        $stopWords = [
            'le', 'la', 'les', 'un', 'une', 'des', 'et', 'ou', 'de', 'du', 'en', 'a', 'est',
            'je', 'tu', 'il', 'elle', 'nous', 'vous', 'ils', 'elles', 'pour', 'par', 'sur', 'dans',
            'ce', 'cet', 'cette', 'ces', 'mon', 'ton', 'son', 'ma', 'ta', 'sa', 'mes', 'tes', 'ses',
            'notre', 'votre', 'leur', 'nos', 'vos', 'leurs', 'quoi', 'qui', 'que', 'comment',
            'ou', 'quand', 'pourquoi', 'combien', 'y', 'au', 'aux', 'avec', 'sans', 'sous',
            'chez', 'vers', 'entre', 'parmi', 'contre', 'devant', 'derriere', 'pendant', 'apres', 'avant'
        ];

        $words = preg_split('/\s+/', $text);
        return array_values(array_filter($words, fn($w) => !in_array($w, $stopWords) && strlen($w) > 2));
    }

    private function normalizeText(string $text): string
    {
        $text = mb_strtolower(trim($text), 'UTF-8');
        $text = preg_replace('/[^\w\s]/u', ' ', $text);
        return preg_replace('/\s+/', ' ', $text);
    }

    private function fallbackResponse(): array
    {
        return [
            'type' => 'fallback',
            'message' => "Je n'ai pas trouvé de réponse précise à ta question. Voici ce sur quoi je peux t'aider :",
            'suggestions' => [
                'Nos formations',
                'Tarifs et prix',
                'Comment s\'inscrire',
                'Horaires des cours',
                'Nous contacter'
            ]
        ];
    }
}
