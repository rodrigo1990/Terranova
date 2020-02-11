$(document).on('change','.masterplan', function(){

			var id = ($(this).attr('id')=='presentacion') ? 'presentacion' : $(this).attr('id').match(/\d+/);
            
             var file = $(this).val();

             var name = file.replace(/^.*[\\\/]/, '');

             console.log(name);
            

            var file_size = $(this)[0].files[0].size;

           

            format = file.split('.').pop();

            if(format == "jpg" || format == "png" ||format == "JPG" || format == "PNG"){

          

        
           

            

        }else{
            alert("El archivo debe ser .pdf");

            $(this).val(null);
        }
        });