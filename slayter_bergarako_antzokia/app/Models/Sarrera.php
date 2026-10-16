<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sarrera extends Model
{
    // Forzamos el nombre de la tabla
    protected $table = 'sarrerak';

    protected $fillable = [
        'data_erosketa',
        'kantitatea',
        'id_erabiltzaile',
        'id_ekitaldia',
    ];

    // La entrada pertenece a un usuario
    public function erabiltzailea()
    {
        return $this->belongsTo(User::class, 'id_erabiltzaile');
    }

    // La entrada pertenece a un evento
    public function ekitaldia()
    {
        return $this->belongsTo(Ekitaldia::class, 'id_ekitaldia');
    }
}