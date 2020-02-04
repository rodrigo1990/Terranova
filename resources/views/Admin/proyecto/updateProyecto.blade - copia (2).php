@extends('Admin.layouts.iframe')
	@section('main')
	<section id="proyectos">
		<h1>PROYECTOS</h1>
		<p><i><span>*</span>Indica campos obligatorios</i></p>

		
		<br><br>
		<form action="/admin/updateProyecto" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="container">
				<input type="hidden" name="id" value="{{$proyecto->id}}">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" name="titulo" value="{{$proyecto->titulo}}">
					<p class="error" id="tituloError">
						Ingrese un titulo
					</p>
					<br>
					<br>
					<label for="zona">Zona</label>
					<select name="zona" class="form-control" id="">

						@foreach($zonas as $zona)
							
							@if($zona->id == $proyecto->zona->id)

								<option value="{{$zona->id}}" selected>{{$zona->descripcion}}</option>

							@else
							
								<option value="{{$zona->id}}">{{$zona->descripcion}}</option>

							@endif

						@endforeach

					</select>
					<br>
					<br>
					<label for="descripcion">Descripción <span>*</span></label>
					<textarea  name="descripcion" id="" cols="30" rows="10">{{$proyecto->descripcion}}</textarea>
					<p class="error" id="descripcionError">
						Ingrese una descripción
					</p>
					<br><br>

					<div class="row">
					
						<label for="masterplan">Masterplan</label>
						<div style="border:1px solid #ccc;border-radius:5px;height: 40px;padding:7px">
						<input type="file"  name="masterplan" id="masterplan" class="" value="" placeholder="Ingresa el archivo bo" style="color:transparent  !important;float:left;    width: 150px;" onChange="$(this).css('color','black');$(this).css('width','100%');$('#fileLabel').remove()">
						<label id="fileLabel" style="float:left;">{{$proyecto->masterplan[0]->nombre}}</label>
						</div>
						
						<p class="error" id="masterplanError">
							Ingrese un masterplan
						</p>
					

					</div>
				
					<br><br>

					<div class="row" id="como-llegar">
						
						<h2 class="text-left" style="display:block;">COMO LLEGAR</h2>
						
						<br>	
						
						
						<div class="col-sm-12">
							<h3>¿Cerca de que estación?</h3>
							<input type="text" name="estacion" id="estacion" class="form-control" placeholder="Ej: Estacion del tren B. Mitre" value="{{$proyecto->estacion}}">
						</div>


						<div id="lineas-colectivo" class="col-sm-12" style="margin-top:20px;">
						
							<h3>Lineas de colectivo</h3>
						
							<ul>
								<?php $counterLc = 0; ?>
								@foreach($proyecto->lineaColectivo as $lineaColectivo)
									<?php $counterLc++ ?>
								
									<li id="lc-li-{{$counterLc}}">
										<label for="lineasColectivos[]" style="display:block !important;width: 100% !important;">Linea de colectivo {{$counterLc}} </label>

										<div style="height: 50px;">
										
											<input type="text" name="lineasColectivos[{{$lineaColectivo->id}}]" class="lineasColectivos form-control" placeholder="501 Astolfi - Pilar" value="{{$lineaColectivo->descripcion}}" style="float:left;width: 98% !important;">
											
											<a  style="float:left;width: 1%;height: 100%;" onClick="eliminarLineasColectivo({{$lineaColectivo->id}})">
												<i class="fas fa-times-circle" style="line-height: 3;"></i>
											</a>

										</div>
										
							
										<p class="error" id="lineasColectivosError">
											Ingrese una caracteristica
										</p>


										<input type="hidden" id="lineasColectivoId{{$lineaColectivo->id}}" value="{{$lineaColectivo->id}}">
							
									</li>

								@endforeach
						
							</ul>


							<div class="col-lg-6 col-md-6 col-sm-6">
							
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								
								 	
								<a
 
										style="display:none"
								
					

								 id="remove-lc-btn"

								  onClick="eliminarLineasColectivo()"

								   class="small-btn red float-right" >


								 <i class="fas fa-minus"></i>

								</a>


								<a onClick="agregarLineasColectivo()" class="small-btn blue float-right margin-right-15"><i class="fas fa-plus"></i></a>
								
							</div>


						</div>
							
					
					</div>

					<br><br>

					<div class="row" id="caracteristicas">
						<h2 class="text-left" style="display:block;">CARACTERISTICAS</h2>
						<br>	
						<ul>
							
							<?php $counterCaracteristica = 0  ?>
							
							@foreach($proyecto->caracteristica as $caracteristica )
							
							<?php $counterCaracteristica++ ?>
							
								<li>
									<label for="caracteristicas[]">Caracteristica {{$counterCaracteristica}} </label>
									<input type="text" name="caracteristicas[]" class="caracteristicas form-control" value="{{$caracteristica->descripcion}}">
									
									<p class="error" id="caracteristicaError">
										Ingrese una caracteristica
									</p>
								</li>
							@endforeach
						</ul>
							
						

						<div class="col-lg-6 col-md-6 col-sm-6">
						
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
								
							<a style="display:none" id="remove-carac-btn" onClick="eliminarCaracteristicas()" class="small-btn red float-right" ><i class="fas fa-minus"></i></a>


							<a onClick="agregarCaracteristicas()" class="small-btn blue float-right margin-right-15"><i class="fas fa-plus"></i></a>
							
						</div>

					</div>
					<br><br>
					<div class="row" id="servicios">
						<h2 class="text-left" style="display:block;">SERVICIOS</h2>
						<br>	
						<ul>
							<?php $counterServicios = 0  ?>
							
							@foreach($proyecto->servicio as $servicio )
							
							<?php $counterServicios++ ?>

								<li>
									<label for="servicios[]">Servicio 1 </label>
									<input type="text" name="servicios[]" class="servicios form-control" value="{{$servicio->descripcion}}">
									
									<p class="error" id="servicioError">
										Ingrese un servicio
									</p>
								</li>

							@endforeach
						</ul>
							
						

						<div class="col-lg-6 col-md-6 col-sm-6">
						
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							
							<a style="display:none" id="remove-serv-btn" onClick="eliminarServicios()" class="small-btn red float-right" ><i class="fas fa-minus"></i></a>


							<a onClick="agregarServicios()" class="small-btn blue float-right margin-right-15"><i class="fas fa-plus"></i></a>
							
						</div>

					</div>
					<br><br>
					<div class="row">
						<h2 class="text-left" style="display:block;">UBICACION <span>*</span></h2>
						<br>
						<div class="col-sm-12 map-cont">
							<input type="hidden" id="latitud" name="latitud" value="{{$proyecto->latitud}}">
							<input type="hidden" id="longitud" name="longitud" value="{{$proyecto->longitud}}">
							<input id="search-box" type="text" class="form-control" placeholder="Escribí la dirección exacta" >
							<div id="map" style="height:400px;width:100%"></div>
							<div class="error" id="coordenadas-error">Ingrese una ubicación en el mapa</div>

						</div>
					</div>
					<br><br>


					
					<div class="row">
						<h2 class="text-left" style="display:block;">VIDEOS</h2>
						<br>
						<div class="col-sm-12">
						
							<label for="video_1">VIDEO 1 </label>
							<input type="hidden" name="video_1_id" value="@if(isset($proyecto->video[0])){{$proyecto->video[0]->id}}@endif">
							<input type="text" name="video_1" class="form-control" onchange="insertVideoOnIframe(1)" value="@if(isset($proyecto->video[0])){{$proyecto->video[0]->url}}@endif">
							<div class="error" id="video1Error">Ingrese un video valido</div>

							<iframe id="video-preview-1" class="video-preview" type="text/html" height="0px" frameborder="0"  allowfullscreen></iframe>

						</div>
						<div class="col-sm-12">
							
							<label for="video_2">VIDEO 2 </label>
							<input type="hidden" name="video_2_id" value="@if(isset($proyecto->video[1])){{$proyecto->video[1]->id}}@endif">
							<input type="text" name="video_2" class="form-control" onchange="insertVideoOnIframe(2)" value="@if(isset($proyecto->video[1])){{$proyecto->video[1]->url}}@endif">
							<div class="error" id="video2Error">Ingrese un video valido</div>

							<iframe id="video-preview-2" class="video-preview" height="0px" type="text/html" frameborder="0"  allowfullscreen></iframe>
						</div>
					</div>
					<div id="presentacion" class="row">
						<h2>PRESENTACIÓN <span>*</span></h2>
						
						<ul class="flex">
							
						<?php $existeImgPresentacion = false; ?>
						@foreach($imagenes as $img)
							@if($img->tipo=='PRESENTACION')
							<?php $existeImgPresentacion = true; ?>
								<li id="img-exist-{{$img->id}}" class="img-exist">		
									<div style="background:url(<?php echo asset('storage/img/proyectos/'.$img->ruta.'') ?>)" class="preview">
										<a onclick="deleteImg('{{$img->id}}','presentacion','proyecto')" class=" removeBtn text-center center-block"><i class="fas fa-times-circle"></i></a>
										<div id="file-result-presentacion" class="text-center">
			                            <span id="file-img-presentacion">{{$img->nombre}}</span>
		            					</div>
									</div>				
								</li>	
							@endif
						@endforeach

						@if($existeImgPresentacion == false)
							<div class="img-presentacion-input-cont center-block preview" id="preview-presentacion">
							<span  class="btn btn-primary btn-file border-btn blue float-right" >
		                        IMAGEN DE PRESENTACIÓN 
		                     	<input name="img_presentacion" type="file" id="presentacion">
		                     </span>
		                     <div id="file-result-presentacion" class="text-center">
	                            <span id="file-img-presentacion"></span>
            					</div>

            			
						</div>
						<p class="error text-center" id="imgPresentacion-error">
        					Ingrese una imagen
        				</p>
						@endif



						</ul>

						<div id="newImgPresentacion">
							
						</div>
					
					</div>
					<p class="error text-center" id="imgPresentacion-error">
    					Ingrese una imagen
    				</p>
				<br><br>
		 		<div class="row">
		 			<h2>SLIDES EXISTENTES <span>*</span></h2>
					<ul class="flex" id="file-input-cont">
						<?php $existeSlide = false; ?>
						@foreach($imagenes as $img)

							@if($img->tipo == 'SLIDE')
							<?php $existeSlide = true; ?>
								<li id="img-exist-{{$img->id}}" class="img-exist">
									
									<div style="background:url(<?php echo asset('storage/img/proyectos/'.$img->ruta.'') ?>)" class="preview">
										<a onclick="deleteImg('{{$img->id}}','slide','proyecto','update')" class="removeBtn text-center center-block"><i class="fas fa-times-circle"></i></a>
										<div id="file-result-presentacion" class="text-center">
			                            <span id="file-img-presentacion">{{$img->nombre}}</span>
		            					</div>
									</div>


									
								</li>
							
							@endif

						@endforeach


						@if($existeSlide == false)
							<li id="item_1" class="li-file-input">
							
	                    	<div class="preview" id="preview-1">
	                    	
								<span  class="btn btn-primary btn-file border-btn blue float-right" >
			                        SLIDE 1 
			                     	<input name="img[0]" type="file" id="file-input-1">
			                     </span>
			                     <div id="file-result-1" class="file-result text-center">
			                            <span id="file-img-1"></span>
		                    		</div>
	                    	</div>

	                    	<p class="error text-center" id="imgSlide1-error">
        					Ingrese una imagen
        					</p>

						</li>
						
						<li id="item_2" class="li-file-input">
							
	                    	<div class="preview" id="preview-2">
	                    	
								<span  class="btn btn-primary btn-file border-btn blue float-right" >
			                        SLIDE 2
			                      <input name="img[1]" type="file" id="file-input-2">
			                    </span>
			                     <div id="file-result-2" class="file-result text-center">
			                          <span id="file-img-2"></span>
		                    		</div>
	                    	</div>

	                    	<p class="error text-center" id="imgSlide2-error">
        					Ingrese una imagen
        					</p>
					
						</li>

						<?php $count = 1 ?>
						@endif

					</ul>

					<ul id="orderSlides" style="display:none;">
						@if($existeSlide == true)

							<?php $count = -1 ?>
							@foreach($imagenes as $img)

								@if($img->tipo == 'SLIDE')
								<?php $count++ ?>
									<li id="{{$img->id}}">
										<input type="hidden" name="orderSlide[{{$img->id}}]" value="{{$img->order}}" >
									</li>
								
								@endif

							@endforeach	

						@endif
					</ul>
				</div>
		
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6"></div>
					<div class="col-lg-6 col-md-6 col-sm-6">
									
						<a style="display:none" id="remove-esp-btn" onclick="eliminarImagenes()" class="small-btn red float-right"><i class="fas fa-minus"></i></a>


						<a onclick="agregarImagenes('update')" class="small-btn blue float-right margin-right-15"><i class="fas fa-plus"></i></a>
						
					</div>
				</div>
				<br><br>
				<a onclick="createProjectValidate()" class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></a>

			</div>


		</form>

		</div>

		<br><br>
