<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $primaryKey = 'listId'; 
    public $timestamps = false;

    protected $fillable = [
        'userId',
        'name',
        'description'
    ];
}
