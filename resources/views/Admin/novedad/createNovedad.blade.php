@extends('Admin.layouts.iframe')
	@section('main')
	<section id="novedades">
		<h1>NOVEDADES</h1>
		
		<br><br>
		<form action="/admin/createNovedad" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="container">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" name="titulo">
					<p class="error" id="tituloError">
						Ingrese un titulo
					</p>
					<br>
					<br>
					<label for="descripcion">Descripcion</label>
					<textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
					<p class="error" id="descripcionError">
						Ingrese una descripción
					</p>
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
				<a onClick="createNovedadValidate()" class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></a>

			</div>


		</form>
		</div>
	</section>
		

	@stop
	

	@section('scripts')

		<script>
		function createNovedadValidate(){

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


			if(imgPresentacion.length == 0){
				$("#imgPresentacion-error").fadeIn();
			}else{
				$("#imgPresentacion-error").fadeOut();
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