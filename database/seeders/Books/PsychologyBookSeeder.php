<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class PsychologyBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Psychology']);

        $emotionMap = [
            'Thinking, Fast and Slow' => 10,
            "Man's Search for Meaning" => 16,
            'Influence: The Psychology of Persuasion' => 21,
            'The Interpretation of Dreams' => 2,
            'Flow: The Psychology of Optimal Experience' => 13,
            'The Power of Habit' => 21,
            'Attachment in Psychotherapy' => 16,
            'The Man Who Mistook His Wife for a Hat' => 14,
            "Quiet: The Power of Introverts in a World That Can't Stop Talking" => 11,
            'Thinking in Systems' => 9,
        ];

        $books = [
            [
                'title' => 'Thinking, Fast and Slow',
                'year' => 2011,
                'description' => 'Kahneman explores two systems of thought and how they shape judgment and decision-making.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Farrar, Straus and Giroux',
                'isbn' => '9780374533557',
                'pageCount' => 512,
                'authors' => ['Daniel Kahneman'],
            ],
            [
                'title' => "Man's Search for Meaning",
                'year' => 1946,
                'description' => 'Viktor Frankl’s reflections on finding purpose and resilience under extreme suffering.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Beacon Press',
                'isbn' => '9780807014295',
                'pageCount' => 200,
                'authors' => ['Viktor E. Frankl'],
            ],
            [
                'title' => 'Influence: The Psychology of Persuasion',
                'year' => 1984,
                'description' => 'Cialdini outlines key principles that drive people to say yes and how to apply them ethically.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Harper Business',
                'isbn' => '9780061241895',
                'pageCount' => 336,
                'authors' => ['Robert B. Cialdini'],
            ],
            [
                'title' => 'The Interpretation of Dreams',
                'year' => 1899,
                'description' => 'Freud’s foundational work proposing that dreams reveal unconscious desires and conflicts.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Basic Books',
                'isbn' => '9780465019779',
                'pageCount' => 640,
                'authors' => ['Sigmund Freud'],
            ],
            [
                'title' => 'Flow: The Psychology of Optimal Experience',
                'year' => 1990,
                'description' => 'Csikszentmihalyi examines the state of flow and how it contributes to happiness and performance.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Harper & Row',
                'isbn' => '9780061339202',
                'pageCount' => 336,
                'authors' => ['Mihaly Csikszentmihalyi'],
            ],
            [
                'title' => 'The Power of Habit',
                'year' => 2012,
                'description' => 'Duhigg explains how habits form and how to change them to improve life and organizations.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Random House',
                'isbn' => '9780812981605',
                'pageCount' => 371,
                'authors' => ['Charles Duhigg'],
            ],
            [
                'title' => 'Attachment in Psychotherapy',
                'year' => 2006,
                'description' => 'A clinical guide to attachment theory and its application in therapeutic settings.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'Guilford Press',
                'isbn' => '9781606230176',
                'pageCount' => 448,
                'authors' => ['David J. Wallin'],
            ],
            [
                'title' => 'The Man Who Mistook His Wife for a Hat',
                'year' => 1985,
                'description' => 'Oliver Sacks presents case studies of neurological disorders and their human stories.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Picador',
                'isbn' => '9780684853949',
                'pageCount' => 224,
                'authors' => ['Oliver Sacks'],
            ],
            [
                'title' => "Quiet: The Power of Introverts in a World That Can't Stop Talking",
                'year' => 2012,
                'description' => 'An exploration of introversion, creativity, and how society undervalues quiet strengths.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Crown Publishing Group',
                'isbn' => '9780307352156',
                'pageCount' => 352,
                'authors' => ['Susan Cain'],
            ],
            [
                'title' => 'Thinking in Systems',
                'year' => 2008,
                'description' => 'A primer on systems thinking and how to analyze complex problems and feedback loops.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Chelsea Green Publishing',
                'isbn' => '9781603580557',
                'pageCount' => 240,
                'authors' => ['Donella H. Meadows'],
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
