<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proyectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descripcion');
            $table->string('titulo',200);
            $table->unsignedInteger('zona_id');
            $table->string('latitud');
            $table->string('longitud');
            $table->integer('es_barrio_parque');
            $table->string('estacion')->nullable();
            $table->unsignedInteger('estado_id');

            $table->foreign('zona_id')->references('id')->on('zonas');
            $table->foreign('estado_id')->references('id')->on('estados');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
