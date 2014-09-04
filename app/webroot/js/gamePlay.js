$(window).load(function() {
	selectionId = $("#selections-form").data("count");
});


var frontView = "front view";
var rearView = "rear view";
var permanentlyShowGameBalls = false;
var tempHideGameBalls = false;
var loupeContainerId = "#loupe_image_container";
var mainContainerId = "#game-img-wrapper";

var playMode = true;
var viewMode = "none";
var compertitionMode = true;

var previousSelection = 0;
var numberOfBallsPlayed = 0;
var allGameballs = [];
var selectionId = 0;




function addGameballToArray(gameball){

	for (var i = 0; i < allGameballs.length; i++) {
		if(allGameballs[i].trueX == gameball.trueX && allGameballs[i].trueY == gameball.trueY){
			return false;
		}
	};

	allGameballs.push(gameball);
	return true;
}

function removeGameball(gameballId){

	//for (var i = 0; i < 30.length; i++) {
		//if(allGameballs[i].id == gameballId){

			$("#input-row--" + gameballId).remove();
			$("#single_crosshair_" + gameballId).remove();
			$("#loupe_crosshair_" + gameballId).remove();

			calculateDiscount();

			numberOfBallsPlayed--;
			previousSelection--;
			return true;
		//};
	//};
}

function calculateDiscount(){
	var price = 0;

	var priceFields = $(".price-input");

	for (var i = 1; i <= priceFields.length; i++) {

		if(i % 3 == 0){
			priceFields[i-1].value = "free";
		}else{
			priceFields[i-1].value = "£1";
			price++;
		}
	};

	$("#total-price").html("£" + price);
}


function registerSelectClick(event,date) {

	var loupeContainer = document.getElementById('loupe_image_container');

	var imageX = 0;
	var imageY = 0;
	
	var totalOffsetX = 0;
	var totalOffsetY = 0;		

	do {
		totalOffsetX += loupeContainer.offsetLeft;
		totalOffsetY += loupeContainer.offsetTop;
	} while (loupeContainer = loupeContainer.offsetParent)

	var imageX = Math.round((event.pageX - totalOffsetX),0);
	var imageY = Math.round((event.pageY - totalOffsetY),0);
	
	var coords = calculateScaledCoords(imageX,imageY,date);
	var screenX = coords[0];
	var screenY = coords[1];

	var gameball = {
		id: selectionId,
		trueX: imageX,
		trueY: imageY,
		screenX: screenX,
		screenY: screenY,
		loupeContainerId: loupeContainerId,
		loupeCrosshairId: "loupe_crosshair_" + selectionId,
		mainContainerId: mainContainerId,
		mainCrosshairId: "single_crosshair_" + selectionId
	};
	
	if(addGameballToArray(gameball)){

		$("#selections-form__blank-input").remove();
		
		setSelection(gameball, "loupe");
		setSelection(gameball, "main");

		addgameballToScreen(gameball);

		calculateDiscount();

		previousSelection = selectionId;
		selectionId++;
		numberOfBallsPlayed++;
	}
}




function calculateCoords(event,date){
	var defaultImage = document.getElementById('hidden_image');
	var currentElement = document.getElementById('mainImage');

	var imageX = 0;
	var imageY = 0;

	var previousWidth = defaultImage.width;

	var totalOffsetX = 0;
	var totalOffsetY = 0;
				
	var aspectRatio = currentElement.offsetWidth / previousWidth;

	do {
		totalOffsetX += currentElement.offsetLeft;
		totalOffsetY += currentElement.offsetTop;
	} while (currentElement = currentElement.offsetParent)

	imageX = Math.round((event.pageX - totalOffsetX) / aspectRatio,0);
	imageY = Math.round((event.pageY - totalOffsetY) / aspectRatio,0);

	return [imageX, imageY];
}


function calculateScaledCoords(x,y,date){
	var defaultImage = document.getElementById('hidden_image')
	var currentElement = document.getElementById('mainImage');
	var previousWidth = defaultImage.width;
	var previousHeight = defaultImage.height;		
	var aspectRatio = currentElement.offsetWidth / previousWidth;
	
	var imageX = Math.round((x * aspectRatio),2);
	var imageY = Math.round((y * aspectRatio),2);

	return [imageX, imageY];
}


/**
 * Creates crosshairs in the correct containers at the supplied X and Y coords
 * @param {Object} gameball (contains all the information regarding a gameball)
 * @returns {null}
 * @public
 */
