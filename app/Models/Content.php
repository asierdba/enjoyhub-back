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


    public function emotion()
    {
        return $this->belongsTo(Emotion::class, 'emotionId', 'emotionId');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_content', 'contentId', 'genreId');
    }


    public function authors()
    {
        return $this->belongsToMany(
            Author::class,
            'authors_book',
            'contentId',
            'authorId'
        );
    }

    public function lists()
    {
        return $this->belongsToMany(
            ListModel::class,
            'list_items',
            'contentId',
            'listId'
        );
    }


    public function book()
    {
        return $this->hasOne(Book::class, 'contentId', 'contentId');
    }
}

