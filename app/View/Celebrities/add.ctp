<div class="grid" id="main_grid">
	<div class="onerow background_container margin_bottom">
		<div class="colcenter40">

		<h1>add celebrity - profile</h1>

			<?= $this->Form->create('Celebrity', array(
				'controller'=>'Celebrities',
				'action' => 'addCelebrity',
				'inputDefaults' => array(
					'label' => false,
					'div' => false
					)
				)); ?>
			<ul>
				<li>
					<?= $this->Form->label('Celebrity.firstName', 'first name'); ?>
					<?= $this->Form->input('firstName'); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.surname', 'last name'); ?>
					<?= $this->Form->input('surname'); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.year', 'year'); ?>
					<div class="select-wrapper">
						<?= $this->Form->year('year','2013','2016', array('empty' => 'year')); ?>
					</div>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.month', 'month'); ?>
					<div class="select-wrapper">
						<?= $this->Form->month('month', array('empty' => 'month')); ?>
					</div>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.profileHeading1', 'profile heading 1'); ?>
					<?= $this->Form->input('profileHeading1',array('placeholder'=>'left-hand side heading')); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.profileTextarea1', 'profile textarea 1'); ?>
					<?= $this->Form->input('profileTextarea1',array('type' => 'textarea', 'rows'=>'4', 'maxlength'=>'500', 'placeholder'=>'left-hand text area (max 1000 characters)')); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.profileHeading2', 'profile heading 2'); ?>
					<?= $this->Form->input('profileHeading2',array('placeholder'=>'right-hand side heading')); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.profileTextarea2', 'profile textarea 2'); ?>
					<?= $this->Form->input('profileTextarea2',array('type' => 'textarea', 'rows'=>'4', 'maxlength'=>'500', 'placeholder'=>'right-hand text area (max 1000 characters)')); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.profileVideoLink1', 'profile video link 1'); ?>
					<?= $this->Form->input('profileVideoLink1'); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.profileVideoLink2', 'profile video link 2'); ?>
					<?= $this->Form->input('profileVideoLink2'); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.profileVideoLink3', 'profile video link 3'); ?>
					<?= $this->Form->input('profileVideoLink3'); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.outtakesTitle', 'outtakes title'); ?>
					<?= $this->Form->input('outtakesTitle'); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.outtakesQuote1', 'outtakes quote 1'); ?>
					<?= $this->Form->input('outtakesQuote1'); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.outtakesVideoLink1', 'outtakes video link 1'); ?>
					<?= $this->Form->input('outtakesVideoLink1'); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.outtakesVideoLink2', 'outtakes video link 2'); ?>
					<?= $this->Form->input('outtakesVideoLink2'); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.outtakesVideoLink3', 'outtakes video link 3'); ?>
					<?= $this->Form->input('outtakesVideoLink3'); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.outtakesVideoLink4', 'outtakes video link 4'); ?>
					<?= $this->Form->input('outtakesVideoLink4'); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.outtakesHeading1', 'outtakes heading 1'); ?>
					<?= $this->Form->input('outtakesHeading1',array('placeholder'=>'left-hand side heading')); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.outtakesTextarea1', 'outtakes textarea 1'); ?>
					<?= $this->Form->input('outtakesTextarea1',array('type' => 'textarea', 'rows'=>'4', 'maxlength'=>'500', 'placeholder'=>'left-hand text area (max 1000 characters)')); ?>		
				</li>
				<li>	
					<?= $this->Form->label('Celebrity.outtakesHeading2', 'outtakes heading 2'); ?>
					<?= $this->Form->input('outtakesHeading2',array('placeholder'=>'middle heading')); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.outtakesTextarea2', 'outtakes textarea 2'); ?>
					<?= $this->Form->input('outtakesTextarea2',array('type' => 'textarea', 'rows'=>'4', 'maxlength'=>'500', 'placeholder'=>'middle text area (max 1000 characters)')); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.outtakesHeading3', 'outtakes heading 3'); ?>
					<?= $this->Form->input('outtakesHeading3',array('placeholder'=>'right-hand side heading')); ?>
				</li>
				<li>
					<?= $this->Form->label('Celebrity.outtakesTextarea3', 'outtakes textarea 3'); ?>
					<?= $this->Form->input('outtakesTextarea3',array('type' => 'textarea', 'rows'=>'4', 'maxlength'=>'500', 'placeholder'=>'right-hand text area (max 1000 characters)')); ?>
				</li>
				<li>
					<?= $this->Form->end(); ?>
				</li>
			</ul>
		</div>
	</div>
</div>