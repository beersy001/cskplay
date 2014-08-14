window.onload = function() {

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
	}

	if(pageId == 'my gameballs'){
		moveUserSelections(date);
		playMode = true;
	}

	if(pageId == 'winningSpot'){
		playMode = true;
	}

	if(pageId == 'celebrityProfile'){
		if(mobile == null){
			$('.parallax--top-position').parallax({ "coeff" : 0.7 });
			$('.parallax--bg-position').parallax({ "coeff" : 0.7, "type" : "background-position" });
		}
		
		

	}

	if(pageId == 'csk'){
		if(mobile == null){
			$('.video-bg-wrapper').parallax({ "coeff" : 0.7 });
		}
	}

};