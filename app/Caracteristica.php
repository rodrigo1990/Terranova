<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
     protected $table='caracteristicas';
    public $timestamps = false;



     public function proyecto(){
    	return $this->belongsTo('App\Proyecto');	
    }
}
