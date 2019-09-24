<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table='proyectos';
    public $timestamps = false;



    public function Img(){
    	return $this->hasMany('App\Img');
    }
}
