<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '71234567',
            'nombre' => 'Nombre',
            'apellido_paterno' => 'APaterno',
            'apellido_materno' => 'AMaterno',
            'numero_celular' => '910922774',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('Administrador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '77334602',
            'nombre' => 'Administrador',
            'apellido_paterno' => '02',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'admin02@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('Administrador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '77334603',
            'nombre' => 'Administrador',
            'apellido_paterno' => '03',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'admin03@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('Administrador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '77334604',
            'nombre' => 'Administrador',
            'apellido_paterno' => '04',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'admin04@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('Administrador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '12345678',
            'nombre' => 'Jose',
            'apellido_paterno' => 'Paredes',
            'apellido_materno' => 'Rojas',
            'numero_celular' => '987654321',
            'email' => 'postulante@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Postulante');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325649',
            'nombre' => 'Asistente',
            'apellido_paterno' => '1',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'asistente@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Asistente');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325651',
            'nombre' => 'Asesor',
            'apellido_paterno' => '1',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'asesor@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Asesor');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325650',
            'nombre' => 'Colaborador',
            'apellido_paterno' => '1',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'colaborador@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325651',
            'nombre' => 'Comision',
            'apellido_paterno' => '1',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'comision@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Comision');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325652',
            'nombre' => 'Tesoreria',
            'apellido_paterno' => '1',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'tesoreria@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Tesoreria');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325653',
            'nombre' => 'Prueba',
            'apellido_paterno' => '1',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba01@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325654',
            'nombre' => 'Prueba',
            'apellido_paterno' => '2',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba02@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325655',
            'nombre' => 'Prueba',
            'apellido_paterno' => '3',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba03@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325656',
            'nombre' => 'Prueba',
            'apellido_paterno' => '4',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba04@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325658',
            'nombre' => 'Prueba',
            'apellido_paterno' => '6',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba06@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325667',
            'nombre' => 'Prueba',
            'apellido_paterno' => '7',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba07@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325668',
            'nombre' => 'Prueba',
            'apellido_paterno' => '8',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba08@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325669',
            'nombre' => 'Prueba',
            'apellido_paterno' => '9',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba09@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325170',
            'nombre' => 'Prueba',
            'apellido_paterno' => '10',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba10@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');

        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325611',
            'nombre' => 'Prueba',
            'apellido_paterno' => '11',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba11@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');
        
        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325612',
            'nombre' => 'Prueba',
            'apellido_paterno' => '12',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba12@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');
        
        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325613',
            'nombre' => 'Prueba',
            'apellido_paterno' => '13',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba13@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');
        
        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325614',
            'nombre' => 'Prueba',
            'apellido_paterno' => '14',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba14@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');
        
        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325615',
            'nombre' => 'Prueba',
            'apellido_paterno' => '15',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba15@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');
        
        User::create([
            'id_tipo_documento' => 1,
            'numero_documento' => '96325616',
            'nombre' => 'Prueba',
            'apellido_paterno' => '16',
            'apellido_materno' => '-',
            'numero_celular' => '987654321',
            'email' => 'prueba16@gmail.com',
            'password' => bcrypt('password')

        ])->assignRole('Colaborador');

        //User::factory(9)->create();
    }
}
