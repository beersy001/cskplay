function moveUserSelections(month) {

	var allElems = $("img, span");
	var chrossHairOffset = 7.5;
	var gameImages = $('.game_image');

	var gameImage = $("#mainImage");
	var gameImageId = gameImage.attr('id');



		var selectionImages = [];

			for(var n=0; n < allElems.length; n++){

				var elemId = allElems[n].id;

				if(elemId != null){

					var idSplit = elemId.split('_');
					
					if( (idSplit[0] == 'span' || idSplit[0] == 'selected' || idSplit[0] == 'unselected') && idSplit[3] == "loupe" ){
						selectionImages.push(allElems[n]);
					}
					if( (idSplit[0] == 'span' || idSplit[0] == 'selected' || idSplit[0] == 'unselected') && idSplit[3] == "normal" ){
						selectionImages.push(allElems[n]);
					}	
				}
			}

			var defaultImage = document.getElementById('hidden_image')
			var previousWidth = defaultImage.width;
			var previousHeight = defaultImage.height;

			for(var j=0; j < selectionImages.length; j++){

					if(selectionImages[j].id.split('_')[3] == "normal"){

						var heightRatio = gameImage.width() / previousWidth;
						var widthRatio = gameImage.height() / previousHeight;

						gameImage.width()
					
						var leftPx = selectionImages[j].style.left;
						var topPx = selectionImages[j].style.top;


						var left = leftPx.substr(0,leftPx.length -2);
						var top = topPx.substr(0,topPx.length -2);

						var imageX = Math.round((left * widthRatio) ,0);
						var imageY = Math.round((top * heightRatio) ,0);

						selectionImages[j].style.left = imageX - chrossHairOffset + "px";
						selectionImages[j].style.top = imageY - chrossHairOffset + "px";
					}

				//}
			}
		//}
	//}
}