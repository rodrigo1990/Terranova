@extends('Admin.layouts.iframe')
	@section('main')
	<section id="proyectos">
		<h1>PROYECTOS</h1>
		
		<br><br>
		<form action="/admin/updateProyecto" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="container">
				<input type="hidden" name="id" value="{{$proyecto->id}}">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" name="titulo" value="{{$proyecto->titulo}}">
					<p class="error" id="tituloError">
						Ingrese un titulo
					</p>
					<br>
					<br>
					<label for="zona">Zona</label>
					<select name="zona" class="form-control" id="">

						@foreach($zonas as $zona)
							
							@if($zona->id == $proyecto->zona->id)

								<option value="{{$zona->id}}" selected>{{$zona->descripcion}}</option>

							@else
							
								<option value="{{$zona->id}}">{{$zona->descripcion}}</option>

							@endif

						@endforeach

					</select>
					<br>
					<br>
					<label for="descripcion">Descripción</label>
					<textarea  name="descripcion" id="" cols="30" rows="10">{{$proyecto->descripcion}}</textarea>
					<p class="error" id="descripcionError">
						Ingrese una descripción
					</p>
					<br><br>
					<div id="presentacion" class="row">
						<h2>PRESENTACIÓN</h2>
						
						<ul class="flex">
							
						<?php $existeImgPresentacion = false; ?>
						@foreach($imagenes as $img)
							@if($img->tipo=='PRESENTACION')
							<?php $existeImgPresentacion = true; ?>
								<li id="img-exist-{{$img->id}}" class="img-exist">		
									<div style="background:url(<?php echo asset('storage/img/proyectos/'.$img->ruta.'') ?>)" class="preview">
										<a onclick="deleteImg('{{$img->id}}','presentacion','proyecto')" class=" removeBtn text-center center-block"><i class="fas fa-times-circle"></i></a>
										<div id="file-result-presentacion" class="text-center">
			                            <span id="file-img-presentacion">{{$img->nombre}}</span>
		            					</div>
									</div>				
								</li>	
							@endif
						@endforeach

						@if($existeImgPresentacion == false)
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

						<div id="newImgPresentacion">
							
						</div>
					
					</div>
					<p class="error text-center" id="imgPresentacion-error">
    					Ingrese una imagen
    				</p>
				<br><br>
		 		<div class="row">
		 			<h2>SLIDES EXISTENTES</h2>
					<ul class="flex" id="file-input-cont">
						<?php $existeSlide = false; ?>
						@foreach($imagenes as $img)

							@if($img->tipo == 'SLIDE')
							<?php $existeSlide = true; ?>
								<li id="img-exist-{{$img->id}}" class="img-exist">
									
									<div style="background:url(<?php echo asset('storage/img/proyectos/'.$img->ruta.'') ?>)" class="preview">
										<a onclick="deleteImg('{{$img->id}}','slide','proyecto','update')" class="removeBtn text-center center-block"><i class="fas fa-times-circle"></i></a>
										<div id="file-result-presentacion" class="text-center">
			                            <span id="file-img-presentacion">{{$img->nombre}}</span>
		            					</div>
									</div>


									
								</li>
							
							@endif

						@endforeach


						@if($existeSlide == false)
							<li id="item_1" class="li-file-input">
							
	                    	<div class="preview" id="preview-1">
	                    	
								<span  class="btn btn-primary btn-file border-btn blue float-right" >
			                        SLIDE 1 
			                     	<input name="img[0]" type="file" id="file-input-1">
			                     </span>
			                     <div id="file-result-1" class="file-result text-center">
			                            <span id="file-img-1"></span>
		                    		</div>
	                    	</div>

	                    	<p class="error text-center" id="imgSlide1-error">
        					Ingrese una imagen
        					</p>

						</li>
						
						<li id="item_2" class="li-file-input">
							
	                    	<div class="preview" id="preview-2">
	                    	
								<span  class="btn btn-primary btn-file border-btn blue float-right" >
			                        SLIDE 2
			                      <input name="img[1]" type="file" id="file-input-2">
			                    </span>
			                     <div id="file-result-2" class="file-result text-center">
			                          <span id="file-img-2"></span>
		                    		</div>
	                    	</div>

	                    	<p class="error text-center" id="imgSlide2-error">
        					Ingrese una imagen
        					</p>
					
						</li>

						<?php $count = 1 ?>
						@endif

					</ul>

					<ul id="orderSlides" style="display:none;">
						@if($existeSlide == true)

							<?php $count = -1 ?>
							@foreach($imagenes as $img)

								@if($img->tipo == 'SLIDE')
								<?php $count++ ?>
									<li id="{{$img->id}}">
										<input type="hidden" name="orderSlide[{{$img->id}}]" value="{{$img->order}}" >
									</li>
								
								@endif

							@endforeach	

						@endif
					</ul>
				</div>
		
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6"></div>
					<div class="col-lg-6 col-md-6 col-sm-6">
									
						<a style="display:none" id="remove-esp-btn" onclick="eliminarImagenes()" class="small-btn red float-right"><i class="fas fa-minus"></i></a>


						<a onclick="agregarImagenes('update')" class="small-btn blue float-right margin-right-15"><i class="fas fa-plus"></i></a>
						
					</div>
				</div>
				<br><br>
				<a onclick="createProjectValidate()" class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></a>

			</div>


		</form>

		</div>

		<br><br>
</section>
		

	@stop
	

	@section('scripts')
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- CUENTA LA CANTIDAD DE IMAGENES SLIDES CARGADAS, LE RESTA 1 PARA QUE LA PRIMERA SEA IGUAL A 0  -->
	<script>
			window.count={{$count}};
			console.log("count"+count);	
	</script>
	<script>
		function createProjectValidate(){

			tinyMCE.triggerSave();

			var titulo = $("input[name=titulo]").val();
			var descripcion = $("#descripcion").val();
			var imgPresentacion = $("input[name=img_presentacion]").val();
			var imgSlide1 = $("input#file-input-1").val();
			var imgSlide2 = $("input#file-input-2").val();

			var tituloValidated = false;
			var descripcionValidated = false;
			var imgPresentacionValidated = false;
			var imgSlide1Validated = false;
			var imgSlide2Validated = false;

			console.log($(document).find(("input[name=img_presentacion]")));



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
				alert('imgPresentacion');
				if(imgPresentacion.length == 0){
					$("#imgPresentacion-error").fadeIn();
					console.log('ERROR');
				}else{
					$("#imgPresentacion-error").fadeOut();
					console.log('VALIDADO');
					imgPresentacionValidated=true;
				}
			}else{
				imgPresentacionValidated = true;
			}

			if($("input#file-input-1").length){
				
				if(imgSlide1.length == 0){
					$("#imgSlide1-error").fadeIn();
				}else{
					$("#imgSlide1-error").fadeOut();
					imgSlide1Validated=true;
				}

			}else{
				imgSlide1Validated = true;
			}
		
			if($("input#file-input-2").length){

				if(imgSlide2.length == 0){
					$("#imgSlide2-error").fadeIn();
				}else{
					$("#imgSlide2-error").fadeOut();
					imgSlide2Validated=true;
				}

			}else{
				imgSlide2Validated = true;
			}



			if(tituloValidated==true&&descripcionValidated==true&&imgSlide1Validated==true&&imgSlide2Validated==true&&imgPresentacionValidated==true){
				//alert("enviado");
				setTimeout(function(){
					$('form').submit();
				},1000);

				


			}
		

		}
	</script>
	


	@stop