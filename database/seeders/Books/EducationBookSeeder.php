<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class EducationBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Education']);

        $emotionMap = [
            'Pedagogy of the Oppressed' => 19,
            'How Children Succeed' => 13,
            'Visible Learning' => 10,
            'The Smartest Kids in the World' => 13,
            'Mindset' => 13,
            'The Courage to Teach' => 16,
            'Teach Like a Champion' => 21,
            'The End of Average' => 10,
            'Why Don’t Students Like School?' => 10,
            'Creating Innovators' => 9,
        ];

        $books = [
            [
                'title' => 'Pedagogy of the Oppressed',
                'year' => 1968,
                'description' => 'A foundational work on critical pedagogy and education for liberation.',
                'image' => 'https://m.media-amazon.com/images/I/81Otwki3O8L.jpg',
                'publisher' => 'Continuum',
                'isbn' => '9780826412768',
                'pageCount' => 192,
                'authors' => ['Paulo Freire'],
            ],
            [
                'title' => 'How Children Succeed',
                'year' => 2012,
                'description' => 'Explores non-cognitive skills and the role of character in academic success.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Houghton Mifflin Harcourt',
                'isbn' => '9780544107036',
                'pageCount' => 320,
                'authors' => ['Paul Tough'],
            ],
            [
                'title' => 'Visible Learning',
                'year' => 2009,
                'description' => 'A synthesis of research on what works best in education and teaching practice.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Routledge',
                'isbn' => '9780415476188',
                'pageCount' => 432,
                'authors' => ['John Hattie'],
            ],
            [
                'title' => 'The Smartest Kids in the World',
                'year' => 2013,
                'description' => 'American exchange students explore high-performing education systems abroad.',
                'image' => 'https://m.media-amazon.com/images/I/81WcnNQ-TBL.jpg',
                'publisher' => 'Scribner',
                'isbn' => '9781476735946',
                'pageCount' => 352,
                'authors' => ['Amanda Ripley'],
            ],
            [
                'title' => 'Mindset',
                'year' => 2006,
                'description' => 'How a growth mindset fosters learning, resilience, and achievement.',
                'image' => 'https://m.media-amazon.com/images/I/81eB+7+CkUL.jpg',
                'publisher' => 'Random House',
                'isbn' => '9780345472328',
                'pageCount' => 320,
                'authors' => ['Carol S. Dweck'],
            ],
            [
                'title' => 'The Courage to Teach',
                'year' => 1998,
                'description' => 'Reflections on the inner life of teachers and the art of teaching.',
                'image' => 'https://m.media-amazon.com/images/I/81Q1Y2k3G-L.jpg',
                'publisher' => 'Jossey-Bass',
                'isbn' => '9780787976059',
                'pageCount' => 240,
                'authors' => ['Parker J. Palmer'],
            ],
            [
                'title' => 'Teach Like a Champion',
                'year' => 2010,
                'description' => 'Practical teaching techniques and strategies to improve classroom practice.',
                'image' => 'https://m.media-amazon.com/images/I/81t2CVWEsUL.jpg',
                'publisher' => 'Jossey-Bass',
                'isbn' => '9781118901852',
                'pageCount' => 320,
                'authors' => ['Doug Lemov'],
            ],
            [
                'title' => 'The End of Average',
                'year' => 2016,
                'description' => 'Argues for personalized approaches to education and talent development.',
                'image' => 'https://m.media-amazon.com/images/I/81af+MCATTL.jpg',
                'publisher' => 'HarperOne',
                'isbn' => '9780062358363',
                'pageCount' => 320,
                'authors' => ['Todd Rose'],
            ],
            [
                'title' => 'Why Don’t Students Like School?',
                'year' => 2004,
                'description' => 'A cognitive scientist explains how to make learning more engaging and effective.',
                'image' => 'https://m.media-amazon.com/images/I/81r5Z7lZx-L.jpg',
                'publisher' => 'Jossey-Bass',
                'isbn' => '9780787975151',
                'pageCount' => 256,
                'authors' => ['Daniel T. Willingham'],
            ],
            [
                'title' => 'Creating Innovators',
                'year' => 2012,
                'description' => 'How to nurture the next generation of innovators through education and parenting.',
                'image' => 'https://m.media-amazon.com/images/I/81p7LZ7YJ-L.jpg',
                'publisher' => 'Simon & Schuster',
                'isbn' => '9781451655811',
                'pageCount' => 320,
                'authors' => ['Tony Wagner'],
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
