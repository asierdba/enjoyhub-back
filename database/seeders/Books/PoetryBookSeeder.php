<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class PoetryBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Poetry']);

        $emotionMap = [
            'The Collected Poems of W.B. Yeats' => 16,
            'Leaves of Grass' => 11,
            'The Waste Land and Other Poems' => 13,
            'Ariel' => 17,
            'The Complete Poems of Emily Dickinson' => 16,
            'Selected Poems' => 10,
            'Howl and Other Poems' => 15,
            'The Sun and Her Flowers' => 9,
            'Devotions: The Selected Poems of Mary Oliver' => 12,
            'The Collected Poems of Langston Hughes' => 14,
        ];

        $books = [
            [
                'title' => 'The Collected Poems of W.B. Yeats',
                'year' => 1939,
                'description' => 'A comprehensive collection of Yeats’s major poems spanning his career.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Macmillan',
                'isbn' => '9780140421996',
                'pageCount' => 672,
                'authors' => ['W. B. Yeats'],
            ],
            [
                'title' => 'Leaves of Grass',
                'year' => 1855,
                'description' => 'Walt Whitman’s landmark collection celebrating democracy, nature, and the self.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Self-published',
                'isbn' => '9780140421996',
                'pageCount' => 464,
                'authors' => ['Walt Whitman'],
            ],
            [
                'title' => 'The Waste Land and Other Poems',
                'year' => 1922,
                'description' => 'T. S. Eliot’s modernist masterpiece exploring fragmentation and cultural despair.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Faber & Faber',
                'isbn' => '9780141182346',
                'pageCount' => 128,
                'authors' => ['T. S. Eliot'],
            ],
            [
                'title' => 'Ariel',
                'year' => 1965,
                'description' => 'Sylvia Plath’s intense and influential collection of confessional poems.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Faber & Faber',
                'isbn' => '9780061145693',
                'pageCount' => 160,
                'authors' => ['Sylvia Plath'],
            ],
            [
                'title' => 'The Complete Poems of Emily Dickinson',
                'year' => 1955,
                'description' => 'A definitive collection of Emily Dickinson’s concise, enigmatic poems.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Little, Brown and Company',
                'isbn' => '9780679722959',
                'pageCount' => 896,
                'authors' => ['Emily Dickinson'],
            ],
            [
                'title' => 'Selected Poems',
                'year' => 1913,
                'description' => 'A selection of Robert Frost’s accessible yet profound poems about rural life and philosophy.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Henry Holt and Company',
                'isbn' => '9780374522879',
                'pageCount' => 240,
                'authors' => ['Robert Frost'],
            ],
            [
                'title' => 'Howl and Other Poems',
                'year' => 1956,
                'description' => 'Allen Ginsberg’s landmark Beat poem and a collection that challenged conventions.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'City Lights Books',
                'isbn' => '9780872860830',
                'pageCount' => 112,
                'authors' => ['Allen Ginsberg'],
            ],
            [
                'title' => 'The Sun and Her Flowers',
                'year' => 2017,
                'description' => 'A modern collection exploring growth, healing, and self-acceptance.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Andrews McMeel Publishing',
                'isbn' => '9781449486792',
                'pageCount' => 256,
                'authors' => ['Rupi Kaur'],
            ],
            [
                'title' => 'Devotions: The Selected Poems of Mary Oliver',
                'year' => 2017,
                'description' => 'A curated selection of Mary Oliver’s nature-focused, contemplative poems.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Penguin Press',
                'isbn' => '9780143122404',
                'pageCount' => 480,
                'authors' => ['Mary Oliver'],
            ],
            [
                'title' => 'The Collected Poems of Langston Hughes',
                'year' => 1994,
                'description' => 'A comprehensive collection from a central voice of the Harlem Renaissance.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Vintage',
                'isbn' => '9780679732761',
                'pageCount' => 640,
                'authors' => ['Langston Hughes'],
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
