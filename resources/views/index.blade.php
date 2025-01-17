
@extends('layouts.main')

@section('main')
@include('inc.header')

	<section id="slider">
		<div id="owl-1" class="owl-one owl-carousel owl-theme">
			<div>
				<div class="slide" id="slide-1">
					<div class="slide__content right">
						<h1>PRÓXIMOS <br> <b>LANZAMIENTOS</b></h1>
						<a class="btn" onclick="scrollAnimate('nuestros-proyectos',this)"> VER + </a>
					</div>
				</div>
			</div>
			<div>
				<div class="slide" id="slide-2">
					<div class="slide__content center">
						<h1>FINANCIACIÓN HASTA <br> <b>84 CUOTAS CON TU DNI</b></h1>
						<a class="btn" onclick="scrollAnimate('nuestros-proyectos',this)"> CONOCÉ NUESTROS BARRIOS </a>
					</div>
				</div>
			</div>
			<div>
				<div class="slide" id="slide-3">
					<div class="slide__content right">
						<h1>ÚNICOS EN <br> <b>FINANCIACIÓN <br> PROPIA</b></h1>
						<a class="btn" onclick="scrollAnimate('nuestros-proyectos',this)"> VER + </a>
					</div>
				</div>
			</div>	
		</div>
	</section>
	<section id="franja-1">
		<div class="row">
			<h1 class="text-center">

				84 CUOTAS  <b>SOLO  CON TU DNI</b>
			</h1>
		</div>
	</section>

	<section id="buscador" class="buscador-container">
		<div class="container">
			<form action="/proyectos" method="GET">
				@csrf
				<ul class="flex">
					<li>
						<h3>¿Qué buscás?</h3>
					</li>
					<li>
		
						<select name="estado_id" id="estado" class="form-control" onchange="buscarProyectoSegunZona()"  >
							<option value="null">Seleccioná un estado</option>
							@foreach($estados as $estado)
								@if(isset($estado_id))
									@if($estado_id== $estado->id)
										<option value="{{$estado->id}}" selected>{{ucfirst($estado->descripcion)}}</option>
									@else
										<option value="{{$estado->id}}">{{ucfirst($estado->descripcion)}}</option>
									@endif
								@else
									<option value="{{$estado->id}}">{{ucfirst($estado->descripcion)}}</option>
								@endif
							@endforeach
						</select>
					
					</li>
					
					<li>
						<select name="zona_id" id="zona" class="form-control" onchange="buscarProyectoSegunZona()">
							<option value="null">Seleccioná una zona</option>
							@foreach($zonas as $zona)
								<option value="{{$zona->id}}">{{ucfirst(strtolower($zona->descripcion))}}</option>
							@endforeach
						</select>
					</li>
					<li>
						<select name="proyecto_id" id="proyecto" class="form-control">
							<option value="null">Seleccioná un proyecto</option>
						</select>
					</li>


					

				
					<li>
						<button class="btn" href="">BUSCAR</button>
					</li>
				</ul>
			</form>
			<div id="resultado">
				
			</div>
		</div>
	</section>

	<section id="home-icons">
		<div class="container-fluid">
			<ul class="flex">
				<li class="text-center">
					<img src="<?php echo asset('/storage/img/icons-home-01.svg') ?>" alt="">
					<h4>CUOTAS EN <b>PESOS</b></h4>
				</li>
				<li class="text-center">
					<img src="<?php echo asset('/storage/img/icons-home-02.svg') ?>" alt="">
					<h4>FINANCIACIÓN <br> <b>HASTA 84 CUOTAS</b></h4>
				</li>
				<li class="text-center">
					<img src="<?php echo asset('/storage/img/icons-home-03.svg') ?>" alt="">
					<h4>SOLO CON TU <b>DNI</b></h4>
				</li>
				<li class="text-center">
					<img src="<?php echo asset('/storage/img/icons-home-04.svg') ?>" alt="">
					<h4>ENTREGAMOS <br>  <b>MAS DE 3800 LOTES</b></h4>
				</li>

				<li class="text-center">
					<img src="<?php echo asset('/storage/img/icons-home-05.svg') ?>" alt="">
					<h4><b>MÁS DE 19 BARRIOS</b> <br>  DESARROLLADOS</h4>
				</li>
				<li class="text-center">
					<img src="<?php echo asset('/storage/img/icons-home-06.svg') ?>" alt="">
					<h4>CON <br>  <b>ESCRITURA</b></h4>
				</li>
			</ul>
		</div>
	</section>


	<section id="nosotros">
		<div class="container">
			<h2 class="title primary-color  text-center"><b>NOSOTROS</b></h2>
			<p class="text-center">
				Somos una <b>Desarrolladora Inmobiliaria</b> formada por los mejores profesionales del rubro con <b>25 años de experiencia</b>, que nos reunimos para  trabajar en el desarrollo de <b>lotes convencionales, barrios parques y barrios privados</b> con la infraestructura necesaria para que nuestros clientes puedan cumplir su sueño de tener su propio terreno.
			</p>
			<br>
			<p class="text-center">
				<span>
				Más de 3800 familias  hoy son dueñas de su propio terreno.
				</span>
			</p>
			
			<br>

			<a onclick="scrollAnimate('nuestros-proyectos',this)" class="btn center-block" style="">
				CONOCÉ TODOS NUESTROS BARRIOS
			</a>
		</div>
	</section>

	<section id="nuestros-proyectos">
		<h2 class="title primary-color  text-center"><b>NUESTROS PROYECTOS</b></h2>
		<div class="container">
			<ul class="flex">
				<li>
					<div>
						<h3>EN DESARROLLO</h3>
								<a href="/proyectos/null/null/2" target="_blank" class="btn">
									VER +
								</a>
						
					</div>
				</li>
				<li>
					<ul class="flex">
						<li>
							<div>
								<h3>PRÓXIMOS  <br> LANZAMIENTOS</h3>
						<a href="/proyectos/null/null/1" target="_blank" class="btn">
							VER +
						</a>
							</div>
						</li>
						<li>
							<div>
								<h3>TERMINADOS</h3>
								<a href="/proyectos/null/null/3" target="_blank" class="btn">
									VER +
								</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</section>




	<section id="nuestras-oficinas">
		<h2 class="title primary-color  text-center"><b>NUESTRAS OFICINAS</b></h2>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					
					<div id="map"></div>

				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					
					<h3 class="primary-color"><b>OFICINAS COMERCIALES</b></h3>
					<p><b>Horario de atención: Lunes a Sábados de 10 a 18 HS, con entrevista previa.</b></p>
					
					<br>

					<ul>

						<li><p class="primary-color">OFICINA PILAR</p></li>

						<li>Dirección: Av. Tratado del Pilar 259 P.B (Pilar).</li>

						<li>Teléfono: 5275-6360 - Opción 1.</li>

						<li>Whatsapp: 11 6998-5042.</li>

						<li>Mail: <a href="mailTo:ventas@terranova-sa.com.ar">ventas@terranova-sa.com.ar</a></li>

					</ul>
					
					<br>

					<ul>

						<li><p class="primary-color">OFICINA TRISTÁN SUAREZ </p></li>

						<li>Dirección: Juan Galvez y 12 de Octubre – Tristán Suarez.</li>

						<li>Whatsapp: 11 6577–6361.</li>

						<li>E-mail: <a href="mailTo:comercial7@terranova-sa.com.ar">comercial7@terranova-sa.com.ar</a></li>

					</ul>
					<br>
					<h3 class="primary-color"><b>OFICINAS ADMINISTRATIVAS</b></h3>
					<ul>

						<li><p class="primary-color">ZONA NORTE</p></li>

						<li>Dirección: Edificio Paralelo 50 – Of. 222 – Colectora Panamericana Km 49.5, Pilar.</li>

						<li>Teléfono: 011 5275-6360 (opción 2)</li>

						<li>E-mail: <a href="mailTo:comercial@terranova-sa.com.ar">comercial@terranova-sa.com.ar</a></li>
						
						<li>Lunes a viernes de 9 a 18 hs</li>

					</ul>
					<br>
					<ul>

						<li><p class="primary-color">ZONA SUR</p></li>

						<li>Dirección: Macías 627 – Planta Alta, Adrogué.</li>

						<li>Teléfono: 5275-6360 opción 3 o linea directa 4214-3271</li>

						<li>Lunes a viernes de 9 a 18 hs</li>


					</ul>

				</div>
			</div>
		</div>
	</section>
	
	<div id="popUp">
		<div class="window">
			<a onClick="closePopup()">
				<i class="fas fa-times-circle"></i>
			</a>			<iframe src="https://www.youtube.com/embed/ydlRbV5SQkg?autoplay=1&mute=1&enablejsapi=1" frameborder="0" allowFullScreen autoplay="true"></iframe>
		</div>
	</div>+

	@include('inc.contacto')
	@include('inc.footer')

