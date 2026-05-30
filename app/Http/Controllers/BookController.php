<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Genre;
use App\Models\Emotion;

class BookController extends Controller
{

    public function index()
    {
        return Content::all();
    }

    public function store(Request $request)
    {
        $book = Content::create($request->all());
        return response()->json($book, 201);
    }

    public function show($id)
    {
        return Content::findOrFail($id);
    }

    public function getRandom()
    {
        $books = Content::with(['authors', 'genres', 'book'])
            ->where('type', 'book')
            ->inRandomOrder()
            ->limit(20)
            ->get();

        return response()->json($books);
    }

    public function getBooksByEmotion($emotionId)
    {
        $emotion = Emotion::find($emotionId);

        if (!$emotion) {
            return response()->json(['error' => 'Emotion not found'], 404);
        }

        $books = Content::with(['authors', 'genres', 'book'])
            ->where('emotionId', $emotionId)
            ->get();

        return response()->json($books);
    }

}
