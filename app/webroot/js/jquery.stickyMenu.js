// The plugin code
(function($){

	var defaults = {
		anchorElement : ".js-fix-to-top__anchor"
	}

	$.fn.stickyMenu = function(options){

		var options = $.extend({}, defaults, options);
		var $stickyMenuWrapper = $(this);
		var $anchor = $(options.anchorElement);
		var stickyMenuOffset = $stickyMenuWrapper.offset();

		$(window).scroll(function() {


			var anchorPosition = $anchor.position();

			if($(window).scrollTop() > stickyMenuOffset.top){
				$stickyMenuWrapper.css("position", "fixed");
				$stickyMenuWrapper.css("top", "0px");
			}else{
				$stickyMenuWrapper.css("position", "absolute");
				$stickyMenuWrapper.css("top", anchorPosition.top + "px");
			}
		})
	};
})(jQuery);