<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class DramaBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Drama']);

        $emotionMap = [
            'A Streetcar Named Desire' => 16,
            'Death of a Salesman' => 15,
            "Long Day's Journey Into Night" => 16,
            'The Glass Menagerie' => 8,
            'Waiting for Godot' => 10,
            'The Crucible' => 15,
            "A Doll's House" => 16,
            'The Cherry Orchard' => 8,
            'Hedda Gabler' => 15,
            'The Importance of Being Earnest' => 14,
        ];

        $books = [
            [
                'title' => 'A Streetcar Named Desire',
                'year' => 1947,
                'description' => 'A powerful drama about desire, mental instability, and social decline in the American South.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'New Directions',
                'isbn' => '9780811216023',
                'pageCount' => 128,
                'authors' => ['Tennessee Williams'],
            ],
            [
                'title' => 'Death of a Salesman',
                'year' => 1949,
                'description' => 'A tragic portrait of an aging salesman confronting failure and the American Dream.',
                'image' => 'https://m.media-amazon.com/images/I/71Q1Iu4suSL.jpg',
                'publisher' => 'Viking Press',
                'isbn' => '9780140481341',
                'pageCount' => 144,
                'authors' => ['Arthur Miller'],
            ],
            [
                'title' => "Long Day's Journey Into Night",
                'year' => 1956,
                'description' => 'An autobiographical family drama exploring addiction, illness, and regret.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Yale University Press',
                'isbn' => '9780307277785',
                'pageCount' => 256,
                'authors' => ['Eugene O\'Neill'],
            ],
            [
                'title' => 'The Glass Menagerie',
                'year' => 1944,
                'description' => 'A memory play about family tensions, fragile dreams, and escape.',
                'image' => 'https://m.media-amazon.com/images/I/81p1LZ7YJ-L.jpg',
                'publisher' => 'New Directions',
                'isbn' => '9780811214043',
                'pageCount' => 128,
                'authors' => ['Tennessee Williams'],
            ],
            [
                'title' => 'Waiting for Godot',
                'year' => 1953,
                'description' => 'An absurdist drama about two men waiting for someone who never arrives.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Faber & Faber',
                'isbn' => '9780571207016',
                'pageCount' => 128,
                'authors' => ['Samuel Beckett'],
            ],
            [
                'title' => 'The Crucible',
                'year' => 1953,
                'description' => 'A dramatization of the Salem witch trials that doubles as an allegory of McCarthyism.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Penguin',
                'isbn' => '9780142437339',
                'pageCount' => 160,
                'authors' => ['Arthur Miller'],
            ],
            [
                'title' => "A Doll's House",
                'year' => 1879,
                'description' => 'A groundbreaking play about marriage, identity, and a woman\'s struggle for independence.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Penguin Classics',
                'isbn' => '9780140442014',
                'pageCount' => 128,
                'authors' => ['Henrik Ibsen'],
            ],
            [
                'title' => 'The Cherry Orchard',
                'year' => 1904,
                'description' => 'A Chekhov classic about social change, loss, and the end of an era.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Penguin Classics',
                'isbn' => '9780140441994',
                'pageCount' => 160,
                'authors' => ['Anton Chekhov'],
            ],
            [
                'title' => 'Hedda Gabler',
                'year' => 1891,
                'description' => 'A psychological drama centered on a complex, restless woman trapped by society.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Penguin Classics',
                'isbn' => '9780140442014',
                'pageCount' => 112,
                'authors' => ['Henrik Ibsen'],
            ],
            [
                'title' => 'The Importance of Being Earnest',
                'year' => 1895,
                'description' => 'A witty social comedy that satirizes Victorian manners and identity.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Penguin Classics',
                'isbn' => '9780141439662',
                'pageCount' => 96,
                'authors' => ['Oscar Wilde'],
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
