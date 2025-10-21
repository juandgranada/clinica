<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id('id_imagen');
            $table->unsignedBigInteger('consulta_id');
            $table->string('ruta_imagen');
            $table->string('tipo_imagen');
            $table->string('descripcion')->nullable();
            $table->timestamp('fecha_carga')->useCurrent();
            $table->timestamps();

            $table->foreign('consulta_id')
                  ->references('id')
                  ->on('consultas_medicas')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};


