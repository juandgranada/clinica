<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('rol', ['ADMINISTRADOR', 'MEDICO', 'PACIENTE']);
            $table->timestamps();

            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');

        });

        DB::table('usuarios')->insert([
            'persona_id' => null, // el admin no está vinculado a una persona
            'username'   => 'administrador',
            'password'   => Hash::make('Admin123$$'),
            'rol'        => 'ADMINISTRADOR',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