</section>
		

	@stop
	

	@section('scripts')
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkne1gpPfJ0B3KrE4OQURwPi492LDjg8g&libraries=places"type="text/javascript"></script>
	 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- CUENTA LA CANTIDAD DE IMAGENES SLIDES CARGADAS, LE RESTA 1 PARA QUE LA PRIMERA SEA IGUAL A 0  -->
	<script>
			window.count={{$count}};
			window.markers = [];//array que tendra todos los marker de todos los mapas
			window.serv = 1 ; 
			window.carac = {{$counterCaracteristica}} ; 
			window.lc = {{$counterLc}} ; 
			console.log("count"+count);	
	</script>
	<script>
		$(document).ready(function(){

			initMap(0,0,0);

			insertVideoOnIframe(1);
			insertVideoOnIframe(2);

		});
	</script>
	<script>
		function eliminarLineasColectivo(idParameter){
			
			var c = confirm('¿Desea eliminar esta linea de colectivo?');

			if(c == true){

		
	    	 id = $("#lineasColectivoId"+idParameter).val();


	    	 $.ajax({
            headers:{
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		        data:{id:id},
		        url:"/eliminarImagen",
		        type:'post',
		        dataType:"json",
		        success:function(response){
		          
		        	$('#lc-li-'+lc+'').fadeOut(function(){
						$('#lc-li-'+lc+'').remove();

						lc--;

						if(lc==1){
							$("#remove-lc-btn").fadeOut();
						}
					});


		        }
		        });
			
				

			}

			
		}

		function agregarLineasColectivo(){
			lc++;
			if(lc>1){
				$("#remove-lc-btn").fadeIn();
			}
			$("#lineas-colectivo ul ").append('<li id="lc-li-'+lc+'"> <label for="lineasColectivos[]">Linea de coelctivo '+lc+' </label> <input type="text" name="lineasColectivos[]" class="caracteristicas form-control"> <p class="error" id="caracteristicaError"> Ingrese una caracteristica </p> </li>');


		}
	</script>
	<script>
		function eliminarCaracteristicas(){
			
			
			$('#carac-li-'+carac+'').fadeOut(function(){
				$('#carac-li-'+carac+'').remove();

				carac--;

				if(carac==1){
					$("#remove-carac-btn").fadeOut();
				}
			});

			
		}

		function agregarCaracteristicas(){
			carac++;
			if(carac>1){
				$("#remove-carac-btn").fadeIn();
			}
			$("#caracteristicas ul ").append('<li id="carac-li-'+carac+'"> <label for="servicios[]">Caracteristica '+carac+' </label> <input type="text" name="caracteristicas[]" class="caracteristicas form-control"> <p class="error" id="caracteristicaError"> Ingrese una caracteristica </p> </li>');


		}
	</script>
	<script>
		function eliminarServicios(){
			
			
			$('#serv-li-'+serv+'').fadeOut(function(){
				$('#serv-li-'+serv+'').remove();

				serv--;

				if(serv==1){
					$("#remove-serv-btn").fadeOut();
				}
			});

			
		}

		function agregarServicios(){
			serv++;
			if(serv>1){
				$("#remove-serv-btn").fadeIn();
			}
			$("#servicios ul ").append('<li id="serv-li-'+serv+'"> <label for="servicios[]">Servicio '+serv+' </label> <input type="text" name="servicios[]" class="servicios form-control"> <p class="error" id="servicioError"> Ingrese un servicio </p> </li>');


		}
	</script>
	<script>
      	function initMap(mapa_id='map',latitud,longitud) {



		  	// La locacion iniciliada
		  	var locacion = {lat: parseFloat($("#latitud").val()), lng: parseFloat($("#longitud").val())};
		  	console.log(locacion);
		  	// El mapa centrado en las coordenadas de inicializacion
		  	var map = new google.maps.Map(
			      document.getElementById('map'), {
			      	zoom: 10,
		      	 	center: locacion,
		      	 	streetViewControl:false,
		      	 	mapTypeControl:false
		      	 	});
		  	// The marker, positioned at Uluru
		  	var marker = new google.maps.Marker({position: locacion, map: map});

		  	//agrego un nuevo marquer a su mapa correspondiente con su id
			markers.push(marker);





  			//evento para elegir lugares
	 		google.maps.event.addListener(map, 'click', function(event) {
	 			console.log(map);
	    		placeMarker(map,event.latLng,mapa_id);
		  	});

		  	/******************CREACION DE INPUT PARA BUSCAR LUGARES***************************/
		 // Create the search box and link it to the UI element.
        var input = document.getElementById('search-box');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });



		


		 // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
         deleteMarkers(mapa_id);

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
             placeMarker(map,place.geometry.location,mapa_id)

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }

            getCoordinates(map,mapa_id);

          });
          map.fitBounds(bounds);
        });

        //getCoordinates(map,mapa_id);
			
		}//function init maps 


			//tomo las coordenadas de cada posicion de cada mapa
			function getCoordinates(map){
				$("#latitud").val(map.getCenter().lat());
				$("#longitud").val(map.getCenter().lng());
				/*alert();
	      	  	alert();*/


	      	  	/*console.log(map.getCenter().lat());

	      	  	console.log(map.getCenter().lng());*/
			}

			//funcion para fijar marcadores
		  	function placeMarker(map,location,mapa_id) {
		  		 
		  		 console.log('map');
		  		 
		  		//creo un nuevo marker 	
				var marker = new google.maps.Marker({
				  position: location, //posicion del marker pasado como parametro 
				  map: map // ese marker tendra el mapa pasado como parametro
				});


				//establezco un id al marker, este sera el id del mapa pasado como parametro
		  		marker.set("id", map.get("id"));
				console.log(map.get("id"));
		  		//centrar el mapa en la posicion
				map.setCenter(location);

				//tomo las coordenadas del mapa
				getCoordinates(map,mapa_id);

				//borro todos los marker con x id (que seran los marker del mapa x)
				deleteMarkers(marker.get("id"));

				//agrego un nuevo marquer a su mapa correspondiente con su id
				markers.push(marker);

				  

			}




	      // Deletes all markers in the array by removing references to them.
	      function deleteMarkers(id) {
	      	//recorro el array markers el cual tendra todos los markers de todos los mapas
	        for (var i = 0; i <markers.length; i++) {

	        	//busco los marker a eliminar
				if(markers[i]['id']==id){
					markers[i].setMap(null);
				}


	        }//for
	        
	      }//function delete marker




		

		//id_locacion lo usaremos para borrar la locacion de la base de datos
		/*function eliminarLocacion(id_locacion,mapa_id){
		$("#locacion"+mapa_id+"").remove();

		

		console.log(y);
	}*/
    </script>
	<script>
		 function insertVideoOnIframe(id){

		

			var linkYoutube = $("input[name=video_"+id+"]").val();
			match = validateYoutubeLink(linkYoutube); 
			if ( match != false) {        
		       
		                
	            $('#video-preview-'+id).attr('src', 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1&enablejsapi=1');

	            $('#video-preview-'+id).attr('height', '500px');
	        
	            $('#video-preview-'+id).attr('width', '100%');

	            $('#video-preview-'+id).css('margin-bottom', '42px');
	        
	            $("#video"+id+"Error").fadeOut();
			
				imgPresentacionValidated = true;
		        
		         
	    	}else{
	            $('#video-preview-'+id).attr('src', '');
	            $('#video-preview-'+id).attr('height', '0px');
	            $('#video-preview-'+id).attr('width', '0px');
	            $('#video-preview-'+id).css('margin-bottom', '0');
	    	}
		};
	</script>
	<script>
		function createProjectValidate(){

			tinyMCE.triggerSave();

			var titulo = $("input[name=titulo]").val();
			var descripcion = $("#descripcion").val();
			var imgPresentacion = $("input[name=img_presentacion]").val();
			var imgSlide1 = $("input#file-input-1").val();
			var imgSlide2 = $("input#file-input-2").val();

			var tituloValidated = false;
			var descripcionValidated = false;
			var imgPresentacionValidated = false;
			var imgSlide1Validated = false;
			var imgSlide2Validated = false;

			console.log($(document).find(("input[name=img_presentacion]")));



			if(titulo.length == 0){
				$("#tituloError").fadeIn();
			}else{
				$("#tituloError").fadeOut();
				tituloValidated=true;
			}


			if(descripcion.length == 0){
				$("#descripcionError").fadeIn();
			}else{
				$("#descripcionError").fadeOut();
				descripcionValidated=true;
			}

			if($("input[name=img_presentacion]").length){
				alert('imgPresentacion');
				if(imgPresentacion.length == 0){
					$("#imgPresentacion-error").fadeIn();
					console.log('ERROR');
				}else{
					$("#imgPresentacion-error").fadeOut();
					console.log('VALIDADO');
					imgPresentacionValidated=true;
				}
			}else{
				imgPresentacionValidated = true;
			}

			if($("input#file-input-1").length){
				
				if(imgSlide1.length == 0){
					$("#imgSlide1-error").fadeIn();
				}else{
					$("#imgSlide1-error").fadeOut();
					imgSlide1Validated=true;
				}

			}else{
				imgSlide1Validated = true;
			}
		
			if($("input#file-input-2").length){

				if(imgSlide2.length == 0){
					$("#imgSlide2-error").fadeIn();
				}else{
					$("#imgSlide2-error").fadeOut();
					imgSlide2Validated=true;
				}

			}else{
				imgSlide2Validated = true;
			}



			if(tituloValidated==true&&descripcionValidated==true&&imgSlide1Validated==true&&imgSlide2Validated==true&&imgPresentacionValidated==true){
				//alert("enviado");
				setTimeout(function(){
					$('form').submit();
				},1000);

				


			}
		

		}
	</script>
	


	@stop