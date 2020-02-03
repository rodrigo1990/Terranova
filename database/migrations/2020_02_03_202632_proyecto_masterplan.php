<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProyectoMasterplan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_masterplan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruta',200);
            $table->string('nombre',200);
            $table->unsignedInteger('proyecto_id');

             $table->foreign('proyecto_id')->references('id')->on('proyectos');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_masterplan');
    }
}
