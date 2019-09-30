<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonio;
use App\ImgTestimonio;
use Illuminate\Support\Facades\Storage;

class TestimonioController extends Controller
{
    public function createTestimonio(Request $request){

	 	try {
	 		
	 		$testimonio = new Testimonio();

	 		$testimonio->titulo = $request->titulo;

	 		$testimonio->link_youtube = $request->linkYoutube;

	 		$testimonio->save();


	 		$img = new ImgTestimonio();

	 		$name = rand(0,99999999);

		 	$format = $request->imgPresentacion->extension();

		 	$img->ruta = "".$name.".".$format."";

		 	$img->nombre = $request->imgPresentacion->getClientOriginalName(); 

		 	$path = $request->imgPresentacion->storeAs('testimonios/',$img->ruta,'public');


		 	$testimonio->img()->save($img);


		 	return "Testimonio cargado con exito";


	 	} catch (Exception $e) {
			return "Ha habido un error:".$e."";	
	 	}

	 }


	 public function destroyTestimonio(Request $request){

		try {


	 		$img = ImgTestimonio::where('testimonio_id',$request->id)->get();

 			Storage::disk('public')->delete("testimonios/".$img[0]->ruta."");
	 		


	 		ImgTestimonio::where('testimonio_id',$request->id)->delete();

	 		Testimonio::find($request->id)->delete();

			
		 	return view('admin.testimonio.listTestimonios',['msg' => 'true']);


	 	} catch (Exception $e) {
			$msg = "Ha habido un problema: ".$e."";
	 		return view('admin.testimonio.listTestimonios',['msg' => $msg]);

	 	}
	 }



	  public function updateTestimonio(Request $request){

		try {


			$testimonio = Testimonio::find($request->id);

			$testimonio->titulo = $request->titulo;

			$testimonio->link_youtube = $request->linkYoutube;

			$testimonio->save();




			$img = ImgTestimonio::where('testimonio_id',$request->id)->get();

			Storage::disk('public')->delete("testimonios/".$img[0]->ruta."");

			$name = rand(0,99999999);

		 	$format = $request->imgPresentacion->extension();

		 	$img[0]->ruta = "".$name.".".$format."";

		 	$img[0]->nombre = $request->imgPresentacion->getClientOriginalName(); 

		 	$path = $request->imgPresentacion->storeAs('testimonios/',$img[0]->ruta,'public');

		 	$img[0]->save();


			




	 		
		 	return view('admin.testimonio.listTestimonios',['msg' => 'true']);


	 	} catch (Exception $e) {
			$msg = "Ha habido un problema: ".$e."";
	 		return view('admin.testimonio.listTestimonios',['msg' => $msg]);

	 	}
	 }



	
}
