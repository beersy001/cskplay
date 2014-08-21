//window onload events
window.onload = function() {
	pageScripts();

	var $body = $('html, body'); // Define jQuery collection 
	var content = $('#main').smoothState({
		prefetch: true,
		pageCacheSize: 5,
		development: true,
		onStart : {
			duration: 500,
			render: function (url, $container) {
				content.toggleAnimationClass('is-exiting');
				console.log("rendering");
				$body.animate({ 'scrollTop': 0 });
			}
		},
		onEnd : {
			duration: 0, // Duration of the animations, if any.
			render: function (url, $container, $content) {
				$body.css('cursor', 'auto');
				$body.find('a').css('cursor', 'auto');
				$container.html($content);
				pageScripts();
			}
		}
	}).data('smoothState');
};




function pageScripts(){
	var pageId = document.title;
	var path = window.location.pathname.split("/");
	var controller = path[2];
	var md = new MobileDetect(window.navigator.userAgent);
	var mobile = md.mobile();

	$(".header__hamburger-icon").toggleElement({"targetElem" : ".header__nav-wrapper"});
	$(".nav-bar__close-btn").toggleElement({"targetElem" : ".header__nav-wrapper"});


	changeActiveMenu( controller );

	if(pageId == 'home'){
		runCameraFlashes(300);
		runCameraFlashes(500);
		var timer = setInterval(countdown, 1000);
		if(mobile == null){
			$('.home-bg-wrapper__image-bg').parallax({ "coeff" : 0.7 });
		}
	}

	if(pageId == 'viewTeam'){
		teamAjaxRequest('details');
	}

	if(pageId == 'displayGame'){
		moveUserSelections(date);
		$(".crosshairs").css("display","none");

		$(window).resize(function(){
			moveUserSelections(date);
		});

		$( document )
			.on("click", ".main_game_image", function(event) {
				enterSelectMode();
			})
			.on("mousemove", ".main_game_image", function(event) {
				findMouse(event,date);
			})
			.on("click", "#loupe_image_container", function(event) {
				registerSelectClick(event,date);
				showLoupeTeamSlider(event,date);
			})
			.on("mousemove", "#loupe_image_container", function(event) {
				findMouseWithinLoupe(event,date);
			})
			.on("click", ".cancel-btn", function(event) {
				removeGameball($(this).data("gameballid"));
			});	
	}

	if(pageId == 'my gameballs'){
		moveUserSelections(date);
		playMode = true;
	}

	if(pageId == 'winningSpot'){
		playMode = true;
	}

	if(pageId == 'celebrityProfile'){
		if($("#youtube-api-script").length <= 0){
			var tag = document.createElement('script');
			tag.id = "youtube-api-script";
			tag.src = "//www.youtube.com/iframe_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		}

		if(mobile == null){
			$('.parallax--top-position').parallax({ "coeff" : 0.7 });
			$('.parallax--bg-position').parallax({ "coeff" : 0.7, "type" : "background-position" });
		}
	}

	if(pageId == 'csk'){
		if($("#youtube-api-script").length <= 0){
			var tag = document.createElement('script');
			tag.id = "youtube-api-script";
			tag.src = "//www.youtube.com/iframe_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		}
		
		if(mobile == null){
			$('.video-bg-wrapper').parallax({ "coeff" : 0.7 });
		}
	}
}