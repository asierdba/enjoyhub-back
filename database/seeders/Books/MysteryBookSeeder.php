<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class MysteryBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Mystery']);

        $emotionMap = [
            'The Girl with the Dragon Tattoo' => 15,
            'Gone Girl' => 4,
            'The Da Vinci Code' => 5,
            'Big Little Lies' => 13,
            'The Hound of the Baskervilles' => 10,
            'In the Woods' => 16,
            'The Woman in White' => 12,
            'The No. 1 Ladies\' Detective Agency' => 9,
            'The Reversal' => 14,
            'The Cuckoo\'s Calling' => 15,
        ];

        $books = [
            [
                'title' => 'The Girl with the Dragon Tattoo',
                'year' => 2005,
                'description' => 'A journalist and a hacker investigate a decades-old disappearance.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Norstedts Förlag',
                'isbn' => '9780307454546',
                'pageCount' => 465,
                'authors' => ['Stieg Larsson'],
            ],
            [
                'title' => 'Gone Girl',
                'year' => 2012,
                'description' => 'A psychological thriller about a missing wife and a husband under suspicion.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Crown Publishing Group',
                'isbn' => '9780307588371',
                'pageCount' => 422,
                'authors' => ['Gillian Flynn'],
            ],
            [
                'title' => 'The Da Vinci Code',
                'year' => 2003,
                'description' => 'A symbologist uncovers a conspiracy hidden in famous artworks.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Doubleday',
                'isbn' => '9780385504201',
                'pageCount' => 454,
                'authors' => ['Dan Brown'],
            ],
            [
                'title' => 'Big Little Lies',
                'year' => 2014,
                'description' => 'A murder mystery unfolds in a seemingly perfect suburban community.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Penguin Books',
                'isbn' => '9780399167065',
                'pageCount' => 460,
                'authors' => ['Liane Moriarty'],
            ],
            [
                'title' => 'The Hound of the Baskervilles',
                'year' => 1902,
                'description' => 'Sherlock Holmes investigates a supernatural hound haunting a wealthy family.',
                'image' => 'https://m.media-amazon.com/images/I/71Q1Iu4suSL.jpg',
                'publisher' => 'George Newnes',
                'isbn' => '9780141034323',
                'pageCount' => 256,
                'authors' => ['Arthur Conan Doyle'],
            ],
            [
                'title' => 'In the Woods',
                'year' => 2007,
                'description' => 'A detective confronts his past while investigating a child\'s murder.',
                'image' => 'https://m.media-amazon.com/images/I/81p1LZ7YJ-L.jpg',
                'publisher' => 'Viking Press',
                'isbn' => '9780670038602',
                'pageCount' => 429,
                'authors' => ['Tana French'],
            ],
            [
                'title' => 'The Woman in White',
                'year' => 1859,
                'description' => 'A mysterious woman in white leads to a tale of identity and deception.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'All the Year Round',
                'isbn' => '9780141439613',
                'pageCount' => 672,
                'authors' => ['Wilkie Collins'],
            ],
            [
                'title' => 'The No. 1 Ladies\' Detective Agency',
                'year' => 1998,
                'description' => 'A warm and witty mystery series set in Botswana.',
                'image' => 'https://m.media-amazon.com/images/I/91b0C2YNSrL.jpg',
                'publisher' => 'Polygon Books',
                'isbn' => '9780749317034',
                'pageCount' => 233,
                'authors' => ['Alexander McCall Smith'],
            ],
            [
                'title' => 'The Reversal',
                'year' => 2010,
                'description' => 'A defense attorney switches sides to prosecute a high-profile case.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Little, Brown and Company',
                'isbn' => '9780316069489',
                'pageCount' => 400,
                'authors' => ['Michael Connelly'],
            ],
            [
                'title' => 'The Cuckoo\'s Calling',
                'year' => 2013,
                'description' => 'A private detective investigates the suspicious death of a supermodel.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Sphere Books',
                'isbn' => '9780316206846',
                'pageCount' => 455,
                'authors' => ['Robert Galbraith'],
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
