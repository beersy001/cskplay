function replaceContentInContainer() {

	var url = location.pathname;

	var homeButtons = document.getElementById('home_buttons');
	var countdown = document.getElementById('countdown');
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
		var buttonsTop = screenHeight - 260;
		var countdownTop = screenHeight - 190;
	}
	var padding = screenHeight - 165;

	homeButtons.style.top = buttonsTop + "px";
	countdown.style.top = countdownTop + "px";
	bodyPadding.style.paddingBottom = padding + "px";
	
}

