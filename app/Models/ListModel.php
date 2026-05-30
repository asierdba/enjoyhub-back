<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListModel extends Model
{
    use HasFactory;

    protected $table = 'lists'; 
    protected $primaryKey = 'listId'; 
    public $timestamps = false; 

    protected $fillable = [
        'listName',
        'listDescription',
        'createdAt',
        'userId',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }

    public function contents()
    {
        return $this->belongsToMany(
            Content::class,
            'list_items', 
            'listId',     
            'contentId'   
        );
    }
}
