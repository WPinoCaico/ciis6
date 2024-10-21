<?php

namespace Database\Seeders;

use App\Models\Modalidad;
use Illuminate\Database\Seeder;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modalidad::create([
            'modalidad' => 'ORDINARIO'
        ]);
        Modalidad::create([
            'modalidad' => 'PRIMEROS PUESTOS'
        ]);
        Modalidad::create([
            'modalidad' => 'GRADUADOS Y TITULADOS'
        ]);
        Modalidad::create([
            'modalidad' => 'TRASLADO EXTERNO'
        ]);
        Modalidad::create([
            'modalidad' => 'DISCAPACIDAD'
        ]);
        Modalidad::create([
            'modalidad' => 'DEPORTISTAS CALIFICADOS'
        ]);
        Modalidad::create([
            'modalidad' => 'VICTIMAS DE TERRORISMO'
        ]);
        Modalidad::create([
            'modalidad' => 'CEPRE'
        ]);
        Modalidad::create([
            'modalidad' => 'SEGÚN DECRETO DE URGENCIA'
        ]);
        Modalidad::create([
            'modalidad' => 'TRASLADO INTERNO'
        ]);
    }
}
