<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EmotionAIService
{
    public function getEmotionFromTitle(string $title): string
{
    $emotions = config('emotions');

    $prompt = "
Dado el título de un libro, asigna el estado de ánimo más probable entre esta lista:

" . implode(', ', $emotions) . "

Título:
\"$title\"

Devuélveme SOLO uno de los estados EXACTAMENTE como aparece en la lista.
";

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
