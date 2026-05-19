<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discarded extends Model
{
    use HasFactory;

    protected $table = 'discarded';
    public $timestamps = false;

    protected $fillable = [
        'userId',
        'contentId',
    ];

    // RELACIÓN: este registro pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }

    // RELACIÓN: este registro pertenece a un contenido
    public function content()
    {
        return $this->belongsTo(Content::class, 'contentId', 'contentId');
    }
}

