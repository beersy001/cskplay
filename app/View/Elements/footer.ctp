<div id="main_footer">
	<div class="fb-like" data-href="http://developers.facebook.com/docs/reference/plugins/like" data-width="500" data-layout="button_count" data-show-faces="true" data-send="true"></div>
</div>

<div id="small_footer">
	<div class="onerow ">

		<div class="col5">

		<?= $this->Html->image( 'logo.png', array('id'=>'main_logo_small', 'url' => array('controller' => 'pages', 'action' => 'home')) ) ?>
		</br>
		</br>
		<?= $this->Html->image( 'under_16.png', array('id'=>'under_16_image', 'class' => 'middle_image') ) ?>
			You must be 16 or over to play or claim a prize
		</div>

		<div class="col7 last">
			<div class="col3 no_margin no_padding">
				<ul>
					<li><?= $this->Html->link('Home',array('controller' => 'pages', 'action' => 'home')); ?></li>
					<li><?= $this->Html->link('Contact Us',array('controller' => 'pages', 'action' => 'contactUs')); ?></li>
					<li><?= $this->Html->link('Privacy Policy',array('controller' => 'pages', 'action' => 'privacyPolicy')); ?></li>
				</ul>
			</div>

			<div class="col3 no_margin no_padding">
				<ul>
					<li><?= $this->Html->link('Login',array('controller' => 'users', 'action' => 'login')); ?></li>
					<li><?= $this->Html->link('Register',array('controller' => 'users', 'action' => 'add')); ?></li>
					<li><?= $this->Html->link('Forgot Password',array('controller' => 'users', 'action' => 'forgotPassword')); ?></li>
				</ul>
			</div>

			<div class="col3 no_margin no_padding">
				<ul>
					<li><?= $this->Html->link('Play Now',array('controller' => 'games', 'action' => 'displayGame')); ?></li>
					<li><?= $this->Html->link('View Demo',array('controller' => 'pages', 'action' => 'viewDemo')); ?></li>
					<li><?= $this->Html->link('Check Results',array('controller' => 'games', 'action' => 'viewResults')); ?></li>
				</ul>
			</div>

			<div class="col3 no_margin no_padding">
				<ul>
					<li><?= $this->Html->link('Charities',array('controller' => 'pages', 'action' => 'goodCauses')); ?></li>
					<li><?= $this->Html->link('Celebrities',array('controller' => 'celebrities', 'action' => 'allCelebrities')); ?></li>
					<li><?= $this->Html->link('This Months Celebrity',array('controller' => 'celebrities', 'action' => 'thisMonthsCelebrity')); ?></li>
					<li><?= $this->Html->link('Outtakes',array('controller' => 'celebrities', 'action' => 'outtakes')); ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>