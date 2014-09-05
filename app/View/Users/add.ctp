<?php
	echo $this->Session->flash(); 
	echo '<script>var date = "' . date('Ym') . '"</script>';

	$this->Html->script( "registrationValidation", array("inline"=>false));
?>

<div class="grid" id="main_grid">
	<div class="onerow">

		<div class="colcenter40 scene__element scene__element--fadeinup">
			<h1 class="helper--center-align">register</h1>
			<p class="helper--center-align">all fields are required</p>

			<?= $this->Form->create('User', array(
				'controller'=>'Users',
				'action' => 'add',
				'novalidate' => true,
				'inputDefaults' => array(
					'label' => false,
					'div' => false
					)
				)); ?>
			<ul>
				<li>
					<div class="half-wrapper">
						<?= $this->Form->label('User.firstName', 'first name'); ?>
						<?= $this->Form->input('firstName',array('onChange'=>'validateFirstName();')); ?>
					</div>
					<div class="half-wrapper">
						<?= $this->Form->label('User.surname', 'surname'); ?>
						<?= $this->Form->input('surname'); ?>
					</div>
				</li>
				<li>
					<?= $this->Form->label('User.username', 'username',array('class' => 'helper--clearfix')); ?>
					<?= $this->Form->input('username',array('class' => 'helper--clearfix')); ?>
				</li>
				<li>
					<?= $this->Form->label('User.emailAddress', 'email address'); ?>
					<?= $this->Form->input('emailAddress'); ?>
				</li>
				<li>
					<?= $this->Form->label('User.contactNumber', 'contact number',array('class' => 'helper--clearfix')); ?>
					<?= $this->Form->input('contactNumber'); ?>
				</li>
				<li>
					<?= $this->Form->label('User.password', 'password',array('class' => '')); ?>
					<?= $this->Form->input('password',array('class' => 'helper--clearfix ','onchange' => 'validatePassword();')); ?>
				</li>
				<li>
					<?= $this->Form->label('User.passwordVerify', 'verify password'); ?>
					<?= $this->Form->input('passwordVerify', array('type'=>'password')); ?>
				</li>
				<li>
					<?= $this->Form->label('User.dateOfBirth', 'date of birth',array('class' => 'helper--clearfix')); ?>
					<div class="select-wrapper select-wrapper--third">
						<?= $this->Form->day('dateOfBirth', array('class'=>'date-of-birth', 'empty' => 'day')); ?>
					</div>
					<div class="select-wrapper select-wrapper--third">
						<?= $this->Form->month('dateOfBirth', array('class'=>'date-of-birth','empty' => 'month')); ?>
					</div>
					<div class="select-wrapper select-wrapper--third">
						<?= $this->Form->year('dateOfBirth','2014','1901', array('class'=>'date-of-birth','empty' => 'year')); ?>
					</div>
				</li>
				<li>
					<?= $this->Form->label('User.region', 'region'); ?>
					<div class="select-wrapper">
						<?= $this->Form->input('region', array(
							'options' => array(
								'north east'=>'north east',
								'north west'=>'north west',
								'south east'=>'south east',
								'south west'=>'south west',
								'london'=>'london',
								'midlands'=>'midlands',
								'wales'=>'wales',
								'scotland'=>'scotland',
								'northern ireland'=>'northern ireland'
							),
    						'empty' => '(please choose)'
						)); ?>
					</div>	
				</li>
				<li>
					<?= $this->Form->input('register',array('type' => 'submit', 'class' => 'cta')); ?>
				</li>
			</ul>

			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>