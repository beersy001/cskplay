<div id="main_header">
	<div id="header_content">

		<?= $this->Html->image( 'logo.png', array('id'=>'main_logo', 'url' => array('controller' => 'pages', 'action' => 'home')) ) ?>
		<?= $this->Html->image( 'csk_play.png', array('id'=>'text_logo', 'url' => array('controller' => 'pages', 'action' => 'home')) ) ?>
	</div>


	<div id="login_box_header">
		<?php
			if(!$authUser){
				echo $this->Html->link('Login', array('controller'=>'Users', 'action'=>'login'),array('id' => 'facebookButton')) . " | " . 
				$this->Html->link('Register', array('controller'=>'Users', 'action'=>'add'),array('id' => 'facebookButton'));
			} else {
				echo "<img id='profile_picture' src='https://graph.facebook.com/$facebookUserId/picture'> ";
				echo "<p>Welcome " . $facebookUserProfile['name'] . " | ";
				echo $this->Html->link('My Page', array('controller'=>'Users', 'action'=>'accountAdmin'),array('id' => 'facebookButton')) . " | ";
				echo $this->Html->link('Logout', $fb_logout_url,array('id' => 'facebookButton')) . "</p>";
			}
		?>
		

	</div>
</div>

<div id="page_title_banner">
	<h1 class="page_title"><?=$title_for_page?></h1>
	<div id="nav_links">
		<?php 
			echo $this->Html->link('Home',array('controller' => 'pages', 'action' => 'home')) . " | " .
			$this->Html->link('Charities',array('controller' => 'pages', 'action' => 'goodCauses')) . " | " .
			$this->Html->link('Play Now',array('controller' => 'games', 'action' => 'displayGame')) .  " | " .
			$this->Html->link('Celebrity of the Month',array('controller' => 'celebrities', 'action' => 'thisMonthsCelebrity'));
		?>
	</div>
</div>