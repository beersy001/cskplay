<div class="grid" id="main_grid">
	<?php
	$this->Html->script( 'ajaxCelebrityProfile', array('inline'=>false));
	?>

	<script>var currentMonth = <?=$currentMonth?></script>

	<div id="profile_container">
		<?= $this->element('celebrity/single_profile'); ?>
	</div>
</div>


<?= $this->element('quick_links'); ?>