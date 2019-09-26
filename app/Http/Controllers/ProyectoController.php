<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Img;
use Illuminate\Support\Facades\Storage;

class ProyectoController extends Controller
{
	 public function createProyecto(Request $request){

	 	try {
	 		$proyecto = new Proyecto();

		 	$proyecto->descripcion = $request->descripcion;

		 	$proyecto->titulo = $request->titulo;

		 	$proyecto->estado = $request->estado;

		 	$proyecto->save();

		 	for($i=1;$i<=count($request->img);$i++){

			 	$img = new Img();

			 	$name = rand(0,99999999);

			 	$format = $request->img[$i]->extension();

			 	$img->ruta = "".$name.".".$format."";

			 	$img->nombre = $request->img[$i]->getClientOriginalName(); 

			 	$path = $request->img[$i]->storeAs('proyectos/',$img->ruta,'public');

			 	$proyecto->img()->save($img);	
		 	
		 	}

		 	return view('admin.createProyecto',['msg' => 'true']);


	 	} catch (Exception $e) {
			$msg = "Ha habido un problema: ".$e."";
	 		return view('admin.createProyecto',['msg' => $msg]);

	 	}

	 }


	 public function destroyProyecto(Request $request){

	 	try {


	 		$imgs = Img::where('proyecto_id',$request->id)->get();

	 		foreach($imgs as $img){
	 			Storage::disk('public')->delete("proyectos/".$img->ruta."");
	 		}


	 		Img::where('proyecto_id',$request->id)->delete();

	 		Proyecto::find($request->id)->delete();

			
		 	return view('admin.listProyecto',['msg' => 'true']);


	 	} catch (Exception $e) {
			$msg = "Ha habido un problema: ".$e."";
	 		return view('admin.listProyecto',['msg' => $msg]);

	 	}

	 }



	 public function destroyImg(Request $request){

	 	try {


	 		$img = Img::find($request->id);

	 		
 			Storage::disk('public')->delete("proyectos/".$img->ruta."");
	 		


	 		Img::find($request->id)->delete();

			
		 	return 'true';


	 	} catch (Exception $e) {
			return $e;
	 	}

	 }
}
