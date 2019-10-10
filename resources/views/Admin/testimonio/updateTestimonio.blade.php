@extends('Admin.layouts.iframe')
	@section('main')
	<section id="testimonios">
		<h1>TESTIMONIOS</h1>
		
		<br><br>
		<form action="/admin/updateTestimonio" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="container">
				<input type="hidden" name="id" value="{{$testimonio->id}}">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" name="titulo" value="{{$testimonio->titulo}}">
					<br>
					<br>
					
					<label for="link">Link</label>
					<input type="text" class="form-control" name="linkYoutube" id="linkYoutube" value="{{$testimonio->link_youtube}}">
					<br><br>

					<div class="row">
						<h2>IMAGEN DE PRESENTACIÓN</h2>

						<ul class="flex">
							
						@if($testimonio->img[0])
						
								<li id="img-exist-{{$testimonio->img[0]->id}}" class="img-exist">
									
									<div style="background:url(<?php echo asset('storage/img/testimonios/'.$testimonio->img[0]->ruta.'') ?>)" class="preview" id="preview-presentacion">
										<a onclick="deleteImg('{{$testimonio->img[0]->id}}','presentacion','testimonio')" class=" removeBtn text-center center-block"><i class="fas fa-times-circle"></i></a>
										<div id="file-result-presentacion" class="text-center">
				                            <span id="file-img-presentacion">{{$testimonio->img[0]->nombre}}</span>
			            					</div>
									</div>
									
								</li>	
						@else

								<div id="newImgPresentacion"></div>
					
						@endif


						</ul>

				
					</div>
				
					
				<br><br>
				<button class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></button>

			</div>


		</form>
		</div>

		</section>
		

	@stop
	
