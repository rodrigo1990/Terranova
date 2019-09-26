<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proyecto;
use App\Img;

class FrontController extends Controller
{
    public function index(){

    	return  Proyecto::with('Img')->get();
    }

   public function viewCreateProyecto(){
    	return view('admin.createProyecto');
    }


    public function viewListProyectos(){
    	$proyectos = Proyecto::all();
    	return view('admin.listProyecto',['proyectos'=>$proyectos]);
    }



     public function viewUpdateProyecto(Request $request){
     	$proyecto = Proyecto::with('img')->find($request->id);
    	return view('admin.updateProyecto',['proyecto'=>$proyecto]);
    }
}
