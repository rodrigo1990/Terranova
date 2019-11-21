window.validateYoutubeLink = function(linkYoutube){
	console.log(linkYoutube);
			if (linkYoutube != undefined || linkYoutube != '') {        
		        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
		        var match = linkYoutube.match(regExp);
		        if (match && match[2].length == 11) {
		        	console.log(match);
		            return match;
		        
		        } else {
		            return false;
		        }
	    	}
		}