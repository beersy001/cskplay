<?php
	echo '<script>var date = "' . date('Ym') . '"</script>';
	$this->Html->script( "slideShow", array("inline"=>false));
?>
<div class="grid" id="main_grid">
	<div class="onerow background_container no_padding overflow_hidden">
		<div class="col5" id="login_box_page">

			<div class="col6 right_align">
				
				<h1 class="dark_background">login</h1>
				<p class="right_align" >or <?= $this->Html->link('join',array('controller' => 'users', 'action' => 'add')); ?><p>
				<?php echo $this->Session->flash(); ?>
				<br>
				<?= $this->Html->image( 'facebook_login_image.png', array('id'=>'facebook_button', 'class'=>'float_right', 'url' => $fb_login_url) );?>
			</div>
			<div class="col6 last form_container" id="login_page_form">

				<?php
					echo $this->Form->create('User', array('controller'=>'Users', 'action' => 'login'));
					echo '<div class="input_row">';

					echo $this->Form->input('username',array(
						'class' => 'clear wide_input',
						'label' => array(
							'text' => 'username'
						)
					));
					echo '</div>';
					echo '<div class="input_row">';
					echo $this->Form->input('password',array(
						'class' => 'clear wide_input',
						'label' => array(
							'text' => 'password'
						)
					));
					echo '</div>';
					echo $this->Form->end('submit');
				?>
				
			</div>
		</div>
		<div class="col7 last no_padding no_margin float_right">

			<div id="slideshow">
				<?= $this->Html->image( 'slideshow/image1.jpg', array('id'=>'slide1', 'class'=>'active') ) ?>
				<?= $this->Html->image( 'slideshow/image2.jpg', array('id'=>'slide2') ) ?>
				<?= $this->Html->image( 'slideshow/image3.jpg', array('id'=>'slide3') ) ?>
				<?= $this->Html->image( 'slideshow/image4.jpg', array('id'=>'slide4') ) ?>
				<?= $this->Html->image( 'slideshow/image5.jpg', array('id'=>'slide5') ) ?>
			</div>
		
			<script>
				$(function() {
					setInterval( "slideSwitch('slideshow')", 3500 );
				});
			</script>
		</div>
		
	</div>
</div>