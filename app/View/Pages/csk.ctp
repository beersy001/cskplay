<div class="grid" id="main_grid">

	<div class="onerow background_container">
		<div class="col3">
		</div>

		<div class="col9 last">
			<h1>Celebrity Spot Kick</h1>
		</div>
	</div>

	<div class="onerow background_container margin_bottom">
		<div id="side_menu" class="col3">
			<?= $this->element('about_us_nav_bar'); ?>
		</div>
		
		<div class="col6">

			<div class="about_section">
				<h1>about us</h1>

				<p>We are a team of professionals from all walks of life and industries, including sports, marketing, finance, charity and social media, brought together by two individuals wanting to make a difference.</p>

				<p>We are all pulling in the same direction to create a long-lasting legacy of giving and providing a platform to give underprivileged children in this Country the ability to play and take part in many different sports.</p>

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