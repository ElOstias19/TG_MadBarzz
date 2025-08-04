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
        Schema::create('personas', function (Blueprint $table) {
            $table->id('id_persona');
            $table->string('nombre_completo', 100);
            $table->string('apellido_paterno', 50);
            $table->string('apellido_materno', 50);
            $table->string('ci', 20)->unique();
            $table->string('telefono', 20)->unique();
            $table->string('genero', 10);
            $table->date('fecha_nacimiento');
            $table->softDeletes(); // ✅ eliminación lógica
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
