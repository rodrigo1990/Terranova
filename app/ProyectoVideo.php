<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoVideo extends Model
{
     protected $table='proyecto_video';
    public $timestamps = false;



    public function proyecto(){
    	return $this->belongsTo('App\Proyectos');
    }
}
