<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class HistoricalBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Historical']);

        $emotionMap = [
            'The Book Thief' => 25,
            'All the Light We Cannot See' => 25,
            'Wolf Hall' => 19,
            'The Pillars of the Earth' => 19,
            'The Nightingale' => 16,
            'War and Peace' => 19,
            'The Other Boleyn Girl' => 18,
            'Memoirs of a Geisha' => 6,
            'The Red Tent' => 8,
            'The Shadow of the Wind' => 12,
        ];

        $books = [
            [
                'title' => 'The Book Thief',
                'year' => 2005,
                'description' => 'A young girl steals books to escape the horrors of Nazi Germany.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Picador',
                'isbn' => '9780375842207',
                'pageCount' => 552,
                'authors' => ['Markus Zusak'],
            ],
            [
                'title' => 'All the Light We Cannot See',
                'year' => 2014,
                'description' => 'A blind French girl and a German boy struggle to survive during WWII.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Scribner',
                'isbn' => '9781476746581',
                'pageCount' => 531,
                'authors' => ['Anthony Doerr'],
            ],
            [
                'title' => 'Wolf Hall',
                'year' => 2009,
                'description' => 'A vivid portrayal of Thomas Cromwell in the court of Henry VIII.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Fourth Estate',
                'isbn' => '9780007230204',
                'pageCount' => 653,
                'authors' => ['Hilary Mantel'],
            ],
            [
                'title' => 'The Pillars of the Earth',
                'year' => 1989,
                'description' => 'The building of a cathedral intertwines the lives of nobles, monks, and peasants.',
                'image' => 'https://m.media-amazon.com/images/I/81p1LZ7YJ-L.jpg',
                'publisher' => 'William Morrow',
                'isbn' => '9780451225245',
                'pageCount' => 973,
                'authors' => ['Ken Follett'],
            ],
            [
                'title' => 'The Nightingale',
                'year' => 2015,
                'description' => 'Two sisters in Nazi-occupied France fight for survival and freedom.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'St. Martin\'s Press',
                'isbn' => '9781250080400',
                'pageCount' => 440,
                'authors' => ['Kristin Hannah'],
            ],
            [
                'title' => 'War and Peace',
                'year' => 1869,
                'description' => 'A sweeping epic of Russian society during the Napoleonic Wars.',
                'image' => 'https://m.media-amazon.com/images/I/91b0C2YNSrL.jpg',
                'publisher' => 'The Russian Messenger',
                'isbn' => '9780199232765',
                'pageCount' => 1225,
                'authors' => ['Leo Tolstoy'],
            ],
            [
                'title' => 'The Other Boleyn Girl',
                'year' => 2001,
                'description' => 'A dramatic retelling of Mary and Anne Boleyn’s rivalry for King Henry VIII.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Touchstone',
                'isbn' => '9780743227445',
                'pageCount' => 664,
                'authors' => ['Philippa Gregory'],
            ],
            [
                'title' => 'Memoirs of a Geisha',
                'year' => 1997,
                'description' => 'A fictional memoir of a geisha navigating life in pre- and post-war Japan.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Alfred A. Knopf',
                'isbn' => '9780679781581',
                'pageCount' => 434,
                'authors' => ['Arthur Golden'],
            ],
            [
                'title' => 'The Red Tent',
                'year' => 1997,
                'description' => 'A retelling of the biblical story of Dinah from a female perspective.',
                'image' => 'https://m.media-amazon.com/images/I/81OQ1Q7vKPL.jpg',
                'publisher' => 'Picador',
                'isbn' => '9780312195519',
                'pageCount' => 321,
                'authors' => ['Anita Diamant'],
            ],
            [
                'title' => 'The Shadow of the Wind',
                'year' => 2001,
                'description' => 'A boy in post-war Barcelona discovers a mysterious book that changes his life.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Planeta',
                'isbn' => '9780143034902',
                'pageCount' => 487,
                'authors' => ['Carlos Ruiz Zafón'],
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
