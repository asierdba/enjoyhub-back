<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'userId'; // 👈 CLAVE PRIMARIA CORRECTA
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'email',
        'userName',
        'password',
        'role',
        'profileIcon',
    ];

    protected $hidden = [
        'password',
    ];

    public function lists()
    {
        return $this->hasMany(ListModel::class, 'userId', 'userId');
    }

    public function discarded()
    {
        return $this->hasMany(Discarded::class, 'userId', 'userId');
    }
}
