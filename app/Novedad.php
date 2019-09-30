<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
 	protected $table='novedades';
    public $timestamps = false;



    public function img(){
    	return $this->hasMany('App\ImgNovedad');
    }
}
