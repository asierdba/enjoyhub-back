<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class ReligionBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Religion']);

        $emotionMap = [
            'The Bible' => 16,
            'The Quran' => 16,
            'The Bhagavad Gita' => 10,
            'Mere Christianity' => 13,
            'The Tao Te Ching' => 10,
            'The Confessions' => 16,
            'The Varieties of Religious Experience' => 12,
            'The Imitation of Christ' => 14,
            'The Heart of the Buddha\'s Teaching' => 11,
            'The Road to Character' => 9,
        ];

        $books = [
            [
                'title' => 'The Bible',
                'year' => 0,
                'description' => 'The central sacred text of Christianity, a collection of religious writings.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Various',
                'isbn' => '9780199537822',
                'pageCount' => 1200,
                'authors' => ['Various'],
            ],
            [
                'title' => 'The Quran',
                'year' => 610,
                'description' => 'The central religious text of Islam, believed to be a revelation from God.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Various',
                'isbn' => '9780140449181',
                'pageCount' => 640,
                'authors' => ['Various'],
            ],
            [
                'title' => 'The Bhagavad Gita',
                'year' => -500,
                'description' => 'A 700-verse Hindu scripture that is part of the Indian epic Mahabharata.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Penguin Classics',
                'isbn' => '9780140449181',
                'pageCount' => 176,
                'authors' => ['Vyasa'],
            ],
            [
                'title' => 'Mere Christianity',
                'year' => 1952,
                'description' => 'C.S. Lewis\'s classic defense and explanation of Christian beliefs.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'HarperOne',
                'isbn' => '9780060652920',
                'pageCount' => 240,
                'authors' => ['C. S. Lewis'],
            ],
            [
                'title' => 'The Tao Te Ching',
                'year' => -400,
                'description' => 'Foundational Taoist text attributed to Lao Tzu, offering wisdom on harmony and governance.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Penguin Classics',
                'isbn' => '9780140441314',
                'pageCount' => 128,
                'authors' => ['Lao Tzu'],
            ],
            [
                'title' => 'The Confessions',
                'year' => 400,
                'description' => 'Saint Augustine\'s spiritual autobiography and theological reflections.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Oxford University Press',
                'isbn' => '9780199537822',
                'pageCount' => 352,
                'authors' => ['Augustine of Hippo'],
            ],
            [
                'title' => 'The Varieties of Religious Experience',
                'year' => 1902,
                'description' => 'William James\'s classic study of individual religious experiences and psychology.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Penguin Classics',
                'isbn' => '9780140434495',
                'pageCount' => 384,
                'authors' => ['William James'],
            ],
            [
                'title' => 'The Imitation of Christ',
                'year' => 1418,
                'description' => 'A devotional Christian classic focusing on spiritual life and humility.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Penguin Classics',
                'isbn' => '9780140447309',
                'pageCount' => 192,
                'authors' => ['Thomas à Kempis'],
            ],
            [
                'title' => 'The Heart of the Buddha\'s Teaching',
                'year' => 1998,
                'description' => 'An accessible introduction to core Buddhist teachings and practices.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Harmony',
                'isbn' => '9781573225406',
                'pageCount' => 352,
                'authors' => ['Thich Nhat Hanh'],
            ],
            [
                'title' => 'The Road to Character',
                'year' => 2015,
                'description' => 'Reflections on moral and spiritual development drawing on religious and philosophical sources.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Random House',
                'isbn' => '9780812983418',
                'pageCount' => 352,
                'authors' => ['David Brooks'],
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
