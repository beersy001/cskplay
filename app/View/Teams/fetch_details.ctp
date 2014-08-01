<div class="col4 text_info">
	<?= $this->Html->image( 'quickLinks/team_white.png', array('class'=>'heading_image team_title_image', 'align'=>'left') ) ?>
	<h2 class="large_indent border_bottom">team info</h2>
	<div class="large_indent">
		<p>team name <span class="large_text"><?=$team['name']?></span></p>
		<p>joining pin <span class="large_text"><?=$team['pinNumber']?></span></p>
		<p onclick="teamAjaxRequest('players')" class="hidden_link">active players <span class="large_text"><?=$numberOfActivePlayers?></span></p>
		<p onclick="teamAjaxRequest('players')" class="hidden_link">non-active players <span class="large_text"><?=$numberOfNonActivePlayers?></span></p>
		<p>captain <span class="large_text"><?=$team['captain']?></span></p>
	</div>
</div>

<div class="col4 text_info">
	<?= $this->Html->image( 'quickLinks/team_white.png', array('class'=>'heading_image team_title_image', 'align'=>'left') ) ?>
	<h2 class="large_indent border_bottom">team game info</h2>
	<div class="large_indent">
		<p>total number of balls played <span class="large_text"><?=$totalBallsPlayed?></span></p>
		<!-- <p>most valuable player <span class="large_text">paul</span></p> -->
		<p>current average points <span class="large_text">0</span></p>
		<p>current team position <span class="large_text">0</span></p>
	</div>
</div>

<div class="col4 last text_info">
	<?= $this->Html->image( 'quickLinks/team_white.png', array('class'=>'heading_image team_title_image', 'align'=>'left') ) ?>
	<h2 class="large_indent border_bottom">your game info</h2>
	<div class="large_indent">
		<p>total team balls you've played <span class="large_text"><?=$totalNumberOfUsersTeamGameballs?></span></p>
		<p>your status <span class="large_text">active</span></p>
		<p>your average points <span class="large_text">0</span></p>
		<p>competitions participated in <span class="large_text">0</span></p>
	</div>
</div>