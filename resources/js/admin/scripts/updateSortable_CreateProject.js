 $( function() {
	    $( "#file-input-cont" ).sortable({
	    	update: function( event, ui ) {
	    		
	    		//console.log(ui.item.index());

	    		$( "#file-input-cont li" ).each(function(index){

	    			$(this).attr('id','item_'+index);

	    			$(this).find('input').attr('name','img['+index+']');

	    		});

	    	}
	    });
	    $( "#file-input-cont" ).disableSelection();
	  } );