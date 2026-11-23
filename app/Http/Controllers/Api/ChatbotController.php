<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EnhancedChatbotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    private $chatbot;

    public function __construct(EnhancedChatbotService $chatbot)
    {
        $this->chatbot = $chatbot;
    }

    public function ask(Request $request): JsonResponse
    {
        $request->validate([
            'question' => 'required|string|min:3|max:500'
        ]);

        $result = $this->chatbot->findAnswer($request->question);

        // Log pour analyse (optionnel)
        \App\Models\ChatLog::create([
            'question' => $request->question,
            'response_type' => $result['type'],
            'confidence' => $result['confidence'] ?? 0,
            'ip' => $request->ip()
        ]);

        return response()->json([
            'success' => true,
            'data' => $result
        ]);
    }
}
