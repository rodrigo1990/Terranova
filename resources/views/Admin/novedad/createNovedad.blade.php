@extends('Admin.layouts.iframe')
	@section('main')
		<h1>NOVEDADES</h1>
		
		<br><br>
		<form action="/admin/createNovedad" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="container">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" name="titulo">
					<br>
					<br>
					<label for="descripcion">Descripcion</label>
					<textarea name="descripcion" id="" cols="30" rows="10"></textarea>
					<br><br>
					

					<div class="row">
						<h2>IMAGEN DE PRESENTACIÓN</h2>

						<div class="img-presentacion-input-cont center-block">
							<span  class="btn btn-primary btn-file border-btn blue float-right" >
		                        IMAGEN DE PRESENTACIÓN 
		                     	<input name="imgPresentacion" type="file" id="presentacion">
		                     </span>
		                     <div id="file-result-presentacion" class="text-center">
	                            <span id="file-img-presentacion"></span>
            					</div>
						</div>
					</div>
				
					
				<br><br>
				<button class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></button>

			</div>


		</form>
		</div>
		

	@stop
	

	@section('scripts')
		<script src="/js/app_admin.js"></script>
		<script src="/js/dropzone.js"></script>
		<script>
			tinymce.init({selector: "textarea",  // change this value according to your HTML
			  plugins: "link",
			  menubar: "insert edit align",
			  language:'es'});
		</script>

		
	@stop