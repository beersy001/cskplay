<div class="grid" id="main_grid">

	<div class="onerow background_container">

		<div class="col12">
			<h2 class="border_bottom margin_bottom">celebrity sponsored charities</h2>

			<p>Welcome to our charities page.  These charities have been chosen by our celebrities – each one supporting and looking raise as much money for these charities.  Each of these charities supports our long term and on-going commitment with regards to ‘giving’ to a variety of charities.  They also fully believe and support us in delivering our sporting programmes to underprivileged children in the UK.</p>
			<p>To find out more about each of charities we support click on their links below.</p>
		</div>

		<div id="thumbnail_container">
				
			
			<?php

			$currentMonth = date('F Y');

			foreach($celebCharities as $month => $charity){
	
				$charityNameId = $charity['Charity']['nameId'];
				$realDate = DateTime::createFromFormat('!Ym', $charity['Charity']['month'])->format('F Y');
			
				$highlight = $currentMonth == $realDate ? 'highlight' : ''; 

				echo '<div class="crossfade float_left">';
				echo '<div class=" fade_bottom">';
				echo $this->Html->image( 'charities/' . $charityNameId . '/logo.png' );
				echo '</div>';
				echo '<div class="fade_top ' . $highlight .' ">' . $this->Html->link('',array('controller'=>'charities', 'action'=>'profile', 'nameId'=>$charityNameId));
				echo '</div>';
				echo '<span class="footer ">' . $charity['Charity']['celebrity'] . '<br>' . $realDate .'</span>';
				echo '</div>';
			}
			?>
		</div>
	</div>

	<div class="onerow background_container margin_bottom">
		<div class="col3">
			<?= $this->element('blocks/find_out_more_giving'); ?>
		</div>

		<div class="col3">
			<?= $this->element('blocks/find_out_more_celebrities'); ?>

		</div>

		<div class="col3">
			<?= $this->element('blocks/find_out_more_about_us'); ?>

		</div>

		<div class="col3 last">
			<?= $this->element('blocks/find_out_more_prizes'); ?>

		</div>
	</div>

</div>

<?= $this->element('quick_links'); ?>