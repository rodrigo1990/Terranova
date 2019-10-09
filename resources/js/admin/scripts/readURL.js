window.readURL = function(input,id) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            
	            reader.onload = function (e) {
	                $(id).css('background', 'url('+e.target.result+')');
	            }
	            
	            reader.readAsDataURL(input.files[0]);
	        }
	    }