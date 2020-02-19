window.deleteItem = function(url){
	var c = confirm('¿Desea eliminar este proyecto?');

	if(c == true){
		preloader();
		window.location.href = url;
	}
}