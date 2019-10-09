window.deleteImg = function(id,tipo,seccion){
    
    var url;

    switch(seccion){
        case 'testimonio':
            url='/admin/destroyImgTestimonio';
        break;
        case 'proyecto':
            url='/admin/destroyImgProyecto';
        break;
    }

    var c = confirm('¿Desea eliminar esta imagen?');

    if(c==true){
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
                                    $("#newImgPresentacion").html('<div class="img-presentacion-input-cont center-block"> <span  class="btn btn-primary btn-file border-btn blue float-right" > IMAGEN DE PRESENTACIÓN <input name="img_presentacion" type="file" id="presentacion" class="added"> </span> <div id="file-result-presentacion" class="text-center"> <span id="file-img-presentacion"></span> </div>') }
                                    $("#newImgPresentacion").fadeIn();
                            });
                        }
                    }
                    });
                }
			}