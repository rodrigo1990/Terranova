<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proyecto;
use App\Img;

use App\Testimonio;
use App\ImgTestimonio;

use App\Novedad;
use App\ImgNovedad;

use Illuminate\Support\Facades\DB;


class FrontController extends Controller
{
    public function index(){

    	return  Proyecto::with('Img')->get();
    }

   public function viewCreateProyecto(){
    	return view('admin.proyecto.createProyecto');
    }


    public function viewListProyectos(Request $request){
        $msg = $request->msg;
    	$proyectos = Proyecto::all();
    	return view('admin.proyecto.listProyecto',compact('proyectos','msg'));
    }



     public function viewUpdateProyecto(Request $request){

     	$proyecto = Proyecto::find($request->id);
        $imagenes = Img::where('proyecto_id',$request->id)->orderBy('order','asc')->get(); 

    	return view('admin.proyecto.updateProyecto', compact('proyecto','imagenes'));
    }

     public function viewCreateTestimonio(){
        return view('admin.testimonio.createTestimonio');
    }


    public function viewListTestimonios(Request $request){
        $testimonios = Testimonio::all();
        $msg = $request->msg;
        return view('admin.testimonio.listTestimonios',compact('testimonios','msg'));
    }



     public function viewUpdateTestimonio(Request $request){
        $testimonio = Testimonio::with('img')->find($request->id);
        return view('admin.testimonio.updateTestimonio',['testimonio'=>$testimonio]);
    }



    public function viewCreateNovedad(){
        return view('admin.novedad.createNovedad');
    }


    public function viewListNovedades(Request $request){
        $novedades = Novedad::all();
        $msg = $request->msg;
        return view('admin.novedad.listNovedades',compact('novedades','msg'));
    }



     public function viewUpdateNovedad(Request $request){
        $novedad = Novedad::with('img')->find($request->id);
        return view('admin.novedad.updateNovedad',['novedad'=>$novedad]);
    }



}
