<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rutinas', function (Blueprint $table) {
            $table->id('id_rutina');
            $table->unsignedBigInteger('id_entrenador');

            $table->string('titulo', 255);
            $table->text('descripcion')->nullable();
            // ruta/archivo guardado en storage/app/public/rutinas/...
            $table->string('archivo')->nullable();
            $table->timestamp('fecha_subida')->nullable();

            $table->timestamps();

            // Foreign key --> debe existir la tabla 'entrenadores' con PK 'id_entrenador' unsignedBigInteger
            $table->foreign('id_entrenador')
                  ->references('id_entrenador')
                  ->on('entrenadores')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rutinas');
    }
};
