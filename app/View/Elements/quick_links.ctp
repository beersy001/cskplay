<input type="checkbox" class="hidden_label" id="quick_links_sliding_container_button">
<div class="sliding_container" id="quick_links_element">


	<label class="dividing_row top" for="quick_links_sliding_container_button">
		<div class="col12">	
			<h1><a>quick links</a></h1>
		</div>
	</label>

	<div class="onerow" id="quick_links">

		<div class="col2 crossfade_container">
			<div class="crossfade_image">
				<?= $this->Html->image( 'quickLinks/charity_white.png', array('id'=>'good_causes_button', 'class'=>' icon fade_top', 'url' => array('controller' => 'charities', 'action' => 'viewAll')) ) ?>
				<?= $this->Html->image( 'quickLinks/charity_orange.png', array('id'=>'good_causes_button', 'class'=>' icon fade_bottom', 'url' => array('controller' => 'charities', 'action' => 'viewAll')) ) ?>
			</div>
			<br>
			<?= $this->Html->link('charities',array('controller' => 'charities', 'action' => 'viewAll'),array()) ?>
		</div>

		<div class="col2 crossfade_container">
			<div class="crossfade_image ">
				<?= $this->Html->image( 'quickLinks/results_white.png', array('id'=>'', 'class'=>'icon fade_top', 'url' => array('controller' => 'game_balls', 'action' => 'checkResults')) ) ?>
				<?= $this->Html->image( 'quickLinks/results_orange.png', array('id'=>'', 'class'=>'icon fade_bottom', 'url' => array('controller' => 'game_balls', 'action' => 'checkResults')) ) ?>
			</div>
			<br>
			<?= $this->Html->link('results',array('controller' => 'game_balls', 'action' => 'checkResults'),array('class' => '')) ?>
		</div>

		<div class="col2 crossfade_container">
			<div class="crossfade_image">
				<?= $this->Html->image( 'quickLinks/outtakes_white.png', array('id'=>'', 'class'=>'icon fade_top', 'url' => array('controller' => 'outtakes', 'action' => 'viewAll')) ) ?>
				<?= $this->Html->image( 'quickLinks/outtakes_orange.png', array('id'=>'', 'class'=>'icon fade_bottom', 'url' => array('controller' => 'outtakes', 'action' => 'viewAll')) ) ?>
			</div>
			<br>
			<?= $this->Html->link('outtakes',array('controller' => 'outtakes', 'action' => 'viewAll'),array('class' => '')) ?>
		</div>

		<div class="col2 crossfade_container">
			<div class="crossfade_image">
				<?= $this->Html->image( 'quickLinks/celebs_white.png', array('id'=>'good_causes_button', 'class'=>'icon fade_top', 'url' => array('controller' => 'celebrities', 'action' => 'viewAll')) ) ?>
				<?= $this->Html->image( 'quickLinks/celebs_orange.png', array('id'=>'good_causes_button', 'class'=>'icon fade_bottom', 'url' => array('controller' => 'celebrities', 'action' => 'viewAll')) ) ?>
			</div>
			<br>
			<?= $this->Html->link('celebrities',array('controller' => 'celebrities', 'action' => 'viewAll'),array('class' => '')) ?>
		</div>

		<div class="col2 crossfade_container">
			<div class="crossfade_image">
				<?= $this->Html->image( 'quickLinks/win_white.png', array('id'=>'', 'class'=>'icon fade_top', 'url' => array('controller' => 'pages', 'action' => 'prizes')) ) ?>
				<?= $this->Html->image( 'quickLinks/win_orange.png', array('id'=>'', 'class'=>'icon fade_bottom', 'url' => array('controller' => 'pages', 'action' => 'prizes')) ) ?>
			</div>
			<br>
			<?= $this->Html->link('win',array('controller' => 'pages', 'action' => 'prizes'),array('class' => '')) ?>
		</div>

		<div class="col2 last crossfade_container">
			<div class="crossfade_image">
				<?= $this->Html->image( 'quickLinks/contact_white.png', array('id'=>'', 'class'=>'icon fade_top', 'url' => array('controller' => 'pages', 'action' => 'contactUs')) ) ?>
				<?= $this->Html->image( 'quickLinks/contact_orange.png', array('id'=>'', 'class'=>'icon fade_bottom', 'url' => array('controller' => 'pages', 'action' => 'contactUs')) ) ?>
			</div>
			<br>
			<?= $this->Html->link('contact',array('controller' => 'pages', 'action' => 'contactUs'),array('class' => '')) ?>
		</div>
	</div>
</div>