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

  protected $fb = 'https://www.facebook.com/Terranovadesarrollos';
  protected $ig = 'https://www.instagram.com/terranovadesarrollos/';
  protected $yt = 'https://www.youtube.com/channel/UCAa8DmWWB_NMjCrpPiKhn9g';

	public function buscarBarrioSegunZonaEstado(Request $request){

        
        $zona_id = (int)$request->zonaId;
        
        $estado_id = (int)$request->estadoId;
        

        $proyectos=DB::table('proyectos')
                     
                      ->select('id','titulo')

                      ->when($zona_id,function($query,$zona_id){
                               return $query->where('proyectos.zona_id',$zona_id);  
                            })


                      ->when($estado_id,function($query,$estado_id){
                               return $query->where('proyectos.estado_id',$estado_id);  
                            })
                      
                      ->orderBy('titulo', 'asc')

                      ->get();




        return $proyectos;


  	}


  	public function buscarProyectos(Request $request){

  			$zona_id = (int)$request->zona;

  			$proyecto_id = (int)$request->proyecto;

  			$estado_id = (int)$request->estado;

  		  	$proyectos = Proyecto::when($estado_id,function($query,$estado_id){
                               return $query->where('estado_id',$estado_id,);  
                            })
                ->when($zona_id,function($query,$zona_id){
                               return $query->where('zona_id',$zona_id,);  
                            })
                            ->when($proyecto_id,function($query,$proyecto_id){
                               return $query->where('id',$proyecto_id,);  
                            })


                            ->get();








            //return $proyectos;

             return view('buscador',[
                    'fb' => $this->fb,
                'ig' => $this->ig,
                'yt' => $this->yt,
                'zonas' => Zona::all(),
                'proyectos' => $proyectos,
                'estados' => Estado::all()
                    ]);

            
  	} 
    


}//class
