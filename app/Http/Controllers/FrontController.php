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
							'proyectos' => $this->proyectos
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
        return view('buscador',[
					        	'testimonios' =>Testimonio::limit(6)->offset(6)->get(),
					        	'fb' => $this->fb,
								'ig' => $this->ig,
								'yt' => $this->yt,
								'zonas' => Zona::all(),
								'proyectos' => $this->proyectos
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
