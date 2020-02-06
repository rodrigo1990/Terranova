<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Proyecto;
use App\Img;
use App\Zona;

use App\Testimonio;
use App\ImgTestimonio;

use App\Novedad;
use App\ImgNovedad;

use App\Estado;

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


  	public function buscarProyectos(Request $request){

  			$zona_id = $request->zona_id;

  			$proyecto_id = $request->proyecto_id;

  			$estado_id = $request->estado_id;

  		  	$proyectos = DB::table('proyectos')
                            ->join('zonas','zonas.id','proyectos.zona_id')
                            ->join('estados','estados.id','proyectos.estado_id')
                            
                            ->when($provincia_id,function($query,$zona_id){
                               return $query->where('zonas.id',$zona_id);  
                            })

                            ->when($ciudad_id,function($query,$proyecto_id){
                               return $query->where('proyectos.id',$proyecto_id);  
                            })

                            ->when($especialidad_id,function($query,$estado_id){
                               return $query->where('estados.id',$estado_id);
                                  });
                            })


                            ->get();

            return $proyectos;
  	} 
    


}//class
