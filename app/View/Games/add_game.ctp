<div class="grid" id="main_grid">
	<div class="onerow background_container">
		<div class="col12 form_container">

			<?php
			echo $this->Form->create('Game', array(
				'controller'=>'Games',
				'action' => 'addGame',
				'inputDefaults' => array(
					'label' => false,
					'div' => false
					)
				));
			
			echo '<div class="input_row">';
			echo $this->Form->label('Game.typeOfGame', 'type of game',array('class' => 'clear'));
			echo $this->Form->label('Game.imageId', 'image id');
			echo $this->Form->input('typeOfGame',array('class' => 'clear'));
			echo $this->Form->input('imageId');
			echo '</div>';

			echo '<div class="input_row">';
			echo $this->Form->label('Game.celebFirstName', 'celeb first name',array('class' => 'clear'));
			echo $this->Form->label('Game.celebSurname', 'celeb surname');
			echo $this->Form->input('celebFirstName',array('class' => 'clear'));
			echo $this->Form->input('celebSurname');
			echo '</div>';


			echo '<div class="input_row">';
			echo $this->Form->label('Game.sport', 'sport',array('class' => 'clear'));
			echo $this->Form->label('Game.month', 'month');
			echo $this->Form->input('sport',array('class' => 'clear'));
			echo $this->Form->input('month');
			echo '</div>';

			echo '<div class="input_row">';
			echo $this->Form->label('Game.winningX', 'winning x',array('class' => 'clear'));
			echo $this->Form->label('Game.winningY', 'winning y');
			echo $this->Form->input('winningX',array('class' => 'clear'));
			echo $this->Form->input('winningY');
			echo '</div>';

			echo '<div class="input_row">';
			echo $this->Form->label('Game.videoId', 'video id',array('class' => 'clear'));
			echo $this->Form->input('videoId',array('class' => 'clear'));
			echo '</div>';



			
			echo $this->Form->end('submit');
			?>
		</div>
	</div>
</div>