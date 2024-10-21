<?php

namespace Database\Seeders;

use App\Models\TipoDocumento;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDocumento::create([
            'nombre' => 'FICHA DE INSCRIPCIÓN',
            'orden' => '1',
        ]);
        TipoDocumento::create([
            'nombre' => 'REQUISITOS SEGUN MODALIDAD',
            'orden' => '2',
        ]);
        TipoDocumento::create([
            'nombre' => 'DNI O C.E.',
            'orden' => '3',
        ]);
        TipoDocumento::create([
            'nombre' => 'FOTO DEL POSTULANTE',
            'orden' => '4',
        ]);
    }
}
