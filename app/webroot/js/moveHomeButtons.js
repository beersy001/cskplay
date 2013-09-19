window.onload = function() {
	replaceContentInContainer();
};


window.onresize = function(event) {
 	replaceContentInContainer();

};


function replaceContentInContainer() {

	var url = location.pathname;

	var homeButtons = document.getElementById('home_buttons');
	var bodyPadding = document.getElementById('home_padding');

	var screenHeight = window.innerHeight;
	var screenWidth = window.innerWidth;

	//change the position of the play now and view demo buttons for the login page
	if(url.substring(url.length -11, url.length) == 'users/login'){
		var top = screenHeight - 175;
		if (screenHeight <= 800) {
			homeButtons.style.left = 50 + "px";
		}
	} else {
		var top = screenHeight - 100;
	}
	var padding = screenHeight;

	homeButtons.style.top = top + "px";
	bodyPadding.style.paddingBottom = padding + "px";
	
}
