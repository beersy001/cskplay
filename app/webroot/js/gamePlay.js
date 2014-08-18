var frontView = "front view";
var rearView = "rear view";
var permanentlyShowGameBalls = false;
var tempHideGameBalls = false;
var loupeContainerId = "#loupe_image_container";
var mainContainerId = "#game-img-wrapper";

var playMode = true;
var viewMode = "none";
var compertitionMode = true;

var selectionId = 0;
var previousSelection = 0;
var numberOfBallsPlayed = 0;


function registerSelectClick(event,date) {

	var loupeContainer = document.getElementById('loupe_image_container');

	console.log("loupe click");

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
	
	addgameball(gameball);

	previousSelection = selectionId;
	selectionId++;
	numberOfBallsPlayed++;

	updateNumberOfBallsPlayed();
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

	console.log(gameball);

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
	crosshair.src = "/" + rootDir + "/app/webroot/img/logo_orange.png";
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
		document.getElementById("game_image_main_inlay").src = "/" + rootDir + "/img/gameImages/" + date + "/front_small.jpg";
		document.getElementById("mainImage").style.display = "none";
		document.getElementById("game_image_alt").style.display = "inline";
		$( "#toggle_selection_view_button" ).css( "color", "rgb(89,89,91)");

	if(document.contains(document.getElementById("single_crosshair"))){
			document.getElementById("single_crosshair").style.display = "none";
		}
		if(permanentlyShowGameBalls == true && tempHideGameBalls == false){
			$( ".crosshairs" ).css( "display", "none" );
			tempHideGameBalls = true;
		}
	}else{
		playMode = true;
		document.getElementById("game_image_main_inlay").src = "/" + rootDir + "/img/gameImages/" + date + "/rear_small.jpg";
		document.getElementById("mainImage").style.display = "inline";
		document.getElementById("game_image_alt").style.display = "none";
		if(playMode == true){
			$( "#toggle_selection_view_button" ).css( "color", "rgb(255,255,255)");
		}
		if(document.contains(document.getElementById("single_crosshair"))){
			document.getElementById("single_crosshair").style.display = "block";
		}
		if(permanentlyShowGameBalls == true && tempHideGameBalls == true){
			$( ".crosshairs" ).css( "display", "block" );
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
		$( ".crosshairs" ).css( "display", "block" );
	}
}

function hideOvelay(){
	if(playMode == true){
		if(permanentlyShowGameBalls == false){
			$( ".crosshairs" ).css( "display", "none" );
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
function removeGameball(){

	$( "#single_crosshair_" + previousSelection).remove();
	$( "#loupe_crosshair_" + previousSelection).remove();
	$( "#" + previousSelection + "_input_row" ).remove();

	numberOfBallsPlayed--;
	selectionId--;
	previousSelection--;

	updateNumberOfBallsPlayed();
}

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

		$("#loupe_teams_slider").css("left", "-250px");
		$("#loupe_teams_slider").css("padding-right", "110px");
		$("#loupe_teams_slider").css("padding-left", "10px");

	}else if( imageX < (fullWidth / 2) ){

		$("#loupe_teams_slider").css("right", "-250px");
		$("#loupe_teams_slider").css("padding-left", "110px");
		$("#loupe_teams_slider").css("padding-right", "10px");

	}
}

function hideLoupeTeamSlider(){

	if( $("#loupe_teams_slider").css("left") < "100px" ){
		$("#loupe_teams_slider").css("left", "100px");
	}else if( $("#loupe_teams_slider").css("right") < "100px" ){
		$("#loupe_teams_slider").css("right", "100px");
	}
}

function toggleTabs(){
	console.log("toggleTabs");
	if( $("#game_sidebar_competition").css("left") == "0px" ){

		$("#game_sidebar_competition").css("left","-9999px");
		$("#game_sidebar_practice").css("left", "0px");
		$("#right_tab").css("background","rgb(64,64,65)");
		$("#left_tab").css("background","rgb(89,89,91)");

		ajaxFetchPractice("201402");

	}else{
		$("#game_sidebar_competition").css("left","0px");
		$("#game_sidebar_practice").css("left", "-9999px");
		$("#right_tab").css("background","rgb(89,89,91)");
		$("#left_tab").css("background","rgb(64,64,65)");

		ajaxFetchCurrentCompetition();		
	}

	permanentlyShowGameBalls = false;
	tempHideGameBalls = false;

	playMode = true;
	compertitionMode = true;
}

function toggleCompAndPracticeMode(){

	if( compertitionMode == true ){
		compertitionMode = false;
		console.log(date);
	}else{
		compertitionMode = true;
	}
}

function updateNumberOfBallsPlayed(){
	console.log("update No Of Balls: " + selectionId);
	$("#number_of_balls_played").html(selectionId);

}


function addgameball(gameball){

	setSelection(gameball, "loupe");
	setSelection(gameball, "main");

	var form = document.getElementById("GameBasketForm");
	
	var inputRow = document.createElement("div");
	inputRow.className = "input_row";
	inputRow.id = gameball.id + "_input_row"

	form.appendChild(inputRow);

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

	var cancelSpan = document.createElement("span")
	cancelSpan.className = "cancel_gameball";
	cancelSpan.id = gameball.id + "_cancel_span";
	cancelSpan.innerHTML = "x";
	cancelSpan.onclick = function(){ removeSpecificGameball(this); };

	inputRow.appendChild(xInput);
	inputRow.appendChild(yInput);
	inputRow.appendChild(cancelSpan);
	
}

function removeAllGameballs(){
	$(".crosshair--auto").remove();
}


function removeSpecificGameball(element){

	console.log( $(element).attr("id"));

	splitId = $(element).attr("id").split("_");

	$("#" + splitId[0] + "_input_row").remove();
	$("#single_crosshair_" + splitId[0]).remove();
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