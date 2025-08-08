<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembresiasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('membresias')->insert([
            [
                'tipo_membresia' => 'Mensual',
                'precio' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_membresia' => 'Trimestral',
                'precio' => 420,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_membresia' => 'Semestral',
                'precio' => 770,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_membresia' => 'Anual',
                'precio' => 1300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
