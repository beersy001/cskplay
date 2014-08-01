var frontView = "front view";
var rearView = "rear view";
var permanentlyShowGameBalls = false;
var tempHideGameBalls = false;
var playMode = true;
var displayInstructions = true;


function toggleInLayImageUp(){
	$("#game_image_main_inlay").show('slide',{direction:'left'},400);

	if(document.getElementById("mainImage_4256_2832_" + date).style.display != "none"){
		document.getElementById("swap_game_image_button").innerHTML = rearView;
	}else{
		document.getElementById("swap_game_image_button").innerHTML = frontView;
	}
};

function toggleInLayImageDown(){
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
		document.getElementById("game_image_main_inlay").src = "/cskplay/img/gameImages/gameImage1_small_" + date +".jpg";
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
		document.getElementById("game_image_main_inlay").src = "/cskplay/img/gameImages/gameImage2_small_" + date +".jpg";
		document.getElementById("mainImage_4256_2832_" + date).style.display = "inline";
		document.getElementById("swap_game_image_button").innerHTML = frontView;
		document.getElementById("game_image_alt").style.display = "none";
		if(displayInstructions == true){
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

	console.log("permanentlyShowGameBalls: " + permanentlyShowGameBalls);
	console.log("tempHideGameBalls: " + tempHideGameBalls);
	console.log("displayInstructions: " + displayInstructions);
	console.log("__________________________________________");
}

function changeSelectionIcon(elem,date){
	var rawId = elem.id.substring(elem.id.length - 4, 0);
	document.getElementById('unselected_' + rawId + '_' + date + '_normal').style.display = 'none';
	document.getElementById('selected_' + rawId + '_' + date + '_normal').style.display = 'block';
	document.getElementById('selected_' + rawId + '_' + date + '_normal').style.zIndex = '4';
	console.log(document.getElementById('unselected_' + rawId + '_' + date + '_normal'));
}

function changeSelectionIconBack(elem,date){
	var rawId = elem.id.substring(elem.id.length - 4, 0);
	document.getElementById('unselected_' + rawId + '_' + date + '_normal').style.display = 'block';
	document.getElementById('selected_' + rawId + '_' + date + '_normal').style.display = 'none';
	document.getElementById('selected_' + rawId + '_' + date + '_normal').style.zIndex = '3';
}

function showOverlay(){
	if(playMode == true){
		document.getElementById('game_balls_overlay').style.left = '0';
		$( ".crosshairs" ).css( "display", "block" );
	}
}

function hideOvelay(){
	if(playMode == true){
		document.getElementById( 'game_balls_overlay').style.left = '-1400px';
		if(permanentlyShowGameBalls == false){
			$( ".crosshairs" ).css( "display", "none" );
		}
	}
}

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

function cancelSubmitMode(){
	$("#game_input_form_section").css("left","-230");
	$("#game_instructions_section").css("left","0");
	$( ".auto_crosshair" ).remove();

	$("#my_game_balls_heading").removeClass("unavaliable_text");
	$("#avaliable_heading").removeClass("unavaliable_text");
	$("#played_heading").removeClass("unavaliable_text");
	$("#view_heading").removeClass("unavaliable_text");
	$("#game_mode_description").removeClass("unavaliable_text");
	$("#button_description").removeClass("unavaliable_text");
	$("#toggle_selection_view_button").removeClass("unavaliable_text");
	$("#swap_game_image_button").removeClass("unavaliable_text");
	displayInstructions = true;
}
