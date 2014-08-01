<div class="grid" id="main_grid">
	<div class="onerow background_container margin_bottom">
		<div class="col12">

			<h1 class="border_bottom margin_bottom">add faq</h1>

			<div class="form_container">
				<?php

				echo $this->Form->create('Question', array(
					'controller'=>'Question',
					'action' => 'addQuestion',
					'inputDefaults' => array(
						'label' => false,
						'div' => false
						)
					));

				echo '<div class="input_row">';
				echo $this->Form->label('Question.category', 'category');
				echo $this->Form->input('category',array('class' => 'clear'));
				echo '</div>';

				echo '<div class="input_row">';
				echo $this->Form->label('Question.question', 'question');
				echo $this->Form->input('question',array('class' => 'clear','type' => 'textarea', 'rows'=>'4'));
				echo '</div>';

				echo '<div class="input_row">';
				echo $this->Form->label('Question.answer', 'answer');
				echo $this->Form->input('answer',array('class' => 'clear','type' => 'textarea', 'rows'=>'4'));
				echo '</div>';

				echo $this->Form->end('save');
				?>
			</div>
		</div>
	</div>
</div>