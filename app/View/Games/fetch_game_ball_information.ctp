<div class="section">
	<h2  id="aim_heading">aim of the game</h2>
	<div class="small_indent">
		<p id="aim_of_the_game_text" class="tiny_text">
			to try and use your skill to get as close to the centre of where the ball should be on the image
		</p>
		
	</div>
</div>

<div id="user_selection_form" class="section">
	
	<div class="toggle_section" id="game_input_form_section" style="left: -230px;">
		<h2>submit</h2>
		<div class="small_indent">
			<?php
			if($ballsRemaining == 0){
				echo "<p class='tiny_text'>please purchase gameballs to play</p> <br>";
			}else {
				?>
				<form action="" id="UserSaveSelectionForm">
					<div style="display:none;">
						<input type="hidden" name="_method" value="POST">
					</div>
					<div class="input_row">
						<label for="team_input" id="team_label">team</label>
						<select name="data[User][team]" type="text" id="team_input" class="" >
							<option value="individual">individual</option>
							<?php
							if(isset($teams)){
								foreach ($teams as $teamNameKey => $team) {
									echo '<option value="' . $teamNameKey . '">' . $teamNameKey . '</option>';
								}
							}
							?>
						</select>
					</div>
					
					<div class="input_row">
						<label for="x_input">X</label>
						<input name="data[User][x]" id="x_input" readonly="readonly" type="text">
					</div>
					<div class="input_row">
						<label for="y_input">Y</label>
						<input name="data[User][y]" id="y_input" readonly="readonly" type="text">
					</div>
					
					<div class="submit">
						<a href="#" onclick="ajaxRequest()">submit</a>
						<span id="cancel_selection" class="mock_link float_right" onclick="toggleSubmitMode()">cancel</span>
					</div>
				</form>
				<?php
			}
			?>
		</div>
	</div>

	<div class="toggle_section" id="game_instructions_section" style="left: 0px;">
		<h2>instructions</h2>
		<div class="small_indent">
			<p class="tiny_text">
				1 - purchase your gameballs – they will appear in the ‘my gameballs’ section below
			</p>
			<p class="tiny_text">
				2 - click on the image where you think the ball is located, then click the exact spot to place your gameball
			</p>
			<p class="tiny_text">
				3 - submit your selection!!!
			</p>
		</div>
	</div>
</div>

<div id="game_ball_bag_avaliable" class="section">
	<h2 id="my_game_balls_heading">my gameballs</h2>

	<div class="small_indent">
		<p id="avaliable_heading">avaliable</p>
		<?php

		$count = 1;

		if($ballsRemaining > 0){

			for($i = 1; $i <= $ballsRemaining; $i++){
				?>
				<div class="game_ball avaliable">
					<?= $this->Html->image( 'logo_orange.png', array('class'=>'game_ball_image' ) ) ?>
				</div>
				<?php
				$count++;
			}

		}else{
			echo "<p class='tiny_text'>purchase more gameballs to play</p>";
		}
		?>

		<p class="clear" id="played_heading">saved</p>

		<?php
		echo $this->Session->flash();
		if(sizeof($results) <= 0){
			echo "<span class='tiny_text'>(no gameballs played yet)</span><br><br>";
		}
		?>
		
		<div id='game_ball_bag' onmouseover='showOverlay(this)' onmouseout='hideOvelay(this)'>

			<?php
			foreach ($results as $id => $element) {
				
			?>
				<div class="game_ball" id="<?= $id . 'icon' ?>" onmouseover="changeSelectionIcon(this,'<?=$month?>')" onmouseout="changeSelectionIconBack(this,'<?=$month?>')">
					<?= $this->Html->image( 'logo_white.png', array('class'=>'game_ball_image', 'id' => $id . 'bagIcon') ) ?>
				</div>
				<?php
				$count++;
			}
			?>
		</div>
		<p id="toggle_selection_view_button" class="mock_link clear" onclick="toggleGameBalls()">
			show gameballs
		</p>
	</div>
</div>

<div class="section">
	<h2  id="view_heading">view</h2>
	<div class="small_indent">
		<p id="game_mode_description" class="tiny_text">
			left click to enter select mode. right click to enter loupe mode
		</p>
		
		<p id="swap_game_image_button" class="mock_link" onmouseover="toggleInLayImageIn()" onmouseout="toggleInLayImageOut()" onclick="swapGameImage()">
			front view
		</p>
	</div>
</div>

<script>
	function ajaxRequest(){
		var x = $("#x_input").val();
		var y = $("#y_input").val();
		var team = $("#team_input").val();

		var dataString = 'x='+ x + '&y=' + y + '&team=' + team;

		$.ajax({
			url: "<?=$this->Html->url(array('controller'=>'gameBalls', 'action'=>'saveSelection'))?>",
			cache: false,
			type: "POST",
			data: dataString,
			success: function (data) {
				$("#game_ball_information").html(data);
				$("#single_crosshair").remove();
				$("#loupe_crosshair").remove();

				playMode = true;
				submitMode = false;
				viewMode = "none";
				permanentlyShowGameBalls = false;

				$.ajax({
					url: "fetchGameBallInformation",
					cache: false,
					type: "GET",
					success: function (data) {
						$("#game_ball_information").html(data);
						$.ajax({
							url: targetURL + "/locationId:normal",
							cache: false,
							type: "GET",
							success: function (data) {
								$("#main_crosshairs").html(data);
								$.ajax({
									url: targetURL + "/locationId:loupe",
									cache: false,
									type: "GET",
									success: function (data) {
										$("#loupe_crosshairs").html(data);
										moveUserSelections(date);
									}
								});
							}
						});
					}
				});
			}
		});
	}
</script>

