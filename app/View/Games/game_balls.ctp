<?php

$count = 1;

if($ballsPlayed + $ballsRemaining > 0){

	for($i = 1; $i <= $ballsPlayed; $i++){
	?>
		<div class="game_ball not_avaliable">
			<span><?=$count?> | </span>
			<?= $this->Html->image( 'logo_32_32.png', array('class'=>'game_ball_image') ) ?>
			<span>gameball</span>
		</div>
		<?php
		$count++;
	}

	for($i = 1; $i <= $ballsRemaining; $i++){
		?>
		<div class="game_ball avaliable">
			<span><?=$count?> | </span>
			<?= $this->Html->image( 'logo_32_32.png', array('class'=>'game_ball_image', 'onmouseover' => 'changeSelectionIcon(this)', 'onmouseover' => 'changeSelectionIconBack(this)') ) ?>
			<span>gameball</span>
		</div>
		<?php
		$count++;
	}
} else{
	echo '<p>You have no gameballs</p>';
}
?>
