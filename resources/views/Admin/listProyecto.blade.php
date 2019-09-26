@extends('Admin.layouts.main')
	@section('main')
		<h1>PROYECTOS</h1>
		<div class="container">
			<div class="row">
				<ul class="flex">
					<li><a href="/admin/viewListProyectos"><h4>TODOS LOS PROYECTOS</h4></a></li>
					<li><a href="/admin/viewCreateProyecto"><h4>ALTA DE PROYECTOS</h4></a></li>
				</ul>
			</div>
		</div>
		<br><br><br><br>
		<div class="container">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Titulo</th>
						<th class="text-center">Estado</th>
						<th class="text-center">Actualizar/Eliminar</th>
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
		<!-- <div class="container-drop" >
            <div class='content-drop'>
            <form action="/admin/upload" class="dropzone" id="myAwesomeDropzone" enctype="multipart/form-data"> 
            </form>  
            </div> 
        </div> -->
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