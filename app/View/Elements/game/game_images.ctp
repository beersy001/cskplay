<div id="game-img-wrapper" oncontextmenu="toggleLoupe();return false;" onmouseout="removeLoupe()">
	<?php
	if(isset($results)){
		foreach ($results as $id => $element) {

			$xPos = $element['GameBall']['x'];
			$yPos = $element['GameBall']['y'];

			echo $this->Html->image( 'logo_white.png', array( 'data-x' => $xPos, 'data-y' => $yPos, 'class'=>'crosshair crosshair--main saved_selection','id' => 'unselected_' . $id . '_' . $month . '_normal', 'style' => 'left:' . $xPos . "px; top: " . $yPos . "px" ) );
			echo $this->Html->image( 'logo_orange.png', array( 'data-x' => $xPos, 'data-y' => $yPos, 'class'=>'crosshair crosshair--main saved_selection','id' => 'selected_' . $id . '_' . $month . '_normal', 'style' => 'left:' . $xPos . "px; top: " . $yPos . "px; display: none" ) );
		}
	}

	if(isset($gameHasEnded) && $gameHasEnded){

		$xPos = $winningX - 190;
		$yPos = $winningY - 200;

		echo $this->Html->image( 'winning_spot_grey.png', array('class'=>'winning_selection','id' => 'unselected_win_' . $month . '_normal', 'style' => 'left:' . $xPos . "px; top: " . $yPos . "px" ) );
	}

	$compFrontLarge = 'gameImages/' . $month . '/front_large.jpg';
	$compRearLarge = 'gameImages/' . $month . '/rear_large.jpg';
	$compFrontSmall = 'gameImages/' . $month . '/front_small.jpg';

	echo $this->Html->image( $compFrontLarge, array('class'=>'main_game_image game_image no_padding no_margin', 'id'=> 'mainImage') );
	echo $this->Html->image( $compRearLarge, array('class'=>'game_image  display_none', 'id'=>'game_image_alt') );
	echo $this->Html->image( $compFrontSmall, array('class'=>'game_image_inlay display_none', 'id'=>'game_image_main_inlay') );
	echo $this->Html->image( $compFrontLarge, array('id'=>'hidden_image','style'=>'display: none; position: absolute'));
	?>


</div>