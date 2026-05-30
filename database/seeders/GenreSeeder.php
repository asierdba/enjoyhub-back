<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = [
            'Fiction',
            'Fantasy',
            'Romance',
            'Horror',
            'Mystery',
            'Thriller',
            'Science Fiction',
            'Historical',
            'Poetry',
            'Drama',
            'Biography & Autobiography',
            'Self-Help',
            'Health & Fitness',
            'Cooking',
            'Art',
            'Photography',
            'Religion',
            'Philosophy',
            'Psychology',
            'Business & Economics',
            'Computers',
            'Technology',
            'Education',
            'Travel',
            'Music',
            'Comics & Graphic Novels',
            'Juvenile Fiction',
            'Young Adult Fiction',
        ];

        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'name' => $genre,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
