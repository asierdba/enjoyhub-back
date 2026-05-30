<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';      
    protected $primaryKey = 'genreId';
    public $timestamps = false;      

    protected $fillable = [
        'name',
    ];


    public function contents()
    {
        return $this->belongsToMany(
            Content::class,
            'genre_content', 
            'genreId',        
            'contentId'      
        );
    }
}

