<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorsBook extends Model
{
    use HasFactory;

    protected $table = 'authors_book'; // 👈 nombre real de la tabla pivot
    public $timestamps = false;        // 👈 no tienes created_at ni updated_at

    protected $fillable = [
        'authorId',
        'contentId',
    ];

    // RELACIÓN: este registro pertenece a un autor
    public function author()
    {
        return $this->belongsTo(Author::class, 'authorId', 'authorId');
    }

    // RELACIÓN: este registro pertenece a un contenido
    public function content()
    {
        return $this->belongsTo(Content::class, 'contentId', 'contentId');
    }
}
