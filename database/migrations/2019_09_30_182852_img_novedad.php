<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImgNovedad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_novedad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruta',200);
            $table->string('nombre',200);
            $table->unsignedInteger('novedad_id');

             $table->foreign('novedad_id')->references('id')->on('novedades');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('img_novedad');
    }
}
