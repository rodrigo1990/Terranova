<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BuscadorController extends Controller
{

	public function buscarBarrioSegunZona(Request $request){

        $proyectos=DB::table('proyectos')
                     
                      ->select('id','titulo')
                      ->where('zona_id','=',$request->zonaId)
                      ->orderBy('titulo', 'asc')
                      ->get();


        return $proyectos;


      } 
    


}//class
