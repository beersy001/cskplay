<div class="grid" id="main_grid">

	<script>var currentMonth = <?=$currentMonth?></script>

	<div id="video-wrapper" class="video-bg-wrapper helper--minus-header-margin parallax--top-position">
		<div class="video-bg-wrapper__overlay">
			<div class="overlay__content-wrapper">
				<h1 class="content-wrapper__heading"><?=$celebName?></h1>
				<p class="helper--center-align"><?=$celebName?> was a great sport, scroll down to see how they got on and take a look at their outtakes</p>
			</div>

			<div class="scroll-wrapper">
				<a href="#first-scroll-content">scroll down</a>
				<i class="fa fa-3 fa-angle-down"></i>
			</div>
		</div>
	</div>

	<script>
		$('#video-wrapper').tubular({videoId: 'IAb-OD-5JFI'});
	</script>


	<div id="first-scroll-content" class="onerow">
		<div class="col6">
			<h1><?=$profileHeading1?></h1>
			<?= $this->Html->image( $image7, array('class'=>'headshot_image', 'align'=>'left') ) ?>
			<p><?=$profileTextarea1?></p>
		</div>
		<div class="col6 last">
			<h1><?=$profileHeading2?></h1>
			<p><?=$profileTextarea2?></p>
		</div>
	</div>

	<div class="onerow alt-background">
		<div class="col6">
			<blockquote>​​<?=$outtakesQuote1?></blockquote>​
		</div>

		<div class="col6 last">
			<div class="video_container">
				<iframe class="youtube_video" src="<?=$outtakesVideoLink1?>?controls=0&showinfo=0&rel=0" allowfullscreen frameborder="0"></iframe>
			</div>
			
		</div>
	</div>

	<div class="onerow helper--no-pad parallax parallax--bg-position" style="background-image:url(/cskplay/img/celebrities/<?=$celeb['Celebrity']['nameId']?>/banner.jpg)">
		<div class="banner-wapper">
			<div class="banner-wapper__text-wrapper">
				<?= $this->Html->link('Play Now',array('controller' => 'games', 'action' => 'displayGame'),array( 'class' => 'text-wrapper__link')) ?>
			</div>
		</div>
	</div>

	<div class="onerow">
		<div class="image-gallery">
			<div class="image-gallery__col">
				<?= $this->Html->image( $image1, array("class" => "col__img") ) ?>
			</div>
			<div class="image-gallery__col">
				<?= $this->Html->image( $image2, array("class" => "col__img") ) ?>
			</div>
			<div class="image-gallery__col">
				<?= $this->Html->image( $image3, array("class" => "col__img") ) ?>
			</div>
			<div class="image-gallery__col">
				<?= $this->Html->image( $image4, array("class" => "col__img") ) ?>
			</div>
			<div class="image-gallery__col">
				<?= $this->Html->image( $image5, array("class" => "col__img") ) ?>
			</div>
			<div class="image-gallery__col">
				<?= $this->Html->image( $image6, array("class" => "col__img") ) ?>
			</div>
		</div>
	</div>

	<div class="onerow alt-background">

		<div class="col4">
			<h1><?=$outtakesHeading2;?></h1>
			<div class="video_container">
				<iframe class="youtube_video" type="text/html" src="<?=$outtakesVideoLink3?>?controls=0&showinfo=0&rel=0&wmode=opaque" allowfullscreen frameborder="0"></iframe>
			</div>
			<p><?=$outtakesTextarea1;?></p>
		</div>

		<div class="col4">
			<h1><?=$outtakesHeading2;?></h1>
			<div class="video_container">
				<iframe class="youtube_video" type="text/html" src="<?=$outtakesVideoLink3?>?controls=0&showinfo=0&rel=0&wmode=opaque" allowfullscreen frameborder="0"></iframe>
			</div>
			<p><?=$outtakesTextarea1;?></p>
		</div>

		<div class="col4 last">
			<h1 class=""><?=$outtakesHeading3;?></h1>
			<div class="video_container">
				<iframe class="youtube_video" type="text/html" src="<?=$outtakesVideoLink4?>?controls=0&showinfo=0&rel=0&wmode=opaque" allowfullscreen frameborder="0"></iframe>
			</div>
			<p><?=$outtakesTextarea3;?></p>
		</div>
	</div>

	<div class="onerow">
		<div class="col3">
			<?= $this->element('blocks/find_out_more_giving'); ?>
		</div>
		<div class="col3">
			<?= $this->element('blocks/find_out_more_about_us'); ?>
		</div>
		<div class="col3">
			<?= $this->element('blocks/find_out_more_prizes'); ?>
		</div>
		<div class="col3 last">
			<?= $this->element('blocks/find_out_more_celebrities'); ?>
		</div>
	</div>

</div>

