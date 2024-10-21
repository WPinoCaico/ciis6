<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            //
            //$table->string('name');
            $table->unsignedBigInteger('user_id'); 
            $table->integer('id_tipo_pago');
            $table->integer('id_ficha')->nullable();
            $table->integer('tipo_enlace')->comment('1=Localhost 2=Google Drive');
            $table->string('enlace', 100);
            $table->integer('id_estado_revision')->comment('0=No enviado 1=Pendiente 2=Rechazado 3=Validado');
            $table->timestamp('fecha_enviado')->nullable();
            $table->timestamp('fecha_revisado')->nullable();
            $table->integer('id_usuario_revisado')->nullable()->comment('Usuario que hizo la revisión');
            $table->integer('monto_pago')->nullable();
            $table->string('codigo_pago', 10)->nullable()->comment('Código en el voucher');
            $table->date('fecha_pago')->nullable()->comment('Fecha en el voucher');
            $table->integer('exonerado')->nullable()->comment('0=no 1=si');
            $table->string('observacion', 200)->nullable();
            $table->integer('comentario')->nullable();
            $table->integer('id_estado')->default(1)->comment('0=deshabilitado 1=habilitado');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
