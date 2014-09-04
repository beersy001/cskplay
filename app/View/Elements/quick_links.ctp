<input type="checkbox" class="hidden_label" id="quick_links_sliding_container_button">
<div class="sliding_container" id="quick_links_element">


	<label class="dividing_row top" for="quick_links_sliding_container_button">
		<div class="col12">	
			<h1><a>quick links</a></h1>
		</div>
	</label>

	<div class="onerow" id="quick_links">


		<div class="col2 crossfade-wrapper">
			<a href="<?= $this->Html->url(array('controller' => 'charities', 'action' => 'viewAll'))?>">
				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--bottom">
					<?= $this->Html->image( 'icons/charity_orange.png') ?>
				</div>

				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--top">
					<?= $this->Html->image( 'icons/charity_white.png')?>
				</div>
			</a>
		</div>

		<div class="col2 crossfade-wrapper">
			<a href="<?= $this->Html->url(array('controller' => 'game_balls', 'action' => 'checkResults'))?>">
				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--bottom">
					<?= $this->Html->image( 'icons/results_orange.png' ) ?>
				</div>

				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--top">
					<?= $this->Html->image( 'icons/results_white.png') ?>
				</div>
			</a>
		</div>

		<div class="col2 crossfade-wrapper">
			<a href="<?= $this->Html->url(array('controller' => 'outtakes', 'action' => 'viewAll'))?>">
				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--bottom">
					<?= $this->Html->image( 'icons/outtakes_orange.png' ) ?>
				</div>

				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--top">
					<?= $this->Html->image( 'icons/outtakes_white.png') ?>
				</div>
			</a>
		</div>

		<div class="col2 crossfade-wrapper">
			<a href="<?= $this->Html->url(array('controller' => 'celebrities', 'action' => 'viewAll'))?>">
				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--bottom">
					<?= $this->Html->image( 'icons/celebs_orange.png' ) ?>
				</div>

				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--top">
					<?= $this->Html->image( 'icons/celebs_white.png') ?>
				</div>
			</a>
		</div>

		<div class="col2 crossfade-wrapper">
			<a href="<?= $this->Html->url(array('controller' => 'pages', 'action' => 'prizes'))?>">
				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--bottom">
					<?= $this->Html->image( 'icons/win_orange.png' ) ?>
				</div>

				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--top">
					<?= $this->Html->image( 'icons/win_white.png') ?>
				</div>
			</a>
		</div>

		<div class="col2 last crossfade-wrapper">
			<a href="<?= $this->Html->url(array('controller' => 'pages', 'action' => 'contactUs'))?>">
				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--bottom">
					<?= $this->Html->image( 'icons/contact_orange.png' ) ?>
				</div>

				<div class="crossfade-wrapper__layer crossfade-wrapper__layer--top">
					<?= $this->Html->image( 'icons/contact_white.png') ?>
				</div>
			</a>
		</div>

	</div>
</div>