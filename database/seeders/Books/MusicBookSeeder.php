<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class MusicBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Music']);

        $emotionMap = [
            'This Is Your Brain on Music' => 10,
            'Life' => 16,
            'How Music Works' => 9,
            'The Rest Is Noise' => 19,
            'Just Kids' => 16,
            'Chronicles: Volume One' => 16,
            'The Song Machine' => 13,
            'Miles: The Autobiography' => 16,
            'Please Kill Me' => 15,
            'The History of Jazz' => 2,
        ];

        $books = [
            [
                'title' => 'This Is Your Brain on Music',
                'year' => 2006,
                'description' => 'Daniel Levitin explores the science of music and how it affects the brain.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Dutton',
                'isbn' => '9780452288522',
                'pageCount' => 352,
                'authors' => ['Daniel J. Levitin'],
            ],
            [
                'title' => 'Life',
                'year' => 2010,
                'description' => 'Keith Richards\'s memoir recounting his life with the Rolling Stones and rock history.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Little, Brown and Company',
                'isbn' => '9780316034388',
                'pageCount' => 512,
                'authors' => ['Keith Richards'],
            ],
            [
                'title' => 'How Music Works',
                'year' => 2012,
                'description' => 'David Byrne examines music from cultural, technological, and business perspectives.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'McSweeney\'s',
                'isbn' => '9780393082876',
                'pageCount' => 352,
                'authors' => ['David Byrne'],
            ],
            [
                'title' => 'The Rest Is Noise',
                'year' => 2007,
                'description' => 'Alex Ross\'s sweeping history of 20th-century classical music and its cultural context.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Farrar, Straus and Giroux',
                'isbn' => '9780374528379',
                'pageCount' => 688,
                'authors' => ['Alex Ross'],
            ],
            [
                'title' => 'Just Kids',
                'year' => 2010,
                'description' => 'Patti Smith\'s memoir about her relationship with Robert Mapplethorpe and the New York art scene.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Ecco',
                'isbn' => '9780066211312',
                'pageCount' => 304,
                'authors' => ['Patti Smith'],
            ],
            [
                'title' => 'Chronicles: Volume One',
                'year' => 2004,
                'description' => 'Bob Dylan\'s memoir covering his early career and creative life.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Simon & Schuster',
                'isbn' => '9780743287464',
                'pageCount' => 304,
                'authors' => ['Bob Dylan'],
            ],
            [
                'title' => 'The Song Machine',
                'year' => 2019,
                'description' => 'John Seabrook explores the modern pop music industry and the rise of the hit factory.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'W. W. Norton & Company',
                'isbn' => '9781324002648',
                'pageCount' => 352,
                'authors' => ['John Seabrook'],
            ],
            [
                'title' => 'Miles: The Autobiography',
                'year' => 1989,
                'description' => 'Miles Davis\'s candid memoir about his life, music, and creative struggles.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Simon & Schuster',
                'isbn' => '9780671695233',
                'pageCount' => 448,
                'authors' => ['Miles Davis', 'Quincy Troupe'],
            ],
            [
                'title' => 'Please Kill Me',
                'year' => 1996,
                'description' => 'An oral history of punk rock told through interviews with its key figures.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Grove Press',
                'isbn' => '9780802137158',
                'pageCount' => 448,
                'authors' => ['Legs McNeil', 'Gillian McCain'],
            ],
            [
                'title' => 'The History of Jazz',
                'year' => 1999,
                'description' => 'A concise overview of jazz history, styles, and major figures.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Oxford University Press',
                'isbn' => '9780195123754',
                'pageCount' => 384,
                'authors' => ['Ted Gioia'],
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
