<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekitaldia;
use App\Models\User;

class EkitaldiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtenemos el admin que acabamos de crear en DatabaseSeeder (o el primero que sea Admin)
        $admin = User::where('email', 'admin@gmail.com')->first();

        $ekitaldiak = [
            [
                'izenburua'      => 'Goenkale: Azken Agurra',
                'deskripzioa'    => 'Herriko antzezle taldearen antzezlan berezia, komedia eta nostalgia nahasten dituena.',
                'ekitaldi_data'  => '2026-11-15',
                'ordua'          => '19:30:00',
                'irudia'         => null,
                'aforo'          => 150,
                'aforo_librea'   => 120,
                'egoera'         => 'Antzerkia',
                'prezio_sarrera' => 12.50,
                'id_sortzailea'  => $admin->id,
            ],
            [
                'izenburua'      => 'Zinema: Dune Parte 3',
                'deskripzioa'    => 'Zinema emanaldi berezia azken belaunaldiko soinu eta irudi kalitatearekin.',
                'ekitaldi_data'  => '2026-11-20',
                'ordua'          => '20:00:00',
                'irudia'         => null,
                'aforo'          => 200,
                'aforo_librea'   => 45,
                'egoera'         => 'Zinema',
                'prezio_sarrera' => 6.00,
                'id_sortzailea'  => $admin->id,
            ],
            [
                'izenburua'      => 'Bergarako Orfeoiaren Kontzertua',
                'deskripzioa'    => 'Musika klasiko eta koral gaualdi ahaztezina gure antzoki historikoan.',
                'ekitaldi_data'  => '2026-12-05',
                'ordua'          => '18:00:00',
                'irudia'         => null,
                'aforo'          => 300,
                'aforo_librea'   => 0, // Agotado
                'egoera'         => 'Musika',
                'prezio_sarrera' => 0.00,
                'id_sortzailea'  => $admin->id,
            ],
            [
                'izenburua'      => 'Monologoak: Umorea Euskaraz',
                'deskripzioa'    => 'Euskal Herriko komiko onenen saioa barre karkarak ziurtatzeko.',
                'ekitaldi_data'  => '2026-12-12',
                'ordua'          => '21:00:00',
                'irudia'         => null,
                'aforo'          => 100,
                'aforo_librea'   => 80,
                'egoera'         => 'Umorea',
                'prezio_sarrera' => 8.00,
                'id_sortzailea'  => $admin->id,
            ],
        ];

        foreach ($ekitaldiak as $ekitaldia) {
            Ekitaldia::create($ekitaldia);
        }
    }
}