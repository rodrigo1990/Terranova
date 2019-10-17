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
						<?php $count = 0 ?>
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
			window.count={{$count}};
			count -= 1;
			console.log("count"+count);	
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
	    		
	    		var id = ui.item[0].id.split('-');

	    		id = id[2];


	    		$("#orderSlides #"+id+" input").val(ui.item.index());


	    		$( "#file-input-cont li" ).each(function(index){

	    			id = $(this).attr('id').split('-');

	    			id = id[2];

	    			console.log(id+"="+index);

	    			$("#orderSlides #"+id+" input").val(index);

	    		});


	    		

	    	}

	    });
	    $( "#file-input-cont" ).disableSelection();
	  } );
  	</script>

	


	@stop