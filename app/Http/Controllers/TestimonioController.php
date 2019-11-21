<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonio;
use App\ImgTestimonio;
use Illuminate\Support\Facades\Storage;

class TestimonioController extends Controller
{
	public function pruebaString(Request $request){
		$request->link = "https://www.youtube.com/watch?v=9g-YQJqZaJ4";
		
		return $request->link;
	}
    public function createTestimonio(Request $request){

	 	try {
	 		
	 		$testimonio = new Testimonio();

	 		$testimonio->titulo = $request->titulo;

	 		$testimonio->link_youtube = $request->youTubeCode;

	 		$testimonio->save();


	 		$img = new ImgTestimonio();

	 		$name = rand(0,99999999);

		 	$format = $request->img_presentacion->extension();

		 	$img->ruta = "".$name.".".$format."";

		 	$img->nombre = $request->img_presentacion->getClientOriginalName(); 

		 	$path = $request->img_presentacion->storeAs('testimonios/',$img->ruta,'public');


		 	$testimonio->img()->save($img);



		 	return redirect('/admin/viewListTestimonios/"create"');


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

			
		 	return redirect('/admin/viewListTestimonios/"destroy"');


	 	} catch (Exception $e) {
			$msg = "Ha habido un problema: ".$e."";
	 		return view('admin.testimonio.listTestimonios',['msg' => $msg]);

	 	}
	 }



	  public function updateTestimonio(Request $request){

		try {


			$testimonio = Testimonio::find($request->id);

			$testimonio->titulo = $request->titulo;

			$testimonio->link_youtube = $request->youTubeCode;

			$testimonio->save();

			if($request->img_presentacion){
			
				$img = new ImgTestimonio();

			 	$name = rand(0,99999999);

			 	$format = $request->img_presentacion->extension();

			 	$img->ruta = "".$name.".".$format."";

			 	$img->nombre = $request->img_presentacion->getClientOriginalName(); 

			 	$path = $request->img_presentacion->storeAs('testimonios/',$img->ruta,'public');

			 	$testimonio->img()->save($img);	
			
			}
			




	 		
		 	return redirect('/admin/viewListTestimonios/"update"');


	 	} catch (Exception $e) {
			$msg = "Ha habido un problema: ".$e."";
	 		return view('admin.testimonio.listTestimonios',['msg' => $msg]);

	 	}
	 }



	 public function destroyImg(Request $request){

	 	try {


	 		$img = ImgTestimonio::find($request->id);

	 		
 			Storage::disk('public')->delete("testimonios/".$img->ruta."");
	 		


	 		ImgTestimonio::find($request->id)->delete();

			
		 	return 'true';


	 	} catch (Exception $e) {
			return $e;
	 	}

	 }


	
}
