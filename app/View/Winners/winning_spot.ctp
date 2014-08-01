<?php
$this->Html->script( 'gamePlay', array('inline'=>false));
$this->Html->script( 'moveUserSelections', array('inline'=>false));
?>



<div class="grid" id="game_grid">

	<div id="loupe" oncontextmenu="toggleLoupe();return false;">

		<?php
		if(isset($month)){
			echo $this->element('game/game_loupe');
		}
		?>
	</div>

	<div id="game_and_pannel_container">

		<div id="game_sidebar" class="form_container">

			<?php
		
				echo $this->Form->create('Winner', array(
					'controller'=>'Winners',
					'action' => 'winningSpot',
					'inputDefaults' => array(
						'label' => false,
						'div' => false
						)
					));
				echo '<div class="input_row">';
				echo $this->Form->label('Winner.xPos', 'x position',array('class' => 'clear'));
				echo $this->Form->input('xPos',array('class' => 'clear', 'id'=>'x_input'));
				echo '</div>';

				echo '<div class="input_row">';
				echo $this->Form->label('Winner.yPos', 'y position',array('class' => 'clear'));
				echo $this->Form->input('yPos',array('class' => 'clear', 'id'=>'y_input'));
				echo '</div>';

				echo '<div class="input_row">';
				echo $this->Form->label('Winner.month', 'month',array('class' => 'clear'));
				echo $this->Form->input('month',array('class' => 'clear', 'id'=>'month_input'));
				echo '</div>';

				echo $this->Form->end('submit');
			?>

			
		</div>

		<div class="game_image_container" oncontextmenu="toggleLoupe();return false;" onmouseout="removeLoupe()">
			<?php
			if(isset($month)){
				echo $this->element('game/game_images');
			}
			?>
		</div>
	</div>
</div>


<div class="grid" id="main_grid">

	<input type="checkbox" class="hidden_label" id="winning_spot_sliding_container_button">
	<div class="sliding_container" id="winning_spot_sliding_container">

		<label class="dividing_row top" for="winning_spot_sliding_container_button">
			<div class="col12">			
				<a class="large_link">new winning spot</a>
			</div>
		</label>

		<div class="onerow">
			<div class="col12">
				
			</div>
		</div>
	</div>
</div>

<script>

	$(document).ready(function() {

		$(".main_game_image").click( function(event) {		
			enterSelectMode();
		});
		
		$("#loupe_image_container").click( function(event) {
			
			registerSelectClick(event,date);
		});

		$(".main_game_image").mousemove(function(event) {
			findMouse(event,date);
		});
		
		$("#loupe_image_container").mousemove(function(event) {
			findMouseWithinLoupe(event,date);
		});
	});
</script>