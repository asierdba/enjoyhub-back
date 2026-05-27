<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Usuarios de prueba

        User::factory()->create([
            'userName' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(EmotionSeeder::class);
        $this->call(GenreSeeder::class);

    }
}
