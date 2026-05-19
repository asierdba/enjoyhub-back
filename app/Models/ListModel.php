<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListModel extends Model
{
    use HasFactory;

    protected $table = 'lists'; // 👈 nombre real de la tabla
    protected $primaryKey = 'listId'; // 👈 clave primaria correcta
    public $timestamps = false; // 👈 tu tabla NO tiene created_at ni updated_at

    protected $fillable = [
        'listName',
        'listDescription',
        'createdAt',
        'userId',
    ];

    // RELACIÓN: una lista pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }

    // RELACIÓN: una lista tiene muchos contenidos (N:N)
    public function contents()
    {
        return $this->belongsToMany(
            Content::class,
            'list_items',   // tabla pivote
            'listId',       // FK en list_items que apunta a esta tabla
            'contentId'     // FK en list_items que apunta a contents
        );
    }
}
