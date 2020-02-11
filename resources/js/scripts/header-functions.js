$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();

    if(scroll==0){
    	$("header").removeClass("animated slideInDown");

        

    }else{

        $("header #logo-btn img").attr('src','img/logo-blue.svg');


        if(!$("header .nav").hasClass('bounceInRight'))
            $("header").addClass("animated slideInDown");

        $("header").addClass("addBkground");

   
        
    }
    // Do something
});