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


    public function index(){

    	return  Proyecto::with('Img')->get();
    }

   public function viewCreateProyecto(){

        if($this->sessionService->accessSessionData()=="true"){
        	return view('admin.proyecto.createProyecto');
        }else{
            return view('Admin/login');
        }
    }


    public function viewListProyectos(Request $request){
        if($this->sessionService->accessSessionData()=="true"){
            $msg = $request->msg;
        	$proyectos = Proyecto::all();
        	return view('admin.proyecto.listProyecto',compact('proyectos','msg'));
        }else{
            return view('Admin/login');
        }
    }



     public function viewUpdateProyecto(Request $request){
        if($this->sessionService->accessSessionData()=="true"){
         	$proyecto = Proyecto::find($request->id);
            $imagenes = Img::where('proyecto_id',$request->id)->orderBy('order','asc')->get(); 

        	return view('admin.proyecto.updateProyecto', compact('proyecto','imagenes'));
        }else{
            return view('Admin/login');
        }
    }

     public function viewCreateTestimonio(){
        if($this->sessionService->accessSessionData()=="true"){
            return view('admin.testimonio.createTestimonio');
        }else{
            return view('Admin/login');
        }
    }


    public function viewListTestimonios(Request $request){
        if($this->sessionService->accessSessionData()=="true"){
            $testimonios = Testimonio::all();
            $msg = $request->msg;
            return view('admin.testimonio.listTestimonios',compact('testimonios','msg'));
        }else{
            return view('Admin/login');
        }
    }



     public function viewUpdateTestimonio(Request $request){
        if($this->sessionService->accessSessionData()=="true"){

            $testimonio = Testimonio::with('img')->find($request->id);    

            return view('admin.testimonio.updateTestimonio',['testimonio'=>$testimonio]);

        }else{
            return view('Admin/login');
        }
    }



    public function viewCreateNovedad(){
        if($this->sessionService->accessSessionData()=="true"){
            return view('admin.novedad.createNovedad');
        }else{
            return view('Admin/login');
        }
    }


    public function viewListNovedades(Request $request){
        if($this->sessionService->accessSessionData()=="true"){
            $novedades = Novedad::all();
            $msg = $request->msg;
            return view('admin.novedad.listNovedades',compact('novedades','msg'));
        }else{
            return view('Admin/login');
        }
    }



     public function viewUpdateNovedad(Request $request){
        if($this->sessionService->accessSessionData()=="true"){
            $novedad = Novedad::with('img')->find($request->id);
            return view('admin.novedad.updateNovedad',['novedad'=>$novedad]);
        }else{
            return view('Admin/login');
        }
    }



}
