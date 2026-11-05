<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ekitaldia;
use App\Enums\Egoera;

class EguneratuEgoerak extends Command
{
    // El nombre del comando que escribiremos en la terminal
    protected $signature = 'ekitaldiak:eguneratu';

    // Descripción para saber qué hace
    protected $description = 'Epez kanpo dauden ekitaldiak bukatuta egoerara pasa';

    public function handle()
    {
        // Buscamos eventos cuya fecha sea ANTERIOR a hoy
        // y que NO estén ya "Bukatuta" ni cancelados ("Bertan behera")
        $eguneratutakoak = Ekitaldia::where('ekitaldi_data', '<', now()->toDateString())
            ->whereNotIn('egoera', [Egoera::BUKATUTA, Egoera::BERTAN_BEHERA])
            ->update(['egoera' => Egoera::BUKATUTA]);
            
        $this->info("Guztira {$eguneratutakoak} ekitaldi eguneratu dira 'Bukatuta' egoerara.");
    }
}