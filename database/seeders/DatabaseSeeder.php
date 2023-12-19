<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '987654321'
        ]);
    /*     \App\Models\Empleado::factory(20)->create();

        \App\Models\Empleado::factory()->create([
            'nombre' => 'Fabio',
            'apellido' => 'Argañaraz',
            'foto' => 'foto.jpg',
            'correo' => 'ing.fabio.arg@gmail.com',
        ]); */
    }
}
