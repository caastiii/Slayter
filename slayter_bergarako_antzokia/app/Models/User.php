<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Si quieres usar tus propios nombres para login en vez de los de Laravel por defecto:
    public function getAuthPassword() { return $this->Pasahitza; }
    public function getAuthIdentifierName() { return 'Korreoa'; }

    protected $fillable = [
        'Izena',
        'Abizena',
        'Mota',
        'Korreoa',
        'Pasahitza',
        'id_sortzailea',
    ];

    protected $hidden = [
        'Pasahitza',
    ];

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