// The plugin code
;(function($){
	$.fn.parallax = function(options){
		var $$ = $(this);
	
		offset = $$.offset();
		var defaults = {
			"start": offset.top,
			"stop": offset.top + $$.height(),
			"coeff": 0.95,
			"type": "top"
		};

		var opts = $.extend(defaults, options);
		
		return this.each(function(){

			$(window).bind('scroll mousewheel', function(event) {

				var scrollTop = $(window).scrollTop();
				var scrollBottom = $(window).scrollTop() + $(window).height();
				var windowHeight = scrollBottom - scrollTop;



				if((scrollBottom >= opts.start) && (scrollTop <= opts.stop)) {
					
					newCoord = scrollTop * opts.coeff;

					switch(opts.type){
						case "top":
							$$.css({"top" : parseFloat(newCoord) + "px"});
							break;
						case "background-position":

							var imageSrc = $$.css("background-image").replace(/url\((['"])?(.*?)\1\)/gi, '$2').split(',')[0];
       						
       						var image = new Image();
							image.src = imageSrc;

							var width = image.width;
							var height = image.height;
							var aspectRatio = width / height;
							var divWidth = $$.width();
							var divHeight = $$.height();
							var imageHeight = divWidth / aspectRatio;
							var scrollNumber = scrollBottom - offset.top;

							coeff = imageHeight >= windowHeight + divHeight ? 0.9 : imageHeight / (windowHeight + divHeight);
							newCoord = (divHeight + scrollNumber) * coeff;

							$$.css({"background-position" : "50% " + parseFloat(newCoord) + "px"});
							break;
					}
				}
			});
		});
	};
})(jQuery);