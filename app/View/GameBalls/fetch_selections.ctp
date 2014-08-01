<?php

	foreach ($results as $id => $element) {

		$xPos = $element['GameBall']['x'];
		$yPos = $element['GameBall']['y'];


		echo $this->Html->image( 'logo_white.png', array('class'=>'crosshair saved_selection','id' => 'unselected_' . $id . '_' . $month . '_' . $locationId, 'style' => 'left:' . $xPos . "px; top: " . $yPos . "px" ) );
		echo $this->Html->image( 'logo_orange.png', array('class'=>'crosshair saved_selection','id' =>  'selected_' . $id . '_' . $month . '_' . $locationId, 'style' => 'left:' . $xPos . "px; top: " . $yPos . "px; display: none" ) );
	}
?>