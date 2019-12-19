
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
					<h3>DISPONIBLES Y <br> LANZAMIENTOS</h3>
					<a href="" class="btn">
						VER +
					</a>
				</li>
				<li>
					<ul class="flex">
						<li>
							<h3>EN DESARROLLO</h3>
							<a href="" class="btn">
								VER +
							</a>
						</li>
						<li>
							<h3>TERMINADOS</h3>
							<a href="" class="btn">
								VER +
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</section>
@stop
