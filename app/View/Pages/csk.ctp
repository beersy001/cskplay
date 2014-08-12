<div class="grid" id="main_grid">

	<div id="video-wrapper" class="video-bg-wrapper helper--minus-header-margin">
		<div class="video-bg-wrapper__overlay">
			<div class="overlay__content-wrapper">
				<h1 class="content-wrapper__heading">Celebrity Spot Kick</h1>
				<p class="helper--center-align">Scroll down to find out more about us!</p>
			</div>

			<div class="scroll-wrapper">
				<a href="#first-scroll-content">scroll down</a>
				<i class="fa fa-3 fa-angle-down"></i>
			</div>
		</div>

		<script>
			$('#video-wrapper').tubular({videoId: 'IAb-OD-5JFI'});
		</script>
	</div>

	<div id="first-scroll-content" class="onerow">
		<div class="col12">
			<h1>about us</h1>
		</div>
	</div>

	<div class="onerow helper--no-pad-top">
		<div class="col4">
			<p>We are a team of professionals from all walks of life and industries, including sports, marketing, finance, charity and social media, brought together by two individuals wanting to make a difference.</p>
		</div>

		<div class="col4">
			<p>We are all pulling in the same direction to create a long-lasting legacy of giving and providing a platform to give underprivileged children in this Country the ability to play and take part in many different sports.</p>
		</div>

		<div class="col4 last">
			<p>Our mission is to raise money for charities, good causes and Celebrity Spot Kick’s Sporting Programmes, through sport orientated online competitions. Our aim is to ensure each competition is both fun and worthwhile for you as our players and supporters and charities alike.</p>
		</div>



	</div>


	<div class="onerow alt-background">
		<div class="col6">
			<p>We are a team of professionals from all walks of life and industries, including sports, marketing, finance, charity and social media, brought together by two individuals wanting to make a difference.</p>
		</div>

		<div class="col6 last">
			<p>We are all pulling in the same direction to create a long-lasting legacy of giving and providing a platform to give underprivileged children in this Country the ability to play and take part in many different sports.</p>
		</div>
	</div>


	<div class="onerow background_container margin_bottom">
		<div id="side_menu" class="col3">
			<?= $this->element('about_us_nav_bar'); ?>
		</div>
		
		<div class="col6">

			<div class="about_section">
				<h1>about us</h1>

				

				

				<?=$this->Html->link('read more',array('controller' => 'pages', 'action' => 'aboutus/about_us'));?>
			</div>

			<div class="about_section">
				<h1>giving</h1>

				<p>We are delighted to say that we give away 50% of our profit each week to good causes.  We want to make a difference in the UK by giving to many different charities.  This is only possible with your help!</p>

				<?=$this->Html->link('read more',array('controller' => 'pages', 'action' => 'aboutus/giving'));?>
			</div>

			<div class="about_section">
				<h1>Celebrity Spot Kick’s Sporting Programmes – Sports for Children</h1>

				<p>Our Sporting Programmes will focus on giving children, in underprivileged schools and communities, the ability to engage in sports they may not necessarily be able to participate in due their availability and/or cost. </p>

				<?=$this->Html->link('read more',array('controller' => 'pages', 'action' => 'aboutus/sports_for_children'));?>
			</div>



			 


			
		</div>

		<div class="col3 no_padding last">
			<?= $this->element('blocks/find_out_more_giving'); ?>
			<?= $this->element('blocks/find_out_more_celebrities'); ?>
			<?= $this->element('blocks/find_out_more_about_us'); ?>
			<?= $this->element('blocks/find_out_more_prizes'); ?>
		</div>
	</div>
</div>

<?= $this->element('quick_links'); ?>