<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;
use App\Models\User;
use App\Models\Recepcionista;

class RecepcionistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recepcionistas = [
            [
                // Persona
                'nombre_completo'  => 'Ana Beatriz',
                'apellido_paterno' => 'Ramírez',
                'apellido_materno' => 'Lopez',
                'ci'               => '45678901',
                'telefono'         => '72011111',
                'genero'           => 'femenino',
                'fecha_nacimiento' => '1993-05-12',

                // Usuario
                'name'     => 'ana.ramirez',
                'email'    => 'ana.recepcionista@example.com',
                'password' => '123456',

                // Recepcionista
                'turno'          => 'mañana',
                'punto_atencion' => 'Mostrador Central',
                'estado'         => 'activo',
            ],
            [
                'nombre_completo'  => 'Paola Andrea',
                'apellido_paterno' => 'Mendoza',
                'apellido_materno' => 'Rojas',
                'ci'               => '45678902',
                'telefono'         => '72011112',
                'genero'           => 'femenino',
                'fecha_nacimiento' => '1990-08-20',

                'name'     => 'paola.mendoza',
                'email'    => 'paola.recepcionista@example.com',
                'password' => '123456',

                'turno'          => 'tarde',
                'punto_atencion' => 'Recepción Norte',
                'estado'         => 'activo',
            ],
            [
                'nombre_completo'  => 'Carlos Alberto',
                'apellido_paterno' => 'Fernández',
                'apellido_materno' => 'Suárez',
                'ci'               => '45678903',
                'telefono'         => '72011113',
                'genero'           => 'masculino',
                'fecha_nacimiento' => '1987-12-15',

                'name'     => 'carlos.fernandez',
                'email'    => 'carlos.recepcionista@example.com',
                'password' => '123456',

                'turno'          => 'noche',
                'punto_atencion' => 'Recepción Principal',
                'estado'         => 'activo',
            ],
            [
                'nombre_completo'  => 'Valeria Sofía',
                'apellido_paterno' => 'Arias',
                'apellido_materno' => 'Castro',
                'ci'               => '45678904',
                'telefono'         => '72011114',
                'genero'           => 'femenino',
                'fecha_nacimiento' => '1995-02-28',

                'name'     => 'valeria.arias',
                'email'    => 'valeria.recepcionista@example.com',
                'password' => '123456',

                'turno'          => 'mañana',
                'punto_atencion' => 'Recepción Este',
                'estado'         => 'activo',
            ],
            [
                'nombre_completo'  => 'Luis Enrique',
                'apellido_paterno' => 'Salazar',
                'apellido_materno' => 'Vargas',
                'ci'               => '45678905',
                'telefono'         => '72011115',
                'genero'           => 'masculino',
                'fecha_nacimiento' => '1992-11-10',

                'name'     => 'luis.salazar',
                'email'    => 'luis.recepcionista@example.com',
                'password' => '123456',

                'turno'          => 'tarde',
                'punto_atencion' => 'Recepción Oeste',
                'estado'         => 'activo',
            ],
        ];

        foreach ($recepcionistas as $data) {
            // Crear Persona
            $persona = Persona::create([
                'nombre_completo'  => $data['nombre_completo'],
                'apellido_paterno' => $data['apellido_paterno'],
                'apellido_materno' => $data['apellido_materno'],
                'ci'               => $data['ci'],
                'telefono'         => $data['telefono'],
                'genero'           => $data['genero'],
                'fecha_nacimiento' => $data['fecha_nacimiento'],
            ]);

            // Crear Usuario (rol_id = 2 = Recepcionista)
            $usuario = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
                'rol_id'   => 2,
            ]);

            // Crear Recepcionista
            Recepcionista::create([
                'id_persona'     => $persona->id_persona,
                'id_usuario'     => $usuario->id,
                'turno'          => $data['turno'],
                'punto_atencion' => $data['punto_atencion'],
                'estado'         => $data['estado'],
            ]);
        }
    }
}
