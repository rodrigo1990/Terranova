<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImgNovedad extends Model
{
    protected $table='img_novedad';
    public $timestamps = false;



    public function novedades(){
    	return $this->belongsTo('App\Novedad');
    }
}
