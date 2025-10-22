<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            MedicoSeeder::class,
            PacienteSeeder::class,
            ConsultaMedicaSeeder::class,
        ]);
    }
}
