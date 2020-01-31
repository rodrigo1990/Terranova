<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImgTestimonios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_testimonio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruta',200);
            $table->string('nombre',200);
            $table->unsignedInteger('testimonio_id');

             $table->foreign('testimonio_id')->references('id')->on('testimonios');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('img_testimonio');
    }
}
