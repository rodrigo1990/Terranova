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
            $table->string('estacion')->nullable();

            $table->foreign('zona_id')->references('id')->on('zonas');
         
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
