<div id="game_sidebar_tabs">
	<div id="left_tab" class="tab">
		<p>competition</p>
	</div>

	<div id="right_tab" class="tab">
		<p>practice</p>
	</div>
</div>

<div id="game_sidebar_competition">



	<div id="gameballs_section" class="section">
		<h2>gameballs</h2>
		<div class="small_indent">
			<p>x</p>
			<p>y</p>
			<p>delete</p>
			<?php		

			echo $this->Form->create('Game', array(
				'controller'=>'Games',
				'action' => 'basket',
				'inputDefaults' => array(
					'label' => false,
					'div' => false
					)
				));
			//echo $this->Form->submit('selections_submit_form_submit');

			$options = array(
				'label' => 'submit',
				'id' => 'selections_submit_form_submit'
			);

			echo $this->Form->end($options);

			?>
		</div>
	</div>



<?php
if($authUser){
?>
	<div id="game_sidebar_gameballs" class="section">
		<h2 id="my_game_balls_heading">my gameballs</h2>

		<div class="small_indent">
			<?php
			if(sizeof($results) <= 0){
				echo "<span class='tiny_text'>no gameballs played yet</span><br><br>";
			}else{
			?>
			
				<div id='game_ball_bag' onmouseover='showOverlay(this)' onmouseout='hideOvelay(this)'>

					<?php
					$count = 1;
	/*
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
						echo "<p class='tiny_text'><span class='mock_link purchase_link'>purchase</span> more gameballs to play</p>";
					}
	*/
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
			<?php } ?>
		</div>
	</div>

<?php } ?>	

	<div id="game_sidebar_view" class="section">
		<h2  id="view_heading">view</h2>
		<div class="small_indent">
			<p id="game_mode_description" class="tiny_text">
				left click to select. right click to zoom
			</p>
			
			<span id="swap_game_image_button" class="mock_link" onmouseover="toggleInLayImageIn()" onmouseout="toggleInLayImageOut()" onclick="swapGameImage()">
				front view
			</span>
			<br>
			<span class="mock_link" onclick="toggleVideoPlayer()">show/hide video</span>

		</div>
	</div>
</div>

<div id="game_sidebar_practice">
	<div class="section">
		<h2>welcome</h2>
		<div class="small_indent">
			<p>welcome to our practice games!! We are going to have lots of games for you in the future!</p>
			<p>these games are currently under construction, they are not fully working</p>
		</div>
	</div>

	<div class="section">
		<h2>games</h2>
		<div class="small_indent">

			<?php
			foreach ($practiceGames as $id => $game) {
				$gameMonth = $game['Game']['month'];
				$gameImageId = $game['Game']['imageId'];
				$celebName = strtolower( $game['Game']['celebFirstName'] . ' ' . $game['Game']['celebSurname']);
				$practiceImage = 'practiceImages/' . $gameMonth . '_' . $gameImageId . '_front_small.jpg';
				$realMonth = strtolower(DateTime::createFromFormat('!Ym', $gameMonth)->format('F'))
				?>
				<div class="sidebar_list_item" onclick="ajaxFetchPractice('<?=$gameMonth?>', this)">
					<?= $this->Html->image($practiceImage); ?>
					<p><?=$celebName?></p>
					<p><?=$realMonth?></p>
				</div>
			<?php
			}
			?>
		</div>
	</div>	
</div>