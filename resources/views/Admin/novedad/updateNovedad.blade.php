@extends('Admin.layouts.iframe')
	@section('main')
	<section id="novedades">
		<h1>NOVEDADES</h1>
		
		<br><br><br><br>
		<form action="/admin/updateNovedad" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="container">
					<input type="hidden" value="{{$novedad->id}}" name="id" id="id">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" name="titulo" value="{{$novedad->titulo}}">
					<br>
					<br>
					<label for="descripcion">Descripcion</label>
					<textarea name="descripcion" id="" cols="30" rows="10">{{$novedad->descripcion}}</textarea>
					<br><br>
					

					<div class="row">
						<h2>IMAGEN DE PRESENTACIÓN</h2>
						<ul class="flex">

							<li id="img-exist-{{$novedad->img[0]->id}}" class="img-exist">
										
										<div style="background:url(<?php echo asset('storage/img/novedades/'.$novedad->img[0]->ruta.'') ?>)" class="preview" id="preview-presentacion">
											<a onclick="deleteImg('{{$novedad->img[0]->id}}','presentacion','novedad')" class=" removeBtn text-center center-block"><i class="fas fa-times-circle"></i></a>
											<div id="file-result-presentacion" class="text-center">
					                            <span id="file-img-presentacion">{{$novedad->img[0]->nombre}}</span>
				            					</div>
										</div>
										
							</li>
						</ul>

							<div id="newImgPresentacion">
							
						</div>

						
					</div>
				
					
				<br><br>
				<button class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></button>

			</div>


		</form>
		</div>

		</section>
		

	@stop
	

	@section('scripts')
		<script>
			tinymce.init({selector: "textarea",  // change this value according to your HTML
			  plugins: "link",
			  menubar: "insert edit align",
			  language:'es'});
		</script>	
		
		
	@stop