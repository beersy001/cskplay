window.onload = function() {

	var pageId = document.title;

	$("#page_title_banner").show('slide',{direction:'right'},1000);

	$("#game_image_tab").click(function(){
		swapGameImage();
	}); 

	if(pageId == 'home'){
		runCameraFlashes(300);
		runCameraFlashes(500);
		var timer = setInterval(showRemaining, 1000);
	}

	if(pageId == 'accountAdmin'){
		moveUserSelections();
	}
};

window.onresize = function(event) {

	var pageId = document.title;

	if(pageId == 'home'){
		replaceContentInContainer();
	}

	if(pageId == 'accountAdmin'){
		moveUserSelections();
	}
};