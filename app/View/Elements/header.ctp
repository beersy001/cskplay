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
				echo $this->Html->link('My Account', array('controller'=>'Users', 'action'=>'accountAdmin'),array('id' => 'facebookButton')) . " | ";
				echo $this->Html->link('Logout', $fb_logout_url,array('id' => 'facebookButton')) . "</p>";
			}
		?>
		

	</div>
</div>

<div id="page_title_banner">
	<h1 class="page_title"><?=$title_for_page?></h1>
	<ul id="nav_bar">
		<li>
			<?=$this->Html->link('Play Now',array('controller' => 'games', 'action' => 'displayGame')); ?>
			<ul>
				<li><?=$this->Html->link('Check Results',array('controller' => 'games', 'action' => 'checkResults')); ?></li>
				<li><?=$this->Html->link('My Account',array('controller' => 'users', 'action' => 'accountAdmin')); ?></li>
			</ul>
		</li>

		<li>
			<?=$this->Html->link('Celebrities',array('controller' => 'celebrities', 'action' => 'thisMonthsCelebrity'));?>
			<ul>
				<li><?=$this->Html->link('All Celebrities',array('controller' => 'celebrities', 'action' => 'viewAll'));?></li>
				<li><?=$this->Html->link('This Months Celebrity' ,array('controller' => 'celebrities', 'action' => 'thisMonthsCelebrity'));?></li>
			</ul>
		</li>

		<li>
			<?=$this->Html->link('Charities',array('controller' => 'pages', 'action' => 'goodCauses'));?>
			<ul>
				<li><?=$this->Html->link('All Charities',array('controller' => 'pages', 'action' => 'viewAll'));?></li>
				<li><?=$this->Html->link('This Months Charity',array('controller' => 'pages', 'action' => 'goodCauses'));?></li>
			</ul>
		</li>
		<li>
			<?=$this->Html->link('Home',array('controller' => 'pages', 'action' => 'home'));?>
		</li>
	</ul>
</div>