window.buscarProyectoSegunZona = function(){


        var zonaId = $(".buscador-container #zona").val();
        var estadoId = $(".buscador-container #estado").val();

        console.log(zonaId);
        console.log(estadoId);

        $(".buscador-container #proyecto").hide();
        $(".buscador-container #proyecto").parent().append('<div class="spinner-sm spinner-sm-1" id="status"> </div>');

            $.ajax({
                headers:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{zonaId:zonaId,estadoId:estadoId},
            url:'/buscarBarrioSegunZonaEstado',
            type:'post',
            dataType:"json",
            success:function(data){
            	console.log(data);
            	var l = null;
                $(".buscador-container #proyecto").empty();
                    for(var i in data) {    
                            
                            l = data[i].titulo.slice(1)

                            l = l.toUpperCase();

                            l = l + data[i].titulo;


                            $(".buscador-container #proyecto").append("<option value="+data[i].id+"> "+
                                data[i].titulo+"</option>");             
                        }

                $(".buscador-container #proyecto").append('<option value="null">Seleccione un proyecto</option>');



                $(".buscador-container #status").remove();


                $(".buscador-container #proyecto").show();

        





            }
            });

    }