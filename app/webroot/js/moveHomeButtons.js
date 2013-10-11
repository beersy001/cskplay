window.onload = function() {	
	replaceContentInContainer();

	$("#page_title_banner").show('slide',{direction:'right'},1000);
	
	runCameraFlashes(300);
	runCameraFlashes(500);
	

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
	var padding = screenHeight - 175;

	homeButtons.style.top = top + "px";
	bodyPadding.style.paddingBottom = padding + "px";
	
}


function runCameraFlashes(delay){

	setInterval(function(){

		var randomFlashId = Math.floor(Math.random() * 24) + 1;
		var count = 0;
		var flashElement = document.getElementById("flash" + randomFlashId);

		flashElement.style.display = "none";
		
		var intervalId = setInterval(function(){

			if(count < 2){
				if(flashElement.style.display == "none"){
					flashElement.style.display = "block";
				} else{
					flashElement.style.display = "none";
				}
				count++;
			}else{
				flashElement.style.display = "none";
				clearInterval(intervalId);
			}
		},200);
	},delay);
}
