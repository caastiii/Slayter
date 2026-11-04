<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekitaldia;
use App\Models\User;
use Carbon\Carbon;

class EkitaldiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtenemos el usuario admin (soportando mayúsculas/minúsculas)
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

        // Estados válidos para el campo 'egoera'
        $egoerak = ['aktiboa', 'desaktibatuta', 'bertan behera'];

        // Generamos 15 eventos
        for ($i = 1; $i <= 15; $i++) {
            $mota = $ekitaldiMotak[array_rand($ekitaldiMotak)];
            $aforo = rand(100, 300);

            Ekitaldia::create([
                'izenburua'      => $mota['izenburua'] ,
                'deskripzioa'    => 'Bergarako Antzokian ospatuko den ' . $mota['izenburua'] . ' ekitaldiaren deskripzio orokorra.',
                'ekitaldi_data'  => Carbon::now()->addDays(($i * 10) + rand(1, 5)),
                'ordua'          => sprintf('%02d:00:00', rand(17, 21)),
                'irudia'         => null,
                'aforo'          => $aforo,
                'aforo_librea'   => rand(10, $aforo),
                'egoera'         => $egoerak[array_rand($egoerak)], // Solo valores permitidos ('aktiboa', 'desaktibatuta', 'bertan behera')
                'prezio_sarrera' => $mota['prezioa'],
                'id_sortzailea'  => $admin ? $admin->id : null,
            ]);
        }
    }
}