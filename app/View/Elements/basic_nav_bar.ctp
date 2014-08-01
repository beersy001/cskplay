
<ul id="nav_bar">
	<li id="home_menu_item">
		<?=$this->Html->link('home',array('controller' => 'pages', 'action' => 'home'));?>
	</li>

	<li id="play_menu_item">
		<?=$this->Html->link('play',array('controller' => 'games', 'action' => 'displayGame')); ?>
		<ul>
			<li><?=$this->Html->link('play now',array('controller' => 'games', 'action' => 'displayGame')); ?></li>
			<li><?=$this->Html->link('play demo',array('controller' => 'games', 'action' => 'displayDemo')); ?></li>
			<li><?=$this->Html->link('leaderboard',array('controller' => 'GameBalls', 'action' => 'leaderboard')); ?></li>
			<li><?=$this->Html->link('my account',array('controller' => 'users', 'action' => 'accountAdmin')); ?></li>
		</ul>
	</li>

	<li id="teams_menu_item">
		<?=$this->Html->link('teams',array('controller' => 'teams', 'action' => 'aboutTeams'));?>
		<ul>
			<li><?=$this->Html->link('about teams',array('controller' => 'teams', 'action' => 'aboutTeams'));?></li>
			<?php
			if(isset($authUser['teams'])){
				if($authUser){
					foreach ($authUser['teams'] as $teamName => $teamArray) {
						echo "<li>" . $this->Html->link($teamArray['name'],array('controller' => 'teams', 'action' => 'viewTeam', 'id' => $teamArray['id'] )) . "</li>";
					}
				}
			}
			?>
			<li><?=$this->Html->link('join a team',array('controller' => 'users', 'action' => 'accountAdmin')); ?></li>
		</ul>
	</li>

	<li id="celebrities_menu_item">
		<?=$this->Html->link('celebrities',array('controller' => 'celebrities', 'action' => 'viewAll'));?>
		<ul>
			<li><?=$this->Html->link('this months celebrity' ,array('controller' => 'celebrities', 'action' => 'profile', 'month'=>date('Ym') ));?></li>
			<li><?=$this->Html->link('this months outtakes',array('controller' => 'celebrities', 'action' => 'outtakes', 'month'=>date('Ym')));?></li>
			<li><?=$this->Html->link('our celebrities',array('controller' => 'celebrities', 'action' => 'viewAll'));?></li>
			<li><?=$this->Html->link('all outtakes',array('controller' => 'celebrities', 'action' => 'viewAllOuttakes'));?></li>
		</ul>
	</li>

	<li id="charities_menu_item">
		<?=$this->Html->link('charities',array('controller' => 'charities', 'action' => 'viewAll'));?>
		<ul>
			<li><?=$this->Html->link('celebrity sponsored charity',array('controller' => 'charities', 'action' => 'viewCelebrityCharities'));?></li>
			<li><?=$this->Html->link('our charities',array('controller' => 'charities', 'action' => 'viewAll'));?></li>
			<li><?=$this->Html->link('our charity partners',array('controller' => 'charities', 'action' => 'viewCskCharities'));?></li>
		</ul>
	</li>

	<li id="partners_menu_item">
		<?=$this->Html->link('partners',array('controller' => 'partners', 'action' => 'viewAll'));?>
		<ul>
			<li><?=$this->Html->link('all partners',array('controller' => 'partners', 'action' => 'viewAll'));?></li>
		</ul>
	</li>

	<?php
	if($authUser['role'] == 'superuser' || $authUser['role'] == 'admin'){
	?>
		<li id="admin_menu_item">
			<?=$this->Html->link('admin screen',array('controller' => 'users', 'action' => 'admin'));?>
			<ul>
				<li> <?= $this->Html->link('admin',array('controller' => 'users', 'action' => 'admin')) . '</li>';?>
				<li> <?= $this->Html->link('choose winning spot',array('controller' => 'winners', 'action' => 'winningSpot')) . '</li>';?>
				<li> <?= $this->Html->link('celebrity admin',array('controller' => 'celebrities', 'action' => 'celebrityAdmin')) . '</li>';?>
				<li> <?= $this->Html->link('charity admin',array('controller' => 'charities', 'action' => 'charityAdmin')) . '</li>';?>
				<li> <?= $this->Html->link('add partners',array('controller' => 'partners', 'action' => 'addPartner')) . '</li>';?>
			</ul>
		</li>
	<?php
	}
	?>
</ul>