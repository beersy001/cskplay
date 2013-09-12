<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>

<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $this->Html->charset(); 
			echo $this->Html->meta('icon');
			echo $this->Html->css('cake.generic');
			echo $this->Html->css('style');
			echo $this->Html->css('grid_layout');
			echo $this->Html->script('jquery');
			echo $this->Html->script('countdown');
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
			echo $scripts_for_layout;


		?>

		<title>Celebrity Spot Kick</title>

		
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


	</head>
	<body>
		<div id="container">
			<div id="main_header">
				<div id="header_content">

					<?= $this->Html->image( 'logo.png', array('id'=>'main_logo', 'url' => array('controller' => 'pages', 'action' => 'home')) ) ?>
					<?= $this->Html->image( 'csk_play.png', array('id'=>'text_logo', 'url' => array('controller' => 'pages', 'action' => 'home')) ) ?>

					
					<div id="nav_links">
						<?php 
							echo $this->Html->link('Charities',array('controller' => 'pages', 'action' => 'goodcauses')) . " | " .
							$this->Html->link('Play Now',array('controller' => 'games', 'action' => 'displayGame')) .  " | " .
							$this->Html->link('Celebrity of the Month',array('controller' => 'celebrities', 'action' => 'thisMonthsCelebrity'));
						?>
					</div>
				</div>
			

				<div id="login_box_header">
					<?php
						if(!$authUser){
							echo $this->Html->link('Login', array('controller'=>'Users', 'action'=>'login'),array('id' => 'facebookButton')) . " | " . 
							$this->Html->link('Register', array('controller'=>'Users', 'action'=>'register'),array('id' => 'facebookButton'));
						} else {
							echo "<img id='profile_picture' src='https://graph.facebook.com/$facebookUserId/picture'> ";
							echo "<p>Welcome " . $facebookUserProfile['name'] . " | ";
							echo $this->Html->link('My Page', array('controller'=>'Users', 'action'=>'accountAdmin'),array('id' => 'facebookButton')) . " | ";
							echo $this->Html->link('Logout', $fb_logout_url,array('id' => 'facebookButton')) . "</p>";
						}
					?>
					<div id='countdown'>
						<div class="countdown_digit" id="days_first"></div>
						<div class="countdown_digit marg" id="days_second"></div>
						<div class="countdown_digit" id="hours_first"></div>
						<div class="countdown_digit marg" id="hours_second"></div>
						<div class="countdown_digit" id="minutes_first"></div>
						<div class="countdown_digit marg" id="minutes_second"></div>
						<div class="countdown_digit" id="seconds_first"></div>
						<div class="countdown_digit" id="seconds_second"></div>
						<div id="labels">
							<div class="digit_label" id="days_label">Days</div>
							<div class="digit_label" id="hours_label">Hours</div>
							<div class="digit_label" id="mins_label">Mins</div>
							<div class="digit_label" id="secs_label">Secs</div>
							<div class="digit_label" id="_label"></div>
						</div>
					</div>

				</div>
			</div>

			<div class="grid" id="main_grid">

				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>

			</div>

			<div id="main_footer">

			</div>

			<div id="small_footer">

				<p class="footer_element left_align">Privacy Policy | About Us | Contatct Us</p>


				<p class="footer_element"><?= $this->Html->image( 'under_16.png', array('id'=>'under_16_image', 'class' => 'middle_image') ) ?>
					You must be 16 or over to play or claim a prize </p>


				<p class="footer_element right_align"><?= $this->Html->image( 'paypal_logo.png', array('id'=>'paypal_image', 'class' => 'middle_image') ) ?></p>


			</div>
		</div>
	</body>
</html>
