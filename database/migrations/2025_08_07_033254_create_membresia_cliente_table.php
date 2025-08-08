<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresiaClienteTable extends Migration
{
    public function up()
    {
        Schema::create('membresia_cliente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_membresia');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('nombre_descuento')->nullable();
            $table->decimal('descuento', 5, 2)->nullable();
            $table->decimal('precio_final', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('id_membresia')->references('id_membresia')->on('membresias')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('membresia_cliente');
    }
}
