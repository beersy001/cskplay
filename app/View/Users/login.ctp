<?php $this->Html->script( "moveHomeButtons", array("inline"=>false));?>
<?php $this->Html->script( "swapGameImage", array("inline"=>false));?>


<div class="onerow">
	<div class="col5 alternate_one" id="login_box_page">

		<div class="col6">
			<h1 class="right_align">Login</h1>
			<p class="right_align">or <?= $this->Html->link('join',array('controller' => 'users', 'action' => 'add')); ?><p>

			<br>
			<?= $this->Html->image( 'facebook_login_image.png', array('id'=>'facebook_login_button_page', 'class'=>'right', 'url' => $fb_login_url) );?>
		</div>
		<div class="col6 last" id="login_page_form">
			<?= $this->form->create(); ?>
			<?= $this->form->input('username'); ?>
			<?= $this->form->input('password'); ?>
			<?= $this->form->end('login'); ?>
			<?= $this->Html->link('forgot password',array('controller' => 'users', 'action' => 'forgotPassword'), array('id' => 'forgot_password_link')); ?>
		</div>
	</div>

	<div class="col7 no_padding border last" id="game_image_container">
		<?= $this->Html->image( 'gameImage1.jpg', array('class'=>'game_image no_padding no_margin', 'id'=>'game_image_main') ) ?>
		<?= $this->Html->image( 'gameImage2.jpg', array('class'=>'game_image  display_none', 'id'=>'game_image_alt') ) ?>
		<?= $this->Html->image( 'gameImage2.jpg', array('class'=>'game_image_inlay display_none', 'id'=>'game_image_main_inlay') ) ?>
		<div class="game_image_info_bar">
			<span id="game_image_tab" onmouseover="toggleInLayImageUp()" onmouseout="toggleInLayImageDown()">
				Front View
			</span>
		</div>
	</div>


	<div id="home_buttons">
		<?= $this->Html->image( 'view_demo_button.png', array('id'=>'view_demo_button', 'url' => array('controller' => 'pages', 'action' => 'viewDemo')) ) ?>
	</div>
</div>