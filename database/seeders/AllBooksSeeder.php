<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AllBooksSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            \Database\Seeders\Books\FictionBookSeeder::class,
            \Database\Seeders\Books\FantasyBookSeeder::class,
            \Database\Seeders\Books\RomanceBookSeeder::class,
            \Database\Seeders\Books\HorrorBookSeeder::class,
            \Database\Seeders\Books\MysteryBookSeeder::class,
            \Database\Seeders\Books\ThrillerBookSeeder::class,
            \Database\Seeders\Books\ScienceFictionBookSeeder::class,
            \Database\Seeders\Books\HistoricalBookSeeder::class,
            \Database\Seeders\Books\PoetryBookSeeder::class,
            \Database\Seeders\Books\DramaBookSeeder::class,
            \Database\Seeders\Books\BiographyBookSeeder::class,
            \Database\Seeders\Books\SelfHelpBookSeeder::class,
            \Database\Seeders\Books\HealthFitnessBookSeeder::class,
            \Database\Seeders\Books\CookingBookSeeder::class,
            \Database\Seeders\Books\ArtBookSeeder::class,
            \Database\Seeders\Books\PhotographyBookSeeder::class,
            \Database\Seeders\Books\ReligionBookSeeder::class,
            \Database\Seeders\Books\PhilosophyBookSeeder::class,
            \Database\Seeders\Books\PsychologyBookSeeder::class,
            \Database\Seeders\Books\BusinessEconomicsBookSeeder::class,
            \Database\Seeders\Books\ComputersBookSeeder::class,
            \Database\Seeders\Books\TechnologyBookSeeder::class,
            \Database\Seeders\Books\EducationBookSeeder::class,
            \Database\Seeders\Books\TravelBookSeeder::class,
            \Database\Seeders\Books\MusicBookSeeder::class,
            \Database\Seeders\Books\ComicsGraphicNovelsBookSeeder::class,
            \Database\Seeders\Books\JuvenileFictionBookSeeder::class,
            \Database\Seeders\Books\YoungAdultFictionBookSeeder::class,
        ]);
    }
}
