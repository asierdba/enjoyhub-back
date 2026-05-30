<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class TravelBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Travel']);

        $emotionMap = [
            'On the Road' => 13,
            'Into the Wild' => 16,
            'The Art of Travel' => 10,
            'A Walk in the Woods' => 11,
            'The Geography of Bliss' => 12,
            'In Patagonia' => 14,
            'Vagabonding' => 11,
            'The Great Railway Bazaar' => 13,
            'Eat, Pray, Love' => 16,
            'The Sex Lives of Cannibals' => 9,
        ];

        $books = [
            [
                'title' => 'On the Road',
                'year' => 1957,
                'description' => 'Jack Kerouac\'s seminal road novel about freedom, friendship, and the American landscape.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Viking Press',
                'isbn' => '9780140283297',
                'pageCount' => 320,
                'authors' => ['Jack Kerouac'],
            ],
            [
                'title' => 'Into the Wild',
                'year' => 1996,
                'description' => 'Jon Krakauer reconstructs the journey of Christopher McCandless into the Alaskan wilderness.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Villard',
                'isbn' => '9780385486804',
                'pageCount' => 224,
                'authors' => ['Jon Krakauer'],
            ],
            [
                'title' => 'The Art of Travel',
                'year' => 2002,
                'description' => 'Alain de Botton reflects on the philosophy and pleasures of travel through essays and observations.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Penguin',
                'isbn' => '9780142004109',
                'pageCount' => 256,
                'authors' => ['Alain de Botton'],
            ],
            [
                'title' => 'A Walk in the Woods',
                'year' => 1998,
                'description' => 'Bill Bryson\'s humorous account of attempting to hike the Appalachian Trail.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Broadway Books',
                'isbn' => '9780767902528',
                'pageCount' => 304,
                'authors' => ['Bill Bryson'],
            ],
            [
                'title' => 'The Geography of Bliss',
                'year' => 2008,
                'description' => 'Eric Weiner travels the world searching for the happiest places and what makes them so.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Houghton Mifflin Harcourt',
                'isbn' => '9780618918249',
                'pageCount' => 320,
                'authors' => ['Eric Weiner'],
            ],
            [
                'title' => 'In Patagonia',
                'year' => 1977,
                'description' => 'Bruce Chatwin\'s lyrical travelogue exploring the myths and landscapes of Patagonia.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Jonathan Cape',
                'isbn' => '9780141185460',
                'pageCount' => 224,
                'authors' => ['Bruce Chatwin'],
            ],
            [
                'title' => 'Vagabonding',
                'year' => 2002,
                'description' => 'Practical and philosophical guide to long-term travel and making it part of your life.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Random House',
                'isbn' => '9780812992186',
                'pageCount' => 256,
                'authors' => ['Rolf Potts'],
            ],
            [
                'title' => 'The Great Railway Bazaar',
                'year' => 1975,
                'description' => 'Paul Theroux\'s classic account of a train journey through Asia, full of vivid encounters.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Houghton Mifflin',
                'isbn' => '9780140187656',
                'pageCount' => 448,
                'authors' => ['Paul Theroux'],
            ],
            [
                'title' => 'Eat, Pray, Love',
                'year' => 2006,
                'description' => 'Elizabeth Gilbert\'s memoir of self-discovery through travel in Italy, India, and Indonesia.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Viking',
                'isbn' => '9780143038412',
                'pageCount' => 352,
                'authors' => ['Elizabeth Gilbert'],
            ],
            [
                'title' => 'The Sex Lives of Cannibals',
                'year' => 2004,
                'description' => 'J. Maarten Troost\'s humorous memoir of living on a remote Pacific island.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Perseus Books',
                'isbn' => '9781590201379',
                'pageCount' => 240,
                'authors' => ['J. Maarten Troost'],
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
