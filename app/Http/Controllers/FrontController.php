<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proyecto;
use App\Img;
use App\Zona;

use App\Testimonio;
use App\ImgTestimonio;

use App\Novedad;
use App\ImgNovedad;

use App\Estado;

use Illuminate\Support\Facades\DB;


class FrontController extends Controller
{

	protected $fb = 'https://www.facebook.com/Terranovadesarrollos';
	protected $ig = 'https://www.instagram.com/terranovadesarrollos/';
	protected $yt = 'https://www.youtube.com/channel/UCAa8DmWWB_NMjCrpPiKhn9g';


  	function __construct(){
      $this->proyectos=Proyecto::orderBy('titulo')->get();
    }


	public function index(){
		return view('index',[
							'fb' => $this->fb,
							'ig' => $this->ig,
							'yt' => $this->yt,
							'zonas' => Zona::all(),
							'proyectos' => $this->proyectos,
							'estados' => Estado::all()
							]);
	} 
    

    public function testimonios(){
        return view('testimonios',[
        							'testimonios' => json_encode(Testimonio::all()),
        							'fb' => $this->fb,
									'ig' => $this->ig,
									'yt' => $this->yt,
									'proyectos' => $this->proyectos
        							]);
    }


    public function preguntasFrecuentes(){
        return view('preguntas_frecuentes',[
        									'fb' => $this->fb,
											'ig' => $this->ig,
											'yt' => $this->yt,
											'proyectos' => $this->proyectos
        									]);
    }


    public function buscador(Request $request){

    		$zona_id = (int)$request->zona_id;
    		$proyecto_id = (int)$request->proyecto_id;
    		$estado_id= (int)$request->estado_id;
    	
    		$this->proyectos = Proyecto::when($estado_id,function($query,$estado_id){
                               return $query->where('estado_id',$estado_id,);  
                            })
    						->when($zona_id,function($query,$zona_id){
                               return $query->where('zona_id',$zona_id,);  
                            })
                            ->when($proyecto_id,function($query,$proyecto_id){
                               return $query->where('id',$proyecto_id,);  
                            })


                            ->get();


    	

  
        return view('buscador',[
					        	'fb' => $this->fb,
								'ig' => $this->ig,
								'yt' => $this->yt,
								'zonas' => Zona::all(),
								'proyectos' => $this->proyectos,
								'estados' => Estado::all(),
								'estado_id' => $estado_id,
								'proyecto_id' => $proyecto_id,
								'zona_id' => $zona_id
					        	]);
    }





    public function detalleProyecto(Request $request){

    	$proyecto = Proyecto::with('zona')->
    						  with('video')->
    						  with('servicio')->
    						  with('caracteristica')->
    						  with('lineaColectivo')->
    						  with('masterplan')->
							  find($request->id);

		$imagenes = Img::where('proyecto_id',$request->id)->orderBy('order','asc')->get(); 

        return view('detalleProyecto',[
					        	'proyecto' => $proyecto,
					        	'imagenes' => $imagenes,
					        	'fb' => $this->fb,
								'ig' => $this->ig,
								'yt' => $this->yt,
								'zonas' => Zona::all(),
								'proyectos' => $this->proyectos
					        	]);
    }


}
