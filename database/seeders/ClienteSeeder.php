<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;
use App\Models\User;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        // --- Lista de clientes (persona, user, cliente) ---
        $clientes = [
            [
                'persona' => [
                    'nombre_completo' => 'Juan Carlos',
                    'apellido_paterno' => 'Pérez',
                    'apellido_materno' => 'García',
                    'ci' => '123456781',
                    'telefono' => '72000001',
                    'genero' => 'masculino',
                    'fecha_nacimiento' => '1990-01-15',
                ],
                'user' => [
                    'name' => 'juan.carlos',
                    'email' => 'juan.carlos@example.com',
                    'password' => 'pass1234',
                ],
                'cliente' => [
                    'dias_asistidos' => 10,
                    'huella_digital' => null,
                    'estado' => 'activo',
                ],
            ],
            [
                'persona' => [
                    'nombre_completo' => 'María Fernanda',
                    'apellido_paterno' => 'López',
                    'apellido_materno' => 'Ramírez',
                    'ci' => '234567892',
                    'telefono' => '72000002',
                    'genero' => 'femenino',
                    'fecha_nacimiento' => '1992-05-22',
                ],
                'user' => [
                    'name' => 'maria.fernanda',
                    'email' => 'maria.fernanda@example.com',
                    'password' => 'pass1234',
                ],
                'cliente' => [
                    'dias_asistidos' => 15,
                    'huella_digital' => null,
                    'estado' => 'activo',
                ],
            ],
            [
                'persona' => [
                    'nombre_completo' => 'Carlos Andrés',
                    'apellido_paterno' => 'Gómez',
                    'apellido_materno' => 'Vargas',
                    'ci' => '345678903',
                    'telefono' => '72000003',
                    'genero' => 'masculino',
                    'fecha_nacimiento' => '1988-11-30',
                ],
                'user' => [
                    'name' => 'carlos.andres',
                    'email' => 'carlos.andres@example.com',
                    'password' => 'pass1234',
                ],
                'cliente' => [
                    'dias_asistidos' => 8,
                    'huella_digital' => null,
                    'estado' => 'activo',
                ],
            ],
            [
                'persona' => [
                    'nombre_completo' => 'Ana Sofía',
                    'apellido_paterno' => 'Fernández',
                    'apellido_materno' => 'Santos',
                    'ci' => '456789014',
                    'telefono' => '72000004',
                    'genero' => 'femenino',
                    'fecha_nacimiento' => '1995-07-10',
                ],
                'user' => [
                    'name' => 'ana.sofia',
                    'email' => 'ana.sofia@example.com',
                    'password' => 'pass1234',
                ],
                'cliente' => [
                    'dias_asistidos' => 20,
                    'huella_digital' => null,
                    'estado' => 'activo',
                ],
            ],
            [
                'persona' => [
                    'nombre_completo' => 'Luis Alberto',
                    'apellido_paterno' => 'Martínez',
                    'apellido_materno' => 'Cruz',
                    'ci' => '567890125',
                    'telefono' => '72000005',
                    'genero' => 'masculino',
                    'fecha_nacimiento' => '1991-03-05',
                ],
                'user' => [
                    'name' => 'luis.alberto',
                    'email' => 'luis.alberto@example.com',
                    'password' => 'pass1234',
                ],
                'cliente' => [
                    'dias_asistidos' => 12,
                    'huella_digital' => null,
                    'estado' => 'activo',
                ],
            ],
        ];

        // Insertamos cada cliente dentro de una transacción y usando firstOrCreate
        foreach ($clientes as $c) {
            DB::transaction(function () use ($c) {

                // Persona: evitar duplicados por CI
                $persona = Persona::firstOrCreate(
                    ['ci' => $c['persona']['ci']], // condición única
                    $c['persona'] // valores a crear si no existe
                );

                // Usuario: evitar duplicados por email
                $user = User::firstOrCreate(
                    ['email' => $c['user']['email']],
                    [
                        'name' => $c['user']['name'],
                        'password' => Hash::make($c['user']['password']),
                        // <-- aquí asumo rol_id = 1 es Cliente
                        'rol_id' => 1,
                    ]
                );

                // Si el nombre del usuario cambió (por ejemplo existed pero distinto), lo actualizamos
                if ($user->name !== $c['user']['name']) {
                    $user->name = $c['user']['name'];
                    $user->save();
                }

                // Cliente: evitar duplicados por id_usuario
                Cliente::firstOrCreate(
                    ['id_usuario' => $user->id],
                    [
                        'id_persona' => $persona->id_persona,
                        'dias_asistidos' => $c['cliente']['dias_asistidos'],
                        'huella_digital' => $c['cliente']['huella_digital'],
                        'estado' => $c['cliente']['estado'],
                    ]
                );
            });
        }
    }
}
