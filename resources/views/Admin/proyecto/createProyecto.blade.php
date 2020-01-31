@extends('Admin.layouts.iframe')
	@section('main')
	<section id="proyectos">
		<h1>PROYECTOS</h1>
		
		<br><br>
		<form action="/admin/createProyecto" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="container">
					
					<div class="row">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" name="titulo">
					<p class="error" id="tituloError">
						Ingrese un titulo
					</p>
					</div>

					<br>
					<br>
					
					<div class="row">
					<label for="zona">ZONA</label>
					<select name="zona" class="form-control" id="">
						@foreach($zonas as $zona)
							<option value="{{$zona->id}}">{{$zona->descripcion}}</option>
						@endforeach
					</select>
					</div>
					

					<br>
					<br>

					<div class="row">
					
						<label for="descripcion">Descripción</label>
						<textarea  name="descripcion" id="" cols="30" rows="10"></textarea>
						
						<p class="error" id="descripcionError">
							Ingrese una descripción
						</p>
					

					</div>
					<br><br>


					
					<div class="row">
						<h2 class="text-left" style="display:block;">VIDEOS</h2>
						<br>
						<div class="col-sm-12">
						
							<label for="video_1">VIDEO 1 </label>
							<input type="text" name="video_1" class="form-control" onKeyUp="insertVideoOnIframe(1)">
							<div class="error" id="video1Error">Ingrese un video valido</div>

							<iframe id="video-preview-1" class="video-preview" type="text/html" height="0px" frameborder="0"  allowfullscreen></iframe>

						</div>
						<div class="col-sm-12">
							
							<label for="video_2">VIDEO 2 </label>
							<input type="text" name="video_2" class="form-control" onKeyUp="insertVideoOnIframe(2)">
							<div class="error" id="video2Error">Ingrese un video valido</div>

							<iframe id="video-preview-2" class="video-preview" height="0px" type="text/html" frameborder="0"  allowfullscreen></iframe>
						</div>
					</div>
					<br><br>
					<div class="row">
						<div  id="presentacion" class="row">
							<h2>IMAGEN DE PRESENTACIÓN</h2>

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
						</div>
					</div>
					<br><br>
		 		<div class="row">
		 			<h2>SLIDER</h2>
					<ul class="flex" id="file-input-cont">

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

					</ul>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6"></div>
					<div class="col-lg-6 col-md-6 col-sm-6">
									
						<a style="display:none" id="remove-esp-btn" onclick="eliminarImagenes()" class="small-btn red float-right"><i class="fas fa-minus"></i></a>


						<a onclick="agregarImagenes('create')" class="small-btn blue float-right margin-right-15"><i class="fas fa-plus"></i></a>
						
					</div>
				</div>
				

			</div>

			<div class="row">
				<div class="container">
					<a onclick="createProjectValidate()" class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></a>	
				</div>
			</div>


		</form>
		</div>

		<br><br>
	</section>
		

	@stop
	

	@section('scripts')
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- CUENTA ITEMS AGREGADO E ELIMINADOS EN SUS RESPECTOS ARCHIVOS -->
	<script>
		window.count=1;
	</script>
	<script>
		 function insertVideoOnIframe(id){

		

			var linkYoutube = $("input[name=video_"+id+"]").val();
			match = validateYoutubeLink(linkYoutube); 
			if ( match != false) {        
		       
		                
	            $('#video-preview-'+id).attr('src', 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1&enablejsapi=1');

	            $('#video-preview-'+id).attr('height', '500px');
	        
	            $('#video-preview-'+id).attr('width', '100%');

	            $('#video-preview-'+id).css('margin-bottom', '42px');
	        
	            $("#video"+id+"Error").fadeOut();
			
				imgPresentacionValidated = true;
		        
		         
	    	}else{
	            $('#videoObject').attr('src', '');
	            $('#videoObject').attr('height', '0px');
	            $('#videoObject').attr('width', '0px');
	            $('#video-preview-'+id).css('margin-bottom', '0');
	    	}
		};
	</script>
	<script>
		function createProjectValidate(){

			tinyMCE.triggerSave();

			var titulo = $("input[name=titulo]").val();
			
			var descripcion = $("#descripcion").val();
			
			var imgPresentacion = $("input[name=img_presentacion]").val();
			
			var imgSlide1 = $("input#file-input-1").val();
			var imgSlide2 = $("input#file-input-2").val();

			var video1 = $("input[name=video_1]").val();
			var video2 = $("input[name=video_2]").val();

			


			var tituloValidated = false;
			
			var descripcionValidated = false;
			
			var imgPresentacionValidated = false;


			
			var imgSlide1Validated = false;
			
			var imgSlide2Validated = false;


			var video1Validated = false; 

			var video2Validated = false;



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


			if(imgPresentacion.length == 0){
				$("#imgPresentacion-error").fadeIn();
			}else{
				$("#imgPresentacion-error").fadeOut();
				imgPresentacionValidated=true;
			}

			if(imgSlide1.length == 0){
				$("#imgSlide1-error").fadeIn();
			}else{
				$("#imgSlide1-error").fadeOut();
				imgSlide1Validated=true;
			}

			if(imgSlide2.length == 0){
				$("#imgSlide2-error").fadeIn();
			}else{
				$("#imgSlide2-error").fadeOut();
				imgSlide2Validated=true;
			}

			var k = $('.li-file-input').not('.li-file-input.ui-sortable-handle').length;
			var y = 0;
			var state = 0;
			//BORRO LAS INPUT FILE QUE NO TIENEN IMAGENES CARGADAS
			$( ".li-file-input" ).not('.li-file-input.ui-sortable-handle').each(function(index,item){
				y++;
				if($(this).find('input.added').val() == ''){
					$(this).hide(function(){
						$(this).remove();
					});
				}

				if(y == k){
					state=1 
					console.log(state);
				}
			});//each

			//REEMPLAZO TODAS LAS CLAVES DEL ARRAY SEGUN SU INDICE
			setTimeout(function(){
				if(state == 1){
					$( ".li-file-input" ).each(function(index,item){
						var resp = $(this).find('.added').attr('name','img['+index+']');
		    			console.log(resp);		
					});
				}
			},1000);
			

			if(tituloValidated==true&&descripcionValidated==true&&imgSlide1Validated==true&&imgSlide2Validated==true&&imgPresentacionValidated==true){
			
			setTimeout(function(){
				$('form').submit();
			},1000);

				


			}

		}
	</script>
		


	



	


	@stop