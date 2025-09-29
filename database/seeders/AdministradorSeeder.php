<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;
use App\Models\User;
use App\Models\Administrador;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administradores = [
            [
                'nombre_completo'  => 'Marcos Antonio',
                'apellido_paterno' => 'Olea',
                'apellido_materno' => 'Añez',
                'ci'               => '12345678',
                'telefono'         => '720159801',
                'genero'           => 'masculino',
                'fecha_nacimiento' => '1985-03-03',

                'name'             => 'marcos.olea',
                'email'            => 'marcos.olea@gmail.com',
                'password'         => '123456',

                'nivel_acceso'     => 'superadmin',
                'area_responsable' => 'Administración Central',
                'estado'           => 'activo',
            ],
            [
                'nombre_completo'  => 'Laura Patricia',
                'apellido_paterno' => 'González',
                'apellido_materno' => 'Ramírez',
                'ci'               => '12345679',
                'telefono'         => '720159082',
                'genero'           => 'femenino',
                'fecha_nacimiento' => '1990-06-12',

                'name'             => 'laura.gonzalez',
                'email'            => 'laura.gonzalez@gmail.com',
                'password'         => '123456',

                'nivel_acceso'     => 'gestion',
                'area_responsable' => 'Recursos Humanos',
                'estado'           => 'activo',
            ],
            [
                'nombre_completo'  => 'José Luis',
                'apellido_paterno' => 'Fernández',
                'apellido_materno' => 'Suárez',
                'ci'               => '12345680',
                'telefono'         => '725159003',
                'genero'           => 'masculino',
                'fecha_nacimiento' => '1988-11-23',

                'name'             => 'jose.fernandez',
                'email'            => 'jose.fernandez@gmail.com',
                'password'         => '123456',

                'nivel_acceso'     => 'finanzas',
                'area_responsable' => 'Departamento de Finanzas',
                'estado'           => 'activo',
            ],
        ];

        foreach ($administradores as $data) {
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

            // Crear Usuario (rol_id = 1 = Administrador)
            $usuario = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
                'rol_id'   => 1,
            ]);

            // Crear Administrador
            Administrador::create([
                'id_persona'       => $persona->id_persona,
                'id_usuario'       => $usuario->id,
                'nivel_acceso'     => $data['nivel_acceso'],
                'area_responsable' => $data['area_responsable'],
                'estado'           => $data['estado'],
            ]);
        }
    }
}
