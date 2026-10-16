<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekitaldia extends Model
{
    // Forzamos el nombre de la tabla para que no lo pluralice en inglés a "ekitaldias"
    protected $table = 'ekitaldiak';

    protected $fillable = [
        'izenburua',
        'deskripzioa',
        'ekitaldi_data',
        'ordua',
        'irudia',
        'aforo',
        'aforo_librea',
        'egoera',
        'prezio_sarrera',
        'id_sortzailea',
    ];

    // El evento pertenece a un usuario creador
    public function sortzailea()
    {
        return $this->belongsTo(User::class, 'id_sortzailea');
    }

    // Un evento puede tener muchas entradas vendidas
    public function sarrerak()
    {
        return $this->hasMany(Sarrera::class, 'id_ekitaldia');
    }
}