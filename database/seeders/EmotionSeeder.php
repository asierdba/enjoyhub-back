<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Emotion;

class EmotionSeeder extends Seeder
{
    public function run()
    {
        $emotions = [
            'calm',
            'happy',
            'sad',
            'intense',
            'dark',
            'romantic',
            'adventurous',
            'nostalgic',
            'inspiring',
            'reflective',
        ];

        foreach ($emotions as $name) {
            Emotion::firstOrCreate(['emotionName' => $name]);
        }
    }
}
