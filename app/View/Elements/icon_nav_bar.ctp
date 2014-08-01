<ul id="nav_bar">
	<li id="home_menu_item">
		<?=$this->Html->link('home',array('controller' => 'pages', 'action' => 'home'));?>
	</li>

	<li id="play_menu_item">
		<?=$this->Html->link('play',array('controller' => 'games', 'action' => 'displayGame')); ?>

		<ul>
			<li>
				<div class="crossfade_container">
					<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'games', 'action' => 'displayGame'));?>">
						<?= $this->Html->image( 'quickLinks/team_white.png', array('class'=>' icon fade_top') ) ?>
						<?= $this->Html->image( 'quickLinks/team_white.png', array('class'=>' icon fade_bottom') ) ?>
						<?= $this->Html->link('play now',array('controller' => 'games', 'action' => 'displayGame')); ?>
					</a>
				</div>
			</li>

			<li>
				<div class="crossfade_container">
					<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'games', 'action' => 'displayDemo'));?>">
						<?= $this->Html->image( 'quickLinks/results_white.png', array('class'=>' icon fade_top') ) ?>
						<?= $this->Html->image( 'quickLinks/results_orange.png', array('class'=>' icon fade_bottom') ) ?>
						<?= $this->Html->link('demo',array('controller' => 'games', 'action' => 'displayDemo')); ?>
					</a>
				</div>
			</li>

			<li>
				<div class="crossfade_container">
					<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'games', 'action' => 'displayGame'));?>">
						<?= $this->Html->image( 'quickLinks/results_white.png', array('id'=>'good_causes_button', 'class'=>' icon fade_top') ) ?>
						<?= $this->Html->image( 'quickLinks/results_orange.png', array('id'=>'good_causes_button', 'class'=>' icon fade_bottom') ) ?>
						<?= $this->Html->link('check results',array('controller' => 'games', 'action' => 'checkResults')); ?>
					</a>
				</div>
			</li>

			<li>
				<div class="crossfade_container">
					<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'users', 'action' => 'accountAdmin'));?>">
						<?= $this->Html->image( 'quickLinks/charity_white.png', array('class'=>' icon fade_top') ) ?>
						<?= $this->Html->image( 'quickLinks/charity_orange.png', array('class'=>' icon fade_bottom') ) ?>
						<?= $this->Html->link('my account',array('controller' => 'users', 'action' => 'accountAdmin')); ?>
					</a>
				</div>
			</li>

		</ul>
	</li>

	<li id="teams_menu_item">
		<?=$this->Html->link('teams',array('controller' => 'teams', 'action' => 'teamInfo'));?>
		<ul>
			<li>
				<div class="crossfade_container">
					<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'teams', 'action' => 'teamInfo'));?>">
						<?= $this->Html->image( 'quickLinks/team_white.png', array('class'=>' icon fade_top') ) ?>
						<?= $this->Html->image( 'quickLinks/team_white.png', array('class'=>' icon fade_bottom') ) ?>
						<?= $this->Html->link('about teams',array('controller' => 'teams', 'action' => 'teamInfo')); ?>
					</a>
				</div>
			</li>

			<?php
			if(isset($authUser['teams'])){
				if($authUser){
					foreach ($authUser['teams'] as $teamName => $teamArray) {
						echo '<li>';
							echo '<div class="crossfade_container">';
								echo '<a class="crossfade_image" href="' . $this->Html->url(array("controller" => "teams", "action" => "viewTeam", "id" => $teamArray["id"])) . '">';
									echo $this->Html->image( 'quickLinks/team_white.png', array('class'=>' icon fade_top') );
									echo $this->Html->image( 'quickLinks/team_white.png', array('class'=>' icon fade_bottom') );
									echo $this->Html->link($teamArray['name'],array('controller' => 'teams', 'action' => 'viewTeam', 'id' => $teamArray['id']));
								echo '</a>';
							echo '</div>';
						echo '</li>';							
					}
				}
			}
			?>
		</ul>
	</li>

	<li id="celebrities_menu_item">
		<?=$this->Html->link('celebrities',array('controller' => 'celebrities', 'action' => 'viewAll'));?>
		<ul>

			<li>
				<div class="crossfade_container">
					<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'celebrities', 'action' => 'viewAll'));?>">
						<?= $this->Html->image( 'quickLinks/celebs_white.png', array('class'=>' icon fade_top') ) ?>
						<?= $this->Html->image( 'quickLinks/celebs_orange.png', array('class'=>' icon fade_bottom') ) ?>
						<?= $this->Html->link('all celebrities',array('controller' => 'celebrities', 'action' => 'viewAll')); ?>
					</a>
				</div>
			</li>

			<li>
				<div class="crossfade_container">
					<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'celebrities', 'action' => 'viewAllOuttakes'));?>">
						<?= $this->Html->image( 'quickLinks/outtakes_white.png', array('class'=>' icon fade_top') ) ?>
						<?= $this->Html->image( 'quickLinks/outtakes_orange.png', array('class'=>' icon fade_bottom') ) ?>
						<?= $this->Html->link('all outtakes',array('controller' => 'celebrities', 'action' => 'viewAllOuttakes')); ?>
					</a>
				</div>
			</li>

			<li>
				<div class="crossfade_container">
					<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'celebrities', 'action' => 'profile', 'month'=>date('Ym')));?>">
						<?= $this->Html->image( 'quickLinks/celebs_white.png', array('class'=>' icon fade_top') ) ?>
						<?= $this->Html->image( 'quickLinks/celebs_orange.png', array('class'=>' icon fade_bottom') ) ?>
						<?= $this->Html->link('this months celebrity',array('controller' => 'celebrities', 'action' => 'profile', 'month'=>date('Ym'))); ?>
					</a>
				</div>
			</li>

			<li>
				<div class="crossfade_container">
					<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'celebrities', 'action' => 'outtakes', 'month'=>date('Ym')));?>">
						<?= $this->Html->image( 'quickLinks/outtakes_white.png', array('class'=>' icon fade_top') ) ?>
						<?= $this->Html->image( 'quickLinks/outtakes_orange.png', array('class'=>' icon fade_bottom') ) ?>
						<?= $this->Html->link('this month\'s outtakes',array('controller' => 'celebrities', 'action' => 'outtakes', 'month'=>date('Ym'))); ?>
					</a>
				</div>
			</li>

		</ul>
	</li>

	<li id="charities_menu_item">
		<?=$this->Html->link('charities',array('controller' => 'charities', 'action' => 'viewAll'));?>
		<ul>

			<li>
				<div class="crossfade_container">
					<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'charities', 'action' => 'viewAll'));?>">
						<?= $this->Html->image( 'quickLinks/charity_white.png', array('class'=>' icon fade_top') ) ?>
						<?= $this->Html->image( 'quickLinks/charity_orange.png', array('class'=>' icon fade_bottom') ) ?>
						<?= $this->Html->link('all charities',array('controller' => 'charities', 'action' => 'viewAll')); ?>
					</a>
				</div>
			</li>

			<li>
				<div class="crossfade_container">
					<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'charities', 'action' => 'viewCelebrityCharities'));?>">
						<?= $this->Html->image( 'quickLinks/celebs_white.png', array('class'=>' icon fade_top') ) ?>
						<?= $this->Html->image( 'quickLinks/celebs_orange.png', array('class'=>' icon fade_bottom') ) ?>
						<?= $this->Html->link('celebrity\'s charity',array('controller' => 'charities', 'action' => 'viewCelebrityCharities')); ?>
					</a>
				</div>
			</li>

			<li>
				<div class="crossfade_container">
					<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'charities', 'action' => 'viewCskCharities'));?>">
						<?= $this->Html->image( 'quickLinks/charity_white.png', array('class'=>' icon fade_top') ) ?>
						<?= $this->Html->image( 'quickLinks/charity_orange.png', array('class'=>' icon fade_bottom') ) ?>
						<?= $this->Html->link('our charity partners',array('controller' => 'charities', 'action' => 'viewCskCharities')); ?>
					</a>
				</div>
			</li>

		</ul>
	</li>

	<li id="partners_menu_item">
		<?=$this->Html->link('partners',array('controller' => 'partners', 'action' => 'viewAll'));?>
	</li>

	<?php
	if($authUser['role'] == 'superuser' || $authUser['role'] == 'admin'){
	?>
		<li id="users_menu_item">
			<?=$this->Html->link('admin screen',array('controller' => 'users', 'action' => 'admin'));?>
			<ul>

				<li>
					<div class="crossfade_container">
						<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'winners', 'action' => 'winningSpot'));?>">
							<?= $this->Html->image( 'quickLinks/win_white.png', array('class'=>' icon fade_top') ) ?>
							<?= $this->Html->image( 'quickLinks/win_orange.png', array('class'=>' icon fade_bottom') ) ?>
							<?= $this->Html->link('choose winning spot',array('controller' => 'winners', 'action' => 'winningSpot')); ?>
						</a>
					</div>
				</li>

				<li>
					<div class="crossfade_container">
						<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'celebrities', 'action' => 'addCelebrity'));?>">
							<?= $this->Html->image( 'quickLinks/celebs_white.png', array('class'=>' icon fade_top') ) ?>
							<?= $this->Html->image( 'quickLinks/celebs_orange.png', array('class'=>' icon fade_bottom') ) ?>
							<?= $this->Html->link('add  celebrity',array('controller' => 'celebrities', 'action' => 'addCelebrity')); ?>
						</a>
					</div>
				</li>

				<li>
					<div class="crossfade_container">
						<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'charities', 'action' => 'addCharity'));?>">
							<?= $this->Html->image( 'quickLinks/charity_white.png', array('class'=>' icon fade_top') ) ?>
							<?= $this->Html->image( 'quickLinks/charity_orange.png', array('class'=>' icon fade_bottom') ) ?>
							<?= $this->Html->link('add charity',array('controller' => 'charities', 'action' => 'addCharity')); ?>
						</a>
					</div>
				</li>

				<li>
					<div class="crossfade_container">
						<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'questions', 'action' => 'addQuestion'));?>">
							<?= $this->Html->image( 'quickLinks/pencil_white.png', array('class'=>' icon fade_top') ) ?>
							<?= $this->Html->image( 'quickLinks/pencil_orange.png', array('class'=>' icon fade_bottom') ) ?>
							<?= $this->Html->link('add faq',array('controller' => 'questions', 'action' => 'addQuestion')); ?>
						</a>
					</div>
				</li>

				<li>
					<div class="crossfade_container">
						<a class="crossfade_image" href="<?=$this->Html->url(array('controller' => 'partners', 'action' => 'addPartner'));?>">
							<?= $this->Html->image( 'quickLinks/pencil_white.png', array('class'=>' icon fade_top') ) ?>
							<?= $this->Html->image( 'quickLinks/pencil_orange.png', array('class'=>' icon fade_bottom') ) ?>
							<?= $this->Html->link('add partner',array('controller' => 'partners', 'action' => 'addPartner')); ?>
						</a>
					</div>
				</li>
			</ul>
		</li>
	<?php
	}
	?>
</ul>