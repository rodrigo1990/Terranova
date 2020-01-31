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

    public function zona(){
    	return $this->belongsTo('App\Zona');	
    }

    public function video(){
    	return $this->hasMany('App\ProyectoVideo');	
    }
}
