window.$ = window.jQuery = require('jquery');

require('./bootstrap');

require('./scripts/header-functions');

require('./scripts/manejoDeMenus');

require('./scripts/preloader');



if(document.getElementById('owl-1') || document.getElementById('owl-2')){
	require('../OwlCarousel2-2.3.4/dist/owl.carousel.min');

	require('./scripts/slider');
}



if(document.getElementById('testimonios')){
	require('./scripts/pagination');
	require('../youtube-video/js/grt-youtube-popup');
	
	require('./scripts/paginationImplementar');

	
	
}
