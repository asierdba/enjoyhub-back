<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class HealthFitnessBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'HealthFitness']);

        $emotionMap = [
            'Born to Run' => 7,
            'The Body Keeps the Score' => 16,
            'Why We Sleep' => 10,
            'The Omnivore\'s Dilemma' => 10,
            'Spark: The Revolutionary New Science of Exercise and the Brain' => 21,
            'Bigger Leaner Stronger' => 21,
            'Thinner Leaner Stronger' => 21,
            'The New Rules of Lifting' => 21,
            'The China Study' => 10,
            'The 4-Hour Body' => 21,
        ];

        $books = [
            [
                'title' => 'Born to Run',
                'year' => 2009,
                'description' => 'An exploration of endurance running, ultrarunners, and the Tarahumara tribe.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'Knopf',
                'isbn' => '9780307279185',
                'pageCount' => 288,
                'authors' => ['Christopher McDougall'],
            ],
            [
                'title' => 'The Body Keeps the Score',
                'year' => 2014,
                'description' => 'How trauma reshapes the body and mind, and paths to recovery.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'Viking',
                'isbn' => '9780143127741',
                'pageCount' => 464,
                'authors' => ['Bessel van der Kolk'],
            ],
            [
                'title' => 'Why We Sleep',
                'year' => 2017,
                'description' => 'A scientific look at sleep and its vital role in health and cognition.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'Scribner',
                'isbn' => '9781501144318',
                'pageCount' => 352,
                'authors' => ['Matthew Walker'],
            ],
            [
                'title' => 'The Omnivore\'s Dilemma',
                'year' => 2006,
                'description' => 'An investigation into food choices, agriculture, and what we eat.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'Penguin',
                'isbn' => '9780143038580',
                'pageCount' => 450,
                'authors' => ['Michael Pollan'],
            ],
            [
                'title' => 'Spark: The Revolutionary New Science of Exercise and the Brain',
                'year' => 2008,
                'description' => 'How exercise improves brain function, mood, and learning.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'Little, Brown and Company',
                'isbn' => '9780316113510',
                'pageCount' => 320,
                'authors' => ['John J. Ratey'],
            ],
            [
                'title' => 'Bigger Leaner Stronger',
                'year' => 2012,
                'description' => 'A practical guide to building muscle and losing fat for men.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'Victory Belt Publishing',
                'isbn' => '9781938895305',
                'pageCount' => 304,
                'authors' => ['Michael Matthews'],
            ],
            [
                'title' => 'Thinner Leaner Stronger',
                'year' => 2012,
                'description' => 'A companion guide focused on women’s strength training and nutrition.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'Victory Belt Publishing',
                'isbn' => '9781938895312',
                'pageCount' => 320,
                'authors' => ['Michael Matthews'],
            ],
            [
                'title' => 'The New Rules of Lifting',
                'year' => 2005,
                'description' => 'A modern approach to strength training with programs and nutrition advice.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'Avery',
                'isbn' => '9781583333389',
                'pageCount' => 384,
                'authors' => ['Lou Schuler', 'Alwyn Cosgrove'],
            ],
            [
                'title' => 'The China Study',
                'year' => 2005,
                'description' => 'A comprehensive study linking diet and disease, advocating plant-based nutrition.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'BenBella Books',
                'isbn' => '9781932100662',
                'pageCount' => 416,
                'authors' => ['T. Colin Campbell', 'Thomas M. Campbell II'],
            ],
            [
                'title' => 'The 4-Hour Body',
                'year' => 2010,
                'description' => 'A collection of experiments and protocols for rapid body transformation.',
                'image' => 'https://m.media-amazon.com/images/I/51b5YG6Y1rL.jpg',
                'publisher' => 'Harmony',
                'isbn' => '9780307463630',
                'pageCount' => 624,
                'authors' => ['Tim Ferriss'],
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
