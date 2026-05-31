<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorsBook extends Model
{
    use HasFactory;

    protected $table = 'authors_book';
    public $timestamps = false;       

    protected $fillable = [
        'authorId',
        'contentId',
    ];

 
    public function author()
    {
        return $this->belongsTo(Author::class, 'authorId', 'authorId');
    }


    public function content()
    {
        return $this->belongsTo(Content::class, 'contentId', 'contentId');
    }
}
