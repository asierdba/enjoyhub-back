<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'contentId'; // 👈 clave primaria es contentId
    public $incrementing = false;        // 👈 porque NO es autoincremental
    public $timestamps = false;          // 👈 tu tabla no tiene timestamps

    protected $fillable = [
        'contentId',
        'publisher',
        'isbn',
        'pageCount',
    ];

    // RELACIÓN: un libro pertenece a un contenido (1:1)
    public function content()
    {
        return $this->belongsTo(Content::class, 'contentId', 'contentId');
    }
}
