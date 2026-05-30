<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class FictionBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Fiction']);

        $emotionMap = [
            'The Great Gatsby' => 25,
            'To Kill a Mockingbird' => 13,
            '1984' => 5,
            'The Catcher in the Rye' => 15,
            'The Road' => 25,
            'Beloved' => 16,
            'The Kite Runner' => 16,
            'Life of Pi' => 22,
            'The Alchemist' => 13,
            "The Handmaid's Tale" => 5,
        ];

        $books = [
            [
                'title' => 'The Great Gatsby',
                'year' => 1925,
                'description' => 'A tragic story of wealth, obsession, and the American Dream.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Charles Scribner\'s Sons',
                'isbn' => '9780743273565',
                'pageCount' => 180,
                'authors' => ['F. Scott Fitzgerald'],
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'year' => 1960,
                'description' => 'A powerful novel about racial injustice and moral growth.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'J. B. Lippincott & Co.',
                'isbn' => '9780061120084',
                'pageCount' => 281,
                'authors' => ['Harper Lee'],
            ],
            [
                'title' => '1984',
                'year' => 1949,
                'description' => 'A dystopian novel exploring surveillance, control, and totalitarianism.',
                'image' => 'https://m.media-amazon.com/images/I/71kxa1-0mfL.jpg',
                'publisher' => 'Secker & Warburg',
                'isbn' => '9780451524935',
                'pageCount' => 328,
                'authors' => ['George Orwell'],
            ],
            [
                'title' => 'The Catcher in the Rye',
                'year' => 1951,
                'description' => 'A coming-of-age story about teenage alienation and identity.',
                'image' => 'https://m.media-amazon.com/images/I/71Q1Iu4suSL.jpg',
                'publisher' => 'Little, Brown and Company',
                'isbn' => '9780316769488',
                'pageCount' => 277,
                'authors' => ['J.D. Salinger'],
            ],
            [
                'title' => 'The Road',
                'year' => 2006,
                'description' => 'A bleak post-apocalyptic journey of a father and son.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Alfred A. Knopf',
                'isbn' => '9780307387899',
                'pageCount' => 287,
                'authors' => ['Cormac McCarthy'],
            ],
            [
                'title' => 'Beloved',
                'year' => 1987,
                'description' => 'A haunting story about trauma, memory, and motherhood.',
                'image' => 'https://m.media-amazon.com/images/I/81p1LZ7YJ-L.jpg',
                'publisher' => 'Alfred A. Knopf',
                'isbn' => '9781400033416',
                'pageCount' => 324,
                'authors' => ['Toni Morrison'],
            ],
            [
                'title' => 'The Kite Runner',
                'year' => 2003,
                'description' => 'A story of friendship, betrayal, and redemption set in Afghanistan.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Riverhead Books',
                'isbn' => '9781594631931',
                'pageCount' => 371,
                'authors' => ['Khaled Hosseini'],
            ],
            [
                'title' => 'Life of Pi',
                'year' => 2001,
                'description' => 'A philosophical survival story of a boy stranded with a tiger.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Knopf Canada',
                'isbn' => '9780156027328',
                'pageCount' => 319,
                'authors' => ['Yann Martel'],
            ],
            [
                'title' => 'The Alchemist',
                'year' => 1988,
                'description' => 'A mystical journey about destiny and self-discovery.',
                'image' => 'https://m.media-amazon.com/images/I/71aFt4+OTOL.jpg',
                'publisher' => 'HarperTorch',
                'isbn' => '9780061122415',
                'pageCount' => 208,
                'authors' => ['Paulo Coelho'],
            ],
            [
                'title' => "The Handmaid's Tale",
                'year' => 1985,
                'description' => 'A dystopian story about oppression and resistance.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'McClelland and Stewart',
                'isbn' => '9780385490818',
                'pageCount' => 311,
                'authors' => ['Margaret Atwood'],
            ],
        ];

        foreach ($books as $b) {
            DB::transaction(function () use ($b, $genre, $emotionMap) {
                $emotionId = $emotionMap[$b['title']] ?? null;

                $content = Content::firstOrCreate(
                    ['title' => $b['title']],
                    [
                        'releaseYear' => $b['year'],
                        'description' => $b['description'],
                        'image' => $b['image'],
                        'type' => 'book',
                        'emotionId' => $emotionId,
                    ]
                );

                if ($genre) {
                    $content->genres()->syncWithoutDetaching([$genre->genreId]);
                }

                Book::firstOrCreate(
                    ['contentId' => $content->contentId],
                    [
                        'publisher' => $b['publisher'],
                        'isbn' => $b['isbn'],
                        'pageCount' => $b['pageCount'],
                    ]
                );

                foreach ($b['authors'] as $authorName) {
                    $author = Author::firstOrCreate(['authorName' => $authorName]);
                    $content->authors()->syncWithoutDetaching([$author->authorId]);
                }
            });
        }
    }
}
