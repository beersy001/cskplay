<div class="grid" id="main_grid">

	<div id="video-wrapper" class="[ video-bg-wrapper  video-bg-wrapper--100vh ]  [ helper--minus-header-margin ]  [ scene__element  scene__element--fadeinup ]">
		<div class="video-bg-wrapper__overlay">
			<div class="overlay__content-wrapper">
				<h1 class="content-wrapper__heading">Celebrity Spot Kick's Friends</h1>
				<p class="helper--center-align">We are grateful to have the following partners that we continually work closely with to bring you Celebrity Spot Kick, and allow us to do all the good things we can.  Our partners have helped us from developing our site to sponsoring us through marketing, utilising sports stadiums to ensuring we are doing our utmost in giving in the best possible way.</p>
			</div>

			<div class="scroll-wrapper">
				<a href="#section__csk-friends">scroll down</a>
				<i class="fa fa-3 fa-angle-down"></i>
			</div>
		</div>

		<script>
			$('#video-wrapper').tubular({videoId: 'IAb-OD-5JFI'});
		</script>
	</div>

	<div class="[ one-page-nav-wrapper ]  [ js-fix-to-top ]">
		<h3>Celebrity Spot Kick's Friends</h3>
		<div class="[ one-page-nav-wrapper__inner-wrapper ]">
			<ul>
				<li>
					<a href="#header-wrapper">top</a>
				</li>
				<li>
					<a href="#section__csk-friends">our friends</a>
				</li>

				<?php
				foreach($partners as $partner){
				?>
					<li>
						<a href="#section__<?=$partner['Partner']['partnerNameId'];?>"><?=$partner['Partner']['name'];?></a>
					</li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>



<!-- -------------------------------------------------------------------------------------- -->



	<section id="section__csk-friends" class="[ onerow  onerow--reduce-70pc ]  [ alt-background ]  [ js-fix-to-top__anchor ]">
		<div class="[ col12 ]">
			<div class="[ media-wrapper ]">
				<div class="[ media-wrapper__header ]  [ helper--center-align ]">
					<h1>our friends</h1>
					<h2 class="[ helper--highlight-text ]">who's helping us achieve our goals?</h2>
				</div>

				<div class="[ media-wrapper__body ]">
					<div class="[ body__image-wrapper  body__image-wrapper--60-margin ]">
						<img src="/img/icons/results_white_200x200.png">
					</div>

					<div class="[ body__text-wrapper ]">
						<p>We are a team of professionals from all walks of life and industries, including sports, marketing, finance, charity and social media, brought together by two individuals wanting to make a difference.</p>
						<p>We are all pulling in the same direction to create a long-lasting legacy of giving and providing a platform to give underprivileged children in this Country the ability to play and take part in many different sports.</p>
						<p>Our mission is to raise money for charities, good causes and Celebrity Spot Kick’s Sporting Programmes, through sport orientated online competitions. Our aim is to ensure each competition is both fun and worthwhile for you as our players and supporters and charities alike.</p>
					</div>
				</div>
				<div class="[ media-wrapper__footer ]">
					<?= $this->Html->link('Play Now!',array('controller' => 'games', 'action' => 'displayGame'),array('class' => 'cta helper--fullwidth')) ?>
				</div>
			</div>
		</div>
	</section>
	
	<?php
	$i = 0;
	foreach($partners as $partner){
	?>
		<section id="section__<?=$partner['Partner']['partnerNameId'];?>" class="[ onerow  onerow--reduce-70pc ]  [ main-background ]">
			<div class="[ col12 ]">
				<div class="[ media-wrapper ]">
					<div class="[ media-wrapper__header ]  [ helper--center-align ]">
						<h1><?=$partner['Partner']['name'];?></h1>
						<h2 class="[ helper--highlight-text ]">who's helping us achieve our goals?</h2>
					</div>

					<div class="[ media-wrapper__body ]">
						<div class="[ body__image-wrapper  body__image-wrapper--60-margin ]">
							<img class="[ helper--circular-img ]" src="/img/partners/<?=$partner['Partner']['partnerNameId'];?>/logo.png">
						</div>

						<div class="[ body__text-wrapper ]">
							<p><?=$partner['Partner']['textarea1'];?></p>
						</div>
					</div>
					<!--
					<div class="[ media-wrapper__footer ]">
						<?= $this->Html->link('Play Now!',array('controller' => 'games', 'action' => 'displayGame'),array('class' => 'cta helper--fullwidth')) ?>
					</div>
					-->
				</div>
			</div>
		</section>
	<?php
	}
	?>
</div>