<?php
//$this->Html->script( 'gamePlay', array('inline'=>false));
?>

<div class="grid">
	<div id="loupe" oncontextmenu="toggleLoupe();return false;">
		<?= $this->element('game/game_loupe'); ?>
	</div>

	<div class="onerow scene__element scene__element--fadeinup">
		<div class="col4">
			<p class="helper--round-number">1</p>
			<p class="helper--center-align">Click an area in the photo where you think the ball is</p>
		</div>
		<div class="col4">
			<p class="helper--round-number">2</p>
			<p class="helper--center-align">Then click inside the magnifying glass to pinpoint your selection</p>
		</div>
		<div class="col4 last">
			<p class="helper--round-number">3</p>
			<p class="helper--center-align">Click again to choose more than one location then submit</p>
		</div>

	</div>

	<div class="onerow alt-background scene__element scene__element--fadeinup">

		<div class="col4">
			<h1>Your Gameballs</h1>
			<?= $this->element('game/game_sidebar'); ?>
		</div>

		<div class="col8 last">
			<h1><?= $currentCompetition["Game"]["celebFirstName"] . " " . $currentCompetition["Game"]["celebSurname"] . " - " . $currentCompetition["Game"]["sport"] ?></h1>
			<?= $this->element('game/game_images'); ?>
		</div>
	</div>

	<div class="onerow">
		<div class="col3">
			<?= $this->element('blocks/find_out_more_giving'); ?>
		</div>

		<div class="col3">
			<?= $this->element('blocks/find_out_more_celebrities'); ?>
		</div>

		<div class="col3">
			<?= $this->element('blocks/find_out_more_prizes'); ?>
		</div>

		<div class="col3 last">
			<?= $this->element('blocks/find_out_more_about_us'); ?>
		</div>
	</div>

</div>