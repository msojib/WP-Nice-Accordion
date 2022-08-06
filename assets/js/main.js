(function($){  
	"use strict";

	//for slider
	if ($('.slider-style').length){
		$(".slider-style").each(function() {
		    var options = $(this).data('carousel-options');
		    $(this).owlCarousel(options); 
		}); 
	} 

  //for button
  	if ($(".logo-style h3 a, .logo-list-style h3 a" ).length){
	  $(".logo-style h3 a, .logo-list-style h3 a").on({
	      mouseenter: function(){                        
	        var btnColor = $(this).data('onhovercolor');
	        $(this).css('color', btnColor);
	      },
	      mouseleave: function(){            
	        var btnHoverColor = $(this).data('onleavecolor');            
	        $(this).css('color', btnHoverColor);   
	      }      
	  }, this); 
	} 
})(jQuery);
