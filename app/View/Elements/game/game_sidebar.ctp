<div id="gameballs_section">

	<?= $this->Form->create('Game', array(
		'controller'=>'Games',
		'action' => 'basket',
		'inputDefaults' => array(
			'label' => false,
			'div' => false
			)
		)); ?>

	<?= $this->Form->end(); ?>

<?php
if($authUser){
?>
	<div>
		<h2>my gameballs</h2>

		<div class="small_indent">
			<?php
			if(sizeof($results) <= 0){
				echo "<span class='tiny_text'>no gameballs played yet</span><br><br>";
			}else{
			?>
			
				<div id='game_ball_bag' onmouseover='showOverlay(this)' onmouseout='hideOvelay(this)'>

					<?php
					$count = 1;

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

				<p id="toggle_selection_view_button" class="mock_link helper--clearfix" onclick="toggleGameBalls()">
					show gameballs
				</p>
			<?php } ?>
		</div>
	</div>

<?php } ?>	

	<div id="game_sidebar_view">
		<h2  id="view_heading">view</h2>
			<p id="game_mode_description" class="tiny_text">
				left click to select. right click to zoom
			</p>
			
			<p id="swap_game_image_button" class="cta cta--50pc" onmouseover="toggleInLayImageIn()" onmouseout="toggleInLayImageOut()" onclick="swapGameImage()">
				change view
			</p>
			<p class="cta cta--50pc" onclick="toggleVideoPlayer()">show/hide video</p>

	</div>
</div>