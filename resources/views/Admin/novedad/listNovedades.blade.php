@extends('Admin.layouts.iframe')
	@section('main')
		<h1>NOVEDADES</h1>
		<br><br>
		<div class="row">
			<div class="container">
				<div class="col-lg-10 col-md-10 col-sm-10">
					<table class="table">
					<thead>
						<tr>
							<th class="text-center">Titulo</th>
							<th class="text-center">Descipción</th>
							<th class="text-center">Acción</th>
						</tr>
					</thead>
					<tbody>
						@if(isset($novedades))
							@foreach($novedades as $novedad)
							<tr>
								<td class="text-center">{{$novedad->titulo}}</td>
								<td class="text-center">{{strip_tags($novedad->descripcion)}}</td>
								<td class="text-center">
									<a href="/admin/viewUpdateNovedad/{{$novedad->id}}">Actualizar</a>
									<br>
									<a href="/admin/destroyNovedad/{{$novedad->id}}">Eliminar</a>
								</td>
							</tr>

							@endforeach
						@endif
					</tbody>
				</table>
				</div>

				<div class="col-lg-2 col-md-2 col-sm-2">
					<ul class="flex text-center">
						<li><a href="/admin/viewCreateNovedad" class="btn btn-primary btn-file border-btn bk-green "><h3>ALTA DE <br> NOVEDADES</h3></a></li>
					</ul>
				</div>
			</div>
		</div>
	
		

	@stop
	

	@section('scripts')
		<script src="/js/app_admin.js"></script>
		<script src="/js/dropzone.js"></script>
		@include('Admin.inc.showOperationMessage')
		


	@stop