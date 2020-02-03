<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaColectivo extends Model
{
     protected $table='lineas_colectivo';
    public $timestamps = false;



     public function proyecto(){
    	return $this->belongsTo('App\Proyecto');	
    }
}
