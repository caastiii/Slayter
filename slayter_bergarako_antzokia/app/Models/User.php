<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'Abizena',
        'Mota',
        'email',
        'password',
        'id_sortzailea',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Un usuario puede haber sido creado por otro usuario
    public function sortzailea()
    {
        return $this->belongsTo(User::class, 'id_sortzailea');
    }

    // Un usuario (Admin) puede crear muchos eventos
    public function ekitaldiak()
    {
        return $this->hasMany(Ekitaldia::class, 'id_sortzailea');
    }

    // Un usuario puede comprar muchas entradas
    public function sarrerak()
    {
        return $this->hasMany(Sarrera::class, 'id_erabiltzaile');
    }
}