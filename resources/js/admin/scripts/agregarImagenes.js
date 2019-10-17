window.agregarImagenes = function(operacion){
				count++;
				console.log(count);
				console.log('<li id="li-file-input-'+count+'');
				if(count>2){
					$("#remove-esp-btn").fadeIn();
				}
					if(operacion == 'create')
						$("#file-input-cont").append('<li id="item_'+(count+1)+'" class="li-file-input"> <div class="preview" id="preview-'+(count+1)+'"> <a onclick="eliminarImagenes()" class="removeBtn text-center center-block"> <i class="fas fa-times-circle"></i> </a> <span  class="btn btn-primary btn-file border-btn blue float-right" > SLIDE '+(count+1)+'<input name="img['+count+']" type="file" id="file-input-'+(count+1)+'" class="added"> </span> <div id="file-result-'+(count+1)+'" class="file-result text-center"> <span id="file-img-'+(count+1)+'"></span> </div> </div> </li>');
					else
						$("#file-input-cont").append('<li id="item_'+(count+1)+'" class="li-file-input"> <div class="preview" id="preview-'+(count+1)+'"> <a onclick="eliminarImagenes()" class="removeBtn text-center center-block"> <i class="fas fa-times-circle"></i> </a> <span  class="btn btn-primary btn-file border-btn blue float-right" > SLIDE '+(count+1)+'<input name="img['+(count+1)+']" type="file" id="file-input-'+(count+1)+'" class="added"> </span> <div id="file-result-'+(count+1)+'" class="file-result text-center"> <span id="file-img-'+(count+1)+'"></span> </div> </div> </li>');						

			}
