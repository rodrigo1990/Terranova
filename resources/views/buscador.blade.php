
@extends('layouts.main')

@section('main')
@include('inc.header')
<section id="buscador-section" class="">
	<h2 class="title primary-color text-center"><b>NUESTROS PROYECTOS</b></h2>	
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 buscador-col">
					<ul class="flex">
						<li>
							<label for="zona">ELIJA UNA ZONA</label>
							<select name="zona" id="" class="form-control">
								<option value="">zona sur</option>
							</select>
						</li>
						<li>
							<label for="nombre">ELIJA UN PROYECTO</label>
							<select name="nombre" id="" class="form-control">
								<option value="">Canning</option>
							</select>
						</li>
						<li>
							<label for="estado">ELIJA UN ESTADO</label>
							<select name="estado" id="" class="form-control">
								<option value="">Desarrollo</option>
							</select>
						</li>
					</ul>
				</div>
					
				
			</div>
			<div class="col-sm-12 result">
				<ul class="flex">
						@foreach($testimonios as $testimonio)
						<li>
							<div class="text-center">
								
								<div>
									<p class="title primary-color">
										{{$testimonio->titulo}}
									</p>
								</div>

								<img src=" https://img.youtube.com/vi/{{$testimonio->link_youtube}}/sddefault.jpg " alt="" width="280px">
								<br>
								<a href="" youtubeid="{{$testimonio->link_youtube}}" class="btn"><i class="fab fa-youtube"></i> VER</a>
							</div>
						</li>
						@endforeach
					</ul>
			</div>
		</div>
	</div>

	
</section>

	@include('inc.footer')
@stop
@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
	$("#buscador-section").css('margin-top',$('header').height()+90);
</script>

@stop