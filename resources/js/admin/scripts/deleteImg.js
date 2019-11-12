window.deleteImg = function(id,tipo,seccion,operacion=''){
    var url;
    var c = confirm('¿Desea eliminar esta imagen?');


    if(c==true){


        switch(seccion){
            case 'testimonio':
                url='/admin/destroyImgTestimonio';
            break;
            case 'proyecto':
                url='/admin/destroyImgProyecto';
                count--;
                console.log(count);
                if(operacion=='update')
                    $("#orderSlides #"+id).remove();
            break;
            case 'novedad':
                url='/admin/destroyImgNovedad';
            break;
        }


        
        $.ajax({
            headers:{
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{id:id},
        url:url,
        type:'post',
        dataType:"json",
        success:function(response){
            if(response == true){
                $("#img-exist-"+id+"").fadeOut(function(){
                    $("#img-exist-"+id+"").remove();
                    
                    if(tipo=='presentacion'){
                        $("#newImgPresentacion").hide();
                        $("#newImgPresentacion").html('<div class="img-presentacion-input-cont center-block preview" id="preview-presentacion"> <span  class="btn btn-primary btn-file border-btn blue float-right" > IMAGEN DE PRESENTACIÓN <input name="img_presentacion" type="file" id="presentacion" class="added"> </span> <div id="file-result-presentacion" class="text-center"> <span id="file-img-presentacion"></span> </div> </div>') }
                        $("#newImgPresentacion").fadeIn();
                });

                if(seccion == 'proyecto' && operacion == 'update' && count == -1){
                    count++;
                    $("#file-input-cont").append('<li id="item_'+(count)+'" class="li-file-input"> <div class="preview" id="preview-'+(count)+'">  <span  class="btn btn-primary btn-file border-btn blue float-right" > SLIDE 1<input name="img['+(count)+']" type="file" id="file-input-1" class="added"> </span> <div id="file-result-'+(count)+'" class="file-result text-center"> <span id="file-img-'+(count)+'"></span> </div> </div><p class="error text-center" id="imgSlide1-error">Ingrese una imagen</p> </li>');     
                    count++;
                    $("#file-input-cont").append('<li id="item_'+(count)+'" class="li-file-input"> <div class="preview" id="preview-'+(count)+'">  <span  class="btn btn-primary btn-file border-btn blue float-right" > SLIDE 2<input name="img['+(count)+']" type="file" id="file-input-2" class="added"> </span> <div id="file-result-'+(count)+'" class="file-result text-center"> <span id="file-img-'+(count)+'"></span> </div> </div><p class="error text-center" id="imgSlide2-error">Ingrese una imagen</p></li>');
                }

            }//if
        }
        });
    }
}