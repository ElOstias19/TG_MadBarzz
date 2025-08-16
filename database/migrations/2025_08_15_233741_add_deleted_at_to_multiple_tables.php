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
    Schema::table('administradores', function (Blueprint $table) {
        $table->softDeletes();
    });

    Schema::table('recepcionistas', function (Blueprint $table) {
        $table->softDeletes();
    });

    Schema::table('entrenadores', function (Blueprint $table) {
        $table->softDeletes();
    });
}

public function down()
{
    Schema::table('administradores', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });

    Schema::table('recepcionistas', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });

    Schema::table('entrenadores', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
}

};
