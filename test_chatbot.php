<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Services\EnhancedChatbotService;

// Test the chatbot with various questions
$chatbot = app(EnhancedChatbotService::class);

$testQuestions = [
    // === PRIX / TARIFS ===
    "Quels sont les prix des formations ?",
    "Combien coûte la formation en comptabilité ?",
    "Quels sont les tarifs ?",
    "C'est combien pour une formation ?",

    // === FORMATIONS GÉNÉRALES ===
    "Quelles formations proposez-vous ?",
    "Parlez-moi de la formation en comptabilité",
    "Avez-vous des formations en informatique ?",
    "Quels sont les cours disponibles ?",

    // === SPORT ===
    "Avez-vous des cours de sport ?",
    "Quelles formations sportives proposez-vous ?",
    "Y a-t-il du fitness ou de la danse ?",

    // === MUSIQUE ===
    "Proposez-vous des cours de musique ?",
    "Avez-vous des cours de piano ou guitare ?",
    "Quels instruments de musique enseignez-vous ?",

    // === SOUTIEN SCOLAIRE ===
    "Proposez-vous du soutien scolaire ?",
    "Avez-vous de l'aide aux devoirs ?",
    "Faites-vous du soutien pour le collège ?",

    // === CONTACT ===
    "Comment vous contacter ?",
    "Quel est votre numéro de téléphone ?",
    "Où êtes-vous situés ?",

    // === INSCRIPTION ===
    "Comment s'inscrire ?",
    "Je veux m'inscrire à une formation",
    "Quelle est la procédure d'inscription ?",

    // === HORAIRES ===
    "Quels sont vos horaires ?",
    "À quelle heure ont lieu les cours ?",
    "Quand est-ce que les cours commencent ?",

    // === DURÉE / NIVEAU ===
    "Quelle est la durée des formations ?",
    "Avez-vous des formations pour débutants ?",
    "Quels sont les niveaux disponibles ?",

    // === FORMATEURS / LIEUX ===
    "Qui sont les formateurs ?",
    "Où se déroulent les cours ?",
    "Où avez-vous vos locaux ?",

    // === ÂGE / PUBLIC ===
    "Pour quel âge sont les formations ?",
    "Avez-vous des cours pour enfants ?",
    "Proposez-vous des formations pour adultes ?",

    // === CERTIFICATION ===
    "Est-ce que vous délivrez des certificats ?",
    "Avez-vous des certifications ?",

    // === QUESTIONS SPÉCIFIQUES SUR UNE FORMATION ===
    "Parle-moi de la formation BTS",

    // === QUESTIONS GÉNÉRALES ===
    "Bonjour",
    "Que fais-tu ?",
    "Je veux apprendre quelque chose",

    // === QUESTIONS PLUS COMPLEXES ===
    "Je cherche une formation en sport pour adulte, combien ça coûte ?",
    "Formation informatique pour débutant, c'est possible ?",
    "Je veux apprendre la musique, qu'est-ce que vous proposez ?",
];

echo "========================================\n";
echo "  TEST DU CHATBOT AMÉLIORÉ V3\n";
echo "  " . date('Y-m-d H:i:s') . "\n";
echo "========================================\n\n";

$stats = [
    'total' => 0,
    'answer' => 0,
    'fallback' => 0,
    'high_confidence' => 0,
    'low_confidence' => 0,
];

foreach ($testQuestions as $index => $question) {
    $stats['total']++;
    echo "Question #" . ($index + 1) . ": $question\n";
    echo str_repeat('-', 80) . "\n";

    try {
        $response = $chatbot->findAnswer($question);

        $type = $response['type'] ?? 'unknown';
        $confidence = $response['confidence'] ?? 0;
        $confidencePct = number_format($confidence * 100, 1);

        echo "  Type: " . strtoupper($type) . "\n";
        echo "  Confiance: {$confidencePct}%\n";

        if ($type === 'answer') {
            $stats['answer']++;
            if ($confidence >= 0.8) $stats['high_confidence']++;
            else $stats['low_confidence']++;
        } elseif ($type === 'fallback') {
            $stats['fallback']++;
        }

        // Afficher la réponse (tronquée si trop longue)
        $message = $response['message'] ?? '';
        if (strlen($message) > 400) {
            echo "  Réponse: " . substr($message, 0, 400) . "...\n";
        } else {
            echo "  Réponse: $message\n";
        }

        if (isset($response['url'])) {
            echo "  URL: " . $response['url'] . "\n";
        }

        if (isset($response['source'])) {
            echo "  Source: " . $response['source'] . "\n";
        }

        if (isset($response['suggestions']) && is_array($response['suggestions'])) {
            echo "  Suggestions:\n";
            foreach ($response['suggestions'] as $s) {
                echo "    - $s\n";
            }
        }

        if (isset($response['related']) && is_array($response['related'])) {
            echo "  Liens connexes:\n";
            foreach ($response['related'] as $r) {
                echo "    - $r\n";
            }
        }

    } catch (\Exception $e) {
        echo "  ERREUR: " . $e->getMessage() . "\n";
        echo "  " . $e->getFile() . ":" . $e->getLine() . "\n";
    }

    echo "\n" . str_repeat('=', 80) . "\n\n";
}

// Afficher les statistiques
echo "\n\n";
echo "========================================\n";
echo "  STATISTIQUES DU TEST\n";
echo "========================================\n";
echo "  Total questions: {$stats['total']}\n";
echo "  Réponses trouvées: {$stats['answer']}\n";
echo "  Fallbacks: {$stats['fallback']}\n";
echo "  Haute confiance (>80%): {$stats['high_confidence']}\n";
echo "  Basse confiance: {$stats['low_confidence']}\n";
echo "  Taux de réussite: " . number_format(($stats['answer'] / $stats['total']) * 100, 1) . "%\n";
echo "========================================\n";
echo "\n=== TESTS TERMINÉS ===\n";
