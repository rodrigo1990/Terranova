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
	 		//PROYECTO
	 		$proyecto = new Proyecto();

		 	$proyecto->descripcion = $request->descripcion;

		 	$proyecto->titulo = $request->titulo;

		 	$proyecto->estado = $request->estado;

		 	$proyecto->save();

		 	if($request->img_presentacion){

 			 	//IMAGEN PRESENTACION
 			 	$img_presentacion = new Img();
 	
 			 	$name = rand(0,99999999);
 	
 			 	$format = $request->img_presentacion->extension();
 	
 			 	$img_presentacion->ruta = "".$name.".".$format."";
 	
 			 	$img_presentacion->nombre = $request->img_presentacion->getClientOriginalName(); 
 	
 			 	$path = $request->img_presentacion->storeAs('proyectos/',$img_presentacion->ruta,'public');
 	
 	
 			 	$img_presentacion->tipo='PRESENTACION';
 	
 			 	$proyecto->img()->save($img_presentacion);
 			 		
		 	}
		 	//IMG SLIDER
		 	for($i=0;$i<=count($request->img)-1;$i++){

			 	$img = new Img();

			 	$name = rand(0,99999999);

			 	$format = $request->img[$i]->extension();

			 	$img->ruta = "".$name.".".$format."";

			 	$img->nombre = $request->img[$i]->getClientOriginalName(); 

			 	$path = $request->img[$i]->storeAs('proyectos/',$img->ruta,'public');

			 	$img->order = $i;

			 	$img->tipo = 'SLIDE';

			 	$proyecto->img()->save($img);	
		 	
		 	}

		 	return redirect('/admin/viewListProyectos/"create"');


	 	} catch (Exception $e) {
			$msg = "Ha habido un problema: ".$e."";
	 		return view('admin.proyecto.createProyecto',['msg' => $msg]);

	 	}

	 }



	 public function updateProyecto(Request $request){

	 	try {
	 		//PROYECTO
	 		$proyecto = Proyecto::find($request->id);

		 	$proyecto->descripcion = $request->descripcion;

		 	$proyecto->titulo = $request->titulo;

		 	$proyecto->estado = $request->estado;

		 	$proyecto->save();

		 	if($request->img_presentacion){

	 			$img = new Img();

			 	$name = rand(0,99999999);

			 	$format = $request->img_presentacion->extension();

			 	$img->ruta = "".$name.".".$format."";

			 	$img->nombre = $request->img_presentacion->getClientOriginalName(); 

			 	$path = $request->img_presentacion->storeAs('proyectos/',$img->ruta,'public');


			 	$img->tipo = 'PRESENTACION';

			 	$proyecto->img()->save($img);	

		 	}


		 	//ACTUALIZAR ORDEN EN SLIDES
			$f = min(array_keys($request->orderSlide));
			$l = max(array_keys($request->orderSlide));
			 	for($i=$f;$i<=$l;$i++){

				 	$img = Img::find($i);

				 	$img->order = $request->orderSlide[$i];

				 	$proyecto->img()->save($img);	
			 	
			 	}





		 	//IMG SLIDER
		 	if($request->img){
 			 	if(count($request->img)>0){
 			 		$f = array_key_first($request->img);
 			 		$l = array_key_last($request->img);
 	 			 	for($i=$f;$i<=$l;$i++){
 	 	
 	 				 	$img = new Img();
 	 	
 	 				 	$name = rand(0,99999999);
 	 	
 	 				 	$format = $request->img[$i]->extension();
 	 	
 	 				 	$img->ruta = "".$name.".".$format."";
 	 	
 	 				 	$img->nombre = $request->img[$i]->getClientOriginalName(); 
 	 	
 	 				 	$path = $request->img[$i]->storeAs('proyectos/',$img->ruta,'public');
 	 	
 	 				 	$img->tipo = 'SLIDE';
 	 	
 	 				 	$proyecto->img()->save($img);	
 	 			 	
 	 			 	}
 			 	}
		 	}



		 	return redirect('/admin/viewListProyectos/"update"');


	 	} catch (Exception $e) {
			$msg = "Ha habido un problema: ".$e."";
	 		return view('admin.proyecto.createProyecto',['msg' => $msg]);

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

			
		 	return redirect('/admin/viewListProyectos/"destroy"');


	 	} catch (Exception $e) {
			$msg = "Ha habido un problema: ".$e."";
	 		return view('admin.proyecto.listProyecto',['msg' => $msg]);

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
