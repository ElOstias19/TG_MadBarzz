<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
            Schema::create('recepcionistas', function (Blueprint $table) {
                $table->id('id_recepcionista');
                $table->unsignedBigInteger('id_persona');
                $table->unsignedBigInteger('id_usuario');
                $table->enum('turno', ['mañana', 'tarde', 'noche']);
                $table->string('punto_atencion');
                $table->enum('estado', ['activo', 'inactivo'])->default('activo');
                $table->timestamps();

                $table->foreign('id_persona')->references('id_persona')->on('personas')->onDelete('cascade');
                $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            });
        }

    public function down(): void {
        Schema::dropIfExists('recepcionistas');
    }
};
