<div class="onerow">
	<div id="thumbnail_container">


		<?php 


		foreach($celebrities as $celeb){
			$realDate = DateTime::createFromFormat('m/Y', $celeb['Celebrity']['month'])->format('Ym');
			$sortedCelebrities[$realDate] = $celeb['Celebrity'];	
		}

		ksort($sortedCelebrities);
		$preYear = 0;	

		$currentMonth = date('F Y');

		foreach($sortedCelebrities as $celeb){

			$imageName = $celeb['firstName'] . $celeb['surname'] . '_headshot.jpg';
			$celebName = $celeb['firstName'] . ' ' . $celeb['surname'];			
			$realDate = DateTime::createFromFormat('m/Y', $celeb['month'])->format('F Y');
			$year = DateTime::createFromFormat('m/Y', $celeb['month'])->format('Y');

			if($preYear < $year){
				echo '<div class="element_break"> <h2 class="year_break">' . $year . '</h2> <hr> </div>';
			}
			
			$preYear = $year;
			$borderType = $currentMonth == $realDate ? 'highlight' : ''; 

			echo '<div class="crossfade float_left border ' . $borderType .' ">';
			echo '<div class=" fade_bottom"><p>' . $celebName . '</p><p>' . $realDate . '</p></div>';
			echo '<div class=" fade_top">';
			echo '<a href="#">';
			echo $this->Html->image( $imageName, array() );
			echo '</a>';
			echo '</div>';
			echo '</div>';
		}

		?>
	</div>
</div>