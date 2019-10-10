	$(document).on('change','input.added', function(){

			var id = ($(this).attr('id')=='presentacion') ? 'presentacion' : $(this).attr('id').match(/\d+/);
            
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

	                readURL(this,"#preview-"+id);
 
                }else{



                	$("#file-img-"+id+"").html(name);

	                $("#file-result-"+id+"").fadeIn();

	                readURL(this,"#preview-"+id);
                }

            }

        }else{
            alert("El archivo debe ser .jpg o .png");
        }
        });