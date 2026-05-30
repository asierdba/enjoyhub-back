<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class PhotographyBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Photography']);

        $emotionMap = [
            'On Photography' => 10,
            'The Photographer\'s Eye' => 9,
            'Magnum Contact Sheets' => 12,
            'Annie Leibovitz at Work' => 16,
            'The Americans' => 2,
            'Understanding Exposure' => 21,
            'Humans of New York' => 13,
            'The Negative' => 10,
            'Street Photography Now' => 1,
            'The Camera' => 8,
        ];

        $books = [
            [
                'title' => 'On Photography',
                'year' => 1977,
                'description' => 'Essays exploring the meaning and role of photography in modern life.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Farrar, Straus and Giroux',
                'isbn' => '9780226161103',
                'pageCount' => 192,
                'authors' => ['Susan Sontag'],
            ],
            [
                'title' => 'The Photographer\'s Eye',
                'year' => 1966,
                'description' => 'A foundational study of photographic composition and visual language.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Museum of Modern Art',
                'isbn' => '9780870705522',
                'pageCount' => 160,
                'authors' => ['John Szarkowski'],
            ],
            [
                'title' => 'Magnum Contact Sheets',
                'year' => 2011,
                'description' => 'Behind-the-scenes contact sheets and stories from Magnum photographers.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Thames & Hudson',
                'isbn' => '9780500544020',
                'pageCount' => 320,
                'authors' => ['Kristin Lubben'],
            ],
            [
                'title' => 'Annie Leibovitz at Work',
                'year' => 2008,
                'description' => 'A personal look at the career, process, and iconic images of Annie Leibovitz.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Phaidon',
                'isbn' => '9780714864678',
                'pageCount' => 320,
                'authors' => ['Annie Leibovitz'],
            ],
            [
                'title' => 'The Americans',
                'year' => 1958,
                'description' => 'A landmark photographic survey of American life by Robert Frank.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Grove Press',
                'isbn' => '9780714843322',
                'pageCount' => 176,
                'authors' => ['Robert Frank'],
            ],
            [
                'title' => 'Understanding Exposure',
                'year' => 1986,
                'description' => 'A practical guide to exposure, aperture, and shutter speed for photographers.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Amphoto Books',
                'isbn' => '9781607748500',
                'pageCount' => 160,
                'authors' => ['Bryan Peterson'],
            ],
            [
                'title' => 'Humans of New York',
                'year' => 2013,
                'description' => 'Portraits and stories from the streets of New York City.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'St. Martin\'s Press',
                'isbn' => '9781250038826',
                'pageCount' => 224,
                'authors' => ['Brandon Stanton'],
            ],
            [
                'title' => 'The Negative',
                'year' => 1981,
                'description' => 'Technical and philosophical exploration of film photography and the negative.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Aperture',
                'isbn' => '9780893811873',
                'pageCount' => 256,
                'authors' => ['Ansel Adams'],
            ],
            [
                'title' => 'Street Photography Now',
                'year' => 2010,
                'description' => 'Contemporary street photographers and the practice of capturing life in public.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Thames & Hudson',
                'isbn' => '9780500287316',
                'pageCount' => 240,
                'authors' => ['Sophie Howarth', 'Stephen McLaren'],
            ],
            [
                'title' => 'The Camera',
                'year' => 1980,
                'description' => 'A concise history and technical overview of photographic cameras and their evolution.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Phaidon',
                'isbn' => '9780714821239',
                'pageCount' => 192,
                'authors' => ['Ansel Adams'],
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
