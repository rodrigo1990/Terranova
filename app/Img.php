<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    protected $table='img_proyecto';
    public $timestamps = false;



    public function proyectos(){
    	return $this->belongsTo('App\Proyecto');
    }
}
