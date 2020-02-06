
@extends('layouts.main')

@section('main')
@include('inc.header')
<section id="buscador-section" class="buscador-container">
	<h2 class="title primary-color text-center"><b>NUESTROS PROYECTOS</b></h2>	
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 buscador-col">
					<form action="/buscarProyectos" method="POST">
						@csrf
						<ul class="flex">
							<li>
								<label for="zona">ELIJA UNA ZONA</label>
								<select name="zona" id="zona" class="form-control" onchange="buscarBarrioSegunZona()">
									<option value="null">Selecciona una zona</option>
									@foreach($zonas as $zona)
										<option value="{{$zona->id}}">{{ucfirst(strtolower($zona->descripcion))}}</option>
									@endforeach
								</select>
							</li>
							<li>
								<label for="barrio">ELIJA UN PROYECTO</label>
								<div>
								<select name="barrio" id="barrio" class="form-control">
									<option value="null">Seleccione un proyecto</option>
									@foreach($proyectos as $proyecto)
									<option value="{{$proyecto->id}}">{{$proyecto->titulo}}</option>
									@endforeach
								</select>
								</div>
							</li>

							<li>
								<label for="barrio">ELIJA UN ESTADO</label>
								<div>
								<select name="estado" id="estado" class="form-control">
									<option value="null">Seleccione un estado</option>
									@foreach($estados as $estado)
										@if(isset($estado_id))
											@if($estado_id== $estado->id)
												<option value="{{$estado->id}}" selected>{{$estado->descripcion}}</option>
											@else
												<option value="{{$estado->id}}">{{$estado->descripcion}}</option>
											@endif
										@else
											<option value="{{$estado->id}}">{{$estado->descripcion}}</option>
										@endif
									@endforeach
								</select>
								</div>
							</li>

							<li>
								<button class="btn">BUSCAR</button>
							</li>
							
						</ul>
					</form>
				</div>
					
				
			</div>
			<div class="col-sm-12 result" style="">
				<ul class="flex">
						@foreach($proyectos as $proyecto)
						<li>
							<div class="text-center">
								
								<div>
									<p class="title primary-color text-center">
										{{ucfirst($proyecto->titulo)}}
									</p>
								</div>
								@foreach($proyecto->img as $img)
									@if($img->tipo == 'PRESENTACION')
									<img src="<?php echo asset('/storage/img/proyectos/'.$img->ruta) ?>" alt="" width="280px">
									@endif
								@endforeach
								<br>
								<a href="/proyecto/{{$proyecto->id}}" target="_blank" class="btn"> VER</a>
							</div>
						</li>
						@endforeach
					</ul>
			</div>
		</div>
	</div>

	
</section>

	@include('inc.contacto')

	@include('inc.footer')
@stop
@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
	$("#buscador-section").css('margin-top',$('header').height()+90);
</script>



@stop