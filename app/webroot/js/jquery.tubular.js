var player;

(function ($, window) {

	// defaults
	var defaults = {
		ratio: 16/9, // usually either 4/3 or 16/9 -- tweak as needed
		videoId: 'ZCAnLxRvNNc', // toy robot in space is a good default, no?
		mute: true,
		repeat: true,
		autoPlay: true,
		resize: true,
		fullscreen: true,
		wrapperZIndex: 99,
		playButtonClass: 'tubular-play',
		pauseButtonClass: 'tubular-pause',
		muteButtonClass: 'tubular-mute',
		volumeUpClass: 'tubular-volume-up',
		volumeDownClass: 'tubular-volume-down',
		increaseVolumeBy: 10,
		start: 0,
		id: '0',
		controls: 0,
		showinfo: 0
	};
 
	// methods
	var tubular = function(node, options) { // should be called on the wrapper div

		var options = $.extend({}, defaults, options),
			$body = $('body') // cache body node
			$node = $(node); // cache wrapper node

		if(options.fullscreen){
			options.width = $(window).width();
		}else{
			options.width = $(node).width();
		}

		// remove container when refreshing a jquery.SmoothState cached page
		if($("#tubular-container").length > 0){
			$("#tubular-container").remove();
		}

		var tubularContainer = '<div class="video-bg-wrapper__video-wrapper" id="tubular-container" style="overflow: hidden; width: 100%; height: 100%"><div id="tubular-player" class="video-wrapper__video"></div></div>';

		$node.prepend(tubularContainer);
		$node.css({position: 'relative'});

		//check to see if a player has already been created
		//(meaning that the onYouTubeIframeAPIReady event has already been fired. )
		if($(player).length > 0){
			newPlayer();
		}


		function newPlayer(){
			player = new YT.Player('tubular-player', {
				width: options.width,
				height: Math.ceil(options.width / options.ratio),
				videoId: options.videoId,
				playerVars: {
					controls: 0,
					showinfo: 0,
					rel: 0,
					modestbranding: 1,
					wmode: 'transparent'
				},
				events: {
					'onReady': onPlayerReady,
					'onStateChange': onPlayerStateChange
				}
			});
		}
	
		window.onYouTubeIframeAPIReady = function() {
			newPlayer();
		}


		window.onPlayerReady = function(e) {
			if (options.resize) resize();
			if (options.mute) e.target.mute();
			e.target.seekTo(options.start);
			if (options.autoPlay)  e.target.playVideo();
		}

		window.onPlayerStateChange = function(state) {
			if (state.data === 0 && options.repeat) { // video ended and repeat option is set true
				player.seekTo(options.start); // restart
			}

			if(state.data === 1){
			}
		}

		// resize handler updates width, height and offset of player after resize/init
		var resize = function() {

			
			
			var pWidth, // player width, to be defined
				pHeight, // player height, tbd
				width,
				height,
				$tubularPlayer = $('#tubular-player');

			if(options.fullscreen){
				width = $(window).width();
				height = $(window).height();
			}else{
				width = $(node).width();
				height = $(node).height();
			}

			// when screen aspect ratio differs from video, video must center and underlay one dimension

			if (width / options.ratio < height) { // if new video height < window height (gap underneath)
				pWidth = Math.ceil(height * options.ratio); // get new player width
				$tubularPlayer.width(pWidth).height(height).css({left: (width - pWidth) / 2, top: 0}); // player width is greater, offset left; reset top
			} else { // new video width < window width (gap to right)
				pHeight = Math.ceil(width / options.ratio); // get new player height
				$tubularPlayer.width(width).height(pHeight).css({left: 0, top: (height - pHeight) / 2}); // player height is greater, offset top; reset left
			}
			
		}

		// events
		$(window).on('resize.tubular', function() {
			resize();
		})

		$('body').on('click','.' + options.playButtonClass, function(e) { // play button
			e.preventDefault();
			player.playVideo();
		}).on('click', '.' + options.pauseButtonClass, function(e) { // pause button
			e.preventDefault();
			player.pauseVideo();
		}).on('click', '.' + options.muteButtonClass, function(e) { // mute button
			e.preventDefault();
			(player.isMuted()) ? player.unMute() : player.mute();
		}).on('click', '.' + options.volumeDownClass, function(e) { // volume down button
			e.preventDefault();
			var currentVolume = player.getVolume();
			if (currentVolume < options.increaseVolumeBy) currentVolume = options.increaseVolumeBy;
			player.setVolume(currentVolume - options.increaseVolumeBy);
		}).on('click', '.' + options.volumeUpClass, function(e) { // volume up button
			e.preventDefault();
			if (player.isMuted()) player.unMute(); // if mute is on, unmute
			var currentVolume = player.getVolume();
			if (currentVolume > 100 - options.increaseVolumeBy) currentVolume = 100 - options.increaseVolumeBy;
			player.setVolume(currentVolume + options.increaseVolumeBy);
		})
	}

	// create plugin

	$.fn.tubular = function (options) {
		tubular(this, options);
	}

})(jQuery, window);