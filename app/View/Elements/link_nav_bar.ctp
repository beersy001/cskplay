<ul id="nav_bar">
	<li id="home_menu_item">
		<?=
		$this->Html->link('home',array('controller' => 'pages', 'action' => 'home'));?>
	</li>

	<li id="home_menu_item">
		<?=$this->Html->link('about us',array('controller' => 'pages', 'action' => 'csk'));?>
		<ul>
			<div class="col">
				<h1>about Celebrity Spot Kick</h1>
				<li>
					<?= $this->Html->link('about us',array('controller' => 'pages', 'action' => 'csk')); ?>
				</li>

				<li>
					<?= $this->Html->link('prizes',array('controller' => 'pages', 'action' => 'aboutus/prizes')); ?>
				</li>

				<li>
					<?= $this->Html->link('giving',array('controller' => 'pages', 'action' => 'aboutus/giving')); ?>
				</li>

				<li>
					<?=$this->Html->link('partners',array('controller' => 'partners', 'action' => 'viewAll'));?>
				</li>
			</div>
		</ul>
	</li>

	<li id="play_menu_item">
		<?=$this->Html->link('play',array('controller' => 'games', 'action' => 'displayGame')); ?>
		
		<ul>
			<div class="col">
				<h1>play</h1>
				<li>
					<?= $this->Html->link('play now',array('controller' => 'games', 'action' => 'displayGame')); ?>
				</li>

				<li>
					<?= $this->Html->link('my account',array('controller' => 'users', 'action' => 'accountAdmin')); ?>
				</li>
			</div>
		</ul>
	</li>

	<li id="celebrities_menu_item">
		<?=$this->Html->link('celebrities',array('controller' => 'celebrities', 'action' => 'viewAll'));?>
		<ul>
			
			<div class="col">
				<?php 
				//if( isset($this->Session->read('celebs')) ){
					echo '<h1>our celebrities</h1>';
					foreach ($this->Session->read('celebs') as $id => $celeb) {
						echo '<li>';
							echo $this->Html->link(strtolower($celeb['Celebrity']['firstName'] . ' ' . $celeb['Celebrity']['surname'] ),array('controller' => 'celebrities', 'action' => 'profile', 'month' => $celeb['Celebrity']['month']));
						echo '</li>';
					}
				//}

				?>
			</div>
			<div class="col last">
			</div>
		</ul>
	</li>

	<li id="charities_menu_item">
		<?=$this->Html->link('charities',array('controller' => 'charities', 'action' => 'viewAll'));?>
		<ul>
			<div class="col">
				<h1>charities</h1>
				<li>
					<?= $this->Html->link('all charities',array('controller' => 'charities', 'action' => 'viewAll')); ?>
				</li>

				<li>
					<?= $this->Html->link('celebrity\'s charity',array('controller' => 'charities', 'action' => 'viewCelebrityCharities')); ?>
				</li>

				<li>
					<?= $this->Html->link('our charity partners',array('controller' => 'charities', 'action' => 'viewCskCharities')); ?>
				</li>
			</div>
			

			<div class="col">
			<?php 
				echo '<h1>celebrity charities</h1>';
				foreach ($this->Session->read('celebCharities') as $id => $charity) {
					echo '<li>';
						echo $this->Html->link(strtolower($charity['Charity']['name']), array('controller' => 'charities', 'action' => 'profile', 'nameId' => $charity['Charity']['nameId']));
					echo '</li>';
				}
				?>
			</div>
		</ul>
	</li>


	<?php
	if($authUser['role'] == 'superuser' || $authUser['role'] == 'admin'){
	?>
		<li id="users_menu_item">
			<?=$this->Html->link('admin screen',array('controller' => 'users', 'action' => 'admin'));?>
			<ul>
				<div class="col">
					<h1>admin</h1>
					<li>
						<?= $this->Html->link('choose winning spot',array('controller' => 'winners', 'action' => 'winningSpot')); ?>
					</li>

					<li>
						<?= $this->Html->link('add  celebrity',array('controller' => 'celebrities', 'action' => 'addCelebrity')); ?>
					</li>

					<li>
						<?= $this->Html->link('add charity',array('controller' => 'charities', 'action' => 'addCharity')); ?>
					</li>

					<li>
						<?= $this->Html->link('add faq',array('controller' => 'questions', 'action' => 'addQuestion')); ?>
					</li>

					<li>
						<?= $this->Html->link('add partner',array('controller' => 'partners', 'action' => 'addPartner')); ?>
					</li>
				</div>
				
			</ul>
		</li>
	<?php
	}
	?>
</ul>