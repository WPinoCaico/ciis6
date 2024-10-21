<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carrera::create([
            'codigo_carrera' => '01',
            'carrera' => 'ADMINISTRACIÓN',
            'nombre_corto' => 'AD',
            'facultad' => '',
        ]);
        Carrera::create([
            'codigo_carrera' => '02',
            'carrera' => 'CONTABILIDAD',
            'nombre_corto' => 'CO',
            'facultad' => '',
        ]);
        Carrera::create([
            'codigo_carrera' => '03',
            'carrera' => 'ADMINISTRACIÓN DE TURISMO Y HOTELERÍA',
            'nombre_corto' => 'TH',
            'facultad' => '',
        ]);
        Carrera::create([
            'codigo_carrera' => '04',
            'carrera' => 'INGENIERÍA DE SISTEMAS',
            'nombre_corto' => 'IS',
            'facultad' => '',
        ]);
        Carrera::create([
            'codigo_carrera' => '05',
            'carrera' => 'AGRONOMÍA',
            'nombre_corto' => 'AG',
            'facultad' => '',
        ]);
    }
}
