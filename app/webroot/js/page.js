//global var to set and remove home countdown timer
var intervals = [];

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
				$body.animate({ 'scrollTop': 0 });
			}
		},
		callback : function(url, $container, $content) {
			pageScripts();
		}
	}).data('smoothState');
};


function pageScripts(){

	var pageId = this.location.pathname.match(/(\/)((?:[A-z][A-z0-9_]*))(\/)((?:[A-z][A-z]+))/)[0].toLowerCase().trim();
	var path = window.location.pathname.split("/");
	var controller = path[1];
	var md = new MobileDetect(window.navigator.userAgent);
	var mobile = md.mobile();

	
	$(".header__nav-wrapper").stickyMenu({anchorElement : ".grid"});


	$('a[href*=#]:not([href=#])').click(function(event) {
		event.preventDefault();
		smoothScroll(this, location);
	});

	$(".header__hamburger-icon").toggleElement({"targetElem" : ".header__nav-wrapper"});
	$(".nav-bar__close-btn").toggleElement({"targetElem" : ".header__nav-wrapper"});


	console.log("pageId: " + pageId)

	if(pageId == '/pages/home'){
		intervals.push(runCameraFlashes(300));
		intervals.push(runCameraFlashes(500));
		intervals.push(setInterval(countdown, 1000));
		if(mobile == null){
			$('.home-bg-wrapper__image-bg').parallax({ "coeff" : 0.7 });
		}
	}else{
		for (var i = 0; i < intervals.length; i++) {
			clearInterval(intervals[i]);
		};
	}

	if(pageId == '/games/displaygame' && $(".main_game_image").length > 0){
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
				console.log("cancel: " + $(this).data("gameballid"));
				removeGameball($(this).data("gameballid"));
			});	
	}

	if(pageId == '/gameballs/mygameballs'){
		moveUserSelections(date);

		$(window).resize(function(){
			moveUserSelections(date);
		});
		
		playMode = true;
	}

	if(pageId == 'winningSpot'){
		playMode = true;
	}

	if(pageId == '/celebrities/profile'){
		checkForYTApi();

		if(mobile == null){
			$('.parallax--top-position').parallax({ "coeff" : 0.7 });
			$('.parallax--bg-position').parallax({ "coeff" : 0.7, "type" : "background-position" });
		}
	}


	if(pageId == '/games/confirmation'){
		checkForYTApi();

		if(mobile == null){
			$('.parallax--bg-position').parallax({ "coeff" : 0.7, "type" : "background-position" });
		}
	}

	if(pageId == '/pages/csk'){
		checkForYTApi();

		$(".js-fix-to-top").stickyMenu({anchorElement : ".js-fix-to-top__anchor"});
		
		if(mobile == null){
			$('.video-bg-wrapper').parallax({ "coeff" : 0.7 });
		}
	}

	if(pageId == '/partners/viewall'){
		checkForYTApi();

		$(".js-fix-to-top").stickyMenu({anchorElement : ".js-fix-to-top__anchor"});
		
		if(mobile == null){
			$('.video-bg-wrapper').parallax({ "coeff" : 0.7 });
		}
	}
}

function smoothScroll(elm, location){
	if (location.pathname.replace(/^\//,'') == elm.pathname.replace(/^\//,'') || location.hostname == elm.hostname) {
		var target = $(elm.hash);
		target = target.length ? target : $('[name=' + elm.hash.slice(1) +']');

		if (target.length) {
			$('html,body').stop().animate({
				scrollTop: target.offset().top
			}, 1000);
			return false;
		}
	}
};

function checkForYTApi(){
	if($("#youtube-api-script").length <= 0){
		var tag = document.createElement('script');
		tag.id = "youtube-api-script";
		tag.src = "//www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
	}
}
