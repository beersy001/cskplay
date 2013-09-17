<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

if (!Configure::read('debug')){
	throw new NotFoundException();
}

App::uses('Debugger', 'Utility');

// cakePHP html 'helper' to dynamicaly create a <script> tag
// loads gamePlay.js
$this->Html->script( "gamePlay", array("inline"=>false));

?>

<script>
	$(function(){
		$("#game_image_tab").click(function(){
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

			document.getElementById("game_image_main_inlay").src = "/cskplay/img/gameImage1.jpg";
			document.getElementById("game_image_main").style.display = "none";
			document.getElementById("game_image_alt").style.display = "inline";
			document.getElementById("single_crosshair").style.display = "none";

		}else{

			document.getElementById("game_image_main_inlay").src = "/cskplay/img/gameImage2.jpg";
			document.getElementById("game_image_main").style.display = "inline";
			document.getElementById("game_image_alt").style.display = "none";
		}
	}
</script>



<script>
$(document).ready(function(){

	$("#game_ball_bag").load("displayGame");
	//$("#selection_overlay").load("displayOverlay");

});

	$(function(){
		$("img#game_image_main").click(function(){
			toggleSelectionWindow();
		});
	});

	$(function(){
		$("#selection_overlay").click(function(){
			toggleSelectionWindow();
		}); 
	});

	$(function(){
		$("#coord_submit").click(function(){
			toggleSelectionWindow();
			toggleSelectionSavedWindow();
		}); 
	});

	$(function(){
		$("a#buy_game_balls_link").click(function(){
			toggleBuyGameBallsWindow();
		}); 
	});

	$(function(){
		$("#buy_game_balls_overlay").click(function(){
			toggleBuyGameBallsWindow();
		}); 
	});

	$(function(){
		$("#selection_saved_overlay").click(function(){
			toggleSelectionSavedWindow();
		}); 
	});

	var toggleSelectionWindow = function(){
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

	var toggleBuyGameBallsWindow = function(){
		if ($("#buy_game_balls_overlay").css('display') == 'none'){
			if($("#selection_overlay").css('display') != 'none'){
				$("#selection_overlay").hide('slide',{direction:'up'},200);
			}
			$("#buy_game_balls_overlay").show('slide',{direction:'up'},800);
		} else{
			$("#buy_game_balls_overlay").hide('slide',{direction:'up'},200);

		}
	};

	var toggleSelectionSavedWindow = function(){
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


</script>

<div class="onerow">
	<div class="col3">
		<div class="alternate alternate_one">
			<h1>Play Now</h1>
			<p>
				To play the game, 1st buy some game balls and then click on the image and 
				choose where you think the ball should be. Then review your selection and click submit.
			</p>
		</div>

		<div class="alternate alternate_two">
			<h2>Current Selection</h2>
			<table id="coordinates_table">
				<tr>
					<td>x</td>
					<td>y</td>
				</tr>
				<tr>
					<td><p id="x_value">0</p></td>
					<td><p id="y_value">0</p></td>
				</tr>
			</table>
		</div>

		<div class="alternate alternate_one" >
			<h2>Game Balls</h2>

			<a id="buy_game_balls_link" href="#">Buy More Game Balls</a>

			<div id="game_ball_bag" class="alternate alternate_two">
				<p>Loading...</p>
			</div>
		</div>



	</div>

	<div class="col9 last" id="game_image_container">
		<?= $this->Html->image( 'gameImage1.jpg', array('class'=>'game_image', 'id'=>'game_image_main') ) ?>
		<?= $this->Html->image( 'gameImage2.jpg', array('class'=>'game_image display_none', 'id'=>'game_image_alt') ) ?>
		<?= $this->Html->image( 'gameImage2.jpg', array('class'=>'game_image_inlay display_none', 'id'=>'game_image_main_inlay') ) ?>
		<div id="game_image_tab" onmouseover="toggleInLayImageUp()" onmouseout="toggleInLayImageDown()">
		</div>

		<!-- ==========================================================================-->
		<!-- ======== Overlays 														   -->
		<!-- ==========================================================================-->

		<div class="overlay" id="selection_overlay">

			<h1>Your Selection!</h1>

			<?php
				//if($this->Session->read('Auth.User.attemptsLeft') == 0){
				if($ballsRemaining == 0){
					echo "<p>Please purchase more Game Balls to play</p>";
				}else {
					
					echo $this->Form->create( array('controller'=>'Games', 'action'=>'displayGame'));
					echo $this->Form->input('x',array('id'=>'x_input', 'readonly'));
					echo $this->Form->input('y',array('id'=>'y_input', 'readonly'));
					echo $this->Js->submit('Submit', array('id'=>'coord_submit', 'update'=> '#game_ball_bag'));
					echo $this->Form->end();
				}
			?>
			<button>Cancel</button>
		</div>

		<div class="overlay" id="buy_game_balls_overlay">
			<iframe id="" src="/cskplay/Users/purchaseGameBalls"></iframe>
		</div>

		<div class="overlay" id="selection_saved_overlay">
			<h1>Your Selection!</h1>
			<p>Your selection has been saved</p>
		</div>
		<!-- ==========================================================================-->
		<!-- ==========================================================================-->

		<?= $this->Html->image( 'gameImage1.jpg', array('id'=>'imageHidden','style'=>'display: none; position: absolute'));?>

	</div>
</div>