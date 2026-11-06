<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekitaldia;
use App\Models\User;
use Carbon\Carbon;
use App\Enums\Egoera;

class EkitaldiaSeeder extends Seeder
{
    public function run(): void
    {
        // Obtenemos el usuario admin
        $admin = User::where('Mota', 'Admin')
                    ->orWhere('Mota', 'admin')
                    ->first() ?? User::first();

        // Plantilla de eventos
        $ekitaldiMotak = [
            ['izenburua' => 'Goenkale: Azken Agurra', 'prezioa' => 12.50],
            ['izenburua' => 'Zinema: Dune Parte 3', 'prezioa' => 6.00],
            ['izenburua' => 'Bergarako Orfeoiaren Kontzertua', 'prezioa' => 0.00],
            ['izenburua' => 'Monologoak: Umorea Euskaraz', 'prezioa' => 8.00],
            ['izenburua' => 'Dantzari Eguna', 'prezioa' => 5.00],
            ['izenburua' => 'Bertso Saio Nagusia', 'prezioa' => 10.00],
            ['izenburua' => 'Haurrentzako Antzerkia: Pailazoak', 'prezioa' => 4.00],
        ];

        // 1. Generamos un array con posibles días de diferencia (desde -15 hasta +30 días)
        $egunakOffset = range(-15, 30);
        
        // 2. Desordenamos el array aleatoriamente
        shuffle($egunakOffset);
        
        // 3. Cogemos exactamente los primeros 15 valores únicos para nuestros 15 eventos
        $egunakAukeratuta = array_slice($egunakOffset, 0, 15);

        // Generamos 15 eventos
        for ($i = 0; $i < 15; $i++) {
            $mota = $ekitaldiMotak[array_rand($ekitaldiMotak)];
            $aforo = rand(100, 300);
            
            // Asignamos una fecha única sumando el offset elegido a la fecha de hoy
            // Usamos today() en vez de now() para que no arrastre las horas/minutos exactos
            $data = Carbon::today()->addDays($egunakAukeratuta[$i]);
            
            // Lógica de estado coherente con la fecha
            if ($data->isPast()) {
                // Si la fecha ya pasó, el evento obligatoriamente está terminado
                $egoeraAsignatuta = Egoera::BUKATUTA;
            } else {
                // Si la fecha es en el futuro, elegimos entre los otros estados
                $egoerakEtorkizuna = [
                    Egoera::AKTIBOA, 
                    Egoera::BERTAN_BEHERA, 
                    Egoera::AGORTUTA
                ];
                $egoeraAsignatuta = $egoerakEtorkizuna[array_rand($egoerakEtorkizuna)];
            }
            
            // Si el estado es Agortuta, forzamos que el aforo libre sea 0
            $aforoLibrea = ($egoeraAsignatuta === Egoera::AGORTUTA) ? 0 : rand(10, $aforo);

            Ekitaldia::create([
                'izenburua'      => $mota['izenburua'] ,
                'deskripzioa'    => 'Bergarako Antzokian ospatuko den ' . $mota['izenburua'] . ' ekitaldiaren deskripzio orokorra.',
                'ekitaldi_data'  => $data,
                'ordua'          => sprintf('%02d:00:00', rand(17, 21)),
                'irudia'         => null,
                'aforo'          => $aforo,
                'aforo_librea'   => $aforoLibrea,
                'egoera'         => $egoeraAsignatuta->value ?? $egoeraAsignatuta,
                'prezio_sarrera' => $mota['prezioa'],
                'id_sortzailea'  => $admin ? $admin->id : null,
            ]);
        }
    }
}