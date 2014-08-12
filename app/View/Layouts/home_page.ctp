<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

		<link href='http://fonts.googleapis.com/css?family=Chivo:400,900' rel='stylesheet' type='text/css'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

		<?php
			echo $this->Html->charset(); 
			echo $this->Html->meta('icon');
			echo $this->Html->css('cake.generic');
			echo $this->Html->css('grid_layout');
			echo $this->Html->css('style');
			echo $this->Html->script('jquery');
			echo $this->Html->script('jquery.parallaxScroll');
			echo $this->Html->script('countdown');
			echo $this->Html->script('changeActiveMenu');
			echo $this->Html->script('page');
			echo $this->Html->script('facebook');
			echo $this->Html->script('cameraFlashes');
			echo $this->Html->script('scrollingAnimation');
			echo $this->Html->script('smoothAnchorScrolling');
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
			echo $this->Js->writeBuffer(array('cache'=>FALSE));
		?>

		<title><?= $pageId ?></title>
		
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	</head>
	<body>
		<div id="fb-root"></div>
		
		<?= $this->element('header'); ?>
		
		<section class="home-bg-wrapper">
			<div class="home-bg-wrapper__image-bg">
				<div class="home_button_container" id="play_button_container">
					<?= $this->Html->link('play',array('controller' => 'games', 'action' => 'displayGame'),array( 'id' => 'play_button', 'class' => 'main_button')) ?>
				</div>

				<div class="home-bg-wrapper__starbursts">
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
				</div>
			</div>

			

			

			<div id='countdown'>
				<div class="countdown_duration_container">
					<div class="countdown_digit" id="days_first"></div>
					<div class="countdown_digit marg" id="days_second"></div>
					<p class="digit_label" id="days_label">days</p>
				</div>

				<div class="countdown_duration_container">
					<div class="countdown_digit" id="hours_first"></div>
					<div class="countdown_digit marg" id="hours_second"></div>
					<p class="digit_label" id="hours_label">hours</p>
				</div>

				<div class="countdown_duration_container">
					<div class="countdown_digit" id="minutes_first"></div>
					<div class="countdown_digit marg" id="minutes_second"></div>
					<p class="digit_label" id="mins_label">mins</p>
				</div>

				<div class="countdown_duration_container">
					<div class="countdown_digit" id="seconds_first"></div>
					<div class="countdown_digit" id="seconds_second"></div>
					<p class="digit_label" id="secs_label">secs</p>
				</div>
			</div>

			<div id="countdown_text">
				<?= $this->Html->link('until our next winners!',array('controller' => 'games', 'action' => 'displayGame'),array()) ?>
			</div>

			<div class="scroll-wrapper">
				<a href="#first-scroll-content">scroll down</a>
			<i class="fa fa-3 fa-angle-down"></i>
		</div>
		</section>

		
		<section id="first-scroll-content" class="info-wrapper">

			<div class="info-wrapper__block animation-step" id="who-are-csk__step" data-animation-run="false">
				<div class="col8 left animation-step__element">
					<h1>Celebrity Spot Kick</h1>
					<h2 class="helper--highlight-text">Who are we and what do we stand for?</h2>
					<p>We believe that every child in the country deserves the right to play a vast variety or sports.</p>
					<p>Our sporting program is designed to provide the equipment and coaching needed for our youngstars to be successfull sports men and women.</p>
					<?= $this->Html->link('find out more',array('controller' => 'pages', 'action' => 'csk'),array('class' => 'cta helper--fullwidth')) ?>
				</div>
				<div class="col4 right last animation-step__element">
					<?= $this->Html->image( 'quickLinks/logo_white.png', array('url' => array('controller' => 'pages', 'action' => 'csk')) ) ?>
				</div>
				<div class="helper--clearfix"></div>
			</div>


			<div class="info-wrapper__block animation-step" id="celebrities__step" data-animation-run="false">
				<div class="col8 right last animation-step__element">
					<h1>Our Celebrities</h1>
					<h2 class="helper--highlight-text">Who's been working with us?</h2>
					<p>Checkout the celebrities that are supporting our cause. Each has participated in a number of sporting challenges</p>
					<p>We have great people like James Corden working with us and supporting ur great cause.</p>
					<?= $this->Html->link('find out more',array('controller' => 'celebrities', 'action' => 'viewAll'),array('class' => 'cta helper--fullwidth')) ?>
				</div>
				<div class="col4 left animation-step__element">
					<?= $this->Html->image( 'quickLinks/celebs_white.png', array('url' => array('controller' => 'celebrities', 'action' => 'viewAll')) ) ?>
				</div>
				<div class="helper--clearfix"></div>
			</div>

			<div class="info-wrapper__block animation-step" id="who-are-csk__step" data-animation-run="false">
				<div class="col8 left animation-step__element">
					<h1>Sporting Foundation</h1>
					<h2 class="helper--highlight-text">How do we help children through sports?</h2>
					<p>We believe that every child in the country deserves the right to play a vast variety or sports.</p>
					<p>Our sporting program is designed to provide the equipment and coaching needed for our youngstars to be successfull sports men and women.</p>
					<?= $this->Html->link('find out more',array('controller' => 'game_balls', 'action' => 'checkResults'),array('class' => 'cta helper--fullwidth')) ?>
				</div>
				<div class="col4 right last animation-step__element">
					<?= $this->Html->image( 'quickLinks/charity_white.png', array('url' => array('controller' => 'game_balls', 'action' => 'checkResults'))) ?>
				</div>
				<div class="helper--clearfix"></div>
			</div>


			<div class="info-wrapper__block animation-step" id="celebrities__step" data-animation-run="false">
				
				<div class="col8 right last animation-step__element">
					<h1>Spot The Ball</h1>
					<h2 class="helper--highlight-text">Why do we use spot the ball?</h2>
					<p>Spot the ball is an age old game that we can all relate to from our childhood.</p>
					<p>It gives us the ability to raise money whilst giving the players a chance to win the jackpot!</p>
					<?= $this->Html->link('find out more',array('controller' => 'game_balls', 'action' => 'checkResults'),array('class' => 'cta helper--fullwidth')) ?>
				</div>
				<div class="col4 left animation-step__element">
					<?= $this->Html->image( 'quickLinks/results_white.png', array('url' => array('controller' => 'game_balls', 'action' => 'checkResults'))) ?>
				</div>
				<div class="helper--clearfix"></div>
			</div>

		</section>
		

		<div id="home_container">
			<div class="grid" id="home_grid">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
			<?= $this->element('footer'); ?>
		</div>
	</body>
</html>