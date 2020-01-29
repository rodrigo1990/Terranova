<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table='zonas';
    public $timestamps = false;



    public function proyectos(){
    	return $this->hasMany('App\Proyecto');
    }
}
