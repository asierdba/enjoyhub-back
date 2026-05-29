<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';      // 👈 nombre real de la tabla
    protected $primaryKey = 'genreId';
    public $timestamps = false;       // 👈 tu tabla no tiene created_at ni updated_at

    protected $fillable = [
        'name',
    ];

    // RELACIÓN: un género tiene muchos contenidos (N:N)
    public function contents()
    {
        return $this->belongsToMany(
            Content::class,
            'genre_content',   // tabla pivote
            'genreId',         // FK en genre_content que apunta a genres
            'contentId'        // FK en genre_content que apunta a contents
        );
    }
}