function setSelection(gameball, type){

	var	width = 18;
	var iconOffset = width / 2;

	if (type == "loupe") {
		var crosshairId = gameball.loupeCrosshairId;
		var containerId = gameball.loupeContainerId;
		var xCoord = gameball.trueX;
		var yCoord = gameball.trueY;
		var bespokeClass = "crosshair--loupe";
	}else{
		var crosshairId = gameball.mainCrosshairId;
		var containerId = gameball.mainContainerId;
		var xCoord = gameball.screenX;
		var yCoord = gameball.screenY;
		var bespokeClass = "crosshair--main";
	};

	var crosshair = document.createElement("img");
	crosshair.src = "/img/logo_orange.png";
	crosshair.id = crosshairId;
	crosshair.className = "crosshair--auto crosshair " + bespokeClass;
	crosshair.style.pointerEvents = "none";
	crosshair.style.width = width + "px";
	crosshair.style.position ="absolute";
	crosshair.style.left = xCoord - iconOffset + "px";
	crosshair.style.top = yCoord - iconOffset + "px";
	crosshair.style.zIndex = 3;
	$(crosshair).attr("data-x", gameball.trueX).attr("data-y", gameball.trueY);

	$(containerId).append(crosshair);
}


function findMouse(event,date) {
		
	if(viewMode != "loupe"){
		hideLoupeTeamSlider();
		$("#loupe").css("display","none");
		$(".game_image").css("cursor","crosshair");

		$("#game_mode_display").html("view mode");
		$("#game_mode_description").html("left click to select. right click to zoom");
	}
	var coords = calculateCoords(event,date);
	var imageX = coords[0];
	var imageY = coords[1];
	
	$("#loupe_x_value").html = imageX;
	$("#loupe_y_value").html = imageY

	$("#loupe").css("left", event.pageX - 100 + 'px');
	$("#loupe").css("top", event.pageY - 100 + 'px');
	
	var loupeX = imageX - 100;
	var loupeY = imageY - 100;
	
	$("#loupe_image_container").css("left", '-' + loupeX + 'px');
	$("#loupe_image_container").css("top", '-' + loupeY + 'px');
}

function findMouseWithinLoupe(event,date) {

	$("#loupe_coords").show();
	viewMode = "select";

	$("#game_mode_display").html("select mode");
	$("#game_mode_description").html("left click to select ball location. right click to enter zoom");


	var currentElement = document.getElementById('loupe_image_container');

	var imageX = 0;
	var imageY = 0;
	
	var totalOffsetX = 0;
	var totalOffsetY = 0;		

	do {
		totalOffsetX += currentElement.offsetLeft;
		totalOffsetY += currentElement.offsetTop;
	} while (currentElement = currentElement.offsetParent)

	imageX = Math.round((event.pageX - totalOffsetX),0);
	imageY = Math.round((event.pageY - totalOffsetY),0);

	document.getElementById("loupe_x_value").innerHTML=imageX;
	document.getElementById("loupe_y_value").innerHTML=imageY
	
	var loupeX = imageX - 100;
	var loupeY = imageY - 100;
}



function toggleInLayImageIn(){
	$("#game_image_main_inlay").show('slide',{direction:'left'},400);
};

function toggleInLayImageOut(){
	$("#game_image_main_inlay").hide('slide',{direction:'left'},200);
};

function swapGameImage(){
	if(document.getElementById("mainImage").style.display != "none"){

		playMode = false;
		document.getElementById("game_image_main_inlay").src = "/img/gameImages/" + date + "/front_small.jpg";
		document.getElementById("mainImage").style.display = "none";
		document.getElementById("game_image_alt").style.display = "inline";
		$( "#toggle_selection_view_button" ).css( "color", "rgb(89,89,91)");

		$( ".crosshair" ).toggle()

		if(permanentlyShowGameBalls == true && tempHideGameBalls == false){
			
			$( ".crosshair" ).toggle();
			tempHideGameBalls = true;
		}
	}else{
		playMode = true;
		document.getElementById("game_image_main_inlay").src = "/img/gameImages/" + date + "/rear_small.jpg";
		document.getElementById("mainImage").style.display = "inline";
		document.getElementById("game_image_alt").style.display = "none";

		
		$( ".crosshair" ).toggle()


		if(permanentlyShowGameBalls == true && tempHideGameBalls == true){
			
			$( ".crosshair" ).toggle();
			tempHideGameBalls = false;
		}
	}
}

function changeSelectionIcon(elem,date){
	var rawId = elem.id.substring(elem.id.length - 4, 0);
	document.getElementById('unselected_' + rawId + '_' + date + '_normal').style.display = 'none';
	document.getElementById('selected_' + rawId + '_' + date + '_normal').style.display = 'block';
	document.getElementById('selected_' + rawId + '_' + date + '_normal').style.zIndex = '4';
}

function changeSelectionIconBack(elem,date){
	var rawId = elem.id.substring(elem.id.length - 4, 0);
	document.getElementById('unselected_' + rawId + '_' + date + '_normal').style.display = 'block';
	document.getElementById('selected_' + rawId + '_' + date + '_normal').style.display = 'none';
	document.getElementById('selected_' + rawId + '_' + date + '_normal').style.zIndex = '3';
}

function showOverlay(){
	if(playMode == true){
			$( ".crosshair" ).toggle();
	}
}

function hideOvelay(){
	if(playMode == true){
		if(permanentlyShowGameBalls == false){
			$( ".crosshair" ).toggle();
		}
	}
}

/************************************************************************
 *		Toggle gameballs on and off									*
 ************************************************************************/
function toggleGameBalls(){
	if(playMode == true){
		if($(".crosshairs" ).css( "display") == "none"){
			$( ".crosshairs" ).css( "display", "block" );
			document.getElementById("toggle_selection_view_button").innerHTML = "hide gameballs";
			permanentlyShowGameBalls = true;
		}else{
			$( ".crosshairs" ).css( "display", "none" );
			document.getElementById("toggle_selection_view_button").innerHTML = "show gameballs";
			permanentlyShowGameBalls = false;
		}
	}
}

/************************************************************************
 *		Toggle submit mode on and off										*
 ************************************************************************/
function toggleLoupe(){

	if(playMode == true){

		if( viewMode == "select" || viewMode == "none" ){

			hideLoupeTeamSlider();
		
			$("#loupe").show();
			$("#loupe").css("pointer-events","none");

			$(".game_image").css("cursor","none");
			$("#loupe_coords").hide();
			$("#game_mode_description").html("left click to select. right click to exit zoom");

			viewMode = "loupe";
			
		} else if(viewMode == "loupe"){

			hideLoupeTeamSlider();
			
			$("#loupe").css("pointer-events","auto");
			$("#loupe").hide();
			$(".game_image").css("cursor","crosshair");
			
			viewMode = "none";

			$("#game_mode_description").html("left click to select. right click to zoom");
		}
	}
	return false;
}

function removeLoupe(){
	if(playMode == true){

		if(viewMode == "loupe"){
			
			$("#loupe").css("pointer-events","auto");
			$("#loupe").hide();
			$(".game_image").css("cursor","crosshair");

			hideLoupeTeamSlider();
			
			viewMode = "none";
			$("#game_mode_description").html("left click to select. right click to zoom");
		}
	}
	return false;
}

function enterSelectMode() {
	viewMode = "select";
	$("#loupe").css("pointer-events","auto");
	$("#loupe").css("display", "block");
	$("#loupe").css("cursor","crosshair");
	$(".game_image").css("cursor","crosshair");

}


function showLoupeTeamSlider(event,date){

	var coords = calculateCoords(event,date);
	var imageX = coords[0];
	var fullWidth = document.getElementById('hidden_image').width;

	if( imageX > (fullWidth / 2) ){

		$("#loupe_teams_slider").removeClass("right");
		$("#loupe_teams_slider").addClass("left");

	}else if( imageX < (fullWidth / 2) ){

		$("#loupe_teams_slider").removeClass("left");
		$("#loupe_teams_slider").addClass("right");
	}
}

function hideLoupeTeamSlider(){

	$("#loupe_teams_slider").removeClass("right");
	$("#loupe_teams_slider").removeClass("left");
}



function addgameballToScreen(gameball){

	var $form = $("#selections-form");
	var $formUL = $form.children("ul");
	
	var inputRow = document.createElement("li");
	inputRow.id = "input-row--" + gameball.id;

	$formUL.append(inputRow);

	var xInput = document.createElement("input");
	xInput.name = "Selection[" + gameball.id + "][x]";
	xInput.id = gameball.id + "_x_input";
	xInput.value = gameball.trueX;
	xInput.readOnly = "readonly";

	var yInput = document.createElement("input");
	yInput.name = "Selection[" + gameball.id + "][y]";
	yInput.id = gameball.id + "_y_input";
	yInput.value = gameball.trueY;
	yInput.readOnly = "readonly";

	var priceInput = document.createElement("input");
	priceInput.id = gameball.id + "_price";
	priceInput.className = "price-input"
	priceInput.value = "£1";
	priceInput.readOnly = "readonly";

	var cancelSpan = document.createElement("i")
	cancelSpan.className = "cancel-btn fa fa-times helper--font-color";
	cancelSpan.id = gameball.id + "_cancel-btn";
	$(cancelSpan).attr("data-gameballid", gameball.id)

	inputRow.appendChild(xInput);
	inputRow.appendChild(yInput);
	inputRow.appendChild(priceInput);
	inputRow.appendChild(cancelSpan);
}

function removeAllGameballs(){
	$(".crosshair--auto").remove();
}

function moveUserSelections(month) {

	var crosshairs = $(".crosshair--main");
	var crossHairOffset = 7.5;
	var gameImage = $("#mainImage");
	var defaultImage = document.getElementById('hidden_image')
	var previousWidth = defaultImage.width;
	var aspectRatio = gameImage.width() / previousWidth;
	
	for(var j=0; j < crosshairs.length; j++){

		var left = $(crosshairs[j]).attr("data-x");
		var top = $(crosshairs[j]).attr("data-y");

		var imageX = Math.round((left * aspectRatio) ,0);
		var imageY = Math.round((top * aspectRatio) ,0);

		crosshairs[j].style.left = imageX - crossHairOffset + "px";
		crosshairs[j].style.top = imageY - crossHairOffset + "px";
	}
}