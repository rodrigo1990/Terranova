<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table='proyectos';
    public $timestamps = false;



    public function img(){
    	return $this->hasMany('App\Img');
    }
}
