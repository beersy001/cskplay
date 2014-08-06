<div class="grid" id="main_grid">
	<?php
	$this->Html->script( 'ajaxCelebrityProfile', array('inline'=>false));
	?>

	<script>var currentMonth = <?=$currentMonth?></script>


	<?= $this->element('celebrity/single_profile'); ?>

</div>


<?= $this->element('quick_links'); ?>