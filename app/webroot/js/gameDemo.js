var frontView = "front view";
var rearView = "rear view";
var permanentlyShowGameBalls = false;
var tempHideGameBalls = false;

var playMode = true;
var submitMode = false;
var viewMode = "none";

var demoPosition = 0;

$(document).ready(function() {

	$(".main_game_image").click( function(event) {		
		enterSelectMode();
	});
	
	$("#loupe_image_container").click( function(event) {
		if(submitMode == false){
			toggleSubmitMode();
		}
		registerSelectClick(event,date);
		if(demoPosition == 5){
			runThroughDemo();
		}
	});

	$(".main_game_image").mousemove(function(event) {
		findMouse(event,date);
	});
	
	$("#loupe_image_container").mousemove(function(event) {
		findMouseWithinLoupe(event,date);
	});
});


function enterSelectMode() {

	viewMode = "select";

	console.log("enterSelectMode()");
	console.log(viewMode);

	$("#loupe").css("pointer-events","auto");
	$("#loupe").css("display", "block");
	$("#loupe").css("cursor","crosshair");
	$(".game_image").css("cursor","crosshair");

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
	
	var coords = reverseCalculateCoords(imageX,imageY,date);
	var screenX = coords[0];
	var screenY = coords[1];	
	
	setSelection(screenX,screenY,"game_grid","single_crosshair");
	setSelection(imageX,imageY,"loupe_image_container","loupe_crosshair");

	document.getElementById("x_input").value = imageX;
	document.getElementById("y_input").value = imageY;
}



