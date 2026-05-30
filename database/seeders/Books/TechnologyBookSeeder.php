<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class TechnologyBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Technology']);

        $emotionMap = [
            'The Innovators' => 10,
            'Hooked' => 21,
            'The Phoenix Project' => 13,
            'The Second Machine Age' => 9,
            'Algorithms to Live By' => 11,
            'Life 3.0' => 19,
            'The Master Switch' => 12,
            'Data and Goliath' => 16,
            'Reinventing Organizations' => 14,
            'The Inevitable' => 10,
        ];

        $books = [
            [
                'title' => 'The Innovators',
                'year' => 2014,
                'description' => 'A history of the people who created the computer and the Internet.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Simon & Schuster',
                'isbn' => '9781476708706',
                'pageCount' => 512,
                'authors' => ['Walter Isaacson'],
            ],
            [
                'title' => 'Hooked',
                'year' => 2014,
                'description' => 'How products create habit-forming user behavior through a four-step process.',
                'image' => 'https://m.media-amazon.com/images/I/71Q1Iu4suSL.jpg',
                'publisher' => 'Portfolio',
                'isbn' => '9781591847786',
                'pageCount' => 256,
                'authors' => ['Nir Eyal'],
            ],
            [
                'title' => 'The Phoenix Project',
                'year' => 2013,
                'description' => 'A novel about IT, DevOps, and transforming business performance.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'IT Revolution Press',
                'isbn' => '9781942788294',
                'pageCount' => 432,
                'authors' => ['Gene Kim', 'Kevin Behr', 'George Spafford'],
            ],
            [
                'title' => 'The Second Machine Age',
                'year' => 2014,
                'description' => 'How digital technologies are transforming economies, work, and society.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'W. W. Norton & Company',
                'isbn' => '9780393239355',
                'pageCount' => 320,
                'authors' => ['Erik Brynjolfsson', 'Andrew McAfee'],
            ],
            [
                'title' => 'Algorithms to Live By',
                'year' => 2016,
                'description' => 'Computer science principles applied to everyday human decision-making.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Henry Holt and Co.',
                'isbn' => '9781627790369',
                'pageCount' => 368,
                'authors' => ['Brian Christian', 'Tom Griffiths'],
            ],
            [
                'title' => 'Life 3.0',
                'year' => 2017,
                'description' => 'Explores the future of artificial intelligence and its impact on civilization.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Knopf',
                'isbn' => '9781101970317',
                'pageCount' => 400,
                'authors' => ['Max Tegmark'],
            ],
            [
                'title' => 'The Master Switch',
                'year' => 2010,
                'description' => 'How information industries rise and fall and the cycles of openness and control.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Knopf',
                'isbn' => '9780307269939',
                'pageCount' => 384,
                'authors' => ['Tim Wu'],
            ],
            [
                'title' => 'Data and Goliath',
                'year' => 2015,
                'description' => 'The hidden battles to collect and control personal data and how to protect privacy.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'W. W. Norton & Company',
                'isbn' => '9780393244816',
                'pageCount' => 352,
                'authors' => ['Bruce Schneier'],
            ],
            [
                'title' => 'Reinventing Organizations',
                'year' => 2014,
                'description' => 'New organizational models enabled by technology and new ways of working.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Nelson Parker',
                'isbn' => '9782960133509',
                'pageCount' => 360,
                'authors' => ['Frederic Laloux'],
            ],
            [
                'title' => 'The Inevitable',
                'year' => 2016,
                'description' => 'Twelve technological forces that will shape our future.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Viking',
                'isbn' => '9780525428082',
                'pageCount' => 272,
                'authors' => ['Kevin Kelly'],
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
