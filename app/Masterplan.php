<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masterplan extends Model
{
    protected $table='proyecto_masterplan';
    public $timestamps = false;



    public function proyecto(){
    	return $this->belongsTo('App\Proyecto');
    }
}
