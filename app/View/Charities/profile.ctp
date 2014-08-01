<div class="grid" id="main_grid">
	<div class="onerow background_container">
		<div class="col12 no_margin">
			<h1 class="border_bottom"><?=strtolower($heading1);?></h1>
		</div>
	</div>

	<div class="onerow background_container">
		<div class="col4">
			<?= $this->Html->image( $image1, array('id'=>'charity_logo', 'class' => 'margin_bottom') ) ?>
			<p><?=$textarea1?></p>

			
		</div>
		<div class="col8 last">
			<div class="video_container ">
				<iframe class="youtube_video" src="<?=$videoLink?>?controls=0&showinfo=0&rel=0" allowfullscreen frameborder="0"></iframe>
			</div>
		</div>
	</div>

	<div class="onerow background_container margin_bottom">
		<div class="col4">
			<h2 class="border_bottom margin_bottom"><?=$heading2;?></h2>
			<?= $this->Html->image( $image2, array('class'=>'headshot_image', 'align'=>'left') ) ?>
			<p><?=$textarea2?></p>		
		</div>

		<div class="col4">
			<h2 class="border_bottom margin_bottom"><?=$heading3;?></h2>
			<?= $this->Html->image( $image3, array('class'=>'headshot_image', 'align'=>'left') ) ?>
			<p><?=$textarea3?></p>
		</div>

		<div class="col4 last">
			<h2 class="border_bottom margin_bottom"><?=$heading4;?></h2>
			<?= $this->Html->image( $image4, array('class'=>'headshot_image', 'align'=>'left') ) ?>
			<p><?=$textarea4?></p>
		</div>
	</div>
</div>

<?= $this->element('quick_links'); ?>