window.eliminarImagenes = function(){
	console.log('#li-file-input-'+count+'');
			
	$('#li-file-input-'+count+'').hide(function(){
		$('#li-file-input-'+count+'').remove();

		count--;

		if(count==2){
			$("#remove-esp-btn").hide();
		}
	});
}