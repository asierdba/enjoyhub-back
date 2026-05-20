<?php

namespace App\Models;

<<<<<<< HEAD
=======
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
>>>>>>> bdbe679b18d15ce63557224e84bcdf44b4ec0901
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
<<<<<<< HEAD
    use HasFactory, Notifiable;

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

=======
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
>>>>>>> bdbe679b18d15ce63557224e84bcdf44b4ec0901
