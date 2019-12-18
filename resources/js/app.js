window.$ = window.jQuery = require('jquery');

require('./bootstrap');



if(document.getElementById('owl-1') || document.getElementById('owl-2')){
	require('../OwlCarousel2-2.3.4/dist/owl.carousel.min');

	require('./scripts/slider');
}
