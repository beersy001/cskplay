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
		$("img#game_image").click(function(){
			toggleSelectionWindow();
		}); 
	});

	$(function(){
		$("#selection_overlay").click(function(){
			toggleSelectionWindow();
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


	var toggleSelectionWindow = function(){
		if ($("#selection_overlay").css('display') == 'none'){
			$("#selection_overlay").show('slide',{direction:'up'},800);
		} else{
			$("#selection_overlay").hide('slide',{direction:'up'},200);
		}
	};

	var toggleBuyGameBallsWindow = function(){
		if ($("#buy_game_balls_overlay").css('display') == 'none'){
			$("#buy_game_balls_overlay").show('slide',{direction:'up'},800);
		} else{
			$("#buy_game_balls_overlay").hide('slide',{direction:'up'},200);
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

		<div class="alternate alternate_one">
			<h2>Game Balls</h2>
			<a id="buy_game_balls_link" href="#">Buy More Game Balls</a>

			<div id="game_ball_bag" class="alternate alternate_two">

				<?php

					$count = 1;

					for($i = 1; $i <= $ballsPlayed; $i++){
						?>
						<div class="game_ball not_avaliable">
							<span><?=$count?> | </span>
							<?= $this->Html->image( 'logo_32_32.png', array('class'=>'game_ball_image') ) ?>
							<span>Game Ball</span>
						</div>
						<?php
						$count++;
					}

					for($i = 1; $i <= $ballsRemaining; $i++){
						?>
						<div class="game_ball avaliable">
							<span><?=$count?> | </span>
							<?= $this->Html->image( 'logo_32_32.png', array('class'=>'game_ball_image') ) ?>
							<span>Game Ball</span>
						</div>
						<?php
						$count++;
					}
				?>
			</div>

		</div>
		


	</div>

	<div class="col9 last" id="game_image_container">


	

		<?= $this->Html->image( 'gameImage1.jpg', array('id'=>'game_image') ) ?>

		<div class="overlay" id="selection_overlay">
			<h1>Your Selection!</h1>
			<p>x: <span id="x_selection">0</span> </p>
			<p>y: <span id="y_selection">0</span> </p>
			<br>

			<?php
				if($this->Session->read('Auth.User.attemptsLeft') == 0){
					echo "<p>Please purchase more Game Balls to play</p>";
				}else {
					echo $this->Html->link('Submit',array('controller' => 'games', 'action' => 'registerSelection'),array('id' => 'submit_game_button', 'class' => 'large_link'));
				}
			?>

			<br>
			<br>
			<p>Click here to try again</p>
		</div>

		<div class="overlay" id="buy_game_balls_overlay">
			<iframe id="" src="/cskplay/Users/purchaseGameBalls"></iframe>
		</div>
	
		

		<?= $this->Html->image( 'gameImage1.jpg', array('id'=>'imageHidden','style'=>'display: none; position: absolute'));?>
	</div>
</div>