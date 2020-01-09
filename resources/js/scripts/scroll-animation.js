window.scrollAnimate = function(id,element){
	
	if($('#'+id+'').length){

		$('html,body').animate({ scrollTop:$('#'+id+'').offset().top-150  }, 'slow');

	}else{
		$(element).attr('href','/#'+id);

	}

}
