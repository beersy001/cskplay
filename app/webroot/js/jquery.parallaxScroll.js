// The plugin code
(function($){
	$.fn.parallax = function(options){
		var $$ = $(this);
	
		offset = $$.offset();
		var defaults = {
			"start": 0,
			"stop": offset.top + $$.height(),
			"coeff": 0.95,
			"type": "top"
		};

		var opts = $.extend(defaults, options);
		var i = 0;
		return this.each(function(){

			$(window).bind('scroll mousewheel', function(event) {

				windowTop = $(window).scrollTop();
				if((windowTop >= opts.start) && (windowTop <= opts.stop)) {
					newCoord = windowTop * opts.coeff;
					switch(opts.type){
						case "top":
							$$.css({"top" : -parseFloat(newCoord) + "px"});
							break;
						case "background-position":
							$$.css({"background-position" : "50% " + -parseFloat(newCoord) + "px"});
							break;
					}
				}
			});
		});
	};
})(jQuery);