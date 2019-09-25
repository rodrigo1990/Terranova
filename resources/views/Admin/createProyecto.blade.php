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
			<br><br>
		<div class="row">
			<ul class="flex" id="file-input-cont">

				<li id="li-file-input-1" class="li-file-input">
					<a onclick="resetInputFile('1')">x</a>
					<span  class="btn btn-primary btn-file border-btn blue float-right" >
                        SLIDE 1 
                     	<input name="file" type="file" id="file-input-1">
                     </span>
                     <div id="file-result-1">
                            <span id="file-img-1"></span>
                    	</div>
				</li>
				
				<li id="li-file-input-2" class="li-file-input">
					<a onclick="resetInputFile('2')">x</a>
					<span  class="btn btn-primary btn-file border-btn blue float-right" >
                        SLIDE 2
                      <input name="file" type="file" id="file-input-2">
                    </span>
                     <div id="file-result-2">
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
		</div>
		

	@stop
	

	@section('scripts')
		<script src="/js/app_admin.js"></script>
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
			
				$('#li-file-input-'+count+'').fadeOut(function(){
					$('#li-file-input-'+count+'').remove();

					count--;

					if(count==2){
						$("#remove-esp-btn").fadeOut();
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
				$("#file-input-cont").append('<li id="li-file-input-'+count+'" class="li-file-input"> <span  class="btn btn-primary btn-file border-btn blue float-right" > SLIDE '+count+' <input name="file" type="file" id="file-input-'+count+'"> </span> <div id="li-file-input-result-'+count+'" class="file-result"></div> </li>');


			}

		</script>

		<script>
			$('input[type="file"]').change(function(){

			var id = $(this).attr('id').match(/\d+/);

            
             var name = $(this).val();
            

            var file_size = $(this)[0].files[0].size;

           

            name = name.split('.').pop();

            if(name == "pdf" || name == "docx"){

            if(file_size>2097152) {

                alert("El archivo NO puede ser superior a 2MB");

            }else{

                $("#file-img-"+id+"").html($(this).val());

                $("#li-file-input-result-"+id+"").fadeIn();
            }

        }else{
            alert("El archivo debe ser .pdf o .docx");
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