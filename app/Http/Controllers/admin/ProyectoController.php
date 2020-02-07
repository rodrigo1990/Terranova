<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Img;
use App\ProyectoVideo;
use App\Estado;
use App\Servicio;
use App\Caracteristica;
use App\LineaColectivo;
use App\Masterplan;
use Illuminate\Support\Facades\Storage;
use  App\Http\Controllers\admin\Controller;

class ProyectoController extends Controller
{
	 public function createProyecto(Request $request){

	 	try {
	 		//PROYECTO
	 		$proyecto = new Proyecto();

		 	$proyecto->descripcion = $request->descripcion;

		 	$proyecto->titulo = $request->titulo;

		 	$proyecto->zona_id = $request->zona;

		 	$proyecto->latitud = $request->latitud;

		 	$proyecto->longitud = $request->longitud;

		 	$proyecto->estado_id = $request->estado;

		 	if($request->estacion != null){
		 		$proyecto->estacion = $request->estacion;
		 	}

		 	$proyecto->save();


		 	if($request->masterplan){

 			 	//IMAGEN PRESENTACION
 			 	$masterplan = new Masterplan();
 	
 			 	$name = rand(0,99999999);
 	
 			 	$format = $request->masterplan->extension();
 	
 			 	$masterplan->ruta = "".$name.".".$format."";
 	
 			 	$masterplan->nombre = $request->masterplan->getClientOriginalName(); 
 	
 			 	$path = $request->masterplan->storeAs('/archivos/proyectos/masterplans/',$masterplan->ruta,'public');
 	
 	 	
 			 	$proyecto->masterplan()->save($masterplan);
 			 		
		 	}


		 	if($request->lineasColectivos != null){
		 		
		 		foreach ($request->lineasColectivos as $lineaColectivo) {
		 			
		 			if($lineaColectivo != null){
		 			
			 			$lineaColectivoObj = new LineaColectivo();
			 			$lineaColectivoObj->descripcion = $lineaColectivo; 
			 			$proyecto->lineaColectivo()->save($lineaColectivoObj);

		 			}

		 		}
		 	}





		 	if($request->video_1 != null){
		 		$video1 = new ProyectoVideo();
		 		$video1->url = $request->youTubeCode_1;
		 		$proyecto->video()->save($video1);
		 	}


		 	if($request->video_2 != null){
		 		$video2 = new ProyectoVideo();
		 		$video2->url = $request->youTubeCode_2;
		 		$proyecto->video()->save($video2);
		 	}

		 	if($request->caracteristicas != null){
		 		
		 		foreach ($request->caracteristicas as $caracteristica) {
		 			
		 			if($caracteristica != null){
		 			
			 			$caracteristicaObj = new Caracteristica();
			 			$caracteristicaObj->descripcion = $caracteristica; 
			 			$proyecto->caracteristica()->save($caracteristicaObj);

		 			}

		 		}
		 	}






		 	if($request->servicios != null){
		 		
		 		foreach ($request->servicios as $servicio) {
		 			
		 			if($servicio != null){
		 			
			 			$servicioObj = new Servicio();
			 			$servicioObj->descripcion = $servicio; 
			 			$proyecto->servicio()->save($servicioObj);

		 			}

		 		}
		 	}

		 	if($request->img_presentacion){

 			 	//IMAGEN PRESENTACION
 			 	$img_presentacion = new Img();
 	
 			 	$name = rand(0,99999999);
 	
 			 	$format = $request->img_presentacion->extension();
 	
 			 	$img_presentacion->ruta = "".$name.".".$format."";
 	
 			 	$img_presentacion->nombre = $request->img_presentacion->getClientOriginalName(); 
 	
 			 	$path = $request->img_presentacion->storeAs('/img/proyectos/',$img_presentacion->ruta,'public');
 	
 	
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

			 	$path = $request->img[$i]->storeAs('/img/proyectos/',$img->ruta,'public');

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

		 	$proyecto->zona_id = $request->zona;

		 	$proyecto->latitud = $request->latitud;

		 	$proyecto->longitud = $request->longitud;

		 	$proyecto->estado_id = $request->estado;

		 	if($request->estacion == null){
		 		$proyecto->estacion = null;
		 	}


		 	$proyecto->save();


		 	if($request->youTubeCode_1 != null){
		 		
		 		$video1 = ProyectoVideo::find($request->video_1_id);
		 		
		 		if(isset($video1)){
		 		
		 			$video1->url = $request->youTubeCode_1;
		 		
		 		}else{

		 			$video1 = new ProyectoVideo();
		 			$video1->url = $request->youTubeCode_1;

		 		}
		 		
		 		$proyecto->video()->save($video1);
		 	
		 	}else{

		 		ProyectoVideo::find($request->video_1_id)->delete();
		 	
		 	}


 		 	if($request->youTubeCode_2 != null){
		 		
		 		$video2 = ProyectoVideo::find($request->video_2_id);
		 		
		 		if(isset($video2)){
		 		
		 			$video2->url = $request->youTubeCode_2;
		 		
		 		}else{

		 			$video2 = new ProyectoVideo();
		 			$video2->url = $request->youTubeCode_2;

		 		}
		 		
		 		$proyecto->video()->save($video2);
		 	
		 	}else{

		 		ProyectoVideo::find($request->video_2_id)->delete();
		 	
		 	}


		 	if($request->masterplan){

 			 	//IMAGEN PRESENTACION
 			 	$masterplan = new Masterplan();
 	
 			 	$name = rand(0,99999999);
 	
 			 	$format = $request->masterplan->extension();
 	
 			 	$masterplan->ruta = "".$name.".".$format."";
 	
 			 	$masterplan->nombre = $request->masterplan->getClientOriginalName(); 
 	
 			 	$path = $request->masterplan->storeAs('/archivos/proyectos/masterplans/',$masterplan->ruta,'public');
 	
 	 	
 			 	$proyecto->masterplan()->save($masterplan);
 			 		
		 	}


			if($request->lineasColectivosExistentes){
		
				foreach ($request->lineasColectivosExistentes as $key => $value) {

					if($value != null || $value != '' ){
					
						$lineaColectivoObj = LineaColectivo::find($key);

						$lineaColectivoObj->descripcion = $value;

						$lineaColectivoObj->save();
					
					}else{
						
						$lineaColectivoObj = LineaColectivo::find($key);

						$lineaColectivoObj->delete();
					}
				}

			}


			if($request->lineasColectivos){
		
				foreach ($request->lineasColectivos as $lineaColectivo) {

					
						$lineaColectivoObj = new LineaColectivo();

						$lineaColectivoObj->descripcion = $lineaColectivo;

						$proyecto->lineaColectivo()->save($lineaColectivoObj);
					
				}

			}



			if($request->caracteristicasExistentes){
		
				foreach ($request->caracteristicasExistentes as $key => $value) {

					if($value != null || $value != '' ){
					
						$caracteristicaObj = Caracteristica::find($key);

						$caracteristicaObj->descripcion = $value;

						$caracteristicaObj->save();
					
					}else{
						
						$caracteristicaObj = Caracteristica::find($key);

						$caracteristicaObj->delete();
					}
				}

			}


			if($request->caracteristicas){
		
				foreach ($request->caracteristicas as $caracteristica) {

					
						$caracteristicaObj = new Caracteristica();

						$caracteristicaObj->descripcion = $caracteristica;

						$proyecto->caracteristica()->save($caracteristicaObj);
					
				}

			}



			if($request->serviciosExistentes){
		
				foreach ($request->serviciosExistentes as $key => $value) {

					if($value != null || $value != '' ){
					
						$servicioObj = Servicio::find($key);

						$servicioObj->descripcion = $value;

						$servicioObj->save();
					
					}else{
						
						$servicioObj = Servicio::find($key);

						$servicioObj->delete();
					}
				}

			}


			if($request->servicios){
		
				foreach ($request->servicios as $servicio) {

					
						$servicioObj = new Servicio();

						$servicioObj->descripcion = $servicio;

						$proyecto->servicio()->save($servicioObj);
					
				}

			}









		 	if($request->img_presentacion){

	 			$img = new Img();

			 	$name = rand(0,99999999);

			 	$format = $request->img_presentacion->extension();

			 	$img->ruta = "".$name.".".$format."";

			 	$img->nombre = $request->img_presentacion->getClientOriginalName(); 

			 	$path = $request->img_presentacion->storeAs('/img/proyectos/',$img->ruta,'public');


			 	$img->tipo = 'PRESENTACION';

			 	$proyecto->img()->save($img);	

		 	}

		 	if($request->orderSlide){
			 	//ACTUALIZAR ORDEN EN SLIDES
				$f = min(array_keys($request->orderSlide));
				$l = max(array_keys($request->orderSlide));
				 	for($i=$f;$i<=$l;$i++){

				 		if(isset($request->orderSlide[$i])){
				 		
						 	$img = Img::find($i);
		
						 	$img->order = $request->orderSlide[$i];
		
						 	$proyecto->img()->save($img);
						}	
				 	
				 	}
			 }





		 	//IMG SLIDER
		 	if($request->img){
 			 	if(count($request->img)>0){
 			 		$f = array_key_first($request->img);
 			 		$l = array_key_last($request->img);
 	 			 	for($i=$f;$i<=$l;$i++){
 	 					
 	 			 		if(isset($request->img[$i])){

	 	 				 	$img = new Img();
	 	 	
	 	 				 	$name = rand(0,99999999);
	 	 	
	 	 				 	$format = $request->img[$i]->extension();
	 	 	
	 	 				 	$img->ruta = "".$name.".".$format."";
	 	 	
	 	 				 	$img->nombre = $request->img[$i]->getClientOriginalName(); 
	 	 	
	 	 				 	$path = $request->img[$i]->storeAs('/img/proyectos/',$img->ruta,'public');
	 	 	
	 	 				 	$img->tipo = 'SLIDE';

	 	 				 	$img->order = $i;
	 	 	
	 	 				 	$proyecto->img()->save($img);

 	 				 	}
 	 			 	
 	 			 	}
 			 	}
		 	}



		 	return redirect('/admin/viewListProyectos/"update"');


	 	} catch (Exception $e) {
			$msg = "Ha habido un problema: ".$e."";
	 		return view('admin.proyecto.createProyecto',['msg' => $msg]);

	 	}

	 	$f = min(array_keys($request->orderSlide));
		$l = max(array_keys($request->orderSlide));
	 	
		$a = array($f,$l);

	 


	 }



	 public function destroyProyecto(Request $request){

	 	try {


	 		$imgs = Img::where('proyecto_id',$request->id)->get();


	 		foreach($imgs as $img){
	 			Storage::disk('public')->delete("/img/proyectos/".$img->ruta."");
	 		}

	 		


	 		Img::where('proyecto_id',$request->id)->delete();

	 		Caracteristica::where('proyecto_id',$request->id)->delete();
	 		Servicio::where('proyecto_id',$request->id)->delete();
	 		LineaColectivo::where('proyecto_id',$request->id)->delete();
	 		ProyectoVideo::where('proyecto_id',$request->id)->delete();
	 		$this->destroyMasterplan($request);
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


	 public function destroyMasterplan(Request $request){

	 	$masterplan   = Masterplan::where('proyecto_id',$request->id)->first();

	 	Storage::disk('public')->delete('/archivos/proyectos/masterplans/',$masterplan->ruta);

	 	Masterplan::where('proyecto_id',$request->id)->delete();


	 	return json_encode("true");


	 }
}