@stop
@section('scripts')
<script>
	
	var t =  $('header').height() + parseInt($('header').css('padding-bottom'));

	$("#slider").css('margin-top',t+10);
	

	$(document).ready(function(){
		window.centerGlobal = {lat: -34.657852, lng: -58.618505};  





		window.locations=[];
		window.markers=[];
		window.infoWindows=[];
		window.map;
		window.noDefaultLocations = [
						{
						    featureType: "poi",
						    stylers: [
						      { visibility: "off" }
						    ]   
						  }
						];
	locations.push(['<b>OFICINA PILAR</b><br><br> <b>Dirección:</b> Tratado del Pilar 259 P.B (Pilar). <br> <b>Teléfono:</b> 5275-6360 - Opción 1.',-34.450953,-58.906781]);

	 locations.push(['<b>OFICINA TRISTÁN SUAREZ</b><br><br> <b>Dirección:</b> Juan Galvez y 12 de Octubre – Tristán Suarez.<br> <b>Teléfono:</b> 5275-6360 – Opción 1. <br><b>Whatsap:</b> 11 6 577 – 6361.<br> <b>E-mail:</b> comercial7@terranova-sa.com.ar',-34.878781, -58.555884]);


	locations.push(['<b>ZONA NORTE</b><br><br> <b>Dirección:</b> Edificio Paralelo 50 – Of. 222 – Colectora Panamericana Km 49.5 .<br> <b>Teléfono:</b> 011 5275-6360 <br> <b>E-mail:</b> comercial@terranova-sa.com.ar ',-34.471802, -58.677443]);

	 locations.push(['<b>ZONA SUR</b><br><br> <b>Dirección:</b> Macías 627 – Planta Alta, Adrogué.<br> <b>Teléfono:</b> 5275-6360 opción 3 o linea directa 4214-3271 <br>',-34.797333, -58.391084]);

	
	

 



	initMap();

	});


	function closePopup(){
		$("#popUp").fadeOut();
		
		/*setTimeout(function(){
			if(screen.width>=1024){
				$("#popUp").css('background','transparent');

				$("#popUp").css('top','unset');
				$("#popUp").css('left','unset');
				$("#popUp").css('right','0');
				$("#popUp").css('bottom','0');
				$("#popUp").css('width','250px');
				$("#popUp").css('height','227px');


				$("#popUp .window a").hide();
				$("#popUp .window").css('top','unset');
				$("#popUp .window").css('left','unset');
				$("#popUp .window").css('right','18px');
				$("#popUp .window").css('bottom','24px');
				$("#popUp .window").css('width','74%');
				$("#popUp .window").css('height','71%');
				
				$("#popUp iframe").css('height','192px');
				$("#popUp").show();
			}
			
	 	
	 	}, 1000);*/
	}

	function initMap() {
 		map = new google.maps.Map(document.getElementById('map'), {
	      center: centerGlobal,
	      zoom: 9
	    });

	    map.setOptions({styles:noDefaultLocations});

	    agregarLocaciones(locations);
	  }


	       function cerrarInfowInfowindows(){

	      	for (var i=0; i<infoWindows.length; i++) {

				infoWindows[i].close();
				
			}

	      	}

	   function agregarLocaciones(locations){
			var marker,count;

			/*map.setZoom(5);
			map.setCenter(centerGlobal);*/


			for (count = 0; count < locations.length; count++) {
				console.log(locations[count][1]+","+ locations[count][2])
			    marker = new google.maps.Marker({
			      position: new google.maps.LatLng(locations[count][1], locations[count][2]),
			      map: map,
			      icon: "<?php echo asset("/storage/img/maps_logo.png")?>",
			      title: locations[count][0]
			    });


				var infowindow =  new google.maps.InfoWindow({});
	
				google.maps.event.addListener(marker, 'click', (function (marker, count) {

				      return function () {
				      	
				        infowindow.setContent(locations[count][0]);
				        cerrarInfowInfowindows();
				        infowindow.open(map, marker);

				        
				      }
				
			    })(marker, count));

				infoWindows.push(infowindow);

				markers.push(marker);
			  	
			  }

		}

</script>
@stop