<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class ArtBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Art']);

        $emotionMap = [
            'The Story of Art' => 9,
            'Ways of Seeing' => 10,
            'The Lives of the Artists' => 8,
            'The Art Book' => 9,
            'Interaction of Color' => 21,
            'The Shock of the New' => 4,
            'Steal Like an Artist' => 9,
            "The Painter's Handbook" => 20,
            'Drawing on the Right Side of the Brain' => 22,
            'The Art Spirit' => 16,
        ];

        $books = [
            [
                'title' => 'The Story of Art',
                'year' => 1950,
                'description' => 'A concise, accessible overview of Western art history from prehistoric times to modern art.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Phaidon',
                'isbn' => '9780714832470',
                'pageCount' => 688,
                'authors' => ['E. H. Gombrich'],
            ],
            [
                'title' => 'Ways of Seeing',
                'year' => 1972,
                'description' => 'An influential collection of essays and images that challenge how we look at art and culture.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Penguin',
                'isbn' => '9780140135152',
                'pageCount' => 176,
                'authors' => ['John Berger'],
            ],
            [
                'title' => 'The Lives of the Artists',
                'year' => 1550,
                'description' => 'Vasari’s classic biographies of Renaissance artists, foundational to art history.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Oxford University Press',
                'isbn' => '9780199537198',
                'pageCount' => 512,
                'authors' => ['Giorgio Vasari'],
            ],
            [
                'title' => 'The Art Book',
                'year' => 1994,
                'description' => 'A visual A–Z guide to the most important artists and movements in art history.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Phaidon',
                'isbn' => '9780714846231',
                'pageCount' => 320,
                'authors' => ['Phaidon Editors'],
            ],
            [
                'title' => 'Interaction of Color',
                'year' => 1963,
                'description' => 'Josef Albers’s seminal work on color theory and perception for artists and designers.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Yale University Press',
                'isbn' => '9780300179354',
                'pageCount' => 240,
                'authors' => ['Josef Albers'],
            ],
            [
                'title' => 'The Shock of the New',
                'year' => 1980,
                'description' => 'A critical history of modern art and its cultural context.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Thames & Hudson',
                'isbn' => '9780500203536',
                'pageCount' => 320,
                'authors' => ['Robert Hughes'],
            ],
            [
                'title' => 'Steal Like an Artist',
                'year' => 2012,
                'description' => 'A short, practical guide to creativity and artistic practice in the modern world.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Workman Publishing',
                'isbn' => '9780761169253',
                'pageCount' => 160,
                'authors' => ['Austin Kleon'],
            ],
            [
                'title' => "The Painter's Handbook",
                'year' => 1995,
                'description' => 'Technical reference for painters covering materials, techniques, and conservation.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Watson-Guptill',
                'isbn' => '9780823009196',
                'pageCount' => 320,
                'authors' => ['Mark David Gottsegen'],
            ],
            [
                'title' => 'Drawing on the Right Side of the Brain',
                'year' => 1979,
                'description' => 'A practical course that teaches drawing skills by engaging perceptual abilities.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'TarcherPerigee',
                'isbn' => '9781585429202',
                'pageCount' => 272,
                'authors' => ['Betty Edwards'],
            ],
            [
                'title' => 'The Art Spirit',
                'year' => 1923,
                'description' => 'A classic collection of advice, philosophy, and instruction for artists.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Allied Publishers',
                'isbn' => '9780823009196',
                'pageCount' => 320,
                'authors' => ['Robert Henri'],
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
