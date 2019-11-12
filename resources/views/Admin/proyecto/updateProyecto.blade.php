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
					<label for="estado">Estado del proyecto</label>
					<select name="estado" class="form-control" id="">

						@if($proyecto->estado == 1)
							<option value="1" selected>PRÓXIMOS DESARROLLOS</option>
							<option value="2">PROYECTOS EN DESARROLLO</option>
							<option value="3">PROYECTOS TERMINADOS</option>
						@elseif($proyecto->estado == 2)
							<option value="1" >PRÓXIMOS DESARROLLOS</option>
							<option value="2" selected>PROYECTOS EN DESARROLLO</option>
							<option value="3">PROYECTOS TERMINADOS</option>
						@else
							<option value="1" >PRÓXIMOS DESARROLLOS</option>
							<option value="2" >PROYECTOS EN DESARROLLO</option>
							<option value="3"selected>PROYECTOS TERMINADOS</option>
						@endif

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
							
						
						@foreach($imagenes as $img)
							@if($img->tipo=='PRESENTACION')
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
						
						@foreach($imagenes as $img)

							@if($img->tipo == 'SLIDE')
							
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

					</ul>

					<ul id="orderSlides" style="display:none;">
						<?php $count = -1 ?>
						@foreach($imagenes as $img)

							@if($img->tipo == 'SLIDE')
							<?php $count++ ?>
								<li id="{{$img->id}}">
									<input type="hidden" name="orderSlide[{{$img->id}}]" value="{{$img->order}}" >
								</li>
							
							@endif

						@endforeach						

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

			if(imgPresentacion){
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

			if(imgSlide1){
				
				if(imgSlide1.length == 0){
					$("#imgSlide1-error").fadeIn();
				}else{
					$("#imgSlide1-error").fadeOut();
					imgSlide1Validated=true;
				}

			}else{
				imgSlide1Validated = true;
			}
		
			if(imgSlide2){

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
			
				setTimeout(function(){
					$('form').submit();
				},1000);

				


			}
		

		}
	</script>
	


	@stop