<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class ScienceFictionBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Science Fiction']);

        $emotionMap = [
            'Dune' => 19,
            'Neuromancer' => 15,
            "Ender's Game" => 13,
            'Snow Crash' => 23,
            'The Left Hand of Darkness' => 12,
            'Hyperion' => 19,
            'The Martian' => 11,
            'Foundation' => 10,
            'Brave New World' => 5,
            'The War of the Worlds' => 17,
        ];

        $books = [
            [
                'title' => 'Dune',
                'year' => 1965,
                'description' => 'A sweeping epic of politics, prophecy, and survival on the desert planet Arrakis.',
                'image' => 'https://m.media-amazon.com/images/I/91A5d8VWS-L.jpg',
                'publisher' => 'Chilton Books',
                'isbn' => '9780441172710',
                'pageCount' => 412,
                'authors' => ['Frank Herbert'],
            ],
            [
                'title' => 'Neuromancer',
                'year' => 1984,
                'description' => 'A washed-up hacker is hired for one last job in a world of cyberspace and AI.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Ace Books',
                'isbn' => '9780441569595',
                'pageCount' => 271,
                'authors' => ['William Gibson'],
            ],
            [
                'title' => "Ender's Game",
                'year' => 1985,
                'description' => 'A gifted child is trained through war simulations to defend humanity from alien threats.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Tor Books',
                'isbn' => '9780812550702',
                'pageCount' => 324,
                'authors' => ['Orson Scott Card'],
            ],
            [
                'title' => 'Snow Crash',
                'year' => 1992,
                'description' => 'A hacker and a courier uncover a virtual virus threatening the Metaverse.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Bantam Books',
                'isbn' => '9780553380958',
                'pageCount' => 480,
                'authors' => ['Neal Stephenson'],
            ],
            [
                'title' => 'The Left Hand of Darkness',
                'year' => 1969,
                'description' => 'A human envoy visits a planet where inhabitants have no fixed gender.',
                'image' => 'https://m.media-amazon.com/images/I/81p1LZ7YJ-L.jpg',
                'publisher' => 'Ace Books',
                'isbn' => '9780441478125',
                'pageCount' => 304,
                'authors' => ['Ursula K. Le Guin'],
            ],
            [
                'title' => 'Hyperion',
                'year' => 1989,
                'description' => 'Seven pilgrims journey to meet a mysterious entity known as the Shrike.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Doubleday',
                'isbn' => '9780553283686',
                'pageCount' => 482,
                'authors' => ['Dan Simmons'],
            ],
            [
                'title' => 'The Martian',
                'year' => 2011,
                'description' => 'An astronaut stranded on Mars must use ingenuity to survive.',
                'image' => 'https://m.media-amazon.com/images/I/91b0C2YNSrL.jpg',
                'publisher' => 'Crown Publishing Group',
                'isbn' => '9780804139021',
                'pageCount' => 369,
                'authors' => ['Andy Weir'],
            ],
            [
                'title' => 'Foundation',
                'year' => 1951,
                'description' => 'A mathematician predicts the fall of a galactic empire and plans to save knowledge.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Gnome Press',
                'isbn' => '9780553293357',
                'pageCount' => 255,
                'authors' => ['Isaac Asimov'],
            ],
            [
                'title' => 'Brave New World',
                'year' => 1932,
                'description' => 'A dystopian future where society is engineered for stability and conformity.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Chatto & Windus',
                'isbn' => '9780060850528',
                'pageCount' => 268,
                'authors' => ['Aldous Huxley'],
            ],
            [
                'title' => 'The War of the Worlds',
                'year' => 1898,
                'description' => 'Martians invade Earth in one of the earliest alien invasion stories.',
                'image' => 'https://m.media-amazon.com/images/I/81OQ1Q7vKPL.jpg',
                'publisher' => 'William Heinemann',
                'isbn' => '9780141441030',
                'pageCount' => 192,
                'authors' => ['H. G. Wells'],
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
