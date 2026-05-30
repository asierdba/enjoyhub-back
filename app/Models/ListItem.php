<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    use HasFactory;

    protected $table = 'list_items';
    public $timestamps = false;    

    protected $fillable = [
        'listId',
        'contentId',
    ];

    public function list()
    {
        return $this->belongsTo(ListModel::class, 'listId', 'listId');
    }
    public function content()
    {
        return $this->belongsTo(Content::class, 'contentId', 'contentId');
    }
}

