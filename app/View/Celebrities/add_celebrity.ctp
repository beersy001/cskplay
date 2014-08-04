<div class="grid" id="main_grid">
	<div class="onerow background_container margin_bottom">
		<div class="col12 form_container">

		<h1 class="border_bottom margin_bottom">add celebrity - profile</h1>

		<?php


			echo $this->Form->create('Celebrity', array(
				'controller'=>'Celebrities',
				'action' => 'addCelebrity',
				'inputDefaults' => array(
					'label' => false,
					'div' => false
					)
				));
			echo '<div class="input_row">';
			echo $this->Form->label('Celebrity.firstName', 'first name',array('class' => 'helper--clearfix'));
			echo $this->Form->label('Celebrity.surname', 'surname');
			echo $this->Form->label('Celebrity.charity', 'charity name');
			echo $this->Form->label('Celebrity.year', 'year');
			echo $this->Form->label('Celebrity.month', 'month');
			echo $this->Form->input('firstName',array('class' => 'helper--clearfix'));
			echo $this->Form->input('surname');
			echo $this->Form->input('charity');
			echo $this->Form->year('year','2013','2016', array('empty' => 'year'));
			echo $this->Form->month('month', array('empty' => 'month'));
			echo '</div>';

			echo '<div class="input_row">';
			echo $this->Form->label('Celebrity.profileHeading1', 'profile heading 1',array('class' => 'helper--clearfix'));
			echo $this->Form->label('Celebrity.profileTextarea1', 'profile textarea 1');
			echo $this->Form->input('profileHeading1',array('class' => 'helper--clearfix', 'placeholder'=>'left-hand side heading'));
			echo $this->Form->input('profileTextarea1',array('type' => 'textarea', 'rows'=>'4', 'maxlength'=>'500', 'placeholder'=>'left-hand text area (max 1000 characters)'));
			echo '</div>';

			echo '<div class="input_row">';
			echo $this->Form->label('Celebrity.profileHeading2', 'profile heading 2',array('class' => 'helper--clearfix'));
			echo $this->Form->label('Celebrity.profileTextarea2', 'profile textarea 2');
			echo $this->Form->input('profileHeading2',array('class' => 'helper--clearfix', 'placeholder'=>'right-hand side heading'));
			echo $this->Form->input('profileTextarea2',array('type' => 'textarea', 'rows'=>'4', 'maxlength'=>'500', 'placeholder'=>'right-hand text area (max 1000 characters)'));
			echo '</div>';

			echo '<div class="input_row">';
			echo $this->Form->label('Celebrity.profileVideoLink1', 'profile video link 1',array('class' => 'helper--clearfix'));
			echo $this->Form->label('Celebrity.profileVideoLink2', 'profile video link 2');
			echo $this->Form->label('Celebrity.profileVideoLink3', 'profile video link 3');
			echo $this->Form->input('profileVideoLink1',array('class' => 'helper--clearfix'));
			echo $this->Form->input('profileVideoLink2');
			echo $this->Form->input('profileVideoLink3');
			echo '</div>';
			
			echo '<div class="input_row">';
			echo '<h1 class="border_bottom margin_bottom">add celebrity - outtakes</h1>';
			echo '</div>';

			echo '<div class="input_row">';
			echo $this->Form->label('Celebrity.outtakesTitle', 'outtakes title',array('class' => 'helper--clearfix'));
			echo $this->Form->label('Celebrity.outtakesQuote1', 'outtakes quote 1');
			echo $this->Form->input('outtakesTitle',array('class' => 'helper--clearfix'));
			echo $this->Form->input('outtakesQuote1');
			echo '</div>';

			echo '<div class="input_row">';
			echo $this->Form->label('Celebrity.outtakesVideoLink1', 'outtakes video link 1',array('class' => 'helper--clearfix'));
			echo $this->Form->label('Celebrity.outtakesVideoLink2', 'outtakes video link 2');
			echo $this->Form->label('Celebrity.outtakesVideoLink3', 'outtakes video link 3');
			echo $this->Form->label('Celebrity.outtakesVideoLink4', 'outtakes video link 4');
			echo $this->Form->input('outtakesVideoLink1',array('class' => 'helper--clearfix'));
			echo $this->Form->input('outtakesVideoLink2');
			echo $this->Form->input('outtakesVideoLink3');
			echo $this->Form->input('outtakesVideoLink4');
			echo '</div>';

			echo '<div class="input_row">';
			echo $this->Form->label('Celebrity.outtakesHeading1', 'outtakes heading 1',array('class' => 'helper--clearfix'));
			echo $this->Form->label('Celebrity.outtakesTextarea1', 'outtakes textarea 1');
			echo $this->Form->input('outtakesHeading1',array('class' => 'helper--clearfix', 'placeholder'=>'left-hand side heading'));
			echo $this->Form->input('outtakesTextarea1',array('type' => 'textarea', 'rows'=>'4', 'maxlength'=>'500', 'placeholder'=>'left-hand text area (max 1000 characters)'));
			echo '</div>';

			echo '<div class="input_row">';
			echo $this->Form->label('Celebrity.outtakesHeading2', 'outtakes heading 2',array('class' => 'helper--clearfix'));
			echo $this->Form->label('Celebrity.outtakesTextarea2', 'outtakes textarea 2');
			echo $this->Form->input('outtakesHeading2',array('class' => 'helper--clearfix', 'placeholder'=>'middle heading'));
			echo $this->Form->input('outtakesTextarea2',array('type' => 'textarea', 'rows'=>'4', 'maxlength'=>'500', 'placeholder'=>'middle text area (max 1000 characters)'));
			echo '</div>';

			echo '<div class="input_row">';
			echo $this->Form->label('Celebrity.outtakesHeading3', 'outtakes heading 3',array('class' => 'helper--clearfix'));
			echo $this->Form->label('Celebrity.outtakesTextarea3', 'outtakes textarea 3');
			echo $this->Form->input('outtakesHeading3',array('class' => 'helper--clearfix', 'placeholder'=>'right-hand side heading'));
			echo $this->Form->input('outtakesTextarea3',array('type' => 'textarea', 'rows'=>'4', 'maxlength'=>'500', 'placeholder'=>'right-hand text area (max 1000 characters)'));
			echo '</div>';


			
			
			echo $this->Form->end('save');
			?>
		</div>
	</div>
</div>