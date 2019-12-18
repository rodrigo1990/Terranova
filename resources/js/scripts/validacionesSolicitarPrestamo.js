    window.validarFormulario = function(){

            var nombre  = $("#formulario #nombre").val();
            var fecha  = $("#formulario #fecha").val();
            var email  = $("#formulario #email").val();
            var lugar  = $("#formulario #lugar").val();
            var telefono  = $("#formulario #telefono").val();
            var cantidad = $("#formulario #cantidad-invitados").val();
            var perfil_evento = $("#formulario #perfil-evento").val();
            var tipo_evento = $("#formulario #tipo-evento").val();
            var tipo_servicio = $("#formulario #tipo-servicio").val();
            var menu = $("#formulario input[name='menu']:checked").val();
            var consulta = $("#formulario #consulta").val();
            


            var nombreEstaValidado=false;
            
            var fechaEstaValidado=false;
            
            var emailEstaValidado = false;
            
            var lugarEstaValidado = false;

            var telefonoEstaValidado = false;

            var cantidadEstaValidado=false;

            var tipoEventoEstaValidado=false;

            var perfilEventoEstaValidado  =  false;

            var tipoServicioEstaValidado  =  false;

            var menuEventoEstaValidado=false;

            var emailValido=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;




            if(nombre.length==0){
                $("#formulario #nombre-error").fadeIn();
                nombreEstaValidado=false;
            }else{
                $("#formulario #nombre-error").fadeOut();
                nombreEstaValidado=true;
            }
            console.log('nombre ' +nombreEstaValidado);

            if(fecha.length==0){
                $("#formulario #fecha-error").fadeIn();
                fechaEstaValidado=false;
            }else{
                $("#formulario #fecha-error").fadeOut();
                fechaEstaValidado=true;
            }
            console.log('fecha ' +fechaEstaValidado);

            if(email.length==0||email.search(emailValido)){
                $("#formulario #email-error").fadeIn();
                emailEstaValidado=false;
            }else{
                $("#formulario #email-error").fadeOut();
                emailEstaValidado=true;
            }
            console.log('email ' + emailEstaValidado);

            if(lugar.length==0){
                $("#formulario #lugar-error").fadeIn();
                lugarEstaValidado=false;
            }else{
                $("#formulario #lugar-error").fadeOut();
                lugarEstaValidado=true;
            }
            console.log('lugar ' +lugarEstaValidado);

            if(telefono.length==0){
                $("#formulario #telefono-error").fadeIn();
                telefonoEstaValidado=false;
            }else{
                $("#formulario #telefono-error").fadeOut();
                telefonoEstaValidado=true;
            }
            console.log('telefono '+telefonoEstaValidado);

            if(cantidad.length>4 || cantidad.length==0){
                $("#formulario #cantidad-invitados-error").fadeIn();
                cantidadEstaValidado=false;
            }else{
                $("#formulario #cantidad-invitados-error").fadeOut();
                cantidadEstaValidado=true;
            }
            console.log('cantidad '+cantidadEstaValidado);
            
            if(tipo_evento==0){
                $("#formulario #tipo-evento-error").fadeIn();
                tipoEventoEstaValidado=false;
            }else{
                $("#formulario #tipo-evento-error").fadeOut();
                tipoEventoEstaValidado=true;
            }
            console.log('tipo evento ' +tipoEventoEstaValidado);

            if(tipo_servicio=="null"){
                $("#formulario #tipo-servicio-error").fadeIn();
                tipoServicioEstaValidado=false;
            }else{
                $("#formulario #tipo-servicio-error").fadeOut();
                tipoServicioEstaValidado=true;
            }
            console.log('tipo evento ' +tipoEventoEstaValidado);

            if(perfil_evento=="null"){
                $("#formulario #perfil-evento-error").fadeIn();
                perfilEventoEstaValidado=false;
            }else{
                $("#formulario #perfil-evento-error").fadeOut();
                perfilEventoEstaValidado=true;
            }
            console.log('tipo evento ' +perfil_evento);


            


          //  alert(menu);
            


            if(nombreEstaValidado==true&&fechaEstaValidado==true&&emailEstaValidado==true&&lugarEstaValidado==true&&telefonoEstaValidado==true&&tipoEventoEstaValidado==true&&tipoServicioEstaValidado==true&&perfilEventoEstaValidado==true){
                    $("body").append('<div id="preloader-mailing" ><div class="spinner-sm spinner-sm-1" id="status"> </div></div>');
                    $.ajax({
                        headers:{
                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                       
                       data: {nombre:nombre,fecha:fecha,email:email,lugar:lugar,telefono:telefono,cantidad:cantidad,tipo_evento:tipo_evento,tipo_servicio:tipo_servicio,perfil_evento:perfil_evento,menu:menu,consulta:consulta},
                       url:'enviarFormulario',
                       type:'post',
                        dataType:"json",
                       success: function(msg){

                            $('#preloader-mailing  #status').fadeOut(); // will first fade out the loading animation 
                            $('#preloader-mailing ').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 

                            $('body').delay(350).css({'overflow-y':'visible'});

                            alert("¡Email enviado con exito! Muchas gracias")

                           setTimeout(function(){
                            $("#preloader-mailing").remove(); 
                          },500);
                            
                        }
                     });
            }

            
            



        }

