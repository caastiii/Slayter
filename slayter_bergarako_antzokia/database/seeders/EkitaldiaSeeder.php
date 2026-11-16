<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use App\Models\Ekitaldia;
use App\Models\User;
use Carbon\Carbon;
use App\Enums\Egoera;

class EkitaldiaSeeder extends Seeder
{
    public function run(): void
    {
        // Creamos el enlace simbólico public/storage si todavía no existe
        if (!file_exists(public_path('storage'))) {
            Artisan::call('storage:link');
        }

        // Creamos la carpeta por si aún no existe
        Storage::disk('public')->makeDirectory('ekitaldiak');

        // Obtenemos el usuario admin
        $admin = User::where('Mota', 'Admin')
                    ->orWhere('Mota', 'admin')
                    ->first() ?? User::first();

        // Plantilla de eventos con su imagen asociada según temática (5 imágenes)
        $ekitaldiMotak = [
            ['izenburua' => 'Goenkale: Azken Agurra', 'prezioa' => 12.50, 'irudia' => 'ekitaldiak/antzerkia.jpg'],
            ['izenburua' => 'Hamlet: Gau Tragedia', 'prezioa' => 15.00, 'irudia' => 'ekitaldiak/antzerkia.jpg'],
            ['izenburua' => 'Haurrentzako Antzerkia: Pailazoak', 'prezioa' => 4.00, 'irudia' => 'ekitaldiak/antzerkia.jpg'],

            ['izenburua' => 'Zinema: Dune Parte 3', 'prezioa' => 6.00, 'irudia' => 'ekitaldiak/zinema.jpg'],
            ['izenburua' => 'Zinekluba: Klasikoak Pantaila Handian', 'prezioa' => 4.50, 'irudia' => 'ekitaldiak/zinema.jpg'],

            ['izenburua' => 'Bergarako Orfeoiaren Kontzertua', 'prezioa' => 0.00, 'irudia' => 'ekitaldiak/musika.jpg'],
            ['izenburua' => 'Euskadiko Orkestra Sinfonikoa', 'prezioa' => 18.00, 'irudia' => 'ekitaldiak/musika.jpg'],
            ['izenburua' => 'Zarzuela Gaua: Katiuska', 'prezioa' => 14.00, 'irudia' => 'ekitaldiak/musika.jpg'],

            ['izenburua' => 'Dantzari Eguna', 'prezioa' => 5.00, 'irudia' => 'ekitaldiak/dantza.jpg'],
            ['izenburua' => 'Gaua eta Itzalak: Dantza Garaikidea', 'prezioa' => 9.50, 'irudia' => 'ekitaldiak/dantza.jpg'],

            ['izenburua' => 'Monologoak: Umorea Euskaraz', 'prezioa' => 8.00, 'irudia' => 'ekitaldiak/umorea.jpg'],
            ['izenburua' => 'Bertso Saio Nagusia', 'prezioa' => 10.00, 'irudia' => 'ekitaldiak/umorea.jpg'],
        ];

        // Consultamos las fechas ya ocupadas en la BD para no repetir ninguna al lanzar varios seeds
        $erabilitakoDatak = Ekitaldia::pluck('ekitaldi_data')
            ->map(fn ($d) => Carbon::parse($d)->toDateString())
            ->toArray();

        // 9 fechas futuras libres (entre +1 y +180 días)
        $etorkizunekoEgunak = array_values(array_filter(range(1, 180), function ($offset) use ($erabilitakoDatak) {
            return !in_array(Carbon::today()->addDays($offset)->toDateString(), $erabilitakoDatak);
        }));
        shuffle($etorkizunekoEgunak);
        $etorkizunekoAukeratuak = array_slice($etorkizunekoEgunak, 0, 9);

        // 1 fecha pasada libre (entre -60 y -1 días) para tener un evento Bukatuta
        $iraganekoEgunak = array_values(array_filter(range(-60, -1), function ($offset) use ($erabilitakoDatak) {
            return !in_array(Carbon::today()->addDays($offset)->toDateString(), $erabilitakoDatak);
        }));
        shuffle($iraganekoEgunak);
        $iraganekoAukeratuak = array_slice($iraganekoEgunak, 0, 1);

        $egunakGuztira = array_merge($etorkizunekoAukeratuak, $iraganekoAukeratuak);

        // Distribución de los 9 eventos futuros: 7 Aktiboa, 1 Agortuta, 1 Bertan behera (+ 1 pasado Bukatuta = 10 total)
        $egoerakEtorkizuna = [
            Egoera::AKTIBOA,
            Egoera::AKTIBOA,
            Egoera::AKTIBOA,
            Egoera::AKTIBOA,
            Egoera::AKTIBOA,
            Egoera::AKTIBOA,
            Egoera::AKTIBOA,
            Egoera::AGORTUTA,
            Egoera::BERTAN_BEHERA,
        ];
        shuffle($egoerakEtorkizuna);
        shuffle($ekitaldiMotak);

        $etorkizunIndex = 0;

        foreach ($egunakGuztira as $index => $offset) {
            $mota = $ekitaldiMotak[$index % count($ekitaldiMotak)];
            $aforo = rand(120, 300);
            $data = Carbon::today()->addDays($offset);

            if ($data->isPast()) {
                $egoeraAsignatuta = Egoera::BUKATUTA;
            } else {
                $egoeraAsignatuta = $egoerakEtorkizuna[$etorkizunIndex];
                $etorkizunIndex++;
            }

            // Si está agotado, el aforo libre es 0
            $aforoLibrea = ($egoeraAsignatuta === Egoera::AGORTUTA) ? 0 : rand(15, $aforo);

            Ekitaldia::create([
                'izenburua'      => $mota['izenburua'],
                'deskripzioa'    => 'Bergarako Antzokian ospatuko den ' . $mota['izenburua'] . ' ekitaldiaren deskripzio orokorra. Sarrerak aurrez erostea gomendatzen da.',
                'ekitaldi_data'  => $data,
                'ordua'          => sprintf('%02d:00:00', rand(18, 21)),
                'irudia'         => $mota['irudia'],
                'aforo'          => $aforo,
                'aforo_librea'   => $aforoLibrea,
                'egoera'         => $egoeraAsignatuta->value ?? $egoeraAsignatuta,
                'prezio_sarrera' => $mota['prezioa'],
                'id_sortzailea'  => $admin ? $admin->id : null,
            ]);
        }
    }
}