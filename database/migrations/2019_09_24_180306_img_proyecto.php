<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImgProyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_proyecto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ruta',200);
            $table->string('nombre',200);
            $table->unsignedBigInteger('proyecto_id');
            $table->string('tipo',100);


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
        Schema::dropIfExists('img_proyecto');
    }
}
