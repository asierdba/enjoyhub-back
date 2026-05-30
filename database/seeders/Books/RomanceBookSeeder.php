<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class RomanceBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Romance']);

        $emotionMap = [
            'Pride and Prejudice' => 16,
            'Jane Eyre' => 16,
            'Me Before You' => 25,
            'Outlander' => 13,
            'The Notebook' => 16,
            "The Time Traveler's Wife" => 13,
            'The Fault in Our Stars' => 25,
            'The Rosie Project' => 11,
            'The Hating Game' => 11,
            'It Ends with Us' => 25,
        ];

        $books = [
            [
                'title' => 'Pride and Prejudice',
                'year' => 1813,
                'description' => 'A classic romance exploring love, class, and misunderstandings.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'T. Egerton',
                'isbn' => '9780141439518',
                'pageCount' => 279,
                'authors' => ['Jane Austen'],
            ],
            [
                'title' => 'Jane Eyre',
                'year' => 1847,
                'description' => 'A gothic romance about independence, morality, and forbidden love.',
                'image' => 'https://m.media-amazon.com/images/I/71Q1Iu4suSL.jpg',
                'publisher' => 'Smith, Elder & Co.',
                'isbn' => '9780141441146',
                'pageCount' => 532,
                'authors' => ['Charlotte Brontë'],
            ],
            [
                'title' => 'Me Before You',
                'year' => 2012,
                'description' => 'A heartfelt story about love, loss, and difficult choices.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Penguin Books',
                'isbn' => '9780143124542',
                'pageCount' => 369,
                'authors' => ['Jojo Moyes'],
            ],
            [
                'title' => 'Outlander',
                'year' => 1991,
                'description' => 'A time-travel romance blending history, adventure, and passion.',
                'image' => 'https://m.media-amazon.com/images/I/81p1LZ7YJ-L.jpg',
                'publisher' => 'Delacorte Press',
                'isbn' => '9780440212560',
                'pageCount' => 850,
                'authors' => ['Diana Gabaldon'],
            ],
            [
                'title' => 'The Notebook',
                'year' => 1996,
                'description' => 'A touching love story spanning decades.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Warner Books',
                'isbn' => '9780446605237',
                'pageCount' => 214,
                'authors' => ['Nicholas Sparks'],
            ],
            [
                'title' => "The Time Traveler's Wife",
                'year' => 2003,
                'description' => 'A romance challenged by involuntary time travel.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'MacAdam/Cage',
                'isbn' => '9781931561648',
                'pageCount' => 546,
                'authors' => ['Audrey Niffenegger'],
            ],
            [
                'title' => 'The Fault in Our Stars',
                'year' => 2012,
                'description' => 'A heartbreaking love story between two teens with cancer.',
                'image' => 'https://m.media-amazon.com/images/I/91b0C2YNSrL.jpg',
                'publisher' => 'Dutton Books',
                'isbn' => '9780525478812',
                'pageCount' => 313,
                'authors' => ['John Green'],
            ],
            [
                'title' => 'The Rosie Project',
                'year' => 2013,
                'description' => 'A quirky romantic comedy about an unconventional search for love.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Text Publishing',
                'isbn' => '9781922079770',
                'pageCount' => 295,
                'authors' => ['Graeme Simsion'],
            ],
            [
                'title' => 'The Hating Game',
                'year' => 2016,
                'description' => 'A workplace enemies-to-lovers romance full of tension and humor.',
                'image' => 'https://m.media-amazon.com/images/I/91dSMhdIzTL.jpg',
                'publisher' => 'William Morrow',
                'isbn' => '9780062439598',
                'pageCount' => 384,
                'authors' => ['Sally Thorne'],
            ],
            [
                'title' => 'It Ends with Us',
                'year' => 2016,
                'description' => 'A powerful romance exploring love, trauma, and resilience.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Atria Books',
                'isbn' => '9781501110368',
                'pageCount' => 376,
                'authors' => ['Colleen Hoover'],
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
