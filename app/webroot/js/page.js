window.onload = function() {

	var pageId = document.title;

	$("#page_title_banner").show('slide',{direction:'right'},1000);
	var timer = setInterval(showRemaining, 1000);

	if(pageId == 'home'){
		//replaceContentInContainer();
		runCameraFlashes(300);
		runCameraFlashes(500);
	}
};

window.onresize = function(event) {

	var pageId = document.title;

	if(pageId == 'home'){
		replaceContentInContainer();
	}
};