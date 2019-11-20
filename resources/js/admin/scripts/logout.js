window.logout = function(){
				var id=0;
				$.ajax({
					headers: {
	   					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  					},
					url:'/admin/logout',
					type:'post',
					dataType:"json",
					success:function(response){
						console.log(response);
						if(response==true){
							 $(".main").fadeOut(function(){
							    $("#login").fadeIn();
							  });
						}


					



					}//success
				});//ajax
}