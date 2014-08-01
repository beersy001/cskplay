<div class="grid" id="main_grid">
	<div class="onerow">
		<div class="col6">
			<h1><?=$celebName?></h1>
			<?= $this->Html->image( $celebImage, array('id'=>'celebPicture') ) ?>
		</div>

		<div class="col6 last">
			<h2>This Months Celebrity</h2>
			<p>
				<?=$celebText?>
			</p>
		</div>
	</div>
</div>