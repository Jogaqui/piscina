<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id('idalumno');
            $table->string('dni');
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('edad');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('sexo');
            $table->string('tipo');
            $table->string('tipocliente');
            $table->tinyInteger('estado');
        });
        Schema::create('cargos', function (Blueprint $table) {
            $table->id('idcargo');
            $table->string('cargo');
            $table->tinyInteger('estado');
        });
        Schema::create('delegaciones', function (Blueprint $table) {
            $table->id('iddelegacion');
            $table->string('ruc');
            $table->string('razonsocial');
            $table->string('direccion');
            $table->string('tipocliente');
            $table->tinyInteger('estado');
        });
        Schema::create('descuentos', function (Blueprint $table) {
            $table->id('iddescuento');
            $table->string('descripcion');
            $table->integer('montod');
            $table->tinyInteger('estado');
            $table->integer('idperiodo');
        });
        Schema::create('dias', function (Blueprint $table) {
            $table->id('iddia');
            $table->string('descripcion');
            $table->tinyInteger('estado');
        });
        Schema::create('horarios', function (Blueprint $table) {
            $table->id('idhorario');
            $table->string('descripcion');
            $table->integer('iddia');
            $table->tinyInteger('estado');
        });
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id('idmatricula');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('idalumno');
            $table->integer('idprogramacion');
            $table->integer('iddescuento');
            $table->integer('idmonto');
            $table->float('montotal');
            $table->tinyInteger('estado');
            $table->integer('idpago');
            $table->integer('idperiodo');
        });
        Schema::create('matriculasdelegacion', function (Blueprint $table) {
            $table->id('idmatriculadeleg');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('iddelegacion');
            $table->integer('idmonto');
            $table->integer('cantidad');
            $table->float('montototal');
            $table->text('observacion');
            $table->tinyInteger('estado');
            $table->integer('idperiodo');
        });
        Schema::create('montos', function (Blueprint $table) {
            $table->id('idmonto');
            $table->string('descripcion');
            $table->integer('montomes');
            $table->date('fechainicio');
            $table->date('fechafin');
            $table->string('tipo');
            $table->integer('idperiodo');
            $table->tinyInteger('estado');
        });
        Schema::create('niveles', function (Blueprint $table) {
            $table->id('idnivel');
            $table->string('descripcion');
            $table->tinyInteger('estado');
        });
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('idpago');
            $table->string('pago');
            $table->tinyInteger('estado');
        });
        Schema::create('periodos', function (Blueprint $table) {
            $table->id('idperiodo');
            $table->string('periodo');
            $table->tinyInteger('estado');
        });
        Schema::create('personal', function (Blueprint $table) {
            $table->id('idpersonal');
            $table->string('dni');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('direccion');
            $table->string('telefono');
            $table->integer('idcargo');
            $table->tinyInteger('estado');
        });
        Schema::create('piscinas', function (Blueprint $table) {
            $table->id('idpiscina');
            $table->string('descripcion');
            $table->tinyInteger('estado');
        });
        Schema::create('programaciones', function (Blueprint $table) {
            $table->id('idprogramacion');
            $table->integer('idpiscina');
            $table->integer('idnivel');
            $table->integer('idhorario');
            $table->integer('vacante');
            $table->integer('idpersonal');
            $table->tinyInteger('estado');
            $table->integer('idperiodo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
        Schema::dropIfExists('cargos');
        Schema::dropIfExists('descuentos');
        Schema::dropIfExists('dias');
        Schema::dropIfExists('horarios');
        Schema::dropIfExists('montos');
        Schema::dropIfExists('niveles');
        Schema::dropIfExists('personal');
        Schema::dropIfExists('piscinas');
        Schema::dropIfExists('programaciones');
        Schema::dropIfExists('delegaciones');
        Schema::dropIfExists('matriculas');
        Schema::dropIfExists('matriculasdelegacion');
        Schema::dropIfExists('pagos');
        Schema::dropIfExists('periodos');
    }
};
