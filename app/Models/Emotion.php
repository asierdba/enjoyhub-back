<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    use HasFactory;

    protected $table = 'emotions';
    protected $primaryKey = 'emotionId';
    public $timestamps = false;

    protected $fillable = [
        'emotionName',
    ];

    // RELACIÓN: una emoción tiene muchos contenidos (1:N)
    public function contents()
    {
        return $this->hasMany(Content::class, 'emotionId', 'emotionId');
    }
}

