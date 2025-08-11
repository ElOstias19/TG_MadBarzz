<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id('id_asistencia'); // unsignedBigInteger autoincrement
            $table->unsignedBigInteger('id_cliente'); // Debe ser unsignedBigInteger

            $table->dateTime('fecha_hora_entrada');
            $table->timestamps();

            // Foreign key, igual tipo y nombre de columna que en clientes.id_cliente
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
};
