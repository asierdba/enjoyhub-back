<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class FantasyBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Fantasy']);

        $emotionMap = [
            'The Hobbit' => 7,
            "Harry Potter and the Sorcerer's Stone" => 11,
            'A Game of Thrones' => 5,
            'The Name of the Wind' => 22,
            'Mistborn: The Final Empire' => 4,
            'The Way of Kings' => 19,
            'The Lies of Locke Lamora' => 23,
            'The Blade Itself' => 15,
            'Eragon' => 7,
            'The Golden Compass' => 12,
        ];

        $books = [
            [
                'title' => 'The Hobbit',
                'year' => 1937,
                'description' => 'A fantasy adventure following Bilbo Baggins on a quest to reclaim treasure guarded by a dragon.',
                'image' => 'https://m.media-amazon.com/images/I/91b0C2YNSrL.jpg',
                'publisher' => 'George Allen & Unwin',
                'isbn' => '9780547928227',
                'pageCount' => 310,
                'authors' => ['J.R.R. Tolkien'],
            ],
            [
                'title' => "Harry Potter and the Sorcerer's Stone",
                'year' => 1997,
                'description' => 'A young wizard discovers his magical heritage and attends Hogwarts School of Witchcraft and Wizardry.',
                'image' => 'https://m.media-amazon.com/images/I/81iqZ2HHD-L.jpg',
                'publisher' => 'Bloomsbury',
                'isbn' => '9780590353427',
                'pageCount' => 309,
                'authors' => ['J.K. Rowling'],
            ],
            [
                'title' => 'A Game of Thrones',
                'year' => 1996,
                'description' => 'Noble families vie for control of the Iron Throne in a world of political intrigue and dark magic.',
                'image' => 'https://m.media-amazon.com/images/I/91dSMhdIzTL.jpg',
                'publisher' => 'Bantam Spectra',
                'isbn' => '9780553103540',
                'pageCount' => 694,
                'authors' => ['George R. R. Martin'],
            ],
            [
                'title' => 'The Name of the Wind',
                'year' => 2007,
                'description' => 'Kvothe recounts his journey from gifted child to legendary figure.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'DAW Books',
                'isbn' => '9780756404741',
                'pageCount' => 662,
                'authors' => ['Patrick Rothfuss'],
            ],
            [
                'title' => 'Mistborn: The Final Empire',
                'year' => 2006,
                'description' => 'A world ruled by an immortal tyrant is challenged by a group of rebels with magical abilities.',
                'image' => 'https://m.media-amazon.com/images/I/91dSMhdIzTL.jpg',
                'publisher' => 'Tor Books',
                'isbn' => '9780765311788',
                'pageCount' => 541,
                'authors' => ['Brandon Sanderson'],
            ],
            [
                'title' => 'The Way of Kings',
                'year' => 2010,
                'description' => 'An epic tale of war, magic, and destiny in the world of Roshar.',
                'image' => 'https://m.media-amazon.com/images/I/91r7YVJr2-L.jpg',
                'publisher' => 'Tor Books',
                'isbn' => '9780765326355',
                'pageCount' => 1007,
                'authors' => ['Brandon Sanderson'],
            ],
            [
                'title' => 'The Lies of Locke Lamora',
                'year' => 2006,
                'description' => 'A band of thieves known as the Gentleman Bastards pull off daring heists in a Venetian-like city.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Gollancz',
                'isbn' => '9780575079755',
                'pageCount' => 499,
                'authors' => ['Scott Lynch'],
            ],
            [
                'title' => 'The Blade Itself',
                'year' => 2006,
                'description' => 'A gritty fantasy tale featuring a barbarian, a torturer, and a wizard with hidden motives.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Gollancz',
                'isbn' => '9780575079793',
                'pageCount' => 515,
                'authors' => ['Joe Abercrombie'],
            ],
            [
                'title' => 'Eragon',
                'year' => 2002,
                'description' => 'A farm boy discovers a dragon egg and becomes part of an ancient struggle.',
                'image' => 'https://m.media-amazon.com/images/I/91b0C2YNSrL.jpg',
                'publisher' => 'Paolini LLC',
                'isbn' => '9780375826696',
                'pageCount' => 503,
                'authors' => ['Christopher Paolini'],
            ],
            [
                'title' => 'The Golden Compass',
                'year' => 1995,
                'description' => 'Lyra Belacqua embarks on a journey across worlds to uncover a sinister conspiracy.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Scholastic Point',
                'isbn' => '9780440418320',
                'pageCount' => 399,
                'authors' => ['Philip Pullman'],
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
