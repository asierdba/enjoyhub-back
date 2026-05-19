<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    use HasFactory;

    protected $table = 'list_items'; // 👈 nombre real de la tabla pivot
    public $timestamps = false;      // 👈 no tienes created_at ni updated_at

    protected $fillable = [
        'listId',
        'contentId',
    ];

    // RELACIÓN: este item pertenece a una lista
    public function list()
    {
        return $this->belongsTo(ListModel::class, 'listId', 'listId');
    }

    // RELACIÓN: este item pertenece a un contenido
    public function content()
    {
        return $this->belongsTo(Content::class, 'contentId', 'contentId');
    }
}

