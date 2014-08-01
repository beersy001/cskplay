<?php
	krsort($distinctMonths);

	//print_r($allGames);

	foreach ($distinctMonths as $month) { ?>



		<div class="crossfade float_left">

			<div class=" fade_bottom">
				<?= $this->Html->image( 'gameImages/' . $month . '/front_small_square.jpg' ); ?>
			</div>

			<div class="fade_top">
				<?= $this->Html->link('',array('controller' => 'gameballs', 'action' => 'myGameballs', 'month' => $month)); ?>
				<?php
					if(isset($allGames[$month]['Game']['ended']) && $allGames[$month]['Game']['ended'] == true){
						echo '<span>finished</span>';
					}
				?>
			</div>

			<br>

			<span class="footer "><?= strtolower(date("F Y", strtotime(substr($month, 0, 4 ). '-' . substr($month, 4,5)))); ?></span>
		</div>

	<?php
	}
?>