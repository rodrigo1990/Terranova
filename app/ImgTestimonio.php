<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImgTestimonio extends Model
{
    protected $table='img_testimonio';
    public $timestamps = false;



    public function testimonios(){
    	return $this->belongsTo('App\Testimonio');
    }
}
