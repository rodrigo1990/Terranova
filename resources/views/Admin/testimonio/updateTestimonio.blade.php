@extends('Admin.layouts.main')
	@section('main')
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

						<div class="img-presentacion-input-cont center-block">
							<span  class="btn btn-primary btn-file border-btn blue float-right" >
		                        IMAGEN DE PRESENTACIÓN 
		                     	<input name="imgPresentacion" type="file" id="presentacion">
		                     </span>
		                     <div id="file-result-presentacion" class="text-center">
	                            <span id="file-img-presentacion">{{$testimonio->img[0]->nombre}}</span>
            					</div>
						</div>
					</div>
				
					
				<br><br>
				<button class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></button>

			</div>


		</form>
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