function calculateCoords(event,date){
	var defaultImage = document.getElementById('hidden_image_' + date);
	var currentElement = document.getElementById('mainImage_4256_2832_' + date);

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
	var defaultImage = document.getElementById('hidden_image_' + date)
	var currentElement = document.getElementById('mainImage_4256_2832_' + date);

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
	crosshair.src = "/cskplay/app/webroot/img/logo_orange.png";
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
		$("#loupe").css("display","none");
		$(".game_image").css("cursor","crosshair");

		$("#game_mode_display").html("view mode");
		$("#game_mode_description").html("left click to enter select mode. right click to enter loupe mode");
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
	$("#game_mode_description").html("left click to select ball location. right click to enter loupe mode");


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

function toggleLoupe(){

	if(playMode == true){

		if( viewMode == "select" || viewMode == "none" ){
		
			$("#loupe").show();
			$("#loupe").css("pointer-events","none");

			$(".game_image").css("cursor","none");
			$("#loupe_coords").hide();
			$("#game_mode_description").html("left click to enter select mode. right click to exit loupe mode");

			viewMode = "loupe";
			
		} else if(viewMode == "loupe"){
			
			$("#loupe").css("pointer-events","auto");
			$("#loupe").hide();
			$(".game_image").css("cursor","crosshair");
			
			viewMode = "none";

			$("#game_mode_description").html("left click to enter select mode. right click to enter loupe mode");
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
			
			viewMode = "none";
			$("#game_mode_description").html("left click to enter select mode. right click to enter loupe mode");
		}
	}
	return false;
}

function toggleInLayImageIn(){
	$("#game_image_main_inlay").show('slide',{direction:'left'},400);

	if(document.getElementById("mainImage_4256_2832_" + date).style.display != "none"){
		document.getElementById("swap_game_image_button").innerHTML = rearView;
	}else{
		document.getElementById("swap_game_image_button").innerHTML = frontView;
	}
};

function toggleInLayImageOut(){
	$("#game_image_main_inlay").hide('slide',{direction:'left'},200);

	if(document.getElementById("mainImage_4256_2832_" + date).style.display == "none"){
		document.getElementById("swap_game_image_button").innerHTML = rearView;
	}else{
		document.getElementById("swap_game_image_button").innerHTML = frontView;
	}
};

function swapGameImage(){

	if(document.getElementById("mainImage_4256_2832_" + date).style.display != "none"){
		playMode = false;
		document.getElementById("game_image_main_inlay").src = "/cskplay/img/gameImages/" + date + "/front_small.jpg";
		document.getElementById("mainImage_4256_2832_" + date).style.display = "none";
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
		document.getElementById("game_image_main_inlay").src = "/cskplay/img/gameImages/" + date + "/rear_small.jpg";
		document.getElementById("mainImage_4256_2832_" + date).style.display = "inline";
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
		//document.getElementById('game_balls_overlay').style.left = '0';
		$( ".crosshairs" ).css( "display", "block" );
	}
}

function hideOvelay(){
	if(playMode == true){
		//document.getElementById( 'game_balls_overlay').style.left = '-1400px';
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
 *		Toggle submit mode on and off									*
 ************************************************************************/
function toggleSubmitMode(){
	if(submitMode == false){
		
		$("#game_input_form_section").css("left","0");
		$("#game_instructions_section").css("left","-230");
		$("#my_game_balls_heading").addClass("unavaliable_text");
		$("#avaliable_heading").addClass("unavaliable_text");
		$("#played_heading").addClass("unavaliable_text");
		$("#view_heading").addClass("unavaliable_text");
		$("#aim_heading").addClass("unavaliable_text");
		$("#game_mode_description").addClass("unavaliable_text");
		$("#button_description").addClass("unavaliable_text");
		$("#toggle_selection_view_button").addClass("unavaliable_text");
		$("#swap_game_image_button").addClass("unavaliable_text");
		$("#aim_of_the_game_text").addClass("unavaliable_text");

		submitMode = true;

	}else if(submitMode == true){

		$("#game_input_form_section").css("left","-230");
		$("#game_instructions_section").css("left","0");
		$("#my_game_balls_heading").removeClass("unavaliable_text");
		$("#avaliable_heading").removeClass("unavaliable_text");
		$("#played_heading").removeClass("unavaliable_text");
		$("#view_heading").removeClass("unavaliable_text");
		$("#aim_heading").removeClass("unavaliable_text");
		$("#game_mode_description").removeClass("unavaliable_text");
		$("#button_description").removeClass("unavaliable_text");
		$("#toggle_selection_view_button").removeClass("unavaliable_text");
		$("#swap_game_image_button").removeClass("unavaliable_text");
		$("#aim_of_the_game_text").removeClass("unavaliable_text");

		$(".auto_crosshair").remove();

		submitMode = false;
	}
}

function runThroughDemo(){

	if(demoPosition == 0){
		flashText("#demo_text");
		$("#demo_text").html("this is the game's side bar, containing all the information you need to play the game");
		$("#sidebar_overlay").css("opacity", "0");

	}else if(demoPosition == 1){
		flashText("#demo_text");
		$("#demo_text").html("here's a brief overview of how to play the game, we will go into more detail shortly");
		$("#game_sidebar_submit_instructions").css("left", "50");
		$("#demo_text").css("top","25");

	}else if(demoPosition == 2){
		flashText("#demo_text");
		$("#demo_text").html("this area shows you how many gameballs you have purchased and avaliable to use, along with how many you have already played");
		$("#demo_text").css("top","190");
		$("#game_sidebar_gameballs").css("left", "50");
		$("#game_sidebar_submit_instructions").css("left", "0");

	}else if(demoPosition == 3){
		flashText("#demo_text");
		$("#demo_text").html("in this area you can toggle from the front view to the rear view, there are also instructions on how to change from select mode and loupe mode");
		$("#demo_text").css("top","320");
		$("#game_sidebar_view").css("left", "50");
		$("#game_sidebar_gameballs").css("left", "0");

	}else if(demoPosition == 4){
		flashText("#demo_text");
		$("#demo_text").html("this is the game image, left click where you think where the ball is, then click in the exact pixel");
		$("#demo_text").css("top","0");
		$("#game_sidebar_view").css("left", "0");
		$("#game_image_overlay").css("height","150")
		$("#sidebar_overlay").css("left", "-400");
		$("#continue_demo_button").css("right","-9999px");

	}else if(demoPosition == 5){
		flashText("#demo_text");
		$("#demo_text").html("now choose which team to submit your selection to and click submit");

	}else if(demoPosition == 6){
		flashText("#demo_text");
		$("#game_image_overlay").css("height","100%");
		$("#demo_text").html("your selection will now be saved, in the real game it will apear in the left 'my gameballs' section");
		$("#demo_play_button").css("right","100")
	}

	demoPosition++;
}

function restartDemo(){
	$("#demo_text").html("the aim of the game is to try and use your skill to get as close to the centre of where the ball should be on the image");
	flashText("#demo_text");
	$("#sidebar_overlay").css("left", "0");
	$("#demo_text").css("top","0");
	$("#sidebar_overlay").css("opacity", "1");
	$("#game_sidebar_submit_instructions").css("left", "0");
	$("#game_sidebar_gameballs").css("left", "0");
	$("#game_sidebar_view").css("left", "0");
	$("#game_image_overlay").css("height","100%");
	$("#continue_demo_button").css("right","25px");
	$("#demo_play_button").css("right","-9999")

	demoPosition = 0;

	if(submitMode == true){
		toggleSubmitMode();
	}
}

function flashText(element){
	$("#demo_text").css("color","rgb(249,163,28)");
	setTimeout(function(){
			$(element).css("color","rgb(255,255,255)");
		},2000);
}