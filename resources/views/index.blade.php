
@extends('layouts.main')

@section('main')
@include('inc.header')
	<section id="slider">
		<div id="owl-1" class="owl-one owl-carousel owl-theme">
			<div>
				<div class="slide" id="slide-1">
					<div class="slide__content right">
						<h1>PROXIMOS <br> <b>LANZAMIENTOS</b></h1>
						<a class="btn" href=""> VER + </a>
					</div>
				</div>
			</div>
			<div>
				<div class="slide" id="slide-2">
					<div class="slide__content center">
						<h1>FINANCIACIÓN HASTA <br> <b>84 CUOTAS CON TU DNI</b></h1>
						<a class="btn" href=""> CONOCÉ NUESTROS BARRIOS </a>
					</div>
				</div>
			</div>	
		</div>
	</section>
	<section id="franja-1">
		<div class="row">
			<h1 class="text-center"><b>
				84 CUOTAS SOLO CON TU DNI
			</b></h1>
		</div>
	</section>

	<section id="buscador">
		<div class="container">
			<ul class="flex">
				<li>
					<h3>¿En que zona buscas?</h3>
				</li>
				<li>
					<input type="text" class="form-control">
				</li>
				<li>
					<input type="text" class="form-control">
				</li>
				<li>
					<input type="text" class="form-control">
				</li>
				<li>
					<a class="btn" href="">BUSCAR</a>
				</li>
			</ul>

			<div id="resultado">
				
			</div>
		</div>
	</section>

	<section id="home-icons">
		<div class="container">
			<ul class="flex">
				<li class="text-center">
					<img src="<?php echo asset('/storage/img/icons-home-01.svg') ?>" alt="" width="100px;">
					<h4>CUOTAS EN <b>PESOS</b></h4>
				</li>
				<li class="text-center">
					<img src="<?php echo asset('/storage/img/icons-home-02.svg') ?>" alt="" width="100px;">
					<h4>FINANCIACIÓN <br> <b>HASTA 84 CUOTAS</b></h4>
				</li>
				<li class="text-center">
					<img src="<?php echo asset('/storage/img/icons-home-03.svg') ?>" alt="" width="100px;">
					<h4>SOLO CON TU <b>DNI</b></h4>
				</li>
				<li class="text-center">
					<img src="<?php echo asset('/storage/img/icons-home-04.svg') ?>" alt="" width="100px;">
					<h4>ENTREGAMOS <br>  <b>MAS DE 1500 LOTES</b></h4>
				</li>
			</ul>
		</div>
	</section>

	<section id="nuestros-proyectos">
		<h2 class="title green text-center"><b>NUESTROS PROYECTOS</b></h2>
		<div class="container">
			<ul class="flex">
				<li>
					<div>
						<h3>DISPONIBLES Y <br> LANZAMIENTOS</h3>
						<a href="" class="btn">
							VER +
						</a>
					</div>
				</li>
				<li>
					<ul class="flex">
						<li>
							<div>
								<h3>EN DESARROLLO</h3>
								<a href="" class="btn">
									VER +
								</a>
							</div>
						</li>
						<li>
							<div>
								<h3>TERMINADOS</h3>
								<a href="" class="btn">
									VER +
								</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</section>


	<section id="nosotros">
		<div class="container">
			<h2 class="title green text-center"><b>NOSOTROS</b></h2>
			<p class="text-center">
				Somos una Desarrolladora Inmobiliaria formada por los mejores profesionales del rubro con 25 años de experiencia, que nos reunimos para  trabajar en el desarrollo de lotes convencionales, barrios parques y barrios privados con la infraestructura necesaria para que nuestros clientes puedan cumplir su sueño de tener su propio terreno.
			</p>
			<br>
			<p class="text-center"><span>
				Más de 1500 familias disfrutan hoy de ser dueños de su propio terreno, muchos de los cuales hoy ya tienen su vivienda terminada y su escritura pública correspondiente.
			</span></p>
			
			<br>

			<a href="" class="btn center-block" style="">
				CONOCÉ TODOS NUESTROS BARRIOS
			</a>
		</div>
	</section>

	<section id="??">
		<h1 class="text-center">????</h1>
	</section>

	<section id="nuestras-oficinas">
		<h2 class="title green text-center"><b>NUESTRAS OFICINAS</b></h2>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					
					<div id="map"></div>

				</div>
				<div class="col-sm-6 col-xs-12">
					


				</div>
			</div>
		</div>
	</section>
@stop
@section('scripts')
<script>
	$(document).ready(function(){
		window.centerGlobal = {lat: -34.562154, lng: -58.492396};
		window.locations=[];
		window.markers=[];
		window.map;
		window.noDefaultLocations = [
						{
						    featureType: "poi",
						    stylers: [
						      { visibility: "off" }
						    ]   
						  }
						];

	initMap();

	});




	function initMap() {
 		map = new google.maps.Map(document.getElementById('map'), {
	      center: centerGlobal,
	      zoom: 16
	    });

	    map.setOptions({styles:noDefaultLocations});

	    agregarLocaciones(locations);
	  }


	   function agregarLocaciones(locations){
			var infowindow =  new google.maps.InfoWindow({});
			var marker,count;

			/*map.setZoom(5);
			map.setCenter(centerGlobal);*/


			for (count = 0; count < locations.length; count++) {
				console.log(locations[count][1]+","+ locations[count][2])
			    marker = new google.maps.Marker({
			      position: new google.maps.LatLng(locations[count][1], locations[count][2]),
			      map: map,
			      icon: "<?php echo asset("img/logo-mas-claro.png")?>",
			      title: locations[count][0]
			    });


				markers.push(marker);
			  	
			  }

		}

</script>
@stop