$("#abrirMenu").click(function(){

		$("header .nav").removeClass('animated bounceOutRight');
		$("header .nav").addClass('animated bounceInRight');
		$("header .nav").css('opacity', 'unset');
		$("header .nav").css('transform', 'unset');
		$("header .nav").show();


});

$("#cerrarMenu").click(function(){
		$("header .nav").removeClass('animated bounceInRight');
		$("header .nav").addClass("animated bounceOutRight");


});


$("#xsMenu  li a").click(function(){
	$("#xsMenu").addClass("animated bounceOutRight");
});








