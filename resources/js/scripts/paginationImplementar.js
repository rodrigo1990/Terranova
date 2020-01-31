$(function() {

	  (function(name) {
	    
	    var container = $('#pagination-' + name);
	    
	    var sources = function () {

	      var result = testimonios;

	      return result;
	    
	    }();

	    var options = {

	      dataSource: sources,

	      pageSize: 6,

	      callback: function (response, pagination) {

	        window.console && console.log(response, pagination);

	        var dataHtml = '';

	        $.each(response, function (index, item) {
	    		console.log(item);
	          dataHtml += '<li><div class="text-center"> <div> <p class="title primary-color">' + item.titulo.toUpperCase()  +


	           '	</p> </div><img src=" https://img.youtube.com/vi/'+item.link_youtube+'/sddefault.jpg " alt="" width="280px"><br><a data-video-id="'+item.link_youtube+'" class="btn video-link"><i class="fab fa-youtube"></i> VER</a></div></li>'; });


	            dataHtml += ''; container.prev().html(dataHtml);
	      }
	    };


	    container.addHook('beforeInit', function () {
	      window.console && console.log('beforeInit...');
	    });

	    container.pagination(options);

	    container.addHook('beforePageOnClick', function () {
	    	$(document).ready(function(){

		//$(".btn").grtyoutube();
		videoLightning({settings: {autoplay: false, color: "white"}, element: ".video-link"});
		});
	      window.console && console.log('beforePageOnClick...');


	    });
	  })('demo');
	})