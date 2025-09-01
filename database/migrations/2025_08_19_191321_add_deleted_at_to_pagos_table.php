<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->softDeletes(); // Crea la columna deleted_at
        });
    }

    public function down()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Elimina la columna si se revierte
        });
    }
};
