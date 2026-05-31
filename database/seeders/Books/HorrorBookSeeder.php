<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class HorrorBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Horror']);

        $emotionMap = [
            'The Shining' => 17,
            'Dracula' => 17,
            'Frankenstein' => 17,
            'Bird Box' => 17,
            'The Haunting of Hill House' => 17,
            'The Exorcist' => 17,
            'Mexican Gothic' => 12,
            'The Silence of the Lambs' => 15,
            'The Girl Next Door' => 15,
            'The Ruins' => 23,
        ];

        $books = [
            [
                'title' => 'The Shining',
                'year' => 1977,
                'description' => 'A family becomes isolated in a haunted hotel where supernatural forces influence the father.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Doubleday',
                'isbn' => '9780385121675',
                'pageCount' => 447,
                'authors' => ['Stephen King'],
            ],
            [
                'title' => 'Dracula',
                'year' => 1897,
                'description' => 'The classic vampire novel that introduced Count Dracula to the world.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Archibald Constable and Company',
                'isbn' => '9780141439846',
                'pageCount' => 418,
                'authors' => ['Bram Stoker'],
            ],
            [
                'title' => 'Frankenstein',
                'year' => 1818,
                'description' => 'A scientist creates a living being, leading to tragedy and horror.',
                'image' => 'https://m.media-amazon.com/images/I/71Q1Iu4suSL.jpg',
                'publisher' => 'Lackington, Hughes, Harding, Mavor & Jones',
                'isbn' => '9780141439471',
                'pageCount' => 280,
                'authors' => ['Mary Shelley'],
            ],
            [
                'title' => 'Bird Box',
                'year' => 2014,
                'description' => 'A mysterious force drives people to madness if they see it.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Ecco Press',
                'isbn' => '9780062259653',
                'pageCount' => 272,
                'authors' => ['Josh Malerman'],
            ],
            [
                'title' => 'The Haunting of Hill House',
                'year' => 1959,
                'description' => 'A chilling tale of a haunted mansion and psychological terror.',
                'image' => 'https://m.media-amazon.com/images/I/81p1LZ7YJ-L.jpg',
                'publisher' => 'Viking Press',
                'isbn' => '9780143039983',
                'pageCount' => 246,
                'authors' => ['Shirley Jackson'],
            ],
            [
                'title' => 'The Exorcist',
                'year' => 1971,
                'description' => 'A young girl becomes possessed by a demonic entity.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Harper & Row',
                'isbn' => '9780061007224',
                'pageCount' => 340,
                'authors' => ['William Peter Blatty'],
            ],
            [
                'title' => 'Mexican Gothic',
                'year' => 2020,
                'description' => 'A glamorous debutante investigates a sinister mansion in rural Mexico.',
                'image' => 'https://m.media-amazon.com/images/I/91b0C2YNSrL.jpg',
                'publisher' => 'Del Rey',
                'isbn' => '9780525620785',
                'pageCount' => 320,
                'authors' => ['Silvia Moreno-Garcia'],
            ],
            [
                'title' => 'The Silence of the Lambs',
                'year' => 1988,
                'description' => 'An FBI trainee seeks help from a cannibalistic serial killer.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'St. Martin\'s Press',
                'isbn' => '9780312924584',
                'pageCount' => 338,
                'authors' => ['Thomas Harris'],
            ],
            [
                'title' => 'The Girl Next Door',
                'year' => 1989,
                'description' => 'A disturbing story of abuse and cruelty based on true events.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Leisure Books',
                'isbn' => '9780843956421',
                'pageCount' => 370,
                'authors' => ['Jack Ketchum'],
            ],
            [
                'title' => 'The Ruins',
                'year' => 2006,
                'description' => 'Tourists trapped in the jungle face a terrifying ancient threat.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Alfred A. Knopf',
                'isbn' => '9781400043873',
                'pageCount' => 319,
                'authors' => ['Scott Smith'],
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
