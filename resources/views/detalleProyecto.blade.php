
@extends('layouts.main')

@section('main')
@include('inc.header')

<?php // var_dump($proyecto) ?>
<section id="detalle-proyecto">
	@if(count($imagenes)>0)
		@foreach($imagenes as $img)
			@if($img->tipo=='PRESENTACION')
				
				<div class="main-img flex align-vertically align-horizontally" style="background-image: url(<?php echo asset('storage/img/proyectos/'.$img->ruta) ?>)">
					<div class="overlay"></div>
					
					<h2 class="estado">{{mb_convert_case($proyecto->estado->descripcion,MB_CASE_TITLE,'UTF-8')}}</h2>

					@if($proyecto->estado->descripcion == 'EN DESARROLLO')
						<h2 class="estado ultimos_lotes" style="background:transparent;">¡Últimos Lotes!</h2>
					@endif

						<h1 class="text-center"> 
							
						@if($proyecto->es_barrio_parque==1)
							BARRIO PARQUE <br>
						@endif

						  <b>{{mb_convert_case($proyecto->titulo,MB_CASE_UPPER,'UTF-8')}}</b>
					</h1>
				

				</div>	
					
			@endif
		@endforeach
	@else
				<div class="main-img flex align-vertically align-horizontally" >
					<div class="overlay"></div>
					
					<h2 class="estado">{{mb_convert_case($proyecto->estado->descripcion,MB_CASE_TITLE,'UTF-8')}}</h2>

						<h1 class="text-center"> 
							
						@if($proyecto->es_barrio_parque==1)
							BARRIO PARQUE <br>
						@endif

						  <b>{{mb_convert_case($proyecto->titulo,MB_CASE_UPPER,'UTF-8')}}</b>
					</h1>
				

				</div>		
		@endif

	<div class="content">
		<div class="row">
				<?php $cols = 0; ?>
				@if(count($proyecto->video)>0)
					<?php 
						
						$cols = 8;

						$containerClass = 'container-fluid';

					 ?>

				@else
					<?php
					 
					 $cols = 12; 
					 $containerClass = 'container';

					 ?>
				@endif
			<div class="{{$containerClass}}">

			
				<div class="col-sm-12 col-md-12 col-lg-{{$cols}} info">
					<ul class="flex align-left align-vertically">
			@if($proyecto->latitud != 0 && $proyecto->longitud != 0 )
				<li class="text-center">
					<img src="<?php echo asset('storage/img/detalle_proyecto/geoloc.svg') ?>"  alt="">
					<a onclick="scrollAnimate('ubicacion',this)" class="btn">
						VER UBICACIÓN
					</a>
				</li>
			@endif
			@if(count($proyecto->masterplan)>0)
				<li class="text-center">
					<img src="<?php echo asset('storage/img/detalle_proyecto/masterplan.svg') ?>"  alt="">
					<a target="_blank" href="<?php echo asset('/storage/archivos/proyectos/masterplans/'.$proyecto->masterplan[0]->ruta) ?>" class="btn">
						VER MASTERPLAN
					</a>
				</li>
			@endif
			@if(count($imagenes)>1)
				<li class="text-center">
					<img src="<?php echo asset('storage/img/detalle_proyecto/fotos.svg') ?>"  alt="">
					<a onclick="scrollAnimate('imagenes',this)" class="btn">
						VER FOTOS
					</a>
				</li>
			@endif
		</ul>

		<div class="row proyecto-description">
			<?php echo $proyecto->descripcion ?>
		</div>
		
		@if(isset($proyecto->estacion) && count($proyecto->lineaColectivo)>0)
			<div class="row como-llegar">
				<ul class="flex align-left">
					
					@if(isset($proyecto->estacion))
						<li class="flex align-vertically">
							<img src="<?php echo asset('storage/img/detalle_proyecto/tren.svg') ?> " alt="" width="45px" class="float-left">
							<div class="float-left flex align-vertically" style="height: 68px;">
								<p>A pocas cuadras de la <br> <b>{{mb_convert_case($proyecto->estacion,MB_CASE_TITLE,'UTF-8')}}</b></p>
							</div>
						</li>
					@endif

					@if(isset($proyecto->estacion) && count($proyecto->lineaColectivo)>0)
						<li class="flex align-horizontally">
							<div class="line-vert"></div>
						</li>
					@endif
					

					@if(count($proyecto->lineaColectivo)>0)
						<li class="flex align-vertically">
							<img src="<?php echo asset('storage/img/detalle_proyecto/bus.svg') ?> " alt="" width="50px" class="float-left">
							<div class="float-left flex align-vertically" style="">
								<div>
									<a data-toggle="modal" data-target="#lineasColectivoVerMas">VER  LÍNEAS DE COLECTIVO</a>
								</div>
							</div>

						</li>
					@endif
					
					

				</ul>

			</div>
		@endif
		
		@if(count($proyecto->caracteristica)>0)
		<div class="row caracteristicas">
			<ul>
				@foreach($proyecto->caracteristica as $caracteristica)
				<li><h1>{{ucfirst($caracteristica->descripcion)}}</h1></li>
				@endforeach	
			</ul>
		</div>
		@endif



		</div>
				
		@if(count($proyecto->video)> 0)
		
		<div class=" col-sm-12 col-md-12 col-lg-4  videos">
			<ul class="flex align-horizontally">
				@foreach($proyecto->video as $video)
					<li>
						<iframe id="videoObject" src="https://www.youtube.com/embed/{{$video->url}}?autoplay=0&controls=0&enablejsapi=1" type="text/html" frameborder="0"  allowfullscreen height="150px"></iframe>
						<div class="infoVideo">
							<h3>{{mb_convert_case($video->titulo,MB_CASE_TITLE,'UTF-8')}}</h3>
							<p>{{ucfirst($video->descripcion)}}</p>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
		@endif



			</div>
		</div>
		<div class="container">
		


		</div>
	</div>



	@if(count($proyecto->servicio)>0)
		<div class="row servicios flex align-vertically align-horizontally">
			<div>
				<h1 class="text-center"><b>SERVICIOS</b></h1>
				<ul class="flex align-horizontally">
					@foreach($proyecto->servicio as $servicio)
						<li><h4>{{mb_convert_case($servicio->descripcion,MB_CASE_TITLE,'UTF-8')}}</h4></li>
					@endforeach
				</ul>
			</div>
		</div>
	@endif






