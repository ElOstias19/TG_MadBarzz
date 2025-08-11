<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradoresTable extends Migration
{
    public function up()
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->id('id_administrador');
            $table->unsignedBigInteger('id_persona');
            $table->unsignedBigInteger('id_usuario');
            $table->enum('nivel_acceso', ['superadmin', 'gestion', 'finanzas']);
            $table->string('area_responsable');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();

            // Llaves foráneas (suponiendo que existen las tablas personas y users)
            $table->foreign('id_persona')->references('id_persona')->on('personas')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('administradores');
    }
}
