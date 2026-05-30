<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class ComicsGraphicNovelsBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'ComicsGraphicNovels']);

        $emotionMap = [
            'Watchmen' => 4,
            'Maus' => 25,
            'Persepolis' => 10,
            'The Sandman: Preludes & Nocturnes' => 12,
            'V for Vendetta' => 15,
            'Saga, Vol. 1' => 7,
            'Batman: The Dark Knight Returns' => 5,
            'Blankets' => 16,
            'Fun Home' => 25,
            'Watchmen: The Annotated Edition' => 10,
        ];

        $books = [
            [
                'title' => 'Watchmen',
                'year' => 1987,
                'description' => 'A deconstruction of the superhero myth set against Cold War paranoia.',
                'image' => 'https://m.media-amazon.com/images/I/81r+LN0kKPL.jpg',
                'publisher' => 'DC Comics',
                'isbn' => '9780930289232',
                'pageCount' => 416,
                'authors' => ['Alan Moore', 'Dave Gibbons'],
            ],
            [
                'title' => 'Maus',
                'year' => 1991,
                'description' => 'A Holocaust memoir told through anthropomorphic characters; a landmark graphic novel.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Pantheon',
                'isbn' => '9780394747231',
                'pageCount' => 296,
                'authors' => ['Art Spiegelman'],
            ],
            [
                'title' => 'Persepolis',
                'year' => 2000,
                'description' => 'A memoir of growing up during the Iranian Revolution, told with stark black-and-white art.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Pantheon',
                'isbn' => '9780375714573',
                'pageCount' => 160,
                'authors' => ['Marjane Satrapi'],
            ],
            [
                'title' => 'The Sandman: Preludes & Nocturnes',
                'year' => 1991,
                'description' => 'The beginning of Neil Gaiman’s epic fantasy series blending myth, horror, and dreams.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Vertigo',
                'isbn' => '9781401225759',
                'pageCount' => 240,
                'authors' => ['Neil Gaiman', 'Various Artists'],
            ],
            [
                'title' => 'V for Vendetta',
                'year' => 1988,
                'description' => 'A dystopian political thriller about an anarchist revolutionary in a totalitarian Britain.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Vertigo',
                'isbn' => '9781401208415',
                'pageCount' => 296,
                'authors' => ['Alan Moore', 'David Lloyd'],
            ],
            [
                'title' => 'Saga, Vol. 1',
                'year' => 2012,
                'description' => 'An epic space-opera/fantasy about family, war, and survival across the galaxy.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Image Comics',
                'isbn' => '9781607066016',
                'pageCount' => 160,
                'authors' => ['Brian K. Vaughan', 'Fiona Staples'],
            ],
            [
                'title' => 'Batman: The Dark Knight Returns',
                'year' => 1986,
                'description' => 'Frank Miller’s influential tale of an older Batman returning to a corrupt Gotham.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'DC Comics',
                'isbn' => '9781401207524',
                'pageCount' => 224,
                'authors' => ['Frank Miller'],
            ],
            [
                'title' => 'Blankets',
                'year' => 2003,
                'description' => 'A coming-of-age graphic memoir about family, faith, and first love.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Top Shelf Productions',
                'isbn' => '9781891830493',
                'pageCount' => 592,
                'authors' => ['Craig Thompson'],
            ],
            [
                'title' => 'Fun Home',
                'year' => 2006,
                'description' => 'A graphic memoir exploring family secrets, identity, and the author’s relationship with her father.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Houghton Mifflin Harcourt',
                'isbn' => '9780618871711',
                'pageCount' => 240,
                'authors' => ['Alison Bechdel'],
            ],
            [
                'title' => 'Watchmen: The Annotated Edition',
                'year' => 2008,
                'description' => 'Expanded edition with annotations and background on the seminal Watchmen series.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'DC Comics',
                'isbn' => '9781401208415',
                'pageCount' => 512,
                'authors' => ['Alan Moore', 'Dave Gibbons'],
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
