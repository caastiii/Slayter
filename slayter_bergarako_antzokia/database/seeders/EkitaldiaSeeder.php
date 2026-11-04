<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekitaldia;
use App\Models\User;
use Carbon\Carbon;
use App\Enums\Egoera; // <-- 1. Importamos el Enum

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

        // 2. Usamos los Enums directamente
        $egoerak = [
            Egoera::AKTIBOA, 
            Egoera::BERTAN_BEHERA, 
            Egoera::BUKATUTA, 
            Egoera::AGORTUTA
        ];

        // Generamos 15 eventos
        for ($i = 1; $i <= 15; $i++) {
            $mota = $ekitaldiMotak[array_rand($ekitaldiMotak)];
            $aforo = rand(100, 300);
            
            // Elegimos un estado al azar
            $egoeraAsignatuta = $egoerak[array_rand($egoerak)];
            
            // 3. Si el estado es Agortuta, forzamos que el aforo libre sea 0. Si no, calculamos uno aleatorio.
            $aforoLibrea = ($egoeraAsignatuta === Egoera::AGORTUTA) ? 0 : rand(10, $aforo);

            Ekitaldia::create([
                'izenburua'      => $mota['izenburua'],
                'deskripzioa'    => 'Bergarako Antzokian ospatuko den ' . $mota['izenburua'] . ' ekitaldiaren deskripzio orokorra.',
                'ekitaldi_data'  => Carbon::now()->addDays(($i * 10) + rand(1, 5)), // Arreglado el typo
                'ordua'          => sprintf('%02d:00:00', rand(17, 21)),
                'irudia'         => null,
                'aforo'          => $aforo,
                'aforo_librea'   => $aforoLibrea, // Variable calculada arriba
                'egoera'         => $egoeraAsignatuta, // Asignamos el Enum
                'prezio_sarrera' => $mota['prezioa'],
                'id_sortzailea'  => $admin ? $admin->id : null,
            ]);
        }
    }
}