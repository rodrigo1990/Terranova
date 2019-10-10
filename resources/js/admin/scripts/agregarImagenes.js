window.agregarImagenes = function(){
				count++;
				console.log(count);
				console.log('<li id="li-file-input-'+count+'');
				if(count>2){
					$("#remove-esp-btn").fadeIn();
				}
					$("#file-input-cont").append('<li id="li-file-input-'+count+'" class="li-file-input"> <div class="preview" id="preview-'+count+'"> <a onclick="eliminarImagenes()" class="removeBtn text-center center-block"> <i class="fas fa-times-circle"></i> </a> <span  class="btn btn-primary btn-file border-btn blue float-right" > SLIDE '+count+'<input name="img['+count+']" type="file" id="file-input-'+count+'" class="added"> </span> <div id="file-result-'+count+'" class="file-result text-center"> <span id="file-img-'+count+'"></span> </div> </div> </li>');


			}
