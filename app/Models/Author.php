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


    public function contents()
    {
        return $this->belongsToMany(
            Content::class,
            'authors_book',   
            'authorId',      
            'contentId'      
        );
    }
}

