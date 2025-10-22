<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConsultasMedicas;
use App\Models\Pacientes;
use App\Models\Medicos;

class ConsultaMedicaSeeder extends Seeder
{
    public function run(): void
    {
        $pacientes = Pacientes::all();
        $medicos = Medicos::all();

        if ($pacientes->isEmpty() || $medicos->isEmpty()) {
            $this->command->warn('⚠️ No hay médicos o pacientes registrados, ejecuta primero los seeders de Médicos y Pacientes.');
            return;
        }

        for ($i = 1; $i <= 10; $i++) {
            ConsultasMedicas::create([
                'paciente_id'          => $pacientes->random()->id,
                'medico_id'            => $medicos->random()->id,
                'motivo_consulta'      => "Motivo de consulta $i",
                'diagnostico'          => "Diagnóstico genérico $i",
                'tratamiento_sugerido' => "Tratamiento sugerido $i",
            ]);
        }
    }
}
