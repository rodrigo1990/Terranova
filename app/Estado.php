<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
 	protected $table='estados';
    public $timestamps = false;


     public function proyecto(){
    	return $this->hasMany('App\Proyecto');	
    }
}
