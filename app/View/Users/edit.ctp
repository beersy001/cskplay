<?php
	echo $this->Session->flash(); 
	echo '<script>var date = "' . date('Ym') . '"</script>';
	$this->Html->script( "registrationValidation", array("inline"=>false));
?>

<div class="grid" id="main_grid">

	<div class="[ onerow  ]  [ scene__element  scene__element--fadeinup ]">
		<div class="[ col3 ]">&nbsp</div>
		<div class="[ col6 ]">
			<h1 class="helper--center-align">edit your details</h1>
			<p class="helper--center-align">all fields are required</p>
		</div>
		<div class="[ col3  last ]  [ cta-wrapper ]">
			<a class="[ cta  cta--100pc  cta--highlight ]" href="<?=$this->Html->url(array('controller'=>'users', 'action'=>'accountAdmin'))?>">back to your account</a>
			<a class="[ cta  cta--100pc ]" href="<?=$this->Html->url(array('controller'=>'users', 'action'=>'editPassword'))?>">change your password</a>
		</div>
	</div>

	<div class="[ onerow  onerow--reduce-40pc ]  [ scene__element  scene__element--fadeinup ]  [ alt-background ]">
		
		<div class="[ col12 ]">
			<?= $this->Form->create('User', array(
				'controller'=>'Users',
				'action' => 'edit',
				'novalidate' => true,
				'inputDefaults' => array(
					'label' => false,
					'div' => false
					)
				));

				echo $this->Form->input('id', array(
					'type' => 'hidden',
					'value' => AuthComponent::user('id')
				));

				?>
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
					<?= $this->Form->label('User.emailAddress', 'email address'); ?>
					<?= $this->Form->input('emailAddress'); ?>
				</li>
				<li>
					<?= $this->Form->label('User.contactNumber', 'contact number'); ?>
					<?= $this->Form->input('contactNumber'); ?>
				</li>
				<li>
					<?= $this->Form->label('User.dateOfBirth', 'date of birth', array('class'=>'helper--clearfix')); ?>
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
					<?= $this->Form->input('submit details',array('type' => 'submit', 'class' => 'cta')); ?>
				</li>
			</ul>

			<?= $this->Form->end(); ?>
		</div>

		
	</div>
</div>

