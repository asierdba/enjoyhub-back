<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';
    protected $primaryKey = 'authorId';
    public $timestamps = false;

    protected $fillable = [
        'authorName',
    ];

    // RELACIÓN: un autor tiene muchos contenidos (N:N)
    public function contents()
    {
        return $this->belongsToMany(
            Content::class,
            'authors_book',   // tabla pivote
            'authorId',       // FK en authors_book que apunta a authors
            'contentId'       // FK en authors_book que apunta a contents
        );
    }
}

