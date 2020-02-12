@extends('Admin.layouts.iframe')
	@section('main')
	<section id="proyectos">
		<h1>PROYECTOS</h1>
		<p><i><span>*</span>Indica campos obligatorios</i></p>
		
		<br><br>
		<form action="/admin/createProyecto" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="container">
					
					<div class="row">
					<label for="titulo">Titulo <span>*</span></label>
					<input type="text" class="form-control" name="titulo">
					<p class="error" id="tituloError">
						Ingrese un titulo
					</p>
					</div>

					<br>
					<br>

					
					<div class="row">
					<label for="estado">ESTADO</label>
					<select name="estado" class="form-control" id="">
						@foreach($estados as $estado)
							<option value="{{$estado->id}}">{{$estado->descripcion}}</option>
						@endforeach
					</select>
					</div>
					

					<br>
					<br>					
					
					<div class="row">
					<label for="zona">ZONA</label>
					<select name="zona" class="form-control" id="">
						@foreach($zonas as $zona)
							<option value="{{$zona->id}}">{{$zona->descripcion}}</option>
						@endforeach
					</select>
					</div>
					

					<br>
					<br>
					
					<div class="row">
					
						<label for="descripcion">Descripción <span>*</span></label>
						<textarea class="tinyMCE"  name="descripcion" id="" cols="30" rows="10"></textarea>
						
						<p class="error" id="descripcionError">
							Ingrese una descripción
						</p>
					

					</div>
					
					<br><br>

					<div class="row">
					
						<label for="masterplan">Masterplan</label>
						<input type="file" name="masterplan" id="masterplan" class="masterplan form-control">
						
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
							<input type="text" name="estacion" id="estacion" class="form-control" placeholder="Ej: Estacion del tren B. Mitre">
						</div>
						<div id="lineas-colectivo" class="col-sm-12" style="margin-top:20px;">
							<h3>Lineas de colectivo</h3>
							<ul>
								<li>
									<label for="lineasColectivos[]">Linea de colectivo 1 </label>
									<input type="text" name="lineasColectivos[]" class="lineasColectivos form-control" placeholder="501 Astolfi - Pilar">
									
									<p class="error" id="lineasColectivosError">
										Ingrese una caracteristica
									</p>
								</li>
							</ul>


							<div class="col-lg-6 col-md-6 col-sm-6">
							
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
									
								<a style="display:none" id="remove-lc-btn" onClick="eliminarLineasColectivo()" class="small-btn red float-right" ><i class="fas fa-minus"></i></a>


								<a onClick="agregarLineasColectivo()" class="small-btn blue float-right margin-right-15"><i class="fas fa-plus"></i></a>
								
							</div>


						</div>
							
					
					</div>

					<br><br>

					<div class="row" id="caracteristicas">
						<h2 class="text-left" style="display:block;">CARACTERISTICAS</h2>
						<br>	
						<ul>
							<li>
								<label for="caracteristicas[]">Caracteristica 1 </label>
								<input type="text" name="caracteristicas[]" class="caracteristicas form-control">
								
								<p class="error" id="caracteristicaError">
									Ingrese una caracteristica
								</p>
							</li>
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
							<li>
								<label for="servicios[]">Servicio 1 </label>
								<input type="text" name="servicios[]" class="servicios form-control">
								
								<p class="error" id="servicioError">
									Ingrese un servicio
								</p>
							</li>
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
							<input type="hidden" id="latitud" name="latitud">
							<input type="hidden" id="longitud" name="longitud">
							<input id="search-box" type="text" class="form-control" placeholder="Escribí la dirección exacta">
							<div id="map" style="height:400px;width:100%"></div>
							<div class="error" id="coordenadas-error">Ingrese una ubicación en el mapa</div>

						</div>
					</div>
					<br><br>


					
					<div class="row">
						<h2 class="text-left" style="display:block;">VIDEOS</h2>
						<br>
						<div class="col-sm-12 video-group">
						
							<label for="video_1">VIDEO 1 </label>
							<input type="text" name="video_1" class="form-control" onchange="insertVideoOnIframe(1)">
							<input type="hidden" class="form-control" name="youTubeCode_1">
							<div class="error" id="linkYoutubeError1">Ingrese un video valido</div>

							<iframe id="video-preview-1" class="video-preview" type="text/html" height="0px" frameborder="0"  allowfullscreen></iframe>


							<label for="titulo_video_1">Titulo video 1 </label>
							<input type="text" name="titulo_video_1" class="form-control">
							<div class="error" id="tituloVideo1Error">Ingrese un titulo</div>
							

							<label for="descripcion_video_1">Descripcion video 1 </label>
							<textarea name="descripcion_video_1" class="form-control" rows="4" cols="100"></textarea>
							<div class="error" id="descripcionVideo1Error">Ingrese una descripción</div>
					

						</div>
						<div class="col-sm-12 video-group">
							
							<label for="video_2">VIDEO 2 </label>
							<input type="text" name="video_2" class="form-control" onchange="insertVideoOnIframe(2)">
							<input type="hidden" class="form-control" name="youTubeCode_2">
							<div class="error" id="linkYoutubeError2">Ingrese un video valido</div>

							<iframe id="video-preview-2" class="video-preview" height="0px" type="text/html" frameborder="0"  allowfullscreen></iframe>

							<label for="titulo_video_2">Titulo video 2 </label>
							<input type="text" name="titulo_video_2" class="form-control">
							<div class="error" id="tituloVideo2Error">Ingrese un titulo</div>

							<label for="descripcion_video_2">Descripcion video 2 </label>
							<textarea name="descripcion_video_2" class="form-control" rows="4" cols="100"></textarea>
							<div class="error" id="descripcionVideo2Error">Ingrese una descripción</div>
						</div>
					</div>
					<div class="row">
						<div  id="presentacion" class="row">
							<h2>IMAGEN DE PRESENTACIÓN <span>*</span></h2>

							<div class="img-presentacion-input-cont center-block preview" id="preview-presentacion">
								<span  class="btn btn-primary btn-file border-btn blue float-right" >
			                        IMAGEN DE PRESENTACIÓN 
			                     	<input name="img_presentacion" class="img" type="file" id="presentacion">
			                     </span>
			                     <div id="file-result-presentacion" class="text-center">
		                            <span id="file-img-presentacion"></span>
	            					</div>

	            			
							</div>
							<p class="error text-center" id="imgPresentacion-error">
	        					Ingrese una imagen
	        				</p>
						</div>
					</div>
					<br><br>
		 		<div class="row">
		 			<h2>SLIDER <span>*</span></h2>
					<ul class="flex" id="file-input-cont">

						<li id="item_1" class="li-file-input">
							
	                    	<div class="preview" id="preview-1">
	                    	
								<span  class="btn btn-primary btn-file border-btn blue float-right" >
			                        SLIDE 1 
			                     	<input name="img[0]" class="img" type="file" id="file-input-1">
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
			                      <input name="img[1]" class="img" type="file" id="file-input-2">
			                    </span>
			                     <div id="file-result-2" class="file-result text-center">
			                          <span id="file-img-2"></span>
		                    		</div>
	                    	</div>

	                    	<p class="error text-center" id="imgSlide2-error">
        					Ingrese una imagen
        					</p>
					
						</li>

					</ul>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6"></div>
					<div class="col-lg-6 col-md-6 col-sm-6">
									
						<a style="display:none" id="remove-esp-btn" onclick="eliminarImagenes()" class="small-btn red float-right"><i class="fas fa-minus"></i></a>


						<a onclick="agregarImagenes('create')" class="small-btn blue float-right margin-right-15"><i class="fas fa-plus"></i></a>
						
					</div>
				</div>
				

			</div>
			<br><br>
			<div class="row">
				<div class="container">
					<a onclick="createProjectValidate()" class="btn btn-primary btn-file border-btn bk-green float-right"><h3>ENVIAR</h3></a>	
				</div>
			</div>


		</form>
		</div>

		<br><br>
	</section>
		

	@stop
	

	@section('scripts')
 	  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkne1gpPfJ0B3KrE4OQURwPi492LDjg8g&libraries=places"
  type="text/javascript"></script>
 	 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- CUENTA ITEMS AGREGADO E ELIMINADOS EN SUS RESPECTOS ARCHIVOS -->
	<script>
		window.count=1;
		window.markers = [];//array que tendra todos los marker de todos los mapas
		window.serv = 1 ; 
		window.carac = 1 ; 
		window.lc = 1 ; 

	</script>
	<script>
		$(document).ready(function(){

			initMap(0,0,0);

		});
	</script>
	<script>
		function eliminarLineasColectivo(){
			
			
			$('#lc-li-'+lc+'').fadeOut(function(){
				$('#lc-li-'+lc+'').remove();

				lc--;

				if(lc==1){
					$("#remove-lc-btn").fadeOut();
				}
			});

			
		}

		function agregarLineasColectivo(){
			lc++;
			if(lc>1){
				$("#remove-lc-btn").fadeIn();
			}
			$("#lineas-colectivo ul ").append('<li id="lc-li-'+lc+'"> <label for="lineasColectivos[]">Linea de colectivo '+lc+' </label> <input type="text" name="lineasColectivos[]" class="caracteristicas form-control"> <p class="error" id="caracteristicaError"> Ingrese una caracteristica </p> </li>');


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
		  	var locacion = {lat: -34.491485, lng: -58.511086};
		  	// El mapa centrado en las coordenadas de inicializacion
		  	var map = new google.maps.Map(
			      document.getElementById('map'), {
			      	zoom: 10,
		      	 	center: locacion,
		      	 	streetViewControl:false,
		      	 	mapTypeControl:false
		      	 	});
		  	// The marker, positioned at Uluru
		  	//var marker = new google.maps.Marker({position: locacion, map: map});

		  	//agrego un nuevo marquer a su mapa correspondiente con su id
			//markers.push(marker);





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

				$("input[name=youTubeCode_"+id+"]").val(match[2]);
		        
		         
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

			var linkYoutube1 = $("input[name=video_1]").val();
			var tituloYoutube1 = $("input[name=titulo_video_1]").val();
			var descripcionYoutube1 = $("textarea[name=descripcion_video_1]").val();



			var linkYoutube2 = $("input[name=video_2]").val();
			var tituloYoutube2 = $("input[name=titulo_video_2]").val();
			var descripcionYoutube2 = $("textarea[name=descripcion_video_2]").val();

			var latitud = $("input[name=latitud]").val();
			var longitud = $("input[name=longitud]").val();



			var tituloValidated = false;
			
			var descripcionValidated = false;
			
			var imgPresentacionValidated = false;


			
			var imgSlide1Validated = false;
			
			var imgSlide2Validated = false;


			var video1Validated = false;
			var tituloVideo1Validated = false;
			var descripcionVideo1Validated = false; 

			var video2Validated = false;
			var tituloVideo2Validated = false;
			var descripcionVideo2Validated = false;


			var coordenadasValidated = false;



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


			if(imgPresentacion.length == 0){
				$("#imgPresentacion-error").fadeIn();
			}else{
				$("#imgPresentacion-error").fadeOut();
				imgPresentacionValidated=true;
			}

			if(imgSlide1.length == 0){
				$("#imgSlide1-error").fadeIn();
			}else{
				$("#imgSlide1-error").fadeOut();
				imgSlide1Validated=true;
			}

			if(imgSlide2.length == 0){
				$("#imgSlide2-error").fadeIn();
			}else{
				$("#imgSlide2-error").fadeOut();
				imgSlide2Validated=true;
			}


			if(latitud.length == 0 || longitud.length == 0){
				$("#coordenadas-error").fadeIn();
			}else{
				$("#coordenadas").fadeOut();
				coordenadasValidated=true;
			}

			if(linkYoutube1.length != 0){


				match1 = validateYoutubeLink(linkYoutube1); 
				
					if ( match1 != false) {        
				       
				                
			         	console.log('true');
			        
			            $("#linkYoutubeError1").fadeOut();
					
						video1Validated = true;

						$("input[name=youTubeCode_1]").val(match1[2]);
				        
				         
			    	}else{
			    		console.log('false');
		    			$("#linkYoutubeError1").fadeIn();
			      
			    	}


			   if(tituloYoutube1.length == 0){
					$("#tituloVideo1Error").fadeIn();
					tituloVideo1Validated = false;
				}else{
					$("#tituloVideo1Error").fadeOut();
					tituloVideo1Validated = true;
				}


				if(descripcionYoutube1.length == 0){
					$("#descripcionVideo1Error").fadeIn();
					descripcionVideo1Validated = false;
				}else{
					$("#descripcionVideo1Error").fadeOut();
					descripcionVideo1Validated = true;
				}


				

		    }else{
		    	video1Validated=true;
		    	tituloVideo1Validated = true;
		    	descripcionVideo1Validated = true;
		    }


		    if(linkYoutube2.length != 0){

			    match2 = validateYoutubeLink(linkYoutube2); 
					
					if ( match2 != false) {        
				       
				                
			         	console.log('true');
			        
			            $("#linkYoutubeError2").fadeOut();
					
						video2Validated = true;

						$("input[name=youTubeCode_2]").val(match2[2]);
				        
				         
			    	}else{
			    		console.log('false');
		    			$("#linkYoutubeError2").fadeIn();
			      
			    	}

			    if(tituloYoutube2.length == 0){
					$("#tituloVideo2Error").fadeIn();
					tituloVideo2Validated = false;
				}else{
					$("#tituloVideo2Error").fadeOut();
					tituloVideo2Validated = true;
				}

				if(descripcionYoutube2.length == 0){
					$("#descripcionVideo2Error").fadeIn();
					descripcionVideo2Validated = false;
				}else{
					$("#descripcionVideo2Error").fadeOut();
					descripcionVideo2Validated = true;
				}

		    }else{
		    	video2Validated=true;
		    	tituloVideo2Validated = true;
		    	descripcionVideo2Validated = true;	
		    }

			var k = $('.li-file-input').not('.li-file-input.ui-sortable-handle').length;
			var y = 0;
			var state = 0;
			//BORRO LAS INPUT FILE QUE NO TIENEN IMAGENES CARGADAS
			$( ".li-file-input" ).not('.li-file-input.ui-sortable-handle').each(function(index,item){
				y++;
				if($(this).find('input.added').val() == ''){
					$(this).hide(function(){
						$(this).remove();
					});
				}

				if(y == k){
					state=1 
					console.log(state);
				}
			});//each

			//REEMPLAZO TODAS LAS CLAVES DEL ARRAY SEGUN SU INDICE
			setTimeout(function(){
				if(state == 1){
					$( ".li-file-input" ).each(function(index,item){
						var resp = $(this).find('.added').attr('name','img['+index+']');
		    			console.log(resp);		
					});
				}
			},1000);
			
			console.log(tituloValidated);
			console.log(descripcionValidated);
			console.log(imgSlide1Validated);
			console.log(imgSlide2Validated);
			console.log(imgPresentacionValidated);
			console.log(video1Validated);
			console.log(tituloVideo1Validated);
			console.log(descripcionVideo1Validated);
			console.log(video2Validated);
			console.log(tituloVideo2Validated);
			console.log(descripcionVideo2Validated);

			if(tituloValidated==true&&descripcionValidated==true&&imgSlide1Validated==true&&imgSlide2Validated==true&&imgPresentacionValidated==true&&video1Validated==true&&tituloVideo1Validated==true&&descripcionVideo1Validated==true&&video2Validated==true&&tituloVideo2Validated==true&&descripcionVideo2Validated==true&&coordenadasValidated==true){
			
			setTimeout(function(){
				$('form').submit();
			},1000);

				


			}

		}
	</script>
		


	



	


	@stop