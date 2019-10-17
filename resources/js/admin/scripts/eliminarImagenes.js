window.eliminarImagenes = function(){
	console.log('#item_'+(count+1)+'');
			
	$('#item_'+(count+1)+'').hide(function(){
		$('#item_'+(count+1)+'').remove();

		count--;

		if(count==2){
			$("#item_").hide();
		}
	});
}