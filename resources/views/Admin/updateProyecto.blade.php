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
		<form action="/admin/createProyecto" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="container">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" name="titulo" value="{{$proyecto->titulo}}">
					<br>
					<br>
					<label for="estado">Estado del proyecto</label>
					<select name="estado" class="form-control" id="">

						@if($proyecto->estado == 1)
							<option value="1" selected>PRÓXIMOS DESARROLLOS</option>
							<option value="2">PROYECTOS EN DESARROLLO</option>
							<option value="3">PROYECTOS TERMINADOS</option>
						@elseif($proyecto->estado == 2)
							<option value="1" >PRÓXIMOS DESARROLLOS</option>
							<option value="2" selected>PROYECTOS EN DESARROLLO</option>
							<option value="3">PROYECTOS TERMINADOS</option>
						@else
							<option value="1" >PRÓXIMOS DESARROLLOS</option>
							<option value="2" >PROYECTOS EN DESARROLLO</option>
							<option value="3"selected>PROYECTOS TERMINADOS</option>
						@endif

					</select>
					<br>
					<br>
					<label for="descripcion">Descripción</label>
					<textarea  name="descripcion" id="" cols="30" rows="10">{{$proyecto->descripcion}}</textarea>
					<br><br>
					<div class="row">
						<h2>PRESENTACIÓN</h2>
						
						<ul class="flex">
							
						
						@foreach($proyecto->img as $img)
							@if($img->tipo=='PRESENTACION')
								<li id="img-exist-{{$img->id}}" class="flex">
									<a onclick="deleteImg('{{$img->id}}')" class="text-center center-block">Eliminar</a>
									<div style="background:url(<?php echo asset('storage/img/proyectos/'.$img->ruta.'') ?>)" class="img-bkground"></div>
									
								</li>	
							@endif
						@endforeach



						</ul>
					
					</div>
				<br><br>
		 		<div class="row">
		 			<h2>SLIDER</h2>
					<ul class="flex" id="file-input-cont">
						
						@foreach($proyecto->img as $img)

							@if($img->tipo == 'SLIDE')
							
								<li id="img-exist-{{$img->id}}" class="flex">
									<a onclick="deleteImg('{{$img->id}}')" class="text-center center-block">Eliminar</a>
									<div style="background:url(<?php echo asset('storage/img/proyectos/'.$img->ruta.'') ?>)" class="img-bkground"></div>
									
								</li>
							
							@endif

						@endforeach

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
			function deleteImg(id){
				$.ajax({
                    headers:{
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{id:id},
                url:'/admin/destroyImg',
                type:'post',
                dataType:"json",
                success:function(response){
                    if(response == true){
	                    $("#img-exist-"+id+"").fadeOut(function(){
	                    	$("#img-exist-"+id+"").remove();
	                    });
                    }
                }
                });
			}
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

			var id = $(this).attr('id').match(/\d+/);

            
             var file = $(this).val();

             var name = file.replace(/^.*[\\\/]/, '');

             console.log(name);
            

            var file_size = $(this)[0].files[0].size;

           

            format = file.split('.').pop();

            if(format == "jpg" || format == "png"){

            if(file_size>2097152) {

                alert("El archivo NO puede ser superior a 2MB");

            }else{

                $("#file-img-"+id+"").html(name);

             //   alert("#file-img-"+id+"");

               //  alert("#file-result-"+id+"");

                $("#file-result-"+id+"").fadeIn();
 


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