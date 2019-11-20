window.$ = window.jQuery = require('jquery');
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
require('./scripts/readURL');
require('./scripts/resetInputFile');


if(document.getElementById('proyectos')){
require('./scripts/updateSortable_CreateProject');
require('./scripts/updateSortable_UpdateProject');
}


if(document.getElementById('testimonios')){
	require('./scripts/validateYoutubeLink');	
}
