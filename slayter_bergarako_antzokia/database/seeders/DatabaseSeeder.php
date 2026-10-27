<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear el usuario Administrador base con los campos de tu modelo
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'          => 'Admin User',
                'Abizena'       => 'Kudeatzailea',
                'Mota'          => 'Admin',
                'password'      => Hash::make('admin123'),
                'id_sortzailea' => null,
            ]
        );

        // 2. Llamar al Seeder de eventos
        $this->call([
            EkitaldiaSeeder::class,
        ]);
    }
}