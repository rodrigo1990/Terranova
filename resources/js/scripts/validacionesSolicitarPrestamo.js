    window.validarFormulario = function(){

            var nombre  = $("#contacto #nombre").val();
            var email  = $("#contacto #email").val();
            var telefono  = $("#contacto #telefono").val();
            var consulta = $("#contacto #consulta").val();
            


            var nombreEstaValidado=false;
            
            
            var emailEstaValidado = false;
            

            var telefonoEstaValidado = false;



            var emailValido=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;




            if(nombre.length==0){
                $("#contacto #nombre-error").fadeIn();
                nombreEstaValidado=false;
            }else{
                $("#contacto #nombre-error").fadeOut();
                nombreEstaValidado=true;
            }
            console.log('nombre ' +nombreEstaValidado);

         

            if(email.length==0||email.search(emailValido)){
                $("#contacto #email-error").fadeIn();
                emailEstaValidado=false;
            }else{
                $("#contacto #email-error").fadeOut();
                emailEstaValidado=true;
            }
            console.log('email ' + emailEstaValidado);

         

            if(telefono.length==0){
                $("#contacto #telefono-error").fadeIn();
                telefonoEstaValidado=false;
            }else{
                $("#contacto #telefono-error").fadeOut();
                telefonoEstaValidado=true;
            }
            console.log('telefono '+telefonoEstaValidado);




                


          //  alert(menu);
            


            if(nombreEstaValidado==true&&emailEstaValidado==true&&telefonoEstaValidado==true){
                    $("body").append('<div id="preloaderBkground"> <div id="preloader"> <svg version="1.1" id="L2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"> <circle fill="none" stroke="#7d9f45 " stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="48"/> <line fill="none" stroke-linecap="round" stroke="#7d9f45 " stroke-width="4" stroke-miterlimit="10" x1="50" y1="50" x2="85" y2="50.5"> <animateTransform attributeName="transform"dur="2s"type="rotate"from="0 50 50"to="360 50 50"repeatCount="indefinite" /> </line> <line fill="none" stroke-linecap="round" stroke="#7d9f45 " stroke-width="4" stroke-miterlimit="10" x1="50" y1="50" x2="49.5" y2="74"> <animateTransform attributeName="transform"dur="15s"type="rotate"from="0 50 50"to="360 50 50"repeatCount="indefinite" /> </line> </svg> </div> </div>');
                     $.ajax({
                        headers:{
                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                       
                       data: {nombre:nombre,email:email,telefono:telefono,consulta:consulta},
                       url:'enviarFormulario',
                       type:'post',
                        dataType:"json",
                       success: function(msg){

                            $('#preloaderBkground #preloader').fadeOut(); // will first fade out the loading animation 
                            $('#preloaderBkground ').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 

                            $('body').delay(350).css({'overflow-y':'visible'});

                            alert("¡Email enviado con exito! Muchas gracias")

                           setTimeout(function(){
                            $("#preloader-mailing").remove(); 
                          },500);
                            
                        }
                     });
            }

            
            



        }

