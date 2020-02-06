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

    public function estado(){
        return $this->belongsTo('App\Estado');    
    }

    public function video(){
    	return $this->hasMany('App\ProyectoVideo');	
    }


    public function servicio(){
        return $this->hasMany('App\Servicio'); 
    }


    public function caracteristica(){
        return $this->hasMany('App\Caracteristica'); 
    }

    public function lineaColectivo(){
        return $this->hasMany('App\LineaColectivo'); 
    }

    public function masterplan(){
        return $this->hasMany('App\Masterplan'); 
    }
}
