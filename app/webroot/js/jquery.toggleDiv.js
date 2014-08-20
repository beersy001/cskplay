// The plugin code
(function($){
	$.fn.toggleElement = function(options){

		var $triggerElem = $(this);
		var defaults = {
			"targetElem": "none"
		};

		var opts = $.extend(defaults, options);
		
		return this.each(function(){
			$triggerElem.click(onClick);
		});

		function onClick(){
			$(opts.targetElem).toggle();
		}
	};
})(jQuery);