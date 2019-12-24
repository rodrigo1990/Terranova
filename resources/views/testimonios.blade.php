@extends('layouts.main')

@section('main')
@include('inc.header')

<section id="testimonios">
	<h2 class="title primary-color text-center"><b>TESTIMONIOS</b></h2>
			<div class="row">
				<div class="container">
					<ul class="flex">
						<li>
							<div class="text-center">
								
								<div>
									<p class="title primary-color">
										«PAGAR EN CUOTAS ME PERMITIÓ TENER MI TERRENO» – DIONISIO VECINO DE B. PQUE ASTOLFI
									</p>
								</div>

								<img src=" <?php echo asset('storage/img/testimonios/1.jpg') ?> " alt="" width="280px">
								<br>
								<a href="" youtubeid="Ni8l_F923f0" class="btn"><i class="fab fa-youtube"></i> VER</a>
							</div>
						</li>
						<li>
							<div class="text-center">
								
								<div>
									<p class="title primary-color">
										PROPIETARIOS DE ASTOLFI NOS CUENTA SU HISTORIA
									</p>
								</div>

								<img src=" <?php echo asset('storage/img/testimonios/2.jpg') ?> " alt="" width="280px">
								<br>
								<a href="" class="btn" youtubeid="JqZXJPbT2x8"><i class="fab fa-youtube"></i> VER</a>
							</div>
						</li>
						<li>
							<div class="text-center">
								
								<div>
									<p class="title primary-color">
										LA FACILIDAD DE COMPRAR TU TERRENO EN CUOTAS – LEONARDO PROPIETARIO DE BARRIO PARQUE MATHEU
									</p>
								</div>

								<img src=" <?php echo asset('storage/img/testimonios/3.jpg') ?> " alt="" width="280px">
								<br>
								<a href="" class="btn" youtubeid="DDSb4SwzqFo"> <i class="fab fa-youtube"></i> VER</a>
							</div>
						</li>
						<li>
							<div class="text-center">
								
								<div>
									<p class="title primary-color">
										«PAGAR EN CUOTAS ME PERMITIÓ TENER MI TERRENO» – DIONISIO VECINO DE B. PQUE ASTOLFI
									</p>
								</div>

								<img src=" <?php echo asset('storage/img/testimonios/1.jpg') ?> " alt="" width="280px">
								<br>
								<a href="" youtubeid="Ni8l_F923f0" class="btn"><i class="fab fa-youtube"></i> VER</a>
							</div>
						</li>
						<li>
							<div class="text-center">
								
								<div>
									<p class="title primary-color">
										PROPIETARIOS DE ASTOLFI NOS CUENTA SU HISTORIA
									</p>
								</div>

								<img src=" <?php echo asset('storage/img/testimonios/2.jpg') ?> " alt="" width="280px">
								<br>
								<a href="" class="btn" youtubeid="JqZXJPbT2x8"><i class="fab fa-youtube"></i> VER</a>
							</div>
						</li>
						<li>
							<div class="text-center">
								
								<div>
									<p class="title primary-color">
										LA FACILIDAD DE COMPRAR TU TERRENO EN CUOTAS – LEONARDO PROPIETARIO DE BARRIO PARQUE MATHEU
									</p>
								</div>

								<img src=" <?php echo asset('storage/img/testimonios/3.jpg') ?> " alt="" width="280px">
								<br>
								<a href="" class="btn" youtubeid="DDSb4SwzqFo"> <i class="fab fa-youtube"></i> VER</a>
							</div>
						</li>
						
					</ul>

				</div>
			</div>
</section>

@include('inc.footer')
@stop
@section('scripts')
<script>
	$(document).ready(function(){

		$(".btn").grtyoutube();

	});
</script>
<script>
	$("#testimonios").css('margin-top',$('header').height()+50);
</script>
@stop