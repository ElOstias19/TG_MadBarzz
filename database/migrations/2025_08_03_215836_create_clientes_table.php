<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    public function up()
{
    Schema::create('clientes', function (Blueprint $table) {
        $table->id('id_cliente');
        $table->unsignedBigInteger('id_persona');
        $table->integer('dias_asistidos')->default(0);
        $table->string('huella_digital')->nullable();
        $table->enum('estado', ['activo', 'inactivo'])->default('activo');
        $table->unsignedBigInteger('id_usuario');
        $table->timestamps();
        $table->softDeletes(); // Eliminación lógica

        $table->foreign('id_persona')->references('id_persona')->on('personas');
        $table->foreign('id_usuario')->references('id')->on('users');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
