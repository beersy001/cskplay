window.onload=function() {
	replaceContentInContainer();
};


window.onresize = function(event) {
 	replaceContentInContainer();

};


function replaceContentInContainer() {
	var elems = document.getElementsByTagName('*'), i;

	var defaultImage = document.getElementById('imageHidden');
	var currentElement = document.getElementById('game_image');


	var previousWidth = 2880;
	var previousHeight = 1800;

	var totalOffsetX = 0;
	var totalOffsetY = 0;
				
	var widthRatio = currentElement.offsetWidth / previousWidth;
	var heightRatio = currentElement.offsetHeight / previousHeight;
	
	var	width = 50;
	var chrossHairOffset = 50 / 2;

	do {
		totalOffsetX += currentElement.offsetLeft;
		totalOffsetY += currentElement.offsetTop;
		
	} while (currentElement = currentElement.offsetParent)


	for (i in elems) {

		if((' ' + elems[i].className + ' ').indexOf('crosshair') > -1) {
			
			var leftPx = elems[i].style.left;
			var topPx = elems[i].style.top;

			var left = leftPx.substr(0,leftPx.length -2);
			var top = topPx.substr(0,topPx.length -2);

			console.log('left: ' + left);
			console.log('top : ' + top);

			var imageX = Math.round((left * widthRatio) + totalOffsetX,0);
			var imageY = Math.round((top * heightRatio) + totalOffsetY,0);

			elems[i].style.left = imageX - chrossHairOffset + "px";
			elems[i].style.top = imageY -chrossHairOffset + "px";
		}
	}
}
