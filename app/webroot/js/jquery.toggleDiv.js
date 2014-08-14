// The plugin code
(function($){
	$.fn.toggleElement = function(options){
		console.log("toggleElement");


		var $triggerElem = $(this);
	
		var defaults = {
			"targetElem": "none"
		};

		var opts = $.extend(defaults, options);
		
		return this.each(function(){
			console.log("click one");
			$triggerElem.click(onClick);
		});

		function onClick(){
			$(opts.targetElem).toggle();
		}
	};
})(jQuery);