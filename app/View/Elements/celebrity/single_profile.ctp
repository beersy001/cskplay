<div class="video-bg-wrapper">
	<iframe frameborder="0" height="100%" width="100%" 
		src="https://www.youtube.com/embed/X6szaj4R1OY?autoplay=1&controls=0&loop=1&rel=0&showinfo=0&autohide=1&wmode=transparent&hd=1">
	</iframe></div>



<div class="onerow background_container">
	<div class="col12">
		<h1 class="border_bottom"><?=$realMonth . ' - ' . $celebName?></h1>
	</div>
</div>

<div class="onerow background_container">
	<div class="col2">
		<?= $this->Html->image( $image1 ) ?>
	</div>
	<div class="col2">
		<?= $this->Html->image( $image2 ) ?>
	</div>
	<div class="col2">
		<?= $this->Html->image( $image3 ) ?>
	</div>
	<div class="col2">
		<?= $this->Html->image( $image4) ?>
	</div>
	<div class="col2">
		<?= $this->Html->image( $image5 ) ?>
	</div>
	<div class="col2 last">
		<?= $this->Html->image( $image6 ) ?>
	</div>
</div>

<div class="onerow background_container">
	<div class="col6">
		<h1 class="border_bottom margin_bottom"><?=$profileHeading1?></h1>
		<?= $this->Html->image( $image7, array('class'=>'headshot_image', 'align'=>'left') ) ?>
		<p><?=$profileTextarea1?></p>
	</div>
	<div class="col6 last">
		<h1 class="border_bottom margin_bottom"><?=$profileHeading2?></h1>
		<?= $this->Html->image( $charityImage, array('class'=>'headshot_image', 'align'=>'left') ) ?>
		<p><?=$profileTextarea2?></p>
	</div>
</div>

<div class="onerow background_container">
	<div class="col6">
		<blockquote>​​<?=$outtakesQuote1?></blockquote>​
	</div>

	<div class="col6 last">
		<div class="video_container">
			<iframe class="youtube_video" src="<?=$outtakesVideoLink1?>?controls=0&showinfo=0&rel=0" allowfullscreen frameborder="0"></iframe>
		</div>
		
	</div>
</div>

<div class="onerow background_container">

	<div class="col4">
		<h1 class="border_bottom margin_bottom"><?=$outtakesHeading1;?></h1>
		<div class="video_container">
			<iframe class="youtube_video" src="<?=$outtakesVideoLink2?>?controls=0&showinfo=0&rel=0" allowfullscreen frameborder="0"></iframe>
		</div>
		<p><?=$outtakesTextarea2;?></p>
	</div>

	<div class="col4">
		<h1 class="border_bottom margin_bottom"><?=$outtakesHeading2;?></h1>
		<div class="video_container">
			<iframe class="youtube_video" src="<?=$outtakesVideoLink3?>?controls=0&showinfo=0&rel=0" allowfullscreen frameborder="0"></iframe>
		</div>
		<p><?=$outtakesTextarea1;?></p>
	</div>

	<div class="col4 last">
		<h1 class="border_bottom margin_bottom"><?=$outtakesHeading3;?></h1>
		<div class="video_container">
			<iframe class="youtube_video" src="<?=$outtakesVideoLink4?>?controls=0&showinfo=0&rel=0" allowfullscreen frameborder="0"></iframe>
		</div>
		<p><?=$outtakesTextarea3;?></p>
	</div>
</div>

<div class="onerow background_container margin_bottom">
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