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

		rePositionMenu();	

		$( window ).scroll(function() {
			rePositionMenu();			
		})

		function rePositionMenu(){
			var anchorPosition = $anchor.position();			

			if($(window).scrollTop() > stickyMenuOffset.top && !$stickyMenuWrapper.hasClass( "nav-wrapper--fixed" )){

				$stickyMenuWrapper.addClass( "nav-wrapper--fixed" );
				$stickyMenuWrapper.removeClass( "nav-wrapper--absolute" );
				$stickyMenuWrapper.css("top", "0px");
				//$(".nav-wrapper__img-logo, .nav-wrapper__text-logo").slideToggle();

			}else if($(window).scrollTop() <= stickyMenuOffset.top && !$stickyMenuWrapper.hasClass( "nav-wrapper--absolute" )){

				$stickyMenuWrapper.addClass( "nav-wrapper--absolute" );
				$stickyMenuWrapper.removeClass( "nav-wrapper--fixed" );
				$stickyMenuWrapper.css("top", anchorPosition.top + "px");
				//$(".nav-wrapper__img-logo, .nav-wrapper__text-logo").slideToggle();

			}	
		}
	};
})(jQuery);