@if(count($imagenes)>1)
<div id="imagenes">
	<div class="">
		<div class="owl-carousel galeria" id="owl-2">
			@foreach($imagenes as $img)
				@if($img->tipo=='SLIDE')
					
					<div>
					<div class="slider">
						<div class="overlay">
							<div class="search-cont">
								<a class="content" data-fancybox="galeria" href="<?php echo asset('/storage/img/proyectos/'.$img->ruta) ?>" data-caption="" >
									<i class="fas fa-search"></i>
								</a>
							</div>
						</div>
						<img src="<?php echo asset('/storage/img/proyectos/'.$img->ruta) ?>" alt="">
					</div>
				</div>	
						
				@endif
			@endforeach
		

		</div>
	</div>
</div>
@endif

	<div class="row row-btn">
		<div class="container">
			<a href="/proyectos" class="btn center-block">CONOCÉ TODOS NUESTROS BARRIOS</a>
		</div>
	</div>


@if($proyecto->latitud != 0 && $proyecto->longitud != 0)
	<div id="ubicacion">
		<input type="hidden" id="latitud" value="{{$proyecto->latitud}}">
		<input type="hidden" id="longitud" value="{{$proyecto->longitud}}">
		<div id="map"></div>
	</div>
@endif

<!-- Modal -->
<div class="modal fade" id="lineasColectivoVerMas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document" style=" z-index: 20;">
    <div class="modal-content">
        <div class="modal-header">
        	 <h1 class="text-left float-left">LÍNEAS DE COLECTIVO</h1>
	        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
	         	<i class="fas fa-times-circle float-right"></i>
        	</a>

        	<hr>
      </div>
      <div class="modal-body center-block">
       @if(count($proyecto->lineaColectivo)>0)
       <ul>
			@foreach($proyecto->lineaColectivo as $lineaColectivo)
				<li><h3>{{mb_convert_case($lineaColectivo->descripcion,MB_CASE_TITLE,'UTF-8')}}</h3></li>
			@endforeach

       </ul>
       @endif
      </div>
      
    </div>
  </div>
</div>
	



	
</section>
	
	@include('inc.contacto')
	@include('inc.footer')

@stop
@section('scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
	window.markers = [];//array que tendra todos los marker de todos los mapas

	$(document).ready(function(){


			$(".videos").css('height',$(".info").height() + 87 );


			console.log($(".info").height());

			console.log($(".content .caracteristicas").css('padding-bottom'));


			initMap(0,0,0);
		

	});
</script>
<script>
	
	var t =  $('header').height() + parseInt($('header').css('padding-bottom'));
	
	$("#detalle-proyecto").css('margin-top',t+10);
</script>
<script>


		function initMap(mapa_id='map',latitud,longitud) {



		  	// La locacion iniciliada
		  	var locacion = {lat: parseFloat($("#latitud").val()), lng: parseFloat($("#longitud").val())};
		  	console.log(locacion);
		  	// El mapa centrado en las coordenadas de inicializacion
		  	var map = new google.maps.Map(
			      document.getElementById('map'), {
			      	zoom: 15,
		      	 	center: locacion,
		      	 	streetViewControl:false,
		      	 	mapTypeControl:false
		      	 	});
		  	
		  	var marker = new google.maps.Marker({position: locacion, map: map});

			
		}//function init maps 


		
</script>
@stop