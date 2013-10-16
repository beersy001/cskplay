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
$this->Html->script( "swapGameImage", array("inline"=>false));
$this->Html->script( "toggleOverlays", array("inline"=>false));
?>

<script>
	$(document).ready(function(){
		$("#game_ball_bag").load("displayGame");

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
</script>

<div class="onerow">
	<div class="col3 text_box border">
		<div class=" ">
			<h1>Play Now</h1>
			<p>
				To play the game, 1st buy some game balls and then click on the image and 
				choose where you think the ball should be. Then review your selection and click submit.
			</p>
		</div>

	

		<div class="alternate alternate_one" >
			<h2>Game Balls</h2>

			<a id="buy_game_balls_link" href="#">Buy More Game Balls</a>

			<div id="game_ball_bag" class="alternate alternate_two">
				<p>Loading...</p>
			</div>
		</div>



	</div>

	<div class="col9 no_padding border last" id="game_image_container">
		<?= $this->Html->image( 'gameImage1.jpg', array('class'=>'game_image no_padding no_margin', 'id'=>'game_image_main') ) ?>
		<?= $this->Html->image( 'gameImage2.jpg', array('class'=>'game_image  display_none', 'id'=>'game_image_alt') ) ?>
		<?= $this->Html->image( 'gameImage2.jpg', array('class'=>'game_image_inlay display_none', 'id'=>'game_image_main_inlay') ) ?>
		<div class="game_image_info_bar">
			<span>X ( </span><span id="x_value">0</span><span> ) </span>
			<span>Y ( </span><span id="y_value">0</span><span> ) </span>
			<span id="game_image_tab" onmouseover="toggleInLayImageUp()" onmouseout="toggleInLayImageDown()">
				Front View
			</span>
		</div>

		<!-- ==========================================================================-->
		<!-- =		 Overlays 														   -->
		<!-- ==========================================================================-->

		<div class="overlay" id="selection_overlay">

			<h1>Your Selection!</h1>

			<?php
				//if($this->Session->read('Auth.User.attemptsLeft') == 0){
				if($ballsRemaining == 0){
					echo "<p>Please purchase more Game Balls to play</p> <br>";
				}else {
					echo $this->Form->create( array('controller'=>'Games', 'action'=>'displayGame'));
					echo $this->Form->input('x',array('id'=>'x_input', 'readonly'));
					echo $this->Form->input('y',array('id'=>'y_input', 'readonly'));
					echo $this->Js->submit('Submit', array('class'=>'submitButton','id'=>'coord_submit', 'update'=> '#game_ball_bag'));
					echo $this->Form->end();
				}
			?>

			<button class="submitButton">Cancel</button>
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