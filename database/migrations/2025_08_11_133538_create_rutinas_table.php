<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutinasTable extends Migration
{
    public function up()
    {
        Schema::create('rutinas', function (Blueprint $table) {
            $table->bigIncrements('id_rutina');
            $table->unsignedBigInteger('id_entrenador');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('archivo')->nullable();
            $table->timestamp('fecha_subida')->useCurrent();
            $table->timestamps();

            $table->foreign('id_entrenador')->references('id_entrenador')->on('entrenadors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rutinas');
    }
}

