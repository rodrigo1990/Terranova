@extends('Admin.layouts.main')
	@section('main')
		<h1>PROYECTOS</h1>
		<div class="container">
			<div class="row">
				<ul class="flex">
					<li><a href="/admin/viewListProyectos"><h4>TODOS LOS PROYECTOS</h4></a></li>
					<li><a href="admin/viewCreateProyecto"><h4>ALTA DE PROYECTOS</h4></a></li>
				</ul>
			</div>
		</div>
		<br><br><br><br>
		<form action="/admin/createProyecto" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="container">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" name="titulo">
					<br>
					<br>
					<label for="estado">Estado del proyecto</label>
					<select name="estado" class="form-control" id="">
						<option value="1">PRÓXIMOS DESARROLLOS</option>
						<option value="2">PROYECTOS EN DESARROLLO</option>
						<option value="3">PROYECTOS TERMINADOS</option>
					</select>
					<br>
					<br>
					<label for="descripcion">Descripción</label>
					<textarea  name="descripcion" id="" cols="30" rows="10"></textarea>
					<br><br>
					<div class="row">
						<h2>IMAGEN DE PRESENTACIÓN</h2>

						<div class="img-presentacion-input-cont center-block">
							<span  class="btn btn-primary btn-file border-btn blue float-right" >
		                        IMAGEN DE PRESENTACIÓN 
		                     	<input name="img_presentacion" type="file" id="presentacion">
		                     </span>
		                     <div id="file-result-presentacion" class="text-center">
	                            <span id="file-img-presentacion"></span>
            					</div>
						</div>
					</div>
					<br><br>
		 		<div class="row">
		 			<h2>SLIDER</h2>
					<ul class="flex" id="file-input-cont">

						<li id="li-file-input-1" class="li-file-input">
							<a onclick="resetInputFile('1')" class="text-center center-block">Eliminar</a>
							<span  class="btn btn-primary btn-file border-btn blue float-right" >
		                        SLIDE 1 
		                     	<input name="img[1]" type="file" id="file-input-1">
		                     </span>
		                     <div id="file-result-1" class="text-center">
		                            <span id="file-img-1"></span>
		                    	</div>
						</li>
						
						<li id="li-file-input-2" class="li-file-input">
							<a onclick="resetInputFile('2')" class="text-center center-block">Eliminar</a>
							<span  class="btn btn-primary btn-file border-btn blue float-right" >
		                        SLIDE 2
		                      <input name="img[2]" type="file" id="file-input-2">
		                    </span>
		                     <div id="file-result-2" class="text-center">
		                          <span id="file-img-2"></span>
		                    	</div>
					
						</li>

					</ul>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6"></div>
					<div class="col-lg-6 col-md-6 col-sm-6">
									
						<a style="display:none" id="remove-esp-btn" onclick="eliminarImagenes()" class="small-btn red float-right"><i class="fas fa-minus"></i></a>


						<a onclick="agregarImagenes()" class="small-btn blue float-right margin-right-15"><i class="fas fa-plus"></i></a>
						
					</div>
				</div>
				<br><br>
				<button class="float-right">ENVIAR</button>
			</div>


		</form>
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
						alert('¡Producto subido con exito!');
					}else{
						alert(msg);
					}

				@endif

			});
		</script>
		
		<script>
			tinymce.init({selector: "textarea",  // change this value according to your HTML
			  plugins: "link",
			  menubar: "insert edit align",
			  language:'es'});
		</script>
		<script>

			window.count=2;
			function eliminarImagenes(){
				console.log('#li-file-input-'+count+'');
			
				$('#li-file-input-'+count+'').hide(function(){
					$('#li-file-input-'+count+'').remove();

					count--;

					if(count==2){
						$("#remove-esp-btn").hide();
					}
				});

			
			}

			function agregarImagenes(){
				count++;
				console.log(count);
				console.log('<li id="li-file-input-'+count+'');
				if(count>2){
					$("#remove-esp-btn").fadeIn();
				}
				$("#file-input-cont").append('<li id="li-file-input-'+count+'" class="li-file-input"> <a  class="text-center center-block">Eliminar</a> <span  class="btn btn-primary btn-file border-btn blue float-right" > SLIDE '+count+' <input name="img['+count+']" type="file" id="file-input-'+count+'" /> </span> <div id="file-result-'+count+'" class="text-center"> <span id="file-img-'+count+'"></span> </div> </li>');

			}

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