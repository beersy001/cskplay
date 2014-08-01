<div class="grid" id="main_grid">
	<div class="onerow background_container margin_bottom">
		<div id="thumbnail_container">
			<?php

			foreach($celebrities as $celeb){
				$realDate = DateTime::createFromFormat('!Ym', $celeb['Celebrity']['month'])->format('Ym');

				$year = DateTime::createFromFormat('!Ym', $celeb['Celebrity']['month'])->format('Y');

				$sortedCelebrities[$realDate] = $celeb['Celebrity'];
				
			}

			krsort($sortedCelebrities);
			$preYear = 9999;	
			$currentMonth = date('F Y');

			foreach($sortedCelebrities as $celeb){

				$imageName = 'headshot.jpg';
				$fileName = $celeb['firstName'] . $celeb['surname'];
				$celebName = strtolower($celeb['firstName'] . ' ' . $celeb['surname']);
				$realDate = DateTime::createFromFormat('!Ym', $celeb['month'])->format('F Y');
				$year = DateTime::createFromFormat('!Ym', $celeb['month'])->format('Y');

				if($preYear > $year){
					echo '<div class="element_break"> <h2 class="helper--highlight-text border_bottom margin_bottom">' . $year . '</h2></div>';
				}
				
				$preYear = $year;
				$highlight = $currentMonth == $realDate ? 'highlight' : ''; 

				echo '<div class="crossfade float_left">';
				echo '<div class=" fade_bottom">';
				echo $this->Html->image( 'celebrities/' . $fileName . '/' . $imageName );
				echo '</div>';
				echo '<div class="fade_top ' . $highlight .' ">' . $this->Html->link('',array('controller'=>'celebrities', 'action'=>'outtakes', 'month'=>$celeb['month']));
				echo '</div>';
				echo '<span class="footer ">' . $celebName . ' <br> ' . strtolower($realDate) . '</span>';
				echo '</div>';
			}

			?>
		</div>
	</div>
</div>

<?= $this->element('quick_links'); ?>