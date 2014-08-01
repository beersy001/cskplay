<?php
	foreach ($results as $id => $element) {

		$xPos = $element['x'];
		$yPos = $element['y'];

		$spanXPos = $xPos - 230;
		$spanYPos = $yPos + 100;

		echo $this->Html->image( 'logo_white.png', array('class'=>'crosshair saved_selection','id' => 'unselected_' . $id . '_' . $month . '_loupe', 'style' => 'left:' . $element['x'] . "px; top: " . $element['y'] . "px" ) );
		echo $this->Html->image( 'logo_orange.png', array('class'=>'crosshair saved_selection','id' =>  'selected_' . $id . '_' . $month . '_loupe', 'style' => 'left:' . $element['x'] . "px; top: " . $element['y'] . "px; display: none" ) );
		echo "<span class='crosshair_span' id='coordsSelected_" . $id . '_' . $month . '_loupe' . "' style='left:" . $spanXPos . "px; top: " . $spanYPos . "px;'>( " . $element['x'] . ", " . $element['y'] . " )</span>";
	}
?>