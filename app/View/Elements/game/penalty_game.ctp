<?php
$this->Html->script( 'gamePlay', array('inline'=>false));
$this->Html->script( 'moveUserSelections', array('inline'=>false));
?>

<div id="loupe" oncontextmenu="toggleLoupe();return false;">
	<?= $this->element('game/game_loupe'); ?>
</div>

<div id="game_and_pannel_container">

	<div class="ajax_loading_pannel">
		<h1>saving...</h1>
	</div>

	<div id="game_sidebar">
		<?= $this->element('game/game_sidebar'); ?>
	</div>

	<div class="game_image_container" oncontextmenu="toggleLoupe();return false;" onmouseout="removeLoupe()">
		<?= $this->element('game/game_images'); ?>
	</div>
</div>