<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // Usuarios de prueba
=======
        // User::factory(10)->create();

>>>>>>> bdbe679b18d15ce63557224e84bcdf44b4ec0901
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
<<<<<<< HEAD


        $this->call(EmotionSeeder::class);
    }
}

=======
    }
}
>>>>>>> bdbe679b18d15ce63557224e84bcdf44b4ec0901
