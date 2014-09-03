<div id="thumbnail_container">
	<?php
	krsort($distinctMonths);
	foreach($distinctMonths as $month){
	?>

		<div class="crossfade-wrapper crossfade-wrapper--width200">
			<a href="<?= $this->Html->url(array('controller' => 'gameballs', 'action' => 'myGameballs', 'month' => $month))?>">

				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--bottom crossfade-wrapper__layer--circle">
					<?= $this->Html->image( 'gameImages/' . $month . '/front_small_square.jpg' ); ?>
				</div>

				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--top crossfade-wrapper__layer--circle crossfade-wrapper__layer--grey">
					<div class="layer__text-wrapper">
						<p class="text-wrapper__text"><?= strtolower(date("F Y", strtotime(substr($month, 0, 4 ). '-' . substr($month, 4,5)))); ?></p>
					</div>
				</div>

			</a>
		</div>
	<?php
	}
	?>
</div>