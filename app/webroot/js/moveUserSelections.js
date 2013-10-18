function moveUserSelections() {
	var elems = document.getElementsByTagName('IMG'), i;

	var defaultImage = document.getElementById('imageHidden');
	var currentElement = document.getElementById('main_image');

	var previousWidth = 594;
	var previousHeight = 385;

	var totalOffsetX = 0;
	var totalOffsetY = 0;
				
	var widthRatio = currentElement.offsetWidth / previousWidth;
	var heightRatio = currentElement.offsetHeight / previousHeight;
	
	var	width = 15;
	var chrossHairOffset = width / 2;
	//var chrossHairOffset = 0;

	do {
		totalOffsetX += currentElement.offsetLeft;
		totalOffsetY += currentElement.offsetTop;
		
	} while (currentElement = currentElement.offsetParent)

	for(var i=0; i < elems.length; i++){
		var elemId = elems[i].id;

		if(elemId != null){
			var idText = elemId.substring(elemId.length - 8, elemId.length);
		}

		if( idText == 'selected') {
						
			var leftPx = elems[i].style.left;
			var topPx = elems[i].style.top;

			var left = leftPx.substr(0,leftPx.length -2);
			var top = topPx.substr(0,topPx.length -2);

			var imageX = Math.round((left * widthRatio) + totalOffsetX,0);
			var imageY = Math.round((top * heightRatio) + totalOffsetY,0);

			elems[i].style.left = imageX - chrossHairOffset + "px";
			elems[i].style.top = imageY -chrossHairOffset + "px";
		}
	}
}
