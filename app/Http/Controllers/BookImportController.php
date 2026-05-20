<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Book;
use App\Models\Emotion;
use App\Models\Genre;
use App\Services\GoogleBooksService;
use App\Services\EmotionAIService;
use Illuminate\Support\Str;

class BookImportController extends Controller
{
    protected GoogleBooksService $googleBooks;
    protected EmotionAIService $emotionAI;

    public function __construct(GoogleBooksService $googleBooks, EmotionAIService $emotionAI)
    {
        $this->googleBooks = $googleBooks;
        $this->emotionAI = $emotionAI;
    }

    public function importRandomByGenre()
    {
        // 1. Elegir género aleatorio desde la BDD
        $genre = Genre::inRandomOrder()->value('name');

        if (!$genre) {
            return response()->json([
                'message' => 'No hay géneros en la base de datos.'
            ], 404);
        }

        // 2. Construir query
        $query = "subject:" . $genre;

        // 3. Llamar a Google Books
        $items = $this->googleBooks->searchBooks($query, 10);

        if (empty($items)) {
            return response()->json([
                'message' => "No se encontraron libros para el género $genre."
            ], 404);
        }

        $created = [];

        foreach ($items as $item) {
            $info = $item['volumeInfo'] ?? [];

            $title = $info['title'] ?? null;
            if (!$title) continue;

            // 4. Evitar duplicados
            if (Content::where('title', $title)->exists()) {
                continue;
            }

            $description = $info['description'] ?? null;
            $publishedDate = $info['publishedDate'] ?? null;
            $image = $info['imageLinks']['thumbnail'] ?? null;
            $publisher = $info['publisher'] ?? null;
            $pageCount = $info['pageCount'] ?? null;
            $industryIdentifiers = $info['industryIdentifiers'][0]['identifier'] ?? null;

            // 5. Año
            $year = null;
            if ($publishedDate) {
                $year = (int) Str::substr($publishedDate, 0, 4);
            }

            // 6. Emoción IA
            $emotionName = $this->emotionAI->getEmotionFromTitle($title);
            $emotion = Emotion::where('emotionName', $emotionName)->first()
                ?? Emotion::inRandomOrder()->first();

            // 7. Crear Content
            $content = Content::create([
                'title' => $title,
                'releaseYear' => $year,
                'description' => $description,
                'image' => $image,
                'type' => 'book',
                'emotionId' => $emotion?->emotionId,
            ]);

            // 8. Crear Book
            Book::create([
                'contentId' => $content->contentId,
                'publisher' => $publisher,
                'isbn' => $industryIdentifiers,
                'pageCount' => $pageCount,
            ]);

            $created[] = $content->contentId;
        }

        return response()->json([
            'message' => "Libros importados correctamente del género $genre",
            'count' => count($created),
            'contentIds' => $created,
        ]);
    }
}
