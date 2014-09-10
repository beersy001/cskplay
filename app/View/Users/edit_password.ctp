<?php
	echo '<script>var date = "' . date('Ym') . '"</script>';
	$this->Html->script( "registrationValidation", array("inline"=>false));
?>

<div class="grid" id="main_grid">

	<div class="[ onerow  ]  [ scene__element  scene__element--fadeinup ]">
		<div class="[ col3 ]">&nbsp</div>
		<div class="[ col6 ]">
			<h1 class="helper--center-align">change your password</h1>
			<p class="helper--center-align">all fields are required</p>
			<?php echo $this->Session->flash();?>
		</div>
		<div class="[ col3  last ]  [ cta-wrapper ]">
			<a class="[ cta  cta--100pc  cta--highlight ]" href="<?=$this->Html->url(array('controller'=>'users', 'action'=>'accountAdmin'))?>">back to your account</a>
			<a class="[ cta  cta--100pc ]" href="<?=$this->Html->url(array('controller'=>'users', 'action'=>'edit'))?>">edit your details</a>
		</div>
	</div>

	<div class="[ onerow  onerow--reduce-40pc ]  [ scene__element  scene__element--fadeinup ]  [ alt-background ]">
		
		<div class="[ col12 ]">
			<?= $this->Form->create('User', array(
				'controller'=>'Users',
				'action' => 'editPassword',
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
					<?= $this->Form->label('User.currentPassword', 'current password'); ?>
					<?= $this->Form->input('currentPassword', array('type'=>'password')); ?>
				</li>
				<li>
					<?= $this->Form->label('User.password', 'new password'); ?>
					<?= $this->Form->input('password'); ?>
				</li>
				<li>
					<?= $this->Form->label('User.passwordVerify', 'verify password'); ?>
					<?= $this->Form->input('password2', array('type'=>'password')); ?>
				</li>
				<li>
					<?= $this->Form->input('change password',array('type' => 'submit', 'class' => 'cta')); ?>
				</li>
			</ul>

			<?= $this->Form->end(); ?>
		</div>

		
	</div>
</div>

