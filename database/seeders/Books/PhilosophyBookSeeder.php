<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class PhilosophyBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Philosophy']);

        $emotionMap = [
            'Meditations' => 16,
            'Beyond Good and Evil' => 19,
            'The Republic' => 10,
            'Critique of Pure Reason' => 9,
            'Being and Time' => 12,
            'The Consolation of Philosophy' => 8,
            'The Second Sex' => 21,
            'An Enquiry Concerning Human Understanding' => 10,
            'The Myth of Sisyphus' => 13,
            'A History of Western Philosophy' => 9,
        ];

        $books = [
            [
                'title' => 'Meditations',
                'year' => 180,
                'description' => 'Personal reflections of Marcus Aurelius on virtue, reason, and self-discipline.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Penguin Classics',
                'isbn' => '9780140449334',
                'pageCount' => 304,
                'authors' => ['Marcus Aurelius'],
            ],
            [
                'title' => 'Beyond Good and Evil',
                'year' => 1886,
                'description' => 'Nietzsche critiques past philosophers and presents his ideas on morality and power.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Cambridge University Press',
                'isbn' => '9780520247310',
                'pageCount' => 240,
                'authors' => ['Friedrich Nietzsche'],
            ],
            [
                'title' => 'The Republic',
                'year' => -380,
                'description' => 'Plato’s dialogue on justice, the ideal state, and the philosopher-king.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Penguin Classics',
                'isbn' => '9780140455113',
                'pageCount' => 416,
                'authors' => ['Plato'],
            ],
            [
                'title' => 'Critique of Pure Reason',
                'year' => 1781,
                'description' => 'Kant’s foundational work on the limits and scope of human knowledge.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Cambridge University Press',
                'isbn' => '9780521657297',
                'pageCount' => 720,
                'authors' => ['Immanuel Kant'],
            ],
            [
                'title' => 'Being and Time',
                'year' => 1927,
                'description' => 'Heidegger’s exploration of existence, temporality, and the meaning of Being.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Harper Perennial',
                'isbn' => '9780061575593',
                'pageCount' => 487,
                'authors' => ['Martin Heidegger'],
            ],
            [
                'title' => 'The Consolation of Philosophy',
                'year' => 524,
                'description' => 'Boethius blends classical philosophy and personal reflection on fortune and happiness.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Penguin Classics',
                'isbn' => '9780140447804',
                'pageCount' => 256,
                'authors' => ['Boethius'],
            ],
            [
                'title' => 'The Second Sex',
                'year' => 1949,
                'description' => 'Simone de Beauvoir’s landmark study on women, freedom, and existentialist ethics.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Vintage',
                'isbn' => '9780679724519',
                'pageCount' => 800,
                'authors' => ['Simone de Beauvoir'],
            ],
            [
                'title' => 'An Enquiry Concerning Human Understanding',
                'year' => 1748,
                'description' => 'Hume examines human cognition, causation, and the limits of reason.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Oxford University Press',
                'isbn' => '9780198245959',
                'pageCount' => 176,
                'authors' => ['David Hume'],
            ],
            [
                'title' => 'The Myth of Sisyphus',
                'year' => 1942,
                'description' => 'Camus’s essay on absurdity, revolt, and finding meaning in a meaningless world.',
                'image' => 'https://m.media-amazon.com/images/I/81OQ1Q7vKPL.jpg',
                'publisher' => 'Vintage',
                'isbn' => '9780141182001',
                'pageCount' => 160,
                'authors' => ['Albert Camus'],
            ],
            [
                'title' => 'A History of Western Philosophy',
                'year' => 1945,
                'description' => 'Russell’s accessible survey of Western philosophical thought and its key figures.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Simon & Schuster',
                'isbn' => '9780671201586',
                'pageCount' => 832,
                'authors' => ['Bertrand Russell'],
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
