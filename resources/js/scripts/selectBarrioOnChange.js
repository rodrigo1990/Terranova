window.buscarBarrioSegunZona = function(){


        var zonaId = $(".buscador-container #zona").val();
        console.log(zonaId);
        $(".buscador-container #barrio").hide();
        $(".buscador-container #barrio").parent().append('<div class="spinner-sm spinner-sm-1" id="status"> </div>');

            $.ajax({
                headers:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{zonaId:zonaId},
            url:'/buscarBarrioSegunZona',
            type:'post',
            dataType:"json",
            success:function(data){
            	console.log(data);
            	var l = null;
                $(".buscador-container #barrio").empty();
                    for(var i in data) {    
                            
                            l = data[i].titulo.slice(1)

                            l = l.toUpperCase();

                            l = l + data[i].titulo;


                            $(".buscador-container #barrio").append("<option value="+data[i].id+"> "+
                                data[i].titulo+"</option>");             
                        }

                $(".buscador-container #barrio").append('<option value="null">Seleccione un proyecto</option>');



                $(".buscador-container #status").remove();


                $(".buscador-container #barrio").show();

        





            }
            });

    }