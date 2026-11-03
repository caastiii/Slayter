<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekitaldia;
use Carbon\Carbon;

class EkitaldiaSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear 5 eventos PASADOS de fecha (hace entre 1 y 30 días)
        for ($i = 1; $i <= 5; $i++) {
            Ekitaldia::create([
                'izenburua' => 'Ekitaldi Pasatua ' . $i,
                'deskripzioa' => 'Iraganeko ekitaldi honen deskripzioa. Ez litzateke hasierako orrian agertu behar.',
                'ekitaldi_data' => Carbon::now()->subDays(rand(1, 30)),
                'ordua' => '19:30:00',
                'irudia' => null, 
                'aforo' => 150,
                'aforo_librea' => 0, // Simulamos que se llenó
                'egoera' => 'amaituta',
                'prezio_sarrera' => rand(10, 25),
                'id_sortzailea' => 1,
            ]);
        }

        // 2. Crear 10 eventos FUTUROS (dentro de entre 1 y 60 días)
        for ($i = 1; $i <= 10; $i++) {
            Ekitaldia::create([
                'izenburua' => 'Datorren Ekitaldia ' . $i,
                'deskripzioa' => 'Hau etorkizuneko ' . $i . '. ekitaldiaren deskripzioa da Bergarako Antzokian.',
                'ekitaldi_data' => Carbon::now()->addDays(rand(1, 60)), 
                'ordua' => '19:00:00',
                'irudia' => null, 
                'aforo' => 150,
                'aforo_librea' => 150,
                'egoera' => 'aktiboa',
                'prezio_sarrera' => rand(10, 25),
                'id_sortzailea' => 1,
            ]);
        }
    }
}