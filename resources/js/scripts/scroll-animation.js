window.scrollAnimate = function(id){
	$('html,body').animate({ scrollTop:$('#'+id+'').offset().top-100  }, 'slow');
}
