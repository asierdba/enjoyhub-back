<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class BiographyBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Biography']);

        $emotionMap = [
            'The Diary of a Young Girl' => 24,
            'Long Walk to Freedom' => 13,
            'The Autobiography of Malcolm X' => 16,
            'Steve Jobs' => 18,
            'The Wright Brothers' => 7,
            'Einstein: His Life and Universe' => 9,
            'The Rise of Theodore Roosevelt' => 19,
            'Catherine the Great: Portrait of a Woman' => 19,
            'The Diary of Samuel Pepys' => 8,
            'Becoming' => 13,
        ];

        $books = [
            [
                'title' => 'The Diary of a Young Girl',
                'year' => 1947,
                'description' => 'The wartime diary of Anne Frank, a poignant firsthand account of life in hiding.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Contact Publishing',
                'isbn' => '9780553296983',
                'pageCount' => 352,
                'authors' => ['Anne Frank'],
            ],
            [
                'title' => 'Long Walk to Freedom',
                'year' => 1994,
                'description' => 'Nelson Mandela\'s autobiography chronicling his struggle against apartheid and his years in prison.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Little, Brown and Company',
                'isbn' => '9780316548182',
                'pageCount' => 656,
                'authors' => ['Nelson Mandela'],
            ],
            [
                'title' => 'The Autobiography of Malcolm X',
                'year' => 1965,
                'description' => 'A powerful life story of Malcolm X, told with Alex Haley, covering transformation and activism.',
                'image' => 'https://m.media-amazon.com/images/I/81p1LZ7YJ-L.jpg',
                'publisher' => 'Ballantine Books',
                'isbn' => '9780345350688',
                'pageCount' => 466,
                'authors' => ['Malcolm X', 'Alex Haley'],
            ],
            [
                'title' => 'Steve Jobs',
                'year' => 2011,
                'description' => 'A biography of Apple co-founder Steve Jobs, exploring his vision, drive, and complexity.',
                'image' => 'https://m.media-amazon.com/images/I/81VStYnDGrL.jpg',
                'publisher' => 'Simon & Schuster',
                'isbn' => '9781451648539',
                'pageCount' => 656,
                'authors' => ['Walter Isaacson'],
            ],
            [
                'title' => 'The Wright Brothers',
                'year' => 2015,
                'description' => 'The story of Wilbur and Orville Wright and their invention of powered flight.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Simon & Schuster',
                'isbn' => '9781476728759',
                'pageCount' => 352,
                'authors' => ['David McCullough'],
            ],
            [
                'title' => 'Einstein: His Life and Universe',
                'year' => 2007,
                'description' => 'A comprehensive biography of Albert Einstein, blending science and personal life.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Simon & Schuster',
                'isbn' => '9780743264747',
                'pageCount' => 704,
                'authors' => ['Walter Isaacson'],
            ],
            [
                'title' => 'The Rise of Theodore Roosevelt',
                'year' => 1979,
                'description' => 'A detailed biography of Theodore Roosevelt covering his early life and political ascent.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Modern Library',
                'isbn' => '9780679600843',
                'pageCount' => 816,
                'authors' => ['Edmund Morris'],
            ],
            [
                'title' => 'Catherine the Great: Portrait of a Woman',
                'year' => 2011,
                'description' => 'A biography exploring the life, politics, and influence of Catherine the Great.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Random House',
                'isbn' => '9780307267621',
                'pageCount' => 832,
                'authors' => ['Robert K. Massie'],
            ],
            [
                'title' => 'The Diary of Samuel Pepys',
                'year' => 1660,
                'description' => 'Selections from the famous 17th-century diary offering vivid daily life and historical insight.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Penguin Classics',
                'isbn' => '9780140436112',
                'pageCount' => 912,
                'authors' => ['Samuel Pepys'],
            ],
            [
                'title' => 'Becoming',
                'year' => 2018,
                'description' => 'Michelle Obama\'s memoir about her life, career, and time as First Lady.',
                'image' => 'https://m.media-amazon.com/images/I/81h2gWPTYJL.jpg',
                'publisher' => 'Crown',
                'isbn' => '9781524763138',
                'pageCount' => 448,
                'authors' => ['Michelle Obama'],
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
