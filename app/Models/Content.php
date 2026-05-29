<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'contents';
    protected $primaryKey = 'contentId';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'releaseYear',
        'description',
        'image',
        'type',
        'emotionId',
    ];

    // RELACIÓN: un contenido pertenece a una emoción
    public function emotion()
    {
        return $this->belongsTo(Emotion::class, 'emotionId', 'emotionId');
    }

    // RELACIÓN: un contenido tiene muchos géneros (N:N)
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_content', 'contentId', 'genreId');
    }

    // RELACIÓN: un contenido tiene muchos autores (N:N)
    public function authors()
    {
        return $this->belongsToMany(
            Author::class,
            'authors_book',
            'contentId',
            'authorId'
        );
    }

    // RELACIÓN: un contenido puede estar en muchas listas (N:N)
    public function lists()
    {
        return $this->belongsToMany(
            ListModel::class,
            'list_items',
            'contentId',
            'listId'
        );
    }

    // RELACIÓN: un contenido puede tener un libro asociado (1:1)
    public function book()
    {
        return $this->hasOne(Book::class, 'contentId', 'contentId');
    }
}

