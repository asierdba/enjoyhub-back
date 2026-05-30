<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class ThrillerBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Thriller']);

        $emotionMap = [
            'The Da Vinci Code' => 5,
            'The Girl on the Train' => 23,
            'The Bourne Identity' => 14,
            'The Silence of the Lambs' => 15,
            'The Girl with the Dragon Tattoo' => 15,
            'Shutter Island' => 16,
            'The Firm' => 13,
            'I Am Pilgrim' => 19,
            'Before I Go to Sleep' => 23,
            'The Reversal' => 14,
        ];

        $books = [
            [
                'title' => 'The Da Vinci Code',
                'year' => 2003,
                'description' => 'A symbologist and cryptologist race to solve a series of puzzles tied to a secret society.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Doubleday',
                'isbn' => '9780307474278',
                'pageCount' => 489,
                'authors' => ['Dan Brown'],
            ],
            [
                'title' => 'The Girl on the Train',
                'year' => 2015,
                'description' => 'A woman becomes entangled in a missing-person investigation after witnessing something from a train.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Riverhead Books',
                'isbn' => '9781594633669',
                'pageCount' => 336,
                'authors' => ['Paula Hawkins'],
            ],
            [
                'title' => 'The Bourne Identity',
                'year' => 1980,
                'description' => 'An amnesiac man struggles to discover his identity while hunted by assassins and agencies.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Richard Marek Publishers',
                'isbn' => '9780679724021',
                'pageCount' => 464,
                'authors' => ['Robert Ludlum'],
            ],
            [
                'title' => 'The Silence of the Lambs',
                'year' => 1988,
                'description' => 'An FBI trainee seeks help from an imprisoned cannibalistic serial killer to catch another murderer.',
                'image' => 'https://m.media-amazon.com/images/I/81OQ1Q7vKPL.jpg',
                'publisher' => 'St. Martin\'s Press',
                'isbn' => '9780312924584',
                'pageCount' => 352,
                'authors' => ['Thomas Harris'],
            ],
            [
                'title' => 'The Girl with the Dragon Tattoo',
                'year' => 2005,
                'description' => 'A journalist and a hacker investigate a decades-old disappearance in a wealthy family.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Norstedts Förlag',
                'isbn' => '9780307454546',
                'pageCount' => 465,
                'authors' => ['Stieg Larsson'],
            ],
            [
                'title' => 'Shutter Island',
                'year' => 2003,
                'description' => 'Two U.S. Marshals investigate the disappearance of a patient from a hospital for the criminally insane.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'William Morrow',
                'isbn' => '9780060893532',
                'pageCount' => 325,
                'authors' => ['Dennis Lehane'],
            ],
            [
                'title' => 'The Firm',
                'year' => 1991,
                'description' => 'A young lawyer joins a prestigious firm that hides deadly secrets and corruption.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Doubleday',
                'isbn' => '9780385334309',
                'pageCount' => 432,
                'authors' => ['John Grisham'],
            ],
            [
                'title' => 'I Am Pilgrim',
                'year' => 2013,
                'description' => 'A former intelligence agent is pulled back into a global manhunt for a brilliant terrorist.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Crown',
                'isbn' => '9780804136709',
                'pageCount' => 784,
                'authors' => ['Terry Hayes'],
            ],
            [
                'title' => 'Before I Go to Sleep',
                'year' => 2011,
                'description' => 'A woman with amnesia tries to piece together her life and discovers disturbing inconsistencies.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Crown Publishing Group',
                'isbn' => '9780307743657',
                'pageCount' => 352,
                'authors' => ['S.J. Watson'],
            ],
            [
                'title' => 'The Reversal',
                'year' => 2010,
                'description' => 'A high-profile retrial brings a defense attorney and prosecutor into a tense legal battle.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Doubleday',
                'isbn' => '9780385534246',
                'pageCount' => 448,
                'authors' => ['Michael Connelly'],
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
