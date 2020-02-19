window.$ = window.jQuery = require('jquery');

require('./scripts/preloader');

preloader();

require('../bootstrap');

require('./scripts/login');

require('./scripts/logout');

require('./scripts/tinymce');

require('./scripts/tinymceImplement');


require('./scripts/agregarImagenes');
require('./scripts/deleteImg');
require('./scripts/eliminarImagenes');
//require('./scripts/inputDinamicFileInput');
require('./scripts/inputFileChange');
require('./scripts/masterplanChange');
require('./scripts/readURL');
require('./scripts/resetInputFile');

require('./scripts/deleteItem');


if(document.getElementById('proyectos')){
require('./scripts/updateSortable_CreateProject');
require('./scripts/updateSortable_UpdateProject');
}


if(document.getElementById('testimonios') || document.getElementById('proyectos')){
	require('./scripts/validateYoutubeLink');	
}

