<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreContent extends Model
{
    use HasFactory;

    protected $table = 'genre_content'; // 👈 nombre real de la tabla pivot
    public $timestamps = false;         // 👈 no tienes created_at ni updated_at

    protected $fillable = [
        'genreId',
        'contentId',
    ];

    // RELACIÓN: este registro pertenece a un género
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genreId', 'genreId');
    }

    // RELACIÓN: este registro pertenece a un contenido
    public function content()
    {
        return $this->belongsTo(Content::class, 'contentId', 'contentId');
    }
}

