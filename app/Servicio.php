<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
     protected $table='servicios';
    public $timestamps = false;



     public function proyecto(){
    	return $this->belongsTo('App\Proyecto');	
    }
}
