<div class="grid" id="main_grid">
	<div class="onerow background_container">
		<div class="col9">
			<h1 class="margin_bottom"><?= $heading1; ?></h1>
			<p><?= $textarea1; ?></p>
		</div>

		<div class="col3 last">
			<?= $this->Html->image( $partnerLogo )?>
		</div>
	</div>

	<div class="onerow background_container margin_bottom">
		<div class="col4">
			<div class="video_container ">
				<iframe class="youtube_video" src="<?=$videoLink1?>?controls=0&showinfo=0&rel=0" allowfullscreen frameborder="0"></iframe>
			</div>
		</div>

		<div class="col4">
			<div class="video_container ">
				<iframe class="youtube_video" src="<?=$videoLink2?>?controls=0&showinfo=0&rel=0" allowfullscreen frameborder="0"></iframe>
			</div>
		</div>

		<div class="col4 last">
			<div class="video_container ">
				<iframe class="youtube_video" src="<?=$videoLink3?>?controls=0&showinfo=0&rel=0" allowfullscreen frameborder="0"></iframe>
			</div>
		</div>
	</div>
</div>

<?= $this->element('quick_links'); ?>