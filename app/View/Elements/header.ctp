<div id="header-wrapper" class="header">

	<div class="header__logo-wrapper">
		<a href="<?=$this->Html->url(array('controller' => 'pages', 'action' => 'home'));?>">
			<?= $this->Html->image( 'logo_orange.png', array('class' => 'logo-wrapper__img') ) ?>
			<h1 class="logo-wrapper__text "> CELEBRITY SP<span class="helper--highlight-text">O</span>T KICK</h1>
		</a>
	</div>

	<div class="[ header__login-wrapper ]  [ helper--desktop-tablet-only ]">
		<?php
			if(!$authUser){
				echo $this->Html->link('login', array('controller'=>'Users', 'action'=>'login'),array('class' => 'cta cta--100px' ));
				echo $this->Html->link('register', array('controller'=>'Users', 'action'=>'add'),array('class' => 'cta cta--100px cta--highlight' ));
			} else {
				if($authUser['facebook'] == true){
					echo $this->Html->link('logout', $fb_logout_url,array('class' => '[ cta  cta--100px ]'));
					echo $this->Html->link('my account', array('controller'=>'Users', 'action'=>'accountAdmin'),array('class' => '[ cta  cta--100px  cta--highlight ]'));
					echo "<img class='login-wrapper__profile-picture' src='https://graph.facebook.com/$facebookUserId/picture'> ";
					echo "<p>welcome " . $facebookUserProfile['name'] . "</p>";
				}else{
					echo $this->Html->link('logout', array('controller'=>'Users', 'action'=>'logout'),array('class' => '[ cta  cta--100px ]'));
					echo $this->Html->link('my account', array('controller'=>'Users', 'action'=>'accountAdmin'),array('class' => '[ cta  cta--100px  cta--highlight ]'));
					echo "<p>welcome " . $authUser['username'] . "</p>";
				}
				
			}
		?>
	</div>

	<i class="[ header__hamburger-icon ]  [ fa fa-bars ]  [ helper--mobile-only  helper--font-color ]"></i>

	<div class="[ header__nav-wrapper  nav-wrapper ]">
		<span class="[ nav-wrapper__text-logo ]">CELEBRITY SP<span class="[ helper--highlight-text ]">O</span>T KICK</span>
		<?= $this->Html->image( 'logo_orange.png', array('class' => '[ nav-wrapper__img-logo ]') ) ?>
		<?= $this->element('simple_nav_bar'); ?>
	</div>

</div>