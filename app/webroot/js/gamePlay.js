
$(document).ready(function() {
		
	HTMLImageElement.prototype.registerClick = registerClick;
	HTMLImageElement.prototype.findMouse = findMouse;

	document.getElementById("game_image").onclick = function(event) {
		game_image.registerClick(event);
	}

	document.getElementById("game_image").onmousemove = function(event) {
		game_image.findMouse(event);
	}
});



function registerClick(event) {

	var coords = calculateCoords(event);
	var imageX = coords[0];
	var imageY = coords[1];

	setSelection(event.pageX,event.pageY);

	var button = document.getElementById("submit_game_button");

	button.href = "registerSelection?x=" + imageX + "&y=" + imageY;

	document.getElementById("x_selection").innerHTML = imageX;
	document.getElementById("y_selection").innerHTML = imageY;

}

function calculateCoords(event){
	var defaultImage = document.getElementById('imageHidden')
	var currentElement = document.getElementById("game_image");;


	var imageX = 0;
	var imageY = 0;

	var previousWidth = defaultImage.width;
	var previousHeight = defaultImage.height;

	var totalOffsetX = 0;
	var totalOffsetY = 0;
				
	var widthRatio = currentElement.offsetWidth / previousWidth;
	var heightRatio = currentElement.offsetHeight / previousHeight;

	do {
		totalOffsetX += currentElement.offsetLeft;
		totalOffsetY += currentElement.offsetTop;
	} while (currentElement = currentElement.offsetParent)

	imageX = Math.round((event.pageX - totalOffsetX) / widthRatio,0);
	imageY = Math.round((event.pageY - totalOffsetY) / heightRatio,0);

	return [imageX, imageY];
}


function setSelection(x,y){

	var	width = 50;
	var iconOffset = width / 2;

	var crosshair=document.createElement("img");
	crosshair.src = "/cskplay/app/webroot/img/logo.png";
	crosshair.id = "single_crosshair";
	crosshair.style.pointerEvents = "none";
	crosshair.style.width = width + "px";
	crosshair.style.position ="absolute";
	crosshair.style.left = x - iconOffset + "px";
	crosshair.style.top = y - iconOffset + "px";

	var container = document.getElementById("main_grid");

	if(document.getElementById("single_crosshair")){
		var oldCrosshair = document.getElementById("single_crosshair");
		container.removeChild(oldCrosshair);
	}
	
	container.appendChild(crosshair);

}


function findMouse(event) {

	var coords = calculateCoords(event);
	var imageX = coords[0];
	var imageY = coords[1];

	document.getElementById("x_value").innerHTML=imageX;
	document.getElementById("y_value").innerHTML=imageY;
}
