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

		<link href='http://fonts.googleapis.com/css?family=Chivo:400,900' rel='stylesheet' type='text/css'>
		<?php
			echo $this->Html->charset(); 
			echo $this->Html->meta('icon');
			echo $this->Html->css('cake.generic');
			echo $this->Html->css('grid_layout');
			echo $this->Html->css('style');
			echo $this->Html->script('jquery');
			echo $this->Html->script('countdown');
			echo $this->Html->script('page');
			echo $this->Html->script('facebook');
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
			echo $this->Js->writeBuffer(array('cache'=>FALSE));
			echo $scripts_for_layout;
		?>

		<title><?= $pageId ?></title>
		
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


	</head>
	<body>
		<div id="fb-root"></div>
		
		<?= $this->element('header'); ?>
		
		<div id="background">

			<div id="starbursts">
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash1') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash2') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash3') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash4') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash5') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash6') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash7') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash8') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash9') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash10') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash11') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash12') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash13') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash14') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash15') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash16') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash17') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash18') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash19') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash20') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash21') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash22') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash23') ) ?>
				<?= $this->Html->image( 'starburst.png', array('class'=>'flash', 'id'=>'flash24') ) ?>
<!--
				<p class="starbust_test" id='flash1'>1</p>
				<p class="starbust_test" id='flash2'>2</p>
				<p class="starbust_test" id='flash3'>3</p>
				<p class="starbust_test" id='flash4'>4</p>
				<p class="starbust_test" id='flash5'>5</p>
				<p class="starbust_test" id='flash6'>6</p>
				<p class="starbust_test" id='flash7'>7</p>
				<p class="starbust_test" id='flash8'>8</p>
				<p class="starbust_test" id='flash9'>9</p>
				<p class="starbust_test" id='flash10'>10</p>
				<p class="starbust_test" id='flash11'>11</p>
				<p class="starbust_test" id='flash12'>12</p>
				<p class="starbust_test" id='flash13'>13</p>
				<p class="starbust_test" id='flash14'>14</p>
				<p class="starbust_test" id='flash15'>15</p>
				<p class="starbust_test" id='flash16'>16</p>
				<p class="starbust_test" id='flash17'>17</p>
				<p class="starbust_test" id='flash18'>18</p>
				<p class="starbust_test" id='flash19'>19</p>
				<p class="starbust_test" id='flash20'>20</p>
				<p class="starbust_test" id='flash21'>21</p>
				<p class="starbust_test" id='flash22'>22</p>
				<p class="starbust_test" id='flash23'>23</p>
				<p class="starbust_test" id='flash24'>24</p>
-->
			</div>



			<div id="home_buttons">
				<button class="button large_button border" id="play_now_button">Play Now</button>
				<button class="button large_button border" id="view_demo_button">View Demo</button>
			</div>

			<div id='countdown' class='border'>
				<div class="countdown_duration_container">
					<div class="countdown_digit" id="days_first"></div>
					<div class="countdown_digit marg" id="days_second"></div>
					<p class="digit_label" id="days_label">Days</p>
				</div>

				<div class="countdown_duration_container">
					<div class="countdown_digit" id="hours_first"></div>
					<div class="countdown_digit marg" id="hours_second"></div>
					<p class="digit_label" id="hours_label">Hours</p>
				</div>

				<div class="countdown_duration_container">
					<div class="countdown_digit" id="minutes_first"></div>
					<div class="countdown_digit marg" id="minutes_second"></div>
					<p class="digit_label" id="mins_label">Mins</p>
				</div>

				<div class="countdown_duration_container">
					<div class="countdown_digit" id="seconds_first"></div>
					<div class="countdown_digit" id="seconds_second"></div>
					<p class="digit_label" id="secs_label">Secs</p>
				</div>
			</div>


		</div>

		<div id="home_container">
			<div class="grid" id="main_grid">

				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>

			</div>

			<?= $this->element('footer'); ?>
		</div>
	</body>
</html>