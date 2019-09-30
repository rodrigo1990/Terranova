<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novedad;
use App\ImgNovedad;
use Illuminate\Support\Facades\Storage;

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

		 	$format = $request->imgPresentacion->extension();

		 	$img->ruta = "".$name.".".$format."";

		 	$img->nombre = $request->imgPresentacion->getClientOriginalName(); 

		 	$path = $request->imgPresentacion->storeAs('novedades/',$img->ruta,'public');


		 	$novedad->img()->save($img);


		 	return "Testimonio cargado con exito";


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

			
		 	return view('admin.novedad.listNovedades',['msg' => 'true']);


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




			$img = ImgNovedad::where('novedad_id',$request->id)->get();

			Storage::disk('public')->delete("novedades/".$img[0]->ruta."");

			$name = rand(0,99999999);

		 	$format = $request->imgPresentacion->extension();

		 	$img[0]->ruta = "".$name.".".$format."";

		 	$img[0]->nombre = $request->imgPresentacion->getClientOriginalName(); 

		 	$path = $request->imgPresentacion->storeAs('novedades/',$img[0]->ruta,'public');

		 	$img[0]->save();


			




	 		
		 	return view('admin.novedad.listNovedades',['msg' => 'true']);


	 	} catch (Exception $e) {
			$msg = "Ha habido un problema: ".$e."";
	 		return view('admin.novedad.listNovedades',['msg' => $msg]);

	 	}
	 }

}
