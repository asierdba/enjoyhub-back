<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EmotionAIService
{
    public function getEmotionFromDescription(?string $description): ?string
    {
        if (!$description) {
            return $this->randomEmotion();
        }

        $emotions = config('emotions');

        // Prompt para IA
        $prompt = "
Analiza la siguiente descripción de un libro y dime cuál de estos estados de ánimo representa mejor su tono general:

Estados de ánimo permitidos:
" . implode(', ', $emotions) . "

Descripción:
\"$description\"

Devuélveme SOLO uno de los estados de ánimo EXACTAMENTE como aparece en la lista.
";

        // Llamada a OpenAI o Azure OpenAI
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ],
            'max_tokens' => 10,
        ]);

        if (!$response->successful()) {
            return $this->randomEmotion();
        }

        $result = trim($response->json('choices.0.message.content'));

        // Validar que la IA devolvió algo permitido
        if (in_array($result, $emotions)) {
            return $result;
        }

        return $this->randomEmotion();
    }

    private function randomEmotion(): string
    {
        $emotions = config('emotions');
        return $emotions[array_rand($emotions)];
    }
}
