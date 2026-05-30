<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    protected $primaryKey = 'emotionId';
    public $timestamps = false;

    protected $fillable = ['emotionName'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'emotion_genre', 'emotionId', 'genreId');
    }
}


