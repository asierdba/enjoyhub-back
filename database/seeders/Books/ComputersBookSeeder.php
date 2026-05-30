<?php

namespace Database\Seeders\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class ComputersBookSeeder extends Seeder
{
    public function run()
    {
        $genre = Genre::firstOrCreate(['name' => 'Computers']);

        $emotionMap = [
            'Clean Code' => 10,
            'The Pragmatic Programmer' => 9,
            'Introduction to Algorithms' => 10,
            'Design Patterns' => 10,
            'Code Complete' => 10,
            'Structure and Interpretation of Computer Programs' => 10,
            'Artificial Intelligence: A Modern Approach' => 9,
            'Refactoring' => 10,
            'The Mythical Man-Month' => 15,
            'Cracking the Coding Interview' => 21,
        ];

        $books = [
            [
                'title' => 'Clean Code',
                'year' => 2008,
                'description' => 'A handbook of agile software craftsmanship with practical coding principles.',
                'image' => 'https://m.media-amazon.com/images/I/41xShlnTZTL.jpg',
                'publisher' => 'Prentice Hall',
                'isbn' => '9780132350884',
                'pageCount' => 464,
                'authors' => ['Robert C. Martin'],
            ],
            [
                'title' => 'The Pragmatic Programmer',
                'year' => 1999,
                'description' => 'Practical advice and philosophies for software developers to improve their craft.',
                'image' => 'https://m.media-amazon.com/images/I/41uPjEenkFL.jpg',
                'publisher' => 'Addison-Wesley',
                'isbn' => '9780201616224',
                'pageCount' => 352,
                'authors' => ['Andrew Hunt', 'David Thomas'],
            ],
            [
                'title' => 'Introduction to Algorithms',
                'year' => 1990,
                'description' => 'Comprehensive textbook on algorithms and data structures used in computer science.',
                'image' => 'https://m.media-amazon.com/images/I/41SN2k3GqXL.jpg',
                'publisher' => 'MIT Press',
                'isbn' => '9780262033848',
                'pageCount' => 1312,
                'authors' => ['Thomas H. Cormen', 'Charles E. Leiserson', 'Ronald L. Rivest', 'Clifford Stein'],
            ],
            [
                'title' => 'Design Patterns',
                'year' => 1994,
                'description' => 'Elements of reusable object-oriented software; classic patterns for software design.',
                'image' => 'https://m.media-amazon.com/images/I/51kuc0iWJLL.jpg',
                'publisher' => 'Addison-Wesley',
                'isbn' => '9780201633610',
                'pageCount' => 395,
                'authors' => ['Erich Gamma', 'Richard Helm', 'Ralph Johnson', 'John Vlissides'],
            ],
            [
                'title' => 'Code Complete',
                'year' => 1993,
                'description' => 'A practical handbook of software construction covering coding techniques and best practices.',
                'image' => 'https://m.media-amazon.com/images/I/41jEbK-jG+L.jpg',
                'publisher' => 'Microsoft Press',
                'isbn' => '9780735619678',
                'pageCount' => 960,
                'authors' => ['Steve McConnell'],
            ],
            [
                'title' => 'Structure and Interpretation of Computer Programs',
                'year' => 1985,
                'description' => 'Foundational text on programming language design and abstraction techniques.',
                'image' => 'https://m.media-amazon.com/images/I/41Q1Y2k3G-L.jpg',
                'publisher' => 'MIT Press',
                'isbn' => '9780262510875',
                'pageCount' => 657,
                'authors' => ['Harold Abelson', 'Gerald Jay Sussman'],
            ],
            [
                'title' => 'Artificial Intelligence: A Modern Approach',
                'year' => 1995,
                'description' => 'Comprehensive introduction to AI covering theory, algorithms, and applications.',
                'image' => 'https://m.media-amazon.com/images/I/41+e3refnZL.jpg',
                'publisher' => 'Pearson',
                'isbn' => '9780137903955',
                'pageCount' => 1152,
                'authors' => ['Stuart Russell', 'Peter Norvig'],
            ],
            [
                'title' => 'Refactoring',
                'year' => 1999,
                'description' => 'Improving the design of existing code through small, behavior-preserving transformations.',
                'image' => 'https://m.media-amazon.com/images/I/41Q9Q0k2wLL.jpg',
                'publisher' => 'Addison-Wesley',
                'isbn' => '9780201485677',
                'pageCount' => 448,
                'authors' => ['Martin Fowler'],
            ],
            [
                'title' => 'The Mythical Man-Month',
                'year' => 1975,
                'description' => 'Essays on software engineering and project management; lessons from large projects.',
                'image' => 'https://m.media-amazon.com/images/I/41b0b0k2wLL.jpg',
                'publisher' => 'Addison-Wesley',
                'isbn' => '9780201835953',
                'pageCount' => 336,
                'authors' => ['Frederick P. Brooks Jr.'],
            ],
            [
                'title' => 'Cracking the Coding Interview',
                'year' => 2015,
                'description' => 'Interview preparation guide with programming questions and solutions for software roles.',
                'image' => 'https://m.media-amazon.com/images/I/41+e3refnZL.jpg',
                'publisher' => 'CareerCup',
                'isbn' => '9780984782857',
                'pageCount' => 687,
                'authors' => ['Gayle Laakmann McDowell'],
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
