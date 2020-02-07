window.buscarProyectos = function(){


        var zonaId = $(".buscador-container #zona").val();
        var estadoId = $(".buscador-container #estado").val();
        var proyectoId = $(".buscador-container #proyecto").val();

        console.log(zonaId);
        console.log(estadoId);
        console.log(proyectoId);

        $(".buscador-container #barrio").hide();
        $(".buscador-container #barrio").parent().append('<div class="spinner-sm spinner-sm-1" id="status"> </div>');

            $.ajax({
                headers:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{zonaId:zonaId,estadoId:estadoId,proyectoId:proyectoId},
            url:'/buscarProyectos',
            type:'post',
            dataType:"json",
            success:function(data){
            	console.log(data);
            	var l = null;
                $(".buscador-container #result").empty();
                    for(var i in data) {    
                             
                    }


        





            }
            });

    }