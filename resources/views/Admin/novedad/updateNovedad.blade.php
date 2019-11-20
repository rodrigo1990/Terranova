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
					<p class="error" id="tituloError">
						Ingrese un titulo
					</p>
					<br>
					<br>
					<label for="descripcion">Descripcion</label>
					<textarea name="descripcion" id="" cols="30" rows="10">{{$novedad->descripcion}}</textarea>
					<p class="error" id="descripcionError">
						Ingrese una descripción
					</p>
					<br><br>
					

					<div class="row">
						<h2>IMAGEN DE PRESENTACIÓN</h2>

						<ul class="flex">
							
						@if(isset($novedad->img[0]))
						
								<li id="img-exist-{{$novedad->img[0]->id}}" class="img-exist">
									
									<div style="background:url(<?php echo asset('storage/img/novedades/'.$novedad->img[0]->ruta.'') ?>)" class="preview" id="preview-presentacion">
										<a onclick="deleteImg('{{$novedad->img[0]->id}}','presentacion','novedad')" class=" removeBtn text-center center-block"><i class="fas fa-times-circle"></i></a>
										<div id="file-result-presentacion" class="text-center">
				                            <span id="file-img-presentacion">{{$novedad->img[0]->nombre}}</span>
			            					</div>
									</div>
									
								</li>

								<div id="newImgPresentacion"></div>	



						@else
							<div class="img-presentacion-input-cont center-block preview" id="preview-presentacion">
								<span  class="btn btn-primary btn-file border-btn blue float-right" >
			                        IMAGEN DE PRESENTACIÓN 
			                     	<input name="img_presentacion" type="file" id="presentacion">
			                     </span>
			                     <div id="file-result-presentacion" class="text-center">
		                            <span id="file-img-presentacion"></span>
	            					</div>

	            			
							</div>
							<p class="error text-center" id="imgPresentacion-error">
	        					Ingrese una imagen
	        				</p>
								
						@endif


						</ul>

				
					</div>
				
					
				<br><br>
				<a onClick="updateNovedadValidate()" class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></a>

			</div>


		</form>
		</div>

		</section>
		

	@stop
	

	@section('scripts')
		
		<script>
			function updateNovedadValidate(){

			tinyMCE.triggerSave();

			var titulo = $("input[name=titulo]").val();
			var descripcion = $("#descripcion").val();
			var imgPresentacion = $("input[name=img_presentacion]").val();


			var tituloValidated = false;
			var descripcionValidated = false;
			var imgPresentacionValidated = false;
		


			if(titulo.length == 0){
				$("#tituloError").fadeIn();
			}else{
				$("#tituloError").fadeOut();
				tituloValidated=true;
			}


			if(descripcion.length == 0){
				$("#descripcionError").fadeIn();
			}else{
				$("#descripcionError").fadeOut();
				descripcionValidated=true;
			}


			if($("input[name=img_presentacion]").length){

			    	if(imgPresentacion.length == 0){
			    		console.log('false');
						$("#imgPresentacion-error").fadeIn();
					}else{
						console.log('true');
						$("#imgPresentacion-error").fadeOut();
						imgPresentacionValidated=true;
					}

				}else{
					imgPresentacionValidated=true;
				}	

		

			

			if(tituloValidated==true&&descripcionValidated==true&&imgPresentacionValidated==true){
			
			setTimeout(function(){
				$('form').submit();
			},1000);

				


			}

		}
		</script>
		
		
	@stop