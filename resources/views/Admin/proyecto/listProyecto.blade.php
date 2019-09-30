@extends('Admin.layouts.main')
	@section('main')
		<h1>PROYECTOS</h1>
		<br><br>
		<div class="row">
			<div class="container">
				<div class="col-lg-10 col-md-10 col-sm-10">
					<table class="table">
					<thead>
						<tr>
							<th class="text-center">Titulo</th>
							<th class="text-center">Estado</th>
							<th class="text-center">Acción</th>
						</tr>
					</thead>
					<tbody>
						@if(isset($proyectos))
							@foreach($proyectos as $proyecto)
							<tr>
								<td class="text-center">{{$proyecto->titulo}}</td>
								<td class="text-center">{{$proyecto->estado}}</td>
								<td class="text-center">
									<a href="/admin/viewUpdateProyecto/{{$proyecto->id}}">Actualizar</a>
									<br>
									<a href="/admin/destroyProyecto/{{$proyecto->id}}">Eliminar</a>
								</td>
							</tr>

							@endforeach
						@endif
					</tbody>
				</table>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2">
					<ul class="flex text-center">
						<li><a href="/admin/viewCreateProyecto" class="btn btn-primary btn-file border-btn bk-green "><h3>ALTA DE <br> PROYECTOS</h3></a></li>
					</ul>
				</div>
			</div>
		</div>

	

	@stop
	

	@section('scripts')
		<script src="/js/app_admin.js"></script>
		<script src="/js/dropzone.js"></script>
		<script>
			$(window).ready(function(){
				
				@if(isset($msg))

					var msg = <?php echo $msg ?>;

					if(msg==true){
						alert('¡Producto eliminado con exito!');
					}else{
						alert(msg);
					}

				@endif

			});
		</script>
		


	@stop