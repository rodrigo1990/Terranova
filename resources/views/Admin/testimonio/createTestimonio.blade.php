@extends('Admin.layouts.iframe')
	@section('main')
	<section id="testimonios">
		<h1>TESTIMONIOS</h1>
		
		<br><br>
		<form action="/admin/createTestimonio" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="container">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" name="titulo">
					<p class="error" id="tituloError">
						Ingrese un titulo
					</p>
					<br>
					<br>
					
					<label for="link">Link</label>
					<input type="text" class="form-control" name="linkYoutube" id="linkYoutube">

					<p class="error" id="linkYoutubeError">
						Ingrese un link correcto
					</p>

					<iframe id="videoObject" type="text/html" frameborder="0"  allowfullscreen></iframe>
					<br><br>

					<div class="row">
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
				
					
				<br><br>
				<a onclick="createTestimonioValidate()" class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></a>

			</div>


		</form>
		</div>
		</section>

	@stop
	
@section('scripts')
	<script>


		$("input[name=linkYoutube]").keyup(function() {

			var linkYoutube = $("input[name=linkYoutube]").val();
			match = validateYoutubeLink(linkYoutube); 
			if ( match != false) {        
		       
		                
	            $('#videoObject').attr('src', 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1&enablejsapi=1');

	            $('#videoObject').attr('height', '500px');
	        
	            $('#videoObject').attr('width', '100%');
	        
	            $("#imgPresentacion-error").fadeOut();
			
				imgPresentacionValidated = true;
		        
		         
	    	}else{
	            $('#videoObject').attr('src', '');
	            $('#videoObject').attr('height', '0px');
	            $('#videoObject').attr('width', '0px');
	    	}
		});



		function validateYoutubeLink(linkYoutube){
			if (linkYoutube != undefined || linkYoutube != '') {        
		        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
		        var match = linkYoutube.match(regExp);
		        if (match && match[2].length == 11) {
		            return match;
		        
		        } else {
		            return false;
		        }
	    	}
		}






		function createTestimonioValidate(){

			var titulo = $("input[name=titulo]").val();
			var linkYoutube = $("input[name=linkYoutube]").val();
			var imgPresentacion = $("input[name=img_presentacion]").val();

			var match = null;

			var tituloValidated = false;
			var linkYoutubeValidated = false;
			var imgPresentacionValidated = false;


			if(titulo.length == 0){
				$("#tituloError").fadeIn();
			}else{
				$("#tituloError").fadeOut();
				tituloValidated=true;
			}

			match = validateYoutubeLink(linkYoutube); 
			if ( match != false) {        
		       
		                
	         
	        
	            $("#linkYoutubeError").fadeOut();
			
				linkYoutubeValidated = true;
		        
		         
	    	}else{
    			$("#linkYoutubeError").fadeIn();
	      
	    	}



	    	if(imgPresentacion.length == 0){
				$("#imgPresentacion-error").fadeIn();
			}else{
				$("#imgPresentacion-error").fadeOut();
				imgPresentacionValidated=true;
			}
	

			if(tituloValidated==true&&linkYoutubeValidated==true&&imgPresentacionValidated==true){
			
			setTimeout(function(){
				$('form').submit();
			},1000);



				


			}

		}
	</script>
@stop

