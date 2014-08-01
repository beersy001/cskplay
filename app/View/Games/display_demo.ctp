<?php
$this->Html->script( 'gameDemo', array('inline'=>false));
$this->Html->script( 'moveUserSelections', array('inline'=>false));
?>
<div class="grid" id="game_grid">
	<div id="loupe" oncontextmenu="toggleLoupe();return false;">
		<?= $this->element('game/game_loupe'); ?>
	</div>

	<div id="game_and_pannel_container">

		<div class="ajax_loading_pannel">
			<h1>saving...</h1>
		</div>

		<div id="game_sidebar">
			<div class="demo_overlay" id="sidebar_overlay"></div>
			<?= $this->element('game/game_sidebar'); ?>
		</div>

		<div class="game_image_container" oncontextmenu="toggleLoupe();return false;" onmouseout="removeLoupe()">
			<div class="demo_overlay" id="game_image_overlay">
				<div id="overlay_instructions">
					<h1>welcome to the demo</h1>
					<p class="tiny_text">click continue below to move to the next step</p>
					<p id="demo_text">the aim of the game is to try and use your skill to get as close to the centre of where the ball should be on the image</p>
				</div>
				<?= $this->Html->link('play',array('controller' => 'games', 'action' => 'displayGame'),array( 'id' => 'demo_play_button', 'class' => 'main_button')) ?>
				<p id="continue_demo_button" class="no_margin no_padding" onclick="runThroughDemo()">continue</p>
				<p id="reset_demo_button" class="mock_link tiny_text no_margin no_padding" onclick="restartDemo()">restart</p>
			</div>
			<?= $this->element('game/game_images'); ?>
		</div>
	</div>
</div>

<script>
	function ajaxSubmitGameBall(){
		runThroughDemo();
	}
</script>

<?= $this->element('quick_links'); ?>