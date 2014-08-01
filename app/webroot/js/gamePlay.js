var frontView = "front view";
var rearView = "rear view";
var permanentlyShowGameBalls = false;
var tempHideGameBalls = false;

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
	
	var coords = reverseCalculateCoords(imageX,imageY,date);
	var screenX = coords[0];
	var screenY = coords[1];	
	
	setSelection(screenX,screenY,"game_grid","single_crosshair_" + selectionId);
	setSelection(imageX,imageY,"loupe_image_container","loupe_crosshair_" + selectionId);

	//document.getElementById("x_input").value = imageX;
	//document.getElementById("y_input").value = imageY;

	addgameball(selectionId,imageX,imageY);

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


function reverseCalculateCoords(x,y,date){
	var defaultImage = document.getElementById('hidden_image')
	var currentElement = document.getElementById('mainImage');

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
	
	imageX = Math.round(totalOffsetX + (x * widthRatio),0);
	imageY = Math.round(totalOffsetY + (y * heightRatio),0);

	return [imageX, imageY];
}



function setSelection(x,y,container,crosshairID){

	var	width = 18;
	var iconOffset = width / 2;

	var crosshair=document.createElement("img");
	crosshair.src = "/" + rootDir + "/app/webroot/img/logo_orange.png";
	crosshair.id = crosshairID;
	crosshair.className= "auto_crosshair";
	crosshair.style.pointerEvents = "none";
	crosshair.style.width = width + "px";
	crosshair.style.position ="absolute";
	crosshair.style.left = x - iconOffset + "px";
	crosshair.style.top = y - iconOffset + "px";
	crosshair.style.zIndex = 3;

	var container = document.getElementById(container);

	if(document.getElementById(crosshairID)){
		var oldCrosshair = document.getElementById(crosshairID);
		container.removeChild(oldCrosshair);
	}
	
	container.appendChild(crosshair);
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

	if(document.getElementById("mainImage").style.display != "none"){
		document.getElementById("swap_game_image_button").innerHTML = rearView;
	}else{
		document.getElementById("swap_game_image_button").innerHTML = frontView;
	}
};

function toggleInLayImageOut(){
	$("#game_image_main_inlay").hide('slide',{direction:'left'},200);

	if(document.getElementById("mainImage").style.display == "none"){
		document.getElementById("swap_game_image_button").innerHTML = rearView;
	}else{
		document.getElementById("swap_game_image_button").innerHTML = frontView;
	}
};

function swapGameImage(){


	if(document.getElementById("mainImage").style.display != "none"){

		playMode = false;
		document.getElementById("game_image_main_inlay").src = "/" + rootDir + "/img/gameImages/" + date + "/front_small.jpg";
		document.getElementById("mainImage").style.display = "none";
		document.getElementById("game_image_alt").style.display = "inline";
		document.getElementById("swap_game_image_button").innerHTML = rearView;
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
		document.getElementById("swap_game_image_button").innerHTML = frontView;
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


function addgameball(id,x,y){

	var form = document.getElementById("GameBasketForm");
	

	var inputRow = document.createElement("div");
	inputRow.className = "input_row";
	inputRow.id = id + "_input_row"

	form.appendChild(inputRow);

	var xInput = document.createElement("input");
	xInput.name = "Selection[" + id + "][x]";
	xInput.id = id + "_x_input";
	xInput.value = x;
	xInput.readOnly = "readonly";

	var yInput = document.createElement("input");
	yInput.name = "Selection[" + id + "][y]";
	yInput.id = id + "_y_input";
	yInput.value = y;
	yInput.readOnly = "readonly";

	var cancelSpan = document.createElement("span")
	cancelSpan.className = "cancel_gameball";
	cancelSpan.id = id + "_cancel_span";
	cancelSpan.innerHTML = "x";
	cancelSpan.onclick = function(){ removeSpecificGameball(this); };

	inputRow.appendChild(xInput);
	inputRow.appendChild(yInput);
	inputRow.appendChild(cancelSpan);
	
}

function removeAllGameballs(){
	$(".auto_crosshair").remove();
}


function removeSpecificGameball(element){

	console.log( $(element).attr("id"));

	splitId = $(element).attr("id").split("_");

	$("#" + splitId[0] + "_input_row").remove();
	$("#single_crosshair_" + splitId[0]).remove();



}