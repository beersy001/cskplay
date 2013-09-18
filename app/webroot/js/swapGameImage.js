$(function(){
	$("#game_image_tab").click(function(){

	console.log("click 1");
		swapGameImage();
	}); 
});

function toggleInLayImageUp(){
	$("#game_image_main_inlay").show('slide',{direction:'down'},400);
};

function toggleInLayImageDown(){
	$("#game_image_main_inlay").hide('slide',{direction:'down'},200);
};

function swapGameImage(){


	if(document.getElementById("game_image_main").style.display != "none"){
console.log("click 2");
		document.getElementById("game_image_main_inlay").src = "/cskplay/img/gameImage1.jpg";
		document.getElementById("game_image_main").style.display = "none";
		document.getElementById("game_image_alt").style.display = "inline";
			document.getElementById("single_crosshair").style.display = "none";

	}else{
console.log("click 3");

		document.getElementById("game_image_main_inlay").src = "/cskplay/img/gameImage2.jpg";
		document.getElementById("game_image_main").style.display = "inline";
		document.getElementById("game_image_alt").style.display = "none";
	}
}