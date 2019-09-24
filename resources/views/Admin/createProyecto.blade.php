@extends('Admin.layouts.main')
	@section('main')
		<h1>ALTA DE PROYECTOS</h1>
		<br><br>

		<div class="container">
			<label for="titulo">Titulo</label>
			<input type="text" class="form-control" name="titulo">
			<br>
			<br>
			<label for="descripcion">Descripción</label>
			<textarea  name="descripcion" id="" cols="30" rows="10"></textarea>
		</div>
	@stop
	

	@section('scripts')
		<script src="https://cdn.tiny.cloud/1/4du36rgs2w5s3lyfrmifk85266w9h8vcodmjt5oboeztsdof/tinymce/5/tinymce.min.js"></script>
		<script>tinymce.init({selector: "textarea",  // change this value according to your HTML
  plugins: "link",
  menubar: "insert edit format",
  toolbar: "link",
  language:'es'});</script>

	@stop