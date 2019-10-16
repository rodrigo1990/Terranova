window.eliminarImagenes = function(){
	console.log('#item_'+count+'');
			
	$('#item_'+count+'').hide(function(){
		$('#item_'+count+'').remove();

		count--;

		if(count==2){
			$("#item_").hide();
		}
	});
}