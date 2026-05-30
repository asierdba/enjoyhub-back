<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class CookingBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Cooking']);

        $emotionMap = [
            'Salt, Fat, Acid, Heat' => 9,
            'The Joy of Cooking' => 20,
            'Mastering the Art of French Cooking' => 20,
            'The Food Lab' => 21,
            'Jerusalem' => 24,
            'Plenty' => 9,
            'On Food and Cooking' => 10,
            'Essentials of Classic Italian Cooking' => 20,
            'Vegetarian Cooking for Everyone' => 20,
            'Salted' => 21,
        ];

        $books = [
            [
                'title' => 'Salt, Fat, Acid, Heat',
                'year' => 2017,
                'description' => 'A master class in the four elements that define great cooking, with recipes and techniques.',
                'image' => 'https://m.media-amazon.com/images/I/81bQe3k3G-L.jpg',
                'publisher' => 'Simon & Schuster',
                'isbn' => '9781476753836',
                'pageCount' => 304,
                'authors' => ['Samin Nosrat'],
            ],
            [
                'title' => 'The Joy of Cooking',
                'year' => 1931,
                'description' => 'A comprehensive, classic reference for home cooks covering techniques and recipes.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Scribner',
                'isbn' => '9781501169718',
                'pageCount' => 1152,
                'authors' => ['Irma S. Rombauer', 'Marion Rombauer Becker', 'Ethan Becker'],
            ],
            [
                'title' => 'Mastering the Art of French Cooking',
                'year' => 1961,
                'description' => 'An authoritative two-volume guide to classic French cuisine for the home cook.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Knopf',
                'isbn' => '9780375413407',
                'pageCount' => 684,
                'authors' => ['Julia Child', 'Louisette Bertholle', 'Simone Beck'],
            ],
            [
                'title' => 'The Food Lab',
                'year' => 2015,
                'description' => 'Scientific approach to American home cooking with tested recipes and techniques.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'W. W. Norton & Company',
                'isbn' => '9780393081084',
                'pageCount' => 832,
                'authors' => ['J. Kenji López-Alt'],
            ],
            [
                'title' => 'Jerusalem',
                'year' => 2012,
                'description' => 'A celebration of the food and culture of Jerusalem with recipes and stories.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Ten Speed Press',
                'isbn' => '9781607743947',
                'pageCount' => 416,
                'authors' => ['Yotam Ottolenghi', 'Sami Tamimi'],
            ],
            [
                'title' => 'Plenty',
                'year' => 2010,
                'description' => 'Inventive vegetarian recipes that highlight vegetables as the centerpiece of the meal.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Ten Speed Press',
                'isbn' => '9781607742735',
                'pageCount' => 320,
                'authors' => ['Yotam Ottolenghi'],
            ],
            [
                'title' => 'On Food and Cooking',
                'year' => 1984,
                'description' => 'A scientific and historical reference on ingredients, techniques, and food chemistry.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Scribner',
                'isbn' => '9780684800011',
                'pageCount' => 768,
                'authors' => ['Harold McGee'],
            ],
            [
                'title' => 'Essentials of Classic Italian Cooking',
                'year' => 1992,
                'description' => 'A definitive collection of Italian recipes and techniques from a master of the cuisine.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Knopf',
                'isbn' => '9780375414404',
                'pageCount' => 944,
                'authors' => ['Marcella Hazan'],
            ],
            [
                'title' => 'Vegetarian Cooking for Everyone',
                'year' => 1997,
                'description' => 'A comprehensive vegetarian cookbook with approachable recipes for every meal.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Wiley',
                'isbn' => '9780471283324',
                'pageCount' => 704,
                'authors' => ['Deborah Madison'],
            ],
            [
                'title' => 'Salted',
                'year' => 2018,
                'description' => 'A modern collection of approachable, flavor-forward recipes for everyday cooking.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Ten Speed Press',
                'isbn' => '9780399581236',
                'pageCount' => 320,
                'authors' => ['Mark Bittman'],
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
