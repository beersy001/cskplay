function slideSwitch(container) {

	var $active = $('#' + container + ' IMG.active');

	if( $active.length == 0 ){
		$active = $('#'+ container +' IMG:last');
	}

	var $next =  $active.next().length ? $active.next()
		: $('#'+ container +' IMG:first');

	$active.addClass('last-active');
		
	$next.css({opacity: 0.0})
		.addClass('active')
		.animate({opacity: 1.0}, 1500, function() {
			$active.removeClass('active last-active');
		});
}