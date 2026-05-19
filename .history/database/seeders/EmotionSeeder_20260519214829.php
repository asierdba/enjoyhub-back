<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Emotion;

class EmotionSeeder extends Seeder
{
    public function run()
    {
        $emotions = config('emotions');

        foreach ($emotions as $name) {
            Emotion::firstOrCreate(['emotionName' => $name]);
        }
    }
}
