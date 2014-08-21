<?php
	echo $this->Session->flash(); 
	echo '<script>var date = "' . date('Ym') . '"</script>';

	$this->Html->script( "registrationValidation", array("inline"=>false));
?>

<div class="grid" id="main_grid">
	<div class="onerow">

		<div class="colcenter40 scene__element scene__element--fadeinup">
			<h1 class="helper--center-align">register</h1>	

			<?= $this->Form->create('User', array(
				'controller'=>'Users',
				'action' => 'add',
				'inputDefaults' => array(
					'label' => false,
					'div' => false
					)
				)); ?>
			<ul>
				<li>
					<?= $this->Form->label('User.firstName', 'first name', array('class' => 'half')); ?>
					<?= $this->Form->label('User.surname', 'surname', array('class' => 'half')); ?>
					<?= $this->Form->input('firstName',array('class' => 'half', 'onChange'=>'validateFirstName();')); ?>
					<?= $this->Form->input('surname',array('class' => 'half')); ?>
				</li>
				<li>
					<?= $this->Form->label('User.username', 'username',array('class' => 'helper--clearfix')); ?>
					<?= $this->Form->input('username',array('class' => 'helper--clearfix')); ?>
				</li>
				<li>
					<?= $this->Form->label('User.emailAddress', 'email address'); ?>
					<?= $this->Form->input('emailAddress',array('class' => '')); ?>
				</li>
				<li>
					<?= $this->Form->label('User.phoneNumberOne', '1st contact number',array('class' => 'helper--clearfix')); ?>
					<?= $this->Form->input('phoneNumberOne',array('class' => ' ')); ?>
				</li>
				<li>
					<?= $this->Form->label('User.password', 'password',array('class' => '')); ?>
					<?= $this->Form->input('password',array('class' => 'helper--clearfix ','onchange' => 'validatePassword(); ?>')); ?>
				</li>
				<li>
					<?= $this->Form->label('User.passwordVerify', 'verify password'); ?>
					<?= $this->Form->input('passwordVerify', array('type'=>'password', 'class' => '')); ?>
				</li>
				<li>
					<?= $this->Form->label('User.dayOfBirth', 'date of birth',array('class' => 'helper--clearfix')); ?>
					<div class="select-wrapper select-wrapper--third">
						<?= $this->Form->day('dayOfBirth', array('class'=>'date-of-birth', 'empty' => 'day')); ?>
					</div>
					<div class="select-wrapper select-wrapper--third">
						<?= $this->Form->month('monthOfBirth', array('class'=>'date-of-birth','empty' => 'month')); ?>
					</div>
					<div class="select-wrapper select-wrapper--third">
						<?= $this->Form->year('yearOfBirth','2014','1901', array('class'=>'date-of-birth','empty' => 'year')); ?>
					</div>
				</li>
				<li>
					<?= $this->Form->label('User.region', 'region',array('class' => '')); ?>
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
							)
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