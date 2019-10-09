@extends('Admin.layouts.main')
	@section('main')
	<section id="testimonios">
		<h1>TESTIMONIOS</h1>
		
		<br><br>
		<form action="/admin/updateTestimonio" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="container">
				<input type="hidden" name="id" value="{{$testimonio->id}}">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" name="titulo" value="{{$testimonio->titulo}}">
					<br>
					<br>
					
					<label for="link">Link</label>
					<input type="text" class="form-control" name="linkYoutube" id="linkYoutube" value="{{$testimonio->link_youtube}}">
					<br><br>

					<div class="row">
						<h2>IMAGEN DE PRESENTACIÓN</h2>

						<ul class="flex">
							
						
						
								<li id="img-exist-{{$testimonio->img[0]->id}}" class="img-exist">
									<a onclick="deleteImg('{{$testimonio->img[0]->id}}','presentacion','testimonio')" class=" removeBtn text-center center-block"><i class="fas fa-times-circle"></i></a>
									<div style="background:url(<?php echo asset('storage/img/testimonios/'.$testimonio->img[0]->ruta.'') ?>)" class="preview"></div>
									
								</li>	


								<div id="newImgPresentacion"></div>
					



						</ul>

				
					</div>
				
					
				<br><br>
				<button class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></button>

			</div>


		</form>
		</div>

		</section>
		

	@stop
	

	@section('scripts')
		<script src="/js/app_admin.js"></script>
		<script src="/js/dropzone.js"></script>
		<script>
			$(window).ready(function(){
				
				@if(isset($msg))

					var msg = <?php echo $msg ?>;

					if(msg==true){
						alert('¡Testimonio actualizado con exito!');
					}else{
						alert(msg);
					}

				@endif

			});
		</script>

	
		<script>
			$('input[type="file"]').on('change', function(){

			//	alert('asdaosd');

			var id = ($(this).attr('id')=='presentacion') ? 'presentacion' : $(this).attr('id').match(/\d+/);

			alert(id);

            
             var file = $(this).val();

             var name = file.replace(/^.*[\\\/]/, '');

             console.log(name);
            

            var file_size = $(this)[0].files[0].size;

           

            format = file.split('.').pop();

            if(format == "jpg" || format == "png"){

            if(file_size>2097152) {

                alert("El archivo NO puede ser superior a 2MB");

            }else{

            	if(id=='presentacion'){

	                $("#file-img-presentacion").html(name);

	                $("#file-result-presentacion").fadeIn();
 
                }else{

                	$("#file-img-"+id+"").html(name);

	                $("#file-result-"+id+"").fadeIn();
                }

            }

        }else{
            alert("El archivo debe ser .jpg o .png");
        }
        });
		</script>
	<script>
			function resetInputFile(id){


				$("#file-input-"+id+"").val('');


				 $("#file-img-"+id+"").html('');

			}
		</script>
		
	@stop