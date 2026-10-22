<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekitaldia extends Model
{
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

    /**
     * Conversión automática de tipos de datos.
     */
    protected $casts = [
        'ekitaldi_data' => 'date',
        'prezio_sarrera' => 'decimal:2',
        'aforo' => 'integer',
        'aforo_librea' => 'integer',
    ];

    public function sortzailea()
    {
        return $this->belongsTo(User::class, 'id_sortzailea');
    }

    public function sarrerak()
    {
        return $this->hasMany(Sarrera::class, 'id_ekitaldia');
    }
}