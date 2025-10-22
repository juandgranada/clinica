<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Personas;
use App\Models\Pacientes;
use App\Models\Usuarios;

class PacienteSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            // Crear persona
            $persona = Personas::create([
                'tipo_documento' => 'CC',
                'documento'      => rand(10000000, 99999999),
                'nombres'        => "Paciente $i",
                'apellidos'      => "Apellido $i",
                'telefono'       => "31000000$i",
                'email'          => "paciente$i@clinica.com",
            ]);

            // Crear paciente
            $paciente = Pacientes::create([
                'persona_id'          => $persona->id,
                'seguro_medico'       => "SeguroSalud $i",
                'contacto_emergencia' => "Contacto $i",
            ]);

            // Crear usuario asociado
            Usuarios::create([
                'persona_id' => $persona->id,
                'username'   => $persona->email,
                'password'   => Hash::make($persona->documento),
                'rol'        => 'PACIENTE',
            ]);
        }
    }
}
