<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ficha_id');
            $table->unsignedBigInteger('tipo_documento_id');
            $table->integer('id_estado_revision')->default(0);
            $table->integer('id_tipo_enlace')->nullable()->default(1)->comment('1=Servidor 2=Google_drive');
            $table->string('enlace', 100)->nullable();
            $table->string('enlace_drive', 100)->nullable();
            $table->dateTime('fecha_solicitado')->nullable();
            $table->dateTime('fecha_revisado')->nullable();
            $table->integer('id_usu_revisado')->nullable();
            $table->string('observacion', 200)->nullable();
            $table->integer('comentario')->nullable();
            $table->integer('id_estado')->default(1)->comment('0=deshabilitado 1=habilitado');

            $table->timestamps();
            $table->foreign('ficha_id')->references('id')->on('fichas')->onDelete('restrict');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
