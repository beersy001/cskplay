<div class="grid" id="main_grid">
	<div class="[ onerow ]  [ scene__element scene__element--fadeinup ]">
		<?= $this->Form->create('Game', array(
				'controller'=>'Games',
				'action' => 'add',
				'inputDefaults' => array(
					'label' => false,
					'div' => false
					)
				)); ?>

		<div class="[ colcenter40 ]">

			
			<ul>
				<li>					
					<?= $this->Form->label('Game.typeOfGame', 'type of game'); ?>
					<?= $this->Form->input('typeOfGame'); ?>
				</li>
				<li>
					<?= $this->Form->label('Game.imageId', 'image id'); ?>
					<?= $this->Form->input('imageId'); ?>
				</li>
				<li>
					<?= $this->Form->label('Game.celebFirstName', 'celeb first name'); ?>
					<?= $this->Form->input('celebFirstName'); ?>
				</li>
				<li>
					<?= $this->Form->label('Game.celebSurname', 'celeb surname'); ?>
					<?= $this->Form->input('celebSurname'); ?>
				</li>
				<li>
					<?= $this->Form->label('Game.sport', 'sport'); ?>
					<?= $this->Form->input('sport'); ?>
				</li>
				<li>
					<?= $this->Form->label('Game.month', 'month'); ?>
					<?= $this->Form->input('month'); ?>
				</li>
				<li>
					<?= $this->Form->label('Game.winningX', 'winning x'); ?>
					<?= $this->Form->input('winningX'); ?>
				</li>
				<li>
					<?= $this->Form->label('Game.winningY', 'winning y'); ?>
					<?= $this->Form->input('winningY'); ?>
				</li>
				<li>
					<?= $this->Form->label('Game.videoId', 'video id'); ?>
					<?= $this->Form->input('videoId'); ?>
				</li>
				<li>
					<?= $this->Form->end('submit'); ?>
				</li>
			</ul>

		</div>
	</div>
</div>