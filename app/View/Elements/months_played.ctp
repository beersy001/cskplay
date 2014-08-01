<?php
	krsort($distinctMonths);

	foreach ($distinctMonths as $month) {
		echo '<div class="crossfade float_left">';
		echo '<div class=" fade_bottom">';
		echo $this->Html->image( 'gameImages/' . $month . '/front_small_square.jpg' );
		echo '</div>';
		echo '<div class="fade_top">';
		echo $this->Html->link('',array('controller' => 'gameballs', 'action' => 'myGameballs', 'month' => $month));
		echo '</div>';
		echo '<br>';
		echo '<span class="footer ">' . strtolower(date("F Y", strtotime(substr($month, 0, 4 ). '-' . substr($month, 4,5)))) . '</span>';
		echo '</div>';
	}
?>