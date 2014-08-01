<div class="grid" id="main_grid">
	<div class="onerow background_container margin_bottom">
		<div id="thumbnail_container">

			<div class="element_break"> <h2 class="border_bottom margin_bottom">celebrity spot kick sponsored charities</h2></div>

			<?php

			foreach($charities as $charity){

				$charityNameId = $charity['Charity']['nameId'];
				$charityName = strtolower($charity['Charity']['name']);

				echo '<div class="crossfade float_left">';
				echo '<div class=" fade_bottom">';
				echo $this->Html->image( 'charities/' . $charityNameId . '/logo.png' );
				echo '</div>';
				echo '<div class="fade_top">' . $this->Html->link('',array('controller'=>'charities', 'action'=>'profile', 'nameId'=>$charityNameId));
				echo '</div>';
				echo '<span class="footer ">' . $charityName . '</span>';
				echo '</div>';
			}

			?>
		</div>
	</div>
</div>

<?= $this->element('quick_links'); ?>