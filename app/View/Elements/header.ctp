<div class="header">

	<div class="header__logo-wrapper">
		<a href="<?=$this->Html->url(array('controller' => 'pages', 'action' => 'home'));?>">
			<?= $this->Html->image( 'logo_orange.png', array('class' => 'logo-wrapper__img') ) ?>
			<h1 class="logo-wrapper__text dark_background"> CELEBRITY SP<span class="helper--highlight-text">O</span>T KICK</h1>
		</a>
	</div>

	<div class="header__login-wrapper">
		<?php
			if(!$authUser){
				echo $this->Html->link('login', array('controller'=>'Users', 'action'=>'login'),array('class' => 'cta cta--100' ));
				echo $this->Html->link('register', array('controller'=>'Users', 'action'=>'add'),array('class' => 'cta cta--100 cta--highlight' ));
			} else {
				if($authUser['facebook'] == true){
					echo "<img class='login-wrapper__profile-picture' src='https://graph.facebook.com/$facebookUserId/picture'> ";
					echo "<p>welcome " . $facebookUserProfile['name'] . " | ";
					echo $this->Html->link('logout', $fb_logout_url) . " | ";
				}else{
					echo "<p>welcome " . $authUser['username'] . " | ";
					echo $this->Html->link('logout', array('controller'=>'Users', 'action'=>'logout'),array('id' => 'facebookButton')) . " | ";
				}
				echo $this->Html->link('my account', array('controller'=>'Users', 'action'=>'accountAdmin'),array('id' => 'facebookButton')) . "</p>";
			}
		?>
	</div>
	<?php
	if(isset($title_for_page)){
		echo '<div class="header__title-wrapper">';
			echo '<h1 class="title-wrapper__page-title">' . $title_for_page . '</h1>';
		echo '</div>';
	}
	?>

	<div class="header__nav-wrapper">
		<?= $this->element('simple_nav_bar'); ?>
	</div>
</div>