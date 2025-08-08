<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('entrenadores', function (Blueprint $table) {
            $table->id('id_entrenador');

            $table->unsignedBigInteger('id_persona');
            $table->unsignedBigInteger('id_usuario');

            $table->string('especialidad', 255);
            $table->string('experiencia', 255);
            $table->string('disponibilidad', 255);
            $table->enum('estado', ['activo', 'inactivo']);

            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_persona')->references('id_persona')->on('personas')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrenadors');
    }
};
