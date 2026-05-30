<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'contentId'; 
    public $incrementing = false;       
    public $timestamps = false;        

    protected $fillable = [
        'contentId',
        'publisher',
        'isbn',
        'pageCount',
    ];


    public function content()
    {
        return $this->belongsTo(Content::class, 'contentId', 'contentId');
    }
}
