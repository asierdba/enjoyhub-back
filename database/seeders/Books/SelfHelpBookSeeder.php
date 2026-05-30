<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class SelfHelpBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'SelfHelp']);

        $emotionMap = [
            'The 7 Habits of Highly Effective People' => 21,
            'How to Win Friends and Influence People' => 11,
            'Atomic Habits' => 21,
            'The Power of Now' => 16,
            'Think and Grow Rich' => 13,
            "Man's Search for Meaning" => 16,
            'The Subtle Art of Not Giving a F*ck' => 25,
            'You Are a Badass' => 11,
            'The Four Agreements' => 10,
            'Daring Greatly' => 16,
        ];

        $books = [
            [
                'title' => 'The 7 Habits of Highly Effective People',
                'year' => 1989,
                'description' => 'A framework for personal and professional effectiveness based on timeless principles.',
                'image' => 'https://m.media-amazon.com/images/I/51Myx3kQJkL.jpg',
                'publisher' => 'Free Press',
                'isbn' => '9780743269513',
                'pageCount' => 381,
                'authors' => ['Stephen R. Covey'],
            ],
            [
                'title' => 'How to Win Friends and Influence People',
                'year' => 1936,
                'description' => 'Classic advice on communication, relationships, and leadership.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'Simon & Schuster',
                'isbn' => '9780671027032',
                'pageCount' => 291,
                'authors' => ['Dale Carnegie'],
            ],
            [
                'title' => 'Atomic Habits',
                'year' => 2018,
                'description' => 'Practical strategies to build good habits and break bad ones through small changes.',
                'image' => 'https://m.media-amazon.com/images/I/51-nXsSRfZL.jpg',
                'publisher' => 'Avery',
                'isbn' => '9780735211292',
                'pageCount' => 320,
                'authors' => ['James Clear'],
            ],
            [
                'title' => 'The Power of Now',
                'year' => 1997,
                'description' => 'A guide to spiritual enlightenment focused on living fully in the present moment.',
                'image' => 'https://m.media-amazon.com/images/I/41jEbK-jG+L.jpg',
                'publisher' => 'New World Library',
                'isbn' => '9781577314806',
                'pageCount' => 236,
                'authors' => ['Eckhart Tolle'],
            ],
            [
                'title' => 'Think and Grow Rich',
                'year' => 1937,
                'description' => 'A classic on mindset, goal-setting, and the principles of success.',
                'image' => 'https://m.media-amazon.com/images/I/51Z0nLAfLmL.jpg',
                'publisher' => 'The Ralston Society',
                'isbn' => '9781585424337',
                'pageCount' => 238,
                'authors' => ['Napoleon Hill'],
            ],
            [
                'title' => "Man's Search for Meaning",
                'year' => 1946,
                'description' => 'Reflections on finding purpose and resilience based on experiences in a concentration camp.',
                'image' => 'https://m.media-amazon.com/images/I/41y5Q2k3G-L.jpg',
                'publisher' => 'Beacon Press',
                'isbn' => '9780807014295',
                'pageCount' => 200,
                'authors' => ['Viktor E. Frankl'],
            ],
            [
                'title' => 'The Subtle Art of Not Giving a F*ck',
                'year' => 2016,
                'description' => 'A counterintuitive approach to living a better life by choosing what truly matters.',
                'image' => 'https://m.media-amazon.com/images/I/51Q5o0Y3wLL.jpg',
                'publisher' => 'Harper',
                'isbn' => '9780062457714',
                'pageCount' => 224,
                'authors' => ['Mark Manson'],
            ],
            [
                'title' => 'You Are a Badass',
                'year' => 2013,
                'description' => 'A blunt, humorous guide to self-improvement and building confidence.',
                'image' => 'https://m.media-amazon.com/images/I/51k0qa6z0-L.jpg',
                'publisher' => 'Running Press',
                'isbn' => '9780762447695',
                'pageCount' => 256,
                'authors' => ['Jen Sincero'],
            ],
            [
                'title' => 'The Four Agreements',
                'year' => 1997,
                'description' => 'A practical guide to personal freedom based on Toltec wisdom.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'Amber-Allen Publishing',
                'isbn' => '9781878424310',
                'pageCount' => 160,
                'authors' => ['Don Miguel Ruiz'],
            ],
            [
                'title' => 'Daring Greatly',
                'year' => 2012,
                'description' => 'On the power of vulnerability and how it transforms the way we live and lead.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'Penguin',
                'isbn' => '9781592408412',
                'pageCount' => 320,
                'authors' => ['Brené Brown'],
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
