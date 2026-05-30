<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreContent extends Model
{
    use HasFactory;

    protected $table = 'genre_content';
    public $timestamps = false;      

    protected $fillable = [
        'genreId',
        'contentId',
    ];


    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genreId', 'genreId');
    }


    public function content()
    {
        return $this->belongsTo(Content::class, 'contentId', 'contentId');
    }
}

