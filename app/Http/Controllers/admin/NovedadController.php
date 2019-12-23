<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Novedad;
use App\ImgNovedad;
use Illuminate\Support\Facades\Storage;
use  App\Http\Controllers\admin\Controller;

class NovedadController extends Controller
{
     public function createNovedad(Request $request){

	 	try {
	 		
	 		$novedad = new Novedad();

	 		$novedad->titulo = $request->titulo;

	 		$novedad->descripcion = $request->descripcion;

	 		$novedad->save();


	 		$img = new ImgNovedad();

	 		$name = rand(0,99999999);

		 	$format = $request->img_presentacion->extension();

		 	$img->ruta = "".$name.".".$format."";

		 	$img->nombre = $request->img_presentacion->getClientOriginalName(); 

		 	$path = $request->img_presentacion->storeAs('novedades/',$img->ruta,'public');


		 	$novedad->img()->save($img);



		 	return redirect('/admin/viewListNovedades/"create"');


	 	} catch (Exception $e) {
			return "Ha habido un error:".$e."";	
	 	}

	 }


	 public function destroyNovedad(Request $request){

		try {


	 		$img = ImgNovedad::where('novedad_id',$request->id)->get();

 			Storage::disk('public')->delete("novedades/".$img[0]->ruta."");
	 		

	 		ImgNovedad::where('novedad_id',$request->id)->delete();

	 		Novedad::find($request->id)->delete();

			
		 	return redirect('/admin/viewListNovedades/"destoy"');


	 	} catch (Exception $e) {
			$msg = "Ha habido un problema: ".$e."";
	 		return view('admin.testimonio.listNovedades',['msg' => $msg]);

	 	}
	 }



	  public function updateNovedad(Request $request){

		try {


			$novedad = Novedad::find($request->id);

			$novedad->titulo = $request->titulo;

			$novedad->descripcion= $request->descripcion;

			$novedad->save();


			if($request->img_presentacion){
			
					
				$img = new ImgNovedad();

			 	$name = rand(0,99999999);

			 	$format = $request->img_presentacion->extension();

			 	$img->ruta = "".$name.".".$format."";

			 	$img->nombre = $request->img_presentacion->getClientOriginalName(); 

			 	$path = $request->img_presentacion->storeAs('novedades/',$img->ruta,'public');

			 	$novedad->img()->save($img);	
			
			}
			




	 		
		 	return redirect('/admin/viewListNovedades/"update"');


	 	} catch (Exception $e) {
			$msg = "Ha habido un problema: ".$e."";
	 		return view('admin.novedad.listNovedades',['msg' => $msg]);

	 	}
	 }


	  public function destroyImg(Request $request){

	 	try {


	 		$img = ImgNovedad::find($request->id);

	 		
 			Storage::disk('public')->delete("novedades/".$img->ruta."");
	 		


	 		ImgNovedad::find($request->id)->delete();

			
		 	return 'true';


	 	} catch (Exception $e) {
			return $e;
	 	}

	 }

}
