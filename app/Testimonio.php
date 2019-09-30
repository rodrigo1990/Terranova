<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
      protected $table='testimonios';
    public $timestamps = false;

    public function img(){
    	return $this->hasMany('App\ImgTestimonio');
    }
}
