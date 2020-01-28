window.$ = window.jQuery = require('jquery');

require('./bootstrap');

require('./scripts/header-functions');

require('./scripts/manejoDeMenus');

require('./scripts/preloader');

require('./scripts/scroll-animation');

require('./scripts/validacionesSolicitarPrestamo');

/**DETECAR ID EN URL*/
$(document).ready(function() { 
    var elem =  window.location.hash.replace('#', '');
    console.log(elem);
    if(elem) {
         scrollAnimate(elem, null);
    }
});


if(document.getElementById('owl-1') || document.getElementById('owl-2')){
	require('../OwlCarousel2-2.3.4/dist/owl.carousel.min');

	require('./scripts/slider');
}



if(document.getElementById('testimonios')){
	require('./scripts/pagination');
	require('../doesdev-jquery-video-lightning-06aa1a3/dist/index.js');
	
	require('./scripts/paginationImplementar');

	
	
}
