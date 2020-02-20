<section id="contacto">
		<div class="container">
		
			<h2 class="title primary-color text-center"><b>CONTACTANOS</b></h2>
			<br>
			
			<form action="">
				
				<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre y apellido">
				<p class="error" id="nombre-error">Ingrese un nombre valido </p>
				
				<input type="text" id="email" name="email" class="form-control" placeholder="E-Mail">
				<p class="error" id="email-error">Ingrese un email valido </p>
				
				<input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono">
				<p class="error" id="telefono-error">Ingrese un teléfono valido </p>

				<select name="proyecto" id="proyecto" class="form-control">
					<option value="">Seleccioná un barrio de su interes</option>
					@foreach($proyectos as $proyecto)
						@if($proyecto->aparece_en_formulario==1)
							@if($proyecto->es_barrio_parque==1)
								<option value="Barrio Parque {{$proyecto->titulo}}">Barrio Parque {{$proyecto->titulo}}</option>
							@else
								<option value="{{$proyecto->titulo}}">{{$proyecto->titulo}}</option>
							@endif
						@endif
					@endforeach
				</select>
				<p class="error" id="proyecto-error">Ingrese un proyecto</p>
				
				<input type="text" id="consulta" name="consulta" class="form-control" placeholder="Consulta">
				<br>
				<a class="btn float-right" onCLick="validarFormulario()">ENVIAR</a>
			</form>
		
		</div>
		
	</section>