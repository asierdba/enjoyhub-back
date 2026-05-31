<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class YoungAdultFictionBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'YoungAdultFiction']);

        $emotionMap = [
            'The Hunger Games' => 19,
            'The Fault in Our Stars' => 25,
            'Divergent' => 15,
            'Eleanor and Park' => 16,
            'The Perks of Being a Wallflower' => 16,
            'Thirteen Reasons Why' => 23,
            'The Hate U Give' => 21,
            'Miss Peregrine’s Home for Peculiar Children' => 12,
            'The Book Thief' => 16,
            'Looking for Alaska' => 16,
        ];

        $books = [
            [
                'title' => 'The Hunger Games',
                'year' => 2008,
                'description' => 'A dystopian survival story where a girl volunteers to take her sister’s place in a deadly televised contest.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Scholastic Press',
                'isbn' => '9780439023481',
                'pageCount' => 374,
                'authors' => ['Suzanne Collins'],
            ],
            [
                'title' => 'The Fault in Our Stars',
                'year' => 2012,
                'description' => 'A tender, heartbreaking romance between two teens who meet in a cancer support group.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Dutton Books',
                'isbn' => '9780525478812',
                'pageCount' => 313,
                'authors' => ['John Green'],
            ],
            [
                'title' => 'Divergent',
                'year' => 2011,
                'description' => 'In a divided society, a young woman discovers she does not fit into any single faction.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Katherine Tegen Books',
                'isbn' => '9780062024039',
                'pageCount' => 487,
                'authors' => ['Veronica Roth'],
            ],
            [
                'title' => 'Eleanor and Park',
                'year' => 2012,
                'description' => 'A bittersweet first-love story set over the course of one school year in 1980s America.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Razorbill',
                'isbn' => '9780142424179',
                'pageCount' => 328,
                'authors' => ['Rainbow Rowell'],
            ],
            [
                'title' => 'The Perks of Being a Wallflower',
                'year' => 1999,
                'description' => 'An intimate coming-of-age novel told through letters from a shy teen navigating high school.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Pocket Books',
                'isbn' => '9781451696196',
                'pageCount' => 224,
                'authors' => ['Stephen Chbosky'],
            ],
            [
                'title' => 'Thirteen Reasons Why',
                'year' => 2007,
                'description' => 'A student receives cassette tapes explaining the reasons behind a classmate’s suicide.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Razorbill',
                'isbn' => '9781595142488',
                'pageCount' => 288,
                'authors' => ['Jay Asher'],
            ],
            [
                'title' => 'The Hate U Give',
                'year' => 2017,
                'description' => 'A powerful novel about a teen who becomes an activist after witnessing a police shooting.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Balzer + Bray',
                'isbn' => '9780062498533',
                'pageCount' => 464,
                'authors' => ['Angie Thomas'],
            ],
            [
                'title' => 'Miss Peregrine’s Home for Peculiar Children',
                'year' => 2011,
                'description' => 'A mysterious orphanage, time loops, and peculiar children with extraordinary abilities.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Quirk Books',
                'isbn' => '9781594744761',
                'pageCount' => 352,
                'authors' => ['Ransom Riggs'],
            ],
            [
                'title' => 'The Book Thief',
                'year' => 2005,
                'description' => 'A young girl in Nazi Germany finds solace in books and shares them with others during wartime.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Picador',
                'isbn' => '9780375842207',
                'pageCount' => 552,
                'authors' => ['Markus Zusak'],
            ],
            [
                'title' => 'Looking for Alaska',
                'year' => 2005,
                'description' => 'A boarding-school coming-of-age story about friendship, loss, and the search for meaning.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Dutton Books',
                'isbn' => '9780142402511',
                'pageCount' => 221,
                'authors' => ['John Green'],
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
