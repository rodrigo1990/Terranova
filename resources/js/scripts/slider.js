 $('#owl-1').owlCarousel({
    loop:true,
    margin:0,
    autoplay:true,
    autoplayTimeout:8000,
    nav:false,
    dots:true,
    items:1,
    responsive:{
        0:{
            items:1
        },
        1200:{
            items:1
        }
    }
});


$('#owl-2').owlCarousel({
    loop:true,
    margin:50,
    autoplay:false,
    autoplayTimeout:2000,
    nav:false,
    dots:false,
    items:3,
    responsive:{
        0:{
            items:2
        },
        850:{
            items:2
        },
        1200:{
            items:3
        }
    }
});

