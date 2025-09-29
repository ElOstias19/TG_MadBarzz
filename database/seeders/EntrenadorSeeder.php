<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;
use App\Models\User;
use App\Models\Entrenador;

class EntrenadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entrenadores = [
            [
                // Persona
                'nombre_completo'  => 'Luis Alberto',
                'apellido_paterno' => 'Ramírez',
                'apellido_materno' => 'Gutiérrez',
                'ci'               => '34567891',
                'telefono'         => '72000006',
                'genero'           => 'masculino',
                'fecha_nacimiento' => '1988-03-22',

                // User
                'name'     => 'Luis Ramirez',
                'email'    => 'luis.entrenador@example.com',
                'password' => 'password123',

                // Entrenador
                'especialidad'   => ['Fuerza', 'Cardio'],
                'experiencia'    => '5 años en entrenamiento funcional',
                'disponibilidad' => ['mañana', 'tarde'],
                'estado'         => 'activo',
            ],
            [
                'nombre_completo'  => 'María Fernanda',
                'apellido_paterno' => 'Soto',
                'apellido_materno' => 'López',
                'ci'               => '34567892',
                'telefono'         => '72000007',
                'genero'           => 'femenino',
                'fecha_nacimiento' => '1992-07-14',

                'name'     => 'Maria Soto',
                'email'    => 'maria.entrenador@example.com',
                'password' => 'password123',

                'especialidad'   => ['Yoga', 'Pilates'],
                'experiencia'    => '3 años en clases grupales',
                'disponibilidad' => ['mañana'],
                'estado'         => 'activo',
            ],
            [
                'nombre_completo'  => 'Jorge Andrés',
                'apellido_paterno' => 'Mendoza',
                'apellido_materno' => 'Quispe',
                'ci'               => '34567893',
                'telefono'         => '72000008',
                'genero'           => 'masculino',
                'fecha_nacimiento' => '1990-11-30',

                'name'     => 'Jorge Mendoza',
                'email'    => 'jorge.entrenador@example.com',
                'password' => 'password123',

                'especialidad'   => ['Crossfit'],
                'experiencia'    => '6 años en entrenamiento de alto rendimiento',
                'disponibilidad' => ['tarde', 'noche'],
                'estado'         => 'activo',
            ],
            [
                'nombre_completo'  => 'Gabriela Sofía',
                'apellido_paterno' => 'Villalba',
                'apellido_materno' => 'Cruz',
                'ci'               => '34567894',
                'telefono'         => '72000009',
                'genero'           => 'femenino',
                'fecha_nacimiento' => '1995-01-10',

                'name'     => 'Gabriela Villalba',
                'email'    => 'gabriela.entrenador@example.com',
                'password' => 'password123',

                'especialidad'   => ['Zumba', 'Baile Fitness'],
                'experiencia'    => '4 años en clases de ritmo',
                'disponibilidad' => ['mañana', 'tarde'],
                'estado'         => 'activo',
            ],
            [
                'nombre_completo'  => 'Carlos Eduardo',
                'apellido_paterno' => 'Peña',
                'apellido_materno' => 'Ortiz',
                'ci'               => '34567895',
                'telefono'         => '72000010',
                'genero'           => 'masculino',
                'fecha_nacimiento' => '1987-09-05',

                'name'     => 'Carlos Peña',
                'email'    => 'carlos.entrenador@example.com',
                'password' => 'password123',

                'especialidad'   => ['Pesas', 'Hipertrofia'],
                'experiencia'    => '8 años en musculación',
                'disponibilidad' => ['noche'],
                'estado'         => 'activo',
            ],
        ];

        foreach ($entrenadores as $data) {
            $persona = Persona::create([
                'nombre_completo'  => $data['nombre_completo'],
                'apellido_paterno' => $data['apellido_paterno'],
                'apellido_materno' => $data['apellido_materno'],
                'ci'               => $data['ci'],
                'telefono'         => $data['telefono'],
                'genero'           => $data['genero'],
                'fecha_nacimiento' => $data['fecha_nacimiento'],
            ]);

            $usuario = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
                'rol_id'   => 3, // Rol de Entrenador
            ]);

            Entrenador::create([
                'id_persona'     => $persona->id_persona,
                'id_usuario'     => $usuario->id,
                'especialidad'   => implode(', ', $data['especialidad']),
                'experiencia'    => $data['experiencia'],
                'disponibilidad' => json_encode($data['disponibilidad']),
                'estado'         => $data['estado'],
            ]);
        }
    }
}
