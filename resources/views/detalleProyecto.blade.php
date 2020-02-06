
@extends('layouts.main')

@section('main')
@include('inc.header')

<?php // var_dump($proyecto) ?>
<section id="detalle-proyecto">
	@foreach($imagenes as $img)
		@if($img->tipo=='PRESENTACION')
			
			<div class="main-img flex align-vertically align-horizontally" style="background-image: url(<?php echo asset('storage/img/proyectos/'.$img->ruta) ?>)">

					<h1 class="text-center">BARRIO PARQUE <br> <b>{{$proyecto->titulo}}</b></h1>
			

			</div>	
				
		@endif
	@endforeach

	<div class="content">
		<div class="row">
			<div class="container-fluid">
				<div class="col-sm-12 col-md-12 col-lg-8 info">
					<ul class="flex align-horizontally align-vertically">
			<li class="text-center">
				<img src="<?php echo asset('storage/img/detalle_proyecto/geoloc.svg') ?>"  alt="">
				<a onclick="scrollAnimate('ubicacion',this)" class="btn">
					VER UBICACIÓN
				</a>
			</li>
			@if(isset($proyecto->masterplan[0]))
			<li class="text-center">
				<img src="<?php echo asset('storage/img/detalle_proyecto/masterplan.svg') ?>"  alt="">
				<a target="_blank" href="<?php echo asset('/storage/archivos/proyectos/masterplans/'.$proyecto->masterplan[0]->ruta) ?>" class="btn">
					VER MASTERPLAN
				</a>
			</li>
			@endif
			<li class="text-center">
				<img src="<?php echo asset('storage/img/detalle_proyecto/fotos.svg') ?>"  alt="">
				<a onclick="scrollAnimate('imagenes',this)" class="btn">
					VER FOTOS
				</a>
			</li>
		</ul>

		<div class="row proyecto-description">
			<?php echo $proyecto->descripcion ?>
		</div>
		
		<div class="row como-llegar">
			<ul class="flex align-left">
				
				@if(isset($proyecto->estacion))
					<li>
						<img src="<?php echo asset('storage/img/detalle_proyecto/tren.svg') ?> " alt="" height="68px" class="float-left">
						<div class="float-left flex align-vertically" style="height: 68px;">
							<p>A pocas cuadras de la <br> <b>{{$proyecto->estacion}}</b></p>
						</div>
					</li>
				@endif

				@if(isset($proyecto->estacion) && isset($proyecto->lineaColectivo))
					<li class="flex align-horizontally">
						<div class="line-vert"></div>
					</li>
				@endif
				

				@if(isset($proyecto->lineaColectivo))
					<li>
						<img src="<?php echo asset('storage/img/detalle_proyecto/bus.svg') ?> " alt="" height="68px" class="float-left">
						<div class="float-left flex align-vertically" style="height: 68px;">
							<div>
								<p>Líneas de lineaColectivo</p>
								@foreach($proyecto->lineaColectivo as $lineaColectivo)
									<p><b>{{$lineaColectivo->descripcion}}</b></p>
								@endforeach
							</div>
						</div>
					</li>
				@endif
			</ul>
		</div>
		
		@if(isset($proyecto->caracteristica))
		<div class="row caracteristicas">
			<ul>
				@foreach($proyecto->caracteristica as $caracteristica)
				<li><h1>{{ucfirst($caracteristica->descripcion)}}</h1></li>
				@endforeach	
			</ul>
		</div>
		@endif

				</div>
				<div class=" col-sm-12 col-md-12 col-lg-4  videos">
					<ul class="flex align-horizontally">
						@foreach($proyecto->video as $video)
							<li>
								<iframe id="videoObject" src="https://www.youtube.com/embed/{{$video->url}}?autoplay=1&enablejsapi=1" type="text/html" frameborder="0"  allowfullscreen height="150px"></iframe>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
		


		</div>
	</div>



	@if(isset($proyecto->servicio))
		<div class="row servicios flex align-vertically align-horizontally">
			<div>
				<h1 class="text-center"><b>SERVICIOS</b></h1>
				<ul class="flex align-horizontally">
					@foreach($proyecto->servicio as $servicio)
						<li><h3>{{ucfirst($servicio->descripcion)}}</h3></li>
					@endforeach
				</ul>
			</div>
		</div>
	@endif








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


<div id="ubicacion">
	<input type="hidden" id="latitud" value="{{$proyecto->latitud}}">
	<input type="hidden" id="longitud" value="{{$proyecto->longitud}}">
	<div id="map"></div>
</div>
	



	
</section>
	
	@include('inc.contacto')
	@include('inc.footer')

@stop
@section('scripts')

<script>
	window.markers = [];//array que tendra todos los marker de todos los mapas

	$(document).ready(function(){

			$(".videos").css('height',$(".info").height() + 46 );


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
			      	zoom: 10,
		      	 	center: locacion,
		      	 	streetViewControl:false,
		      	 	mapTypeControl:false
		      	 	});
		  	
		  	var marker = new google.maps.Marker({position: locacion, map: map});

			
		}//function init maps 


		
</script>
@stop