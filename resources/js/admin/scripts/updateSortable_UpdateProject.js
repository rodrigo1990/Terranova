  $( function() {
	    $( "#file-input-cont" ).sortable({
	    	update: function( event, ui ) {
	    		
	    		var id = ui.item[0].id.split('-');

	    		id = id[2];


	    		$("#orderSlides #"+id+" input").val(ui.item.index());


	    		$( "#file-input-cont li" ).each(function(index,item){

	    			if(item.className.indexOf('img-exist')>=0){
	    				
		    			id = $(this).attr('id').split('-');

		    			id = id[2];

		    			//console.log(id+"="+index);

		    			$("#orderSlides #"+id+" input").val(index);
	    			
	    			}else{

	    				$(this).attr('id','item_'+index);

	    				$(this).find('input').attr('name','img['+index+']');
	    			
	    			}

	    		});

	    	}

	    });
	    $( "#file-input-cont" ).disableSelection();
	  } );