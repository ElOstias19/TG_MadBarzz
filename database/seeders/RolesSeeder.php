<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['nombre' => 'Cliente', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Recepcionista', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Entrenador', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Administrador', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
