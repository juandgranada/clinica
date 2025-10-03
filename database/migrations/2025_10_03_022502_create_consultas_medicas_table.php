<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultas_medicas', function (Blueprint $table) {
            $table->id();

            // Llaves foráneas
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('medico_id');

            // Datos de la consulta
            $table->timestamp('fecha_hora')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('motivo_consulta'); // hasta 65,535 caracteres
            $table->text('diagnostico')->nullable();
            $table->text('tratamiento_sugerido')->nullable();

            $table->timestamps();

            // Relaciones
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultas_medicas');
    }
};

