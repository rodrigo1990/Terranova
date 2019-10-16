@extends('Admin.layouts.iframe')
	@section('main')
	<section id="proyectos">
		<h1>PROYECTOS</h1>
		
		<br><br>
		<form action="/admin/createProyecto" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="container">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" name="titulo">
					<br>
					<br>
					<label for="estado">Estado del proyecto</label>
					<select name="estado" class="form-control" id="">
						<option value="1">PRÓXIMOS DESARROLLOS</option>
						<option value="2">PROYECTOS EN DESARROLLO</option>
						<option value="3">PROYECTOS TERMINADOS</option>
					</select>
					<br>
					<br>
					<label for="descripcion">Descripción</label>
					<textarea  name="descripcion" id="" cols="30" rows="10"></textarea>
					<br><br>
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
					
						</li>

					</ul>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6"></div>
					<div class="col-lg-6 col-md-6 col-sm-6">
									
						<a style="display:none" id="remove-esp-btn" onclick="eliminarImagenes()" class="small-btn red float-right"><i class="fas fa-minus"></i></a>


						<a onclick="agregarImagenes()" class="small-btn blue float-right margin-right-15"><i class="fas fa-plus"></i></a>
						
					</div>
				</div>
				<br><br>
				<button class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></button>

			</div>


		</form>
		</div>

		<br><br>
	</section>
		

	@stop
	

	@section('scripts')
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script>
		window.count=2;
	</script>
	<script>
		tinymce.init({selector: "textarea",  // change this value according to your HTML
		  plugins: "link",
		  menubar: "insert edit align",
		  language:'es'});
	</script>
	
	<script>
	  $( function() {
	    $( "#file-input-cont" ).sortable({
	    	update: function( event, ui ) {
	    		
	    		//console.log(ui.item.index());

	    		$( "#file-input-cont li" ).each(function(index){

	    			$(this).attr('id','item_'+index);

	    			$(this).find('input').attr('name','img['+index+']');

	    		});

	    	}
	    });
	    $( "#file-input-cont" ).disableSelection();
	  } );
  	</script>
		


	



	


	@stop