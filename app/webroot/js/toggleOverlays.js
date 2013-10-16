function toggleSelectionWindow(){
	if ($("#selection_overlay").css('display') == 'none'){
		if($("#buy_game_balls_overlay").css('display') != 'none'){
			$("#buy_game_balls_overlay").hide('slide',{direction:'up'},200);
		}
		if($("#selection_saved_overlay").css('display') != 'none'){
			$("#selection_saved_overlay").hide('slide',{direction:'up'},200);
		}
		$("#selection_overlay").show('slide',{direction:'up'},800);
	} else{
		$("#selection_overlay").hide('slide',{direction:'up'},200);
		

	}
};

function toggleBuyGameBallsWindow(){
	if ($("#buy_game_balls_overlay").css('display') == 'none'){
		if($("#selection_overlay").css('display') != 'none'){
			$("#selection_overlay").hide('slide',{direction:'up'},200);
		}
		$("#buy_game_balls_overlay").show('slide',{direction:'up'},800);
	} else{
		$("#buy_game_balls_overlay").hide('slide',{direction:'up'},200);

	}
};

function toggleSelectionSavedWindow(){
	if ($("#selection_saved_overlay").css('display') == 'none'){
		$("#selection_saved_overlay").show('slide',{direction:'up'},800);
		window.setTimeout(function() {
			toggleSelectionSavedWindow();
		}, 3000);
		
		setTimeout("timeout()", 3000); 
	} else{
		$("#selection_saved_overlay").hide('slide',{direction:'up'},600);
	}
};