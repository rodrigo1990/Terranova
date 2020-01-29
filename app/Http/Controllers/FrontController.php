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


	public function index(){
		return view('index',[
							'fb' => $this->fb,
							'ig' => $this->ig,
							'yt' => $this->yt,
							'zonas' => Zona::all()
							]);
	} 
    

    public function testimonios(){
        return view('testimonios',[
        							'testimonios' => json_encode(Testimonio::all()),
        							'fb' => $this->fb,
									'ig' => $this->ig,
									'yt' => $this->yt
        							]);
    }


    public function preguntasFrecuentes(){
        return view('preguntas_frecuentes',[
        									'fb' => $this->fb,
											'ig' => $this->ig,
											'yt' => $this->yt
        									]);
    }


    public function buscador(Request $request){
        return view('buscador',[
					        	'testimonios' =>Testimonio::limit(6)->offset(6)->get(),
					        	'fb' => $this->fb,
								'ig' => $this->ig,
								'yt' => $this->yt,
								'zonas' => Zona::all()
					        	]);
    }


}
