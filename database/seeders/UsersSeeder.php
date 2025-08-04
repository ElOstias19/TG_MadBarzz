<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener los roles desde la tabla 'roles'
        $roles = DB::table('roles')->pluck('id', 'nombre');

        DB::table('users')->insert([
            [
                'name' => 'Carlos Cliente',
                'email' => 'cliente@example.com',
                'password' => Hash::make('password123'),
                'rol_id' => $roles['Cliente'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rosa Recepcionista',
                'email' => 'recepcionista@example.com',
                'password' => Hash::make('password123'),
                'rol_id' => $roles['Recepcionista'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eduardo Entrenador',
                'email' => 'entrenador@example.com',
                'password' => Hash::make('password123'),
                'rol_id' => $roles['Entrenador'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ana Administradora',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'),
                'rol_id' => $roles['Administrador'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
