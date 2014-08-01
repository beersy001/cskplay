<div class="grid" id="main_grid">
	<div class="onerow background_container margin_bottom">
		<div class="col12">

			<h1 class="border_bottom margin_bottom">add partner</h1>

			<div class="form_container">
				<?php

				echo $this->Form->create('Partner', array(
					'controller'=>'Partner',
					'action' => 'addPartner',
					'inputDefaults' => array(
						'label' => false,
						'div' => false
						)
					));

				echo '<div class="input_row">';
				echo $this->Form->label('name', 'name');
				echo $this->Form->label('videoLink1', 'video link 1');
				echo $this->Form->label('videoLink2', 'video link 2');
				echo $this->Form->label('videoLink3', 'video link 3');
				echo $this->Form->input('name',array('class' => 'clear'));
				echo $this->Form->input('videoLink1');
				echo $this->Form->input('videoLink2');
				echo $this->Form->input('videoLink3');
				echo '</div>';

				echo '<div class="input_row">';
				echo $this->Form->label('Partner.heading1', 'heading 1',array('class' => 'clear'));
				echo $this->Form->label('Partner.textarea1', 'textarea 1');
				echo $this->Form->input('heading1',array('class' => 'clear'));
				echo $this->Form->input('textarea1',array('type' => 'textarea', 'rows'=>'4', 'maxlength'=>'500'));
				echo '</div>';

				echo $this->Form->end('save');
				?>
			</div>
		</div>
	</div>
</div>