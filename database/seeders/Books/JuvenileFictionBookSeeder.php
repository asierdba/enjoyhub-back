<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class JuvenileFictionBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'JuvenileFiction']);

        $emotionMap = [
            "Charlotte's Web" => 16,
            'Where the Wild Things Are' => 11,
            'The Very Hungry Caterpillar' => 7,
            'Matilda' => 9,
            'The Tale of Peter Rabbit' => 7,
            'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe' => 11,
            'The Wind in the Willows' => 8,
            'The Secret Garden' => 20,
            "Charlotte's Web (Illustrated Edition)" => 16,
            'The Boxcar Children' => 9,
        ];

        $books = [
            [
                'title' => "Charlotte's Web",
                'year' => 1952,
                'description' => 'A tender story of friendship between a pig named Wilbur and a spider named Charlotte.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'HarperCollins',
                'isbn' => '9780064400558',
                'pageCount' => 192,
                'authors' => ['E. B. White'],
            ],
            [
                'title' => 'Where the Wild Things Are',
                'year' => 1963,
                'description' => 'A picture book about imagination, mischief, and the journey home.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'HarperCollins',
                'isbn' => '9780060254926',
                'pageCount' => 48,
                'authors' => ['Maurice Sendak'],
            ],
            [
                'title' => 'The Very Hungry Caterpillar',
                'year' => 1969,
                'description' => 'A beloved picture book following a caterpillar’s transformation into a butterfly.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'World Publishing Company',
                'isbn' => '9780399226908',
                'pageCount' => 26,
                'authors' => ['Eric Carle'],
            ],
            [
                'title' => 'Matilda',
                'year' => 1988,
                'description' => 'A brilliant girl with telekinetic powers overcomes neglectful adults and finds belonging.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Jonathan Cape',
                'isbn' => '9780140328721',
                'pageCount' => 240,
                'authors' => ['Roald Dahl'],
            ],
            [
                'title' => 'The Tale of Peter Rabbit',
                'year' => 1902,
                'description' => 'Beatrix Potter’s classic about a mischievous rabbit and the consequences of disobedience.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Frederick Warne & Co.',
                'isbn' => '9780723247706',
                'pageCount' => 72,
                'authors' => ['Beatrix Potter'],
            ],
            [
                'title' => 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe',
                'year' => 1950,
                'description' => 'Four siblings enter a magical land and join the fight against an eternal winter.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Geoffrey Bles',
                'isbn' => '9780064471046',
                'pageCount' => 208,
                'authors' => ['C. S. Lewis'],
            ],
            [
                'title' => 'The Wind in the Willows',
                'year' => 1908,
                'description' => 'Adventures of Mole, Rat, Toad, and Badger in an English riverside world.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Methuen & Co.',
                'isbn' => '9780141321134',
                'pageCount' => 256,
                'authors' => ['Kenneth Grahame'],
            ],
            [
                'title' => 'The Secret Garden',
                'year' => 1911,
                'description' => 'A story of healing and friendship as a hidden garden brings new life to children.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Frederick A. Stokes',
                'isbn' => '9780141321097',
                'pageCount' => 328,
                'authors' => ['Frances Hodgson Burnett'],
            ],
            [
                'title' => "Charlotte's Web (Illustrated Edition)",
                'year' => 2006,
                'description' => 'A richly illustrated edition of the classic tale of friendship and loyalty.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'HarperCollins',
                'isbn' => '9780061124952',
                'pageCount' => 192,
                'authors' => ['E. B. White', 'Garth Williams'],
            ],
            [
                'title' => 'The Boxcar Children',
                'year' => 1924,
                'description' => 'Four orphaned children create a home in an abandoned boxcar and solve mysteries together.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Albert Whitman & Company',
                'isbn' => '9780807508526',
                'pageCount' => 160,
                'authors' => ['Gertrude Chandler Warner'],
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
