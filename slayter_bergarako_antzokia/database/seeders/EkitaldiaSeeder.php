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
        // Obtenemos el usuario admin
        $admin = User::where('Mota', 'admin')->first() ?? User::first();

        // Plantilla de tipos de eventos para variar los datos
        $ekitaldiMotak = [
            ['izenburua' => 'Goenkale: Azken Agurra', 'egoera' => 'Antzerkia', 'prezioa' => 12.50],
            ['izenburua' => 'Zinema: Dune Parte 3', 'egoera' => 'Zinema', 'prezioa' => 6.00],
            ['izenburua' => 'Bergarako Orfeoiaren Kontzertua', 'egoera' => 'Musika', 'prezioa' => 0.00],
            ['izenburua' => 'Monologoak: Umorea Euskaraz', 'egoera' => 'Umorea', 'prezioa' => 8.00],
            ['izenburua' => 'Dantzari Eguna', 'egoera' => 'Dantza', 'prezioa' => 5.00],
            ['izenburua' => 'Bertso Saio Nagusia', 'egoera' => 'Kultura', 'prezioa' => 10.00],
            ['izenburua' => 'Haurrentzako Antzerkia: Pailazoak', 'egoera' => 'Haurrak', 'prezioa' => 4.00],
        ];

        // Generamos 15 eventos repartidos entre los próximos 15 días y los próximos 12 meses
        for ($i = 1; $i <= 15; $i++) {
            $mota = $ekitaldiMotak[array_rand($ekitaldiMotak)];
            $aforo = rand(100, 300);

            Ekitaldia::create([
                'izenburua'      => $mota['izenburua'] . ' #' . $i,
                'deskripzioa'    => 'Bergarako Antzokian ospatuko den ' . $mota['izenburua'] . ' ekitaldiaren deskripzio orokorra.',
                // Reparte las fechas dinámicamente desde dentro de 3 días hasta dentro de 360 días
                'ekitaldi_data'  => Carbon::now()->addDays($i * 20 + rand(1, 10)),
                'ordua'          => sprintf('%02d:00:00', rand(17, 21)), // Horas entre las 17:00 y las 21:00
                'irudia'         => null,
                'aforo'          => $aforo,
                'aforo_librea'   => rand(10, $aforo),
                'egoera'         => $mota['egoera'],
                'prezio_sarrera' => $mota['prezioa'],
                'id_sortzailea'  => $admin->id,
            ]);
        }
    }
}