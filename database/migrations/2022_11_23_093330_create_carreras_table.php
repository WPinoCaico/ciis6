<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_carrera', 2);
            $table->string('carrera', 50);
            $table->string('nombre_corto', 4);
            $table->string('facultad', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carreras');
    }
}
