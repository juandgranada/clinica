<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Personas;
use App\Models\Medicos;
use App\Models\Usuarios;

class MedicoSeeder extends Seeder
{
    public function run(): void
    {
        $especialidades = [
            'Cardiología', 'Pediatría', 'Neurología', 'Dermatología',
            'Oftalmología', 'Ginecología', 'Ortopedia', 'Psiquiatría',
            'Oncología', 'Medicina General'
        ];

        for ($i = 1; $i <= 10; $i++) {
            // Crear persona
            $persona = Personas::create([
                'tipo_documento'   => 'CC',
                'documento'        => rand(10000000, 99999999),
                'nombres'          => "Médico $i",
                'apellidos'        => "Apellido $i",
                'telefono'         => "30000000$i",
                'email'            => "medico$i@clinica.com",
            ]);

            // Crear médico
            $medico = Medicos::create([
                'persona_id'         => $persona->id,
                'tarjeta_profesional'=> "TP00$i",
                'especialidad'       => $especialidades[$i - 1],
            ]);

            // Crear usuario asociado
            Usuarios::create([
                'persona_id' => $persona->id,
                'username'   => $persona->email,
                'password'   => Hash::make($persona->documento),
                'rol'        => 'MEDICO',
            ]);
        }
    }
}
