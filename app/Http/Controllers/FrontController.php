<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proyecto;
use App\Img;

use App\Testimonio;
use App\ImgTestimonio;

use App\Novedad;
use App\ImgNovedad;

use App\Services\SessionService;

use Illuminate\Support\Facades\DB;


class FrontController extends Controller
{
    protected $sessionService;


   function __construct(SessionService $sessionService){
      $this->sessionService=$sessionService;
    }

    public function testimonios(){
        return view('testimonios',['testimonios' => json_encode(Testimonio::all())]);
    }


    public function preguntasFrecuentes(){
        return view('preguntas_frecuentes');
    }


    public function buscador(Request $request){
        return view('buscador',['testimonios' =>Testimonio::limit(6)->offset(6)->get()]);
    }


}
