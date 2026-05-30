<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class BusinessEconomicsBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'BusinessEconomics']);

        $emotionMap = [
            'Good to Great' => 13,
            'The Lean Startup' => 21,
            'Thinking, Fast and Slow' => 10,
            "The Innovator's Dilemma" => 4,
            'Blue Ocean Strategy' => 7,
            'Zero to One' => 9,
            'The Hard Thing About Hard Things' => 15,
            'Principles' => 10,
            'Measure What Matters' => 21,
            'The E-Myth Revisited' => 13,
        ];

        $books = [
            [
                'title' => 'Good to Great',
                'year' => 2001,
                'description' => 'Why some companies make the leap and others don’t; leadership and disciplined strategy.',
                'image' => 'https://m.media-amazon.com/images/I/41jEbK-jG+L.jpg',
                'publisher' => 'HarperBusiness',
                'isbn' => '9780066620992',
                'pageCount' => 320,
                'authors' => ['Jim Collins'],
            ],
            [
                'title' => 'The Lean Startup',
                'year' => 2011,
                'description' => 'A methodology for developing businesses and products using validated learning.',
                'image' => 'https://m.media-amazon.com/images/I/51Z0nLAfLmL.jpg',
                'publisher' => 'Crown Business',
                'isbn' => '9780307887894',
                'pageCount' => 336,
                'authors' => ['Eric Ries'],
            ],
            [
                'title' => 'Thinking, Fast and Slow',
                'year' => 2011,
                'description' => 'Two systems of thought that drive our decisions and how they affect business and policy.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Farrar, Straus and Giroux',
                'isbn' => '9780374533557',
                'pageCount' => 512,
                'authors' => ['Daniel Kahneman'],
            ],
            [
                'title' => "The Innovator's Dilemma",
                'year' => 1997,
                'description' => 'How successful companies can do everything right and still lose market leadership.',
                'image' => 'https://m.media-amazon.com/images/I/51oXKWg2wLL.jpg',
                'publisher' => 'Harvard Business Review Press',
                'isbn' => '9781633691780',
                'pageCount' => 288,
                'authors' => ['Clayton M. Christensen'],
            ],
            [
                'title' => 'Blue Ocean Strategy',
                'year' => 2005,
                'description' => 'Create uncontested market space and make the competition irrelevant.',
                'image' => 'https://m.media-amazon.com/images/I/51j5p3xg0PL.jpg',
                'publisher' => 'Harvard Business Review Press',
                'isbn' => '9781591396192',
                'pageCount' => 256,
                'authors' => ['W. Chan Kim', 'Renée Mauborgne'],
            ],
            [
                'title' => 'Zero to One',
                'year' => 2014,
                'description' => 'Notes on startups, or how to build the future by creating unique value.',
                'image' => 'https://m.media-amazon.com/images/I/41+e3refnZL.jpg',
                'publisher' => 'Crown Business',
                'isbn' => '9780804139297',
                'pageCount' => 224,
                'authors' => ['Peter Thiel', 'Blake Masters'],
            ],
            [
                'title' => 'The Hard Thing About Hard Things',
                'year' => 2014,
                'description' => 'Practical advice on building and running a startup when there are no easy answers.',
                'image' => 'https://m.media-amazon.com/images/I/41+e3refnZL.jpg',
                'publisher' => 'HarperBusiness',
                'isbn' => '9780062273208',
                'pageCount' => 304,
                'authors' => ['Ben Horowitz'],
            ],
            [
                'title' => 'Principles',
                'year' => 2017,
                'description' => 'Life and work principles from Ray Dalio on decision-making and organizational design.',
                'image' => 'https://m.media-amazon.com/images/I/41b0b0k2wLL.jpg',
                'publisher' => 'Simon & Schuster',
                'isbn' => '9781501124020',
                'pageCount' => 592,
                'authors' => ['Ray Dalio'],
            ],
            [
                'title' => 'Measure What Matters',
                'year' => 2018,
                'description' => 'How OKRs (Objectives and Key Results) drive focus, alignment, and growth.',
                'image' => 'https://m.media-amazon.com/images/I/41Q9Q0k2wLL.jpg',
                'publisher' => 'Portfolio',
                'isbn' => '9780525536222',
                'pageCount' => 320,
                'authors' => ['John Doerr'],
            ],
            [
                'title' => 'The E-Myth Revisited',
                'year' => 1995,
                'description' => 'Why most small businesses don’t work and what to do about it; systems for scaling.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'HarperCollins',
                'isbn' => '9780887307287',
                'pageCount' => 288,
                'authors' => ['Michael E. Gerber'],
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
