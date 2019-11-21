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
					<p class="error" id="tituloError">
						Ingrese un titulo
					</p>
					<br>
					<br>
					
					<label for="link">Link</label>
					<input type="text" class="form-control" name="linkYoutube" id="linkYoutube" value="https://www.youtube.com/watch?v={{$testimonio->link_youtube}}">
					<input type="hidden" class="form-control" name="youTubeCode">
					<p class="error" id="linkYoutubeError">
						Ingrese un link correcto
					</p>
					
					<br>

					<iframe id="videoObject" type="text/html" frameborder="0"  allowfullscreen></iframe>

					<br><br>

					<div class="row">
						<h2>IMAGEN DE PRESENTACIÓN</h2>

						<ul class="flex">
							
						@if(isset($testimonio->img[0]))
						
								<li id="img-exist-{{$testimonio->img[0]->id}}" class="img-exist">
									
									<div style="background:url(<?php echo asset('storage/img/testimonios/'.$testimonio->img[0]->ruta.'') ?>)" class="preview" id="preview-presentacion">
										<a onclick="deleteImg('{{$testimonio->img[0]->id}}','presentacion','testimonio')" class=" removeBtn text-center center-block"><i class="fas fa-times-circle"></i></a>
										<div id="file-result-presentacion" class="text-center">
				                            <span id="file-img-presentacion">{{$testimonio->img[0]->nombre}}</span>
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
				<a  onClick="updateTestimonioValidate()"class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></a>

			</div>


		</form>
		</div>

		</section>
		

	@stop

	@section('scripts')

		<script>
			$(document).ready(function(){

				 	var linkYoutube = $("input[name=linkYoutube]").val();
					match = validateYoutubeLink(linkYoutube); 
					if ( match != false) {        
				       
				                
			            $('#videoObject').attr('src', 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1&enablejsapi=1');

			            $('#videoObject').attr('height', '500px');
			        
			            $('#videoObject').attr('width', '100%');
			        					
				        
				         
			    	}else{
			            $('#videoObject').attr('src', '');
			            $('#videoObject').attr('height', '0px');
			            $('#videoObject').attr('width', '0px');
			    	}



			});	
		</script>
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

		</script>

		<script>
			function updateTestimonioValidate(){

				var titulo = $("input[name=titulo]").val();
				var linkYoutube = $("input[name=linkYoutube]").val();
				var imgPresentacion = $("input[name=img_presentacion]").val();

				var match = null;

				var tituloValidated = false;
				var linkYoutubeValidated = false;
				var imgPresentacionValidated = false;


				if(titulo.length == 0){
					console.log('false');
					$("#tituloError").fadeIn();
				}else{
					console.log('true');
					$("#tituloError").fadeOut();
					tituloValidated=true;
				}

				match = validateYoutubeLink(linkYoutube); 
				if ( match != false) {        
			       
			                
		         	console.log('true');
		        
		            $("#linkYoutubeError").fadeOut();
				
					linkYoutubeValidated = true;

					$("input[name=youTubeCode]").val(match[2]);
			        
			         
		    	}else{
		    		console.log('false');
	    			$("#linkYoutubeError").fadeIn();
		      
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
		

				if(tituloValidated==true&&linkYoutubeValidated==true&&imgPresentacionValidated==true){
				
				setTimeout(function(){
					$('form').submit();
				},1000);

				}

			}
		</script>

	@stop
	
