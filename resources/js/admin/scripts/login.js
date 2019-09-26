		
window.login = function(){
			var username = $("#username").val();
			var password = $("#password").val();

		
				$.ajax({
					headers: {
   					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  					},
				data:{username:username,password:password},
				url:'/admin/login',
				type:'post',
				dataType:"json",
				success:function(response){


					console.log(response);					
						


					if(response==true){
						 $("#login").fadeOut(function(){
					    $(".main").fadeIn();
					  });
						
						
					}else{
						//alertar("Usuario y/o contraseña invalidos");

						alert("Usuario y/o contraseña invalidos");
					}


				



				}//success
				});//ajax

		}