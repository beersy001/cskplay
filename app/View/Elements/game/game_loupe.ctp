<?php $imageSize = getimagesize('img/gameImages/'. $month . '/front_large.jpg'); ?>

<div id="loupe_teams_slider" class="loupe_slider">
	<p>Your gameball has been added to the basket.</p>
	<a id="cancel_link" class="cta cta--100pc cta--highlight" onclick="$('#selections-form').submit();">go to checkout</a>
	<a id="cancel_link" class="cta cta--100pc" onclick="removeGameball()">remove gameball</a>
</div>


<div id="loupe_inner_container">
	
	<div id="loupe_image_container">
		<div class="crosshairs" id="loupe_crosshairs">
		<?php
		if(isset($results)){
			foreach ($results as $id => $element) {

				$xPos = $element['GameBall']['x'] - 7.5;
				$yPos = $element['GameBall']['y'] - 7.5;

				echo $this->Html->image( 'logo_white.png', array('class'=>'crosshair','id' => 'unselected_' . $id . '_' . $month . '_loupe', 'style' => 'left:' . $xPos . "px; top: " . $yPos . "px" ) );
				echo $this->Html->image( 'logo_orange.png', array('class'=>'crosshair','id' => 'selected_' . $id . '_' . $month . '_loupe', 'style' => 'left:' . $xPos . "px; top: " . $yPos . "px; display: none" ) );
			}

			if(isset($gameHasEnded) && $gameHasEnded){

				$xPos = $winningX - 40;
				$yPos = $winningY - 40;

				echo $this->Html->image( 'winning_spot_red.png', array('class'=>'winning_selection','id' => 'unselected_win_' . $month . '_loupe', 'style' => 'left:' . $xPos . "px; top: " . $yPos . "px" ) );
			}
		}
		?>
		</div>
		<?= $this->Html->image( 'gameImages/'. $month . '/front_large.jpg', array('class' => 'loupe_image', 'id'=>'loupeImage_'. $imageSize[0] . '_' . $imageSize[1] . '_' . $month) ) ?>
	</div>

	<div id="loupe_coords">
		<span id="loupe_x_value">0</span><span> , </span>
		<span id="loupe_y_value">0</span>
	</div>
</div>