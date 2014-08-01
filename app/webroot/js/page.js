window.onload = function() {

	var pageId = document.title;
	var path = window.location.pathname.split("/");
	var controller = path[2];
	changeActiveMenu( controller );

	if(pageId == 'home'){
		runCameraFlashes(300);
		runCameraFlashes(500);
		var timer = setInterval(countdown, 1000);
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
};