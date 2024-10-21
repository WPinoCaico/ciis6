<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('codigo_p', 10)->nullable()->unique()->comment('Código del postulante');
            $table->string('dp_apellido_p', 50)->comment('Apellido paterno');
            $table->string('dp_apellido_m', 50)->comment('Apellido materno');
            $table->string('dp_nombre', 50)->comment('Nombre');
            $table->integer('id_tipo_documento');
            $table->string('numero_documento', 11);
            $table->integer('dp_edad');
            $table->date('dp_fecha_n');

            $table->integer('dp_ln_peru')->default(1);

            
            $table->string('dp_ln_pais', 50)->nullable()->comment('Pais de nacimiento');
            $table->string('dp_ln_dep', 30)->comment('Departamento de nacimiento');
            $table->string('dp_ln_prov', 30)->comment('Provincia de nacimiento');
            $table->string('dp_ln_dis', 30)->comment('Distrito de nacimiento');

            $table->string('dp_ln_pais_ext', 50)->nullable()->comment('Pais de nacimiento extranjero');
            $table->string('dp_ln_dep_ext', 50)->nullable()->comment('Departamento de nacimiento extranjero');
            $table->string('dp_ln_prov_ext', 50)->nullable()->comment('Provincia de nacimiento extranjero');
            $table->string('dp_ln_dis_ext', 50)->nullable()->comment('Distrito de nacimiento extranjero');

            $table->string('dp_sexo', 10);
            $table->string('dp_estado_c', 15)->comment('Estado civil');
            $table->string('da_direccion', 200);
            $table->string('da_lote', 5)->nullable();
            $table->string('da_interior', 20)->nullable();
            $table->string('da_urbanizacion', 50)->nullable();
            $table->string('da_dep', 30)->comment('Departamento actual');
            $table->string('da_prov', 30)->comment('Provincia actual');
            $table->string('da_dis', 30)->comment('Distrito actual');
            $table->string('da_numero_celular', 9);
            $table->string('da_numero_telefono', 10)->nullable();
            $table->string('da_email', 50);
            $table->string('da_email_institucional', 50)->nullable();
            $table->string('df_nombres_padre', 100)->nullable();
            $table->string('df_nombres_madre', 100)->nullable();
            $table->string('df_nombres_apoderado', 100);
            $table->string('df_dni_apoderado', 10);
            $table->string('df_celular_apoderado', 9);

            $table->integer('diep_id_colegio');
            $table->string('diep_ace', 10)->comment('Año que concluyo estudios');

            $table->string('de_cod_ruv', 15)->nullable()->comment('Código registro unico de victimas');
            $table->string('de_nom_uni', 100)->nullable()->comment('Universidad de procedencia');
            $table->integer('de_cred_uni')->nullable()->comment('Créditos aprovados');
            $table->integer('mcp_id_modalidad');
            $table->integer('mcp_id_carrera');

            $table->string('dd_publicidad', 50);

            $table->integer('dj_todos')->nullable();

            $table->integer('dj_ficha_inscripcion')->nullable();
            $table->integer('dj_apologia_t')->nullable();
            $table->integer('dj_reglamento')->nullable();
            $table->integer('dj_ingresante')->nullable();
            $table->dateTime('dj_fecha')->nullable();

            $table->string('estado_postulante', 11)->nullable();
            $table->integer('id_estado_revision')->default(0);

            $table->dateTime('fecha_solicitado')->nullable();
            $table->dateTime('fecha_revisado')->nullable();
            $table->integer('id_usu_revisado')->nullable();
            $table->dateTime('fecha_carne')->nullable();
            $table->integer('confor_carnet')->default(0);

            $table->dateTime('fecha_confor_carne')->nullable();

            $table->integer('id_estado')->default(1)->comment('0=deshabilitado 1=habilitado');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fichas');
    }
}
