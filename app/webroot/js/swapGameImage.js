function toggleInLayImageUp(){
	$("#game_image_main_inlay").show('slide',{direction:'down'},400);

	if(document.getElementById("game_image_main").style.display != "none"){
		document.getElementById("game_image_tab").innerHTML = "Reverse View";
	}else{
		document.getElementById("game_image_tab").innerHTML = "Front View";
	}
};

function toggleInLayImageDown(){
	$("#game_image_main_inlay").hide('slide',{direction:'down'},200);

	if(document.getElementById("game_image_main").style.display == "none"){
		document.getElementById("game_image_tab").innerHTML = "Reverse View";
	}else{
		document.getElementById("game_image_tab").innerHTML = "Front View";
	}
};

function swapGameImage(){
	if(document.getElementById("game_image_main").style.display != "none"){
		document.getElementById("game_image_main_inlay").src = "/cskplay/img/gameImage1.jpg";
		document.getElementById("game_image_main").style.display = "none";
		document.getElementById("game_image_alt").style.display = "inline";
		document.getElementById("game_image_tab").innerHTML = "Reverse View";
		document.getElementById("single_crosshair").style.display = "none";
	}else{
		document.getElementById("game_image_main_inlay").src = "/cskplay/img/gameImage2.jpg";
		document.getElementById("game_image_main").style.display = "inline";
		document.getElementById("game_image_tab").innerHTML = "Front View";
		document.getElementById("game_image_alt").style.display = "none";
	}
}