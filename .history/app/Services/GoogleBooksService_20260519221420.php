<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GoogleBooksService
{
    public function searchBooks(string $query, int $maxResults = 10): array
    {
        $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
            'q' => $query,
            'maxResults' => $maxResults,
            'printType' => 'books',
            'langRestrict' => 'en',
        ]);

        if (!$response->successful()) {
            return [];
        }

        return $response->json('items') ?? [];
    }
}
