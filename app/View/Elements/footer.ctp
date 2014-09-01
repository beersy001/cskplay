<div id="small_footer" class="[ scene__element scene__element--fadeinup ]">
	<div class="onerow ">
		<div class="col5">

		<?= $this->Html->image( 'logo_grey.png', array('id'=>'main_logo_small', 'url' => array('controller' => 'pages', 'action' => 'home')) ) ?>
		<br />
		<br />
		<?= $this->Html->image( 'under_16.png', array('id'=>'under_16_image', 'class' => 'middle_image') ) ?>
			<span class="light_background">You must be 16 or over to play or claim a prize</span>
		</div>

		<div class="col7 last">
			<div class="col3 no_margin no_padding">
				<ul>
					<li><?= $this->Html->link('home',array('controller' => 'pages', 'action' => 'home')); ?></li>
					<li><?= $this->Html->link('contact us',array('controller' => 'pages', 'action' => 'contactUs')); ?></li>
					<li><?= $this->Html->link('privacy policy',array('controller' => 'pages', 'action' => 'privacyPolicy')); ?></li>
					<li><?= $this->Html->link('terms and conditions',array('controller' => 'pages', 'action' => 'termsAndConditions')); ?></li>
					<li><?= $this->Html->link('faqs',array('controller' => 'questions', 'action' => 'frequentlyAskedQuestions')); ?></li>
				</ul>
			</div>

			<div class="col3 no_margin no_padding">
				<ul>
					<li><?= $this->Html->link('login',array('controller' => 'users', 'action' => 'login')); ?></li>
					<li><?= $this->Html->link('register',array('controller' => 'users', 'action' => 'add')); ?></li>
				</ul>
			</div>

			<div class="col3 no_margin no_padding">
				<ul>
					<li><?= $this->Html->link('play now',array('controller' => 'games', 'action' => 'displayGame')); ?></li>
					<li><?= $this->Html->link('play demo',array('controller' => 'games', 'action' => 'displayDemo')); ?></li>
					<li><?= $this->Html->link('check results',array('controller' => 'games', 'action' => 'viewResults')); ?></li>
				</ul>
			</div>

			<div class="col3 no_margin no_padding">
				<ul>
					<li><?= $this->Html->link('charities',array('controller' => 'charities', 'action' => 'viewAll')); ?></li>
					<li><?= $this->Html->link('celebrities',array('controller' => 'celebrities', 'action' => 'viewAll')); ?></li>
					<li><?= $this->Html->link('this months celebrity',array('controller' => 'celebrities', 'action' => 'thisMonthsCelebrity')); ?></li>
					<li><?= $this->Html->link('outtakes',array('controller' => 'celebrities', 'action' => 'viewAllOuttakes')); ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>