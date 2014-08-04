<?php
	echo '<script>var date = "' . date('Ym') . '"</script>';
	$this->Html->script( "slideShow", array("inline"=>false));
?>

<div class="grid" id="main_grid">
	<div class="onerow">

		<div class="col4"></div>

		<div class="col4">
			<h1 class="helper--center-align">login</h1>			

			<?= $this->Form->create('User',
				array(
					'controller'=>'Users',
					'action' => 'login',
					'inputDefaults' => array(
						'label' => false,
						'div' => false
					)
				)
			); ?>

			<ul>
				<li>
					<?= $this->Form->input('username',array('class' => '', 'placeholder' => 'username')); ?>
				</li>
				<li>
					<?= $this->Form->input('password',array( 'placeholder' => 'password')); ?>
				</li>
				<li>
					<?= $this->Form->input('login',array('type' => 'submit', 'class' => 'cta')); ?>
				</li>
				<li>
					<h2 class="helper--dividing-line"><span>or</span></h2>
				</li>
				<li>
					<?= $this->Html->image( 'facebook_login_image.png', array('class'=>'fb-login-button', 'url' => $fb_login_url) ); ?>
					<?= $this->Html->link('register', array('controller'=>'Users', 'action'=>'add'),array('class' => 'cta cta--45pc cta--highlight' )); ?>
				</li>
			</ul>

			
			<?php echo $this->Session->flash(); ?>
		</div>
		<div class="col4 last"></div>
	</div>
</div>