<div class="grid" id="main_grid">
	<div id="loupe" oncontextmenu="toggleLoupe();return false;">
		<?= $this->element('game/game_loupe'); ?>
	</div>

	<div class="[ onerow ]  [ scene__element  scene__element--fadeinup ]">
		<div class="col12">
			<h1><?=$realDate?> - your selections</h1>
			<a href="<?=$this->Html->url(array('controller'=>'Users', 'action'=>'accountAdmin'))?>">back to my account</a>
		</div>
	</div>

	<div class="[ onerow ]  [ scene__element  scene__element--fadeinup ]  [ alt-background ]">
		<div class="col4">
			<h2 class="border_bottom large_indent">game details</h2>
			<div class="large_indent text_info">
				<p>game month <span class="large_text"><?=$realDate?></span></p>
				<p>celebrity <span class="large_text"><?=$celebrityName?></span></p>
				<p>charity <span class="large_text"><?=$charityName?></span></p>
				<p>total # of gameballs played <span class="large_text"><?=$numberOfBallsPlayed?></span></p>
			<?php if(!$gameHasEnded){
			}else{
				echo '<p>winning coordinates <span class="large_text">x ' . $winningX . ' y ' . $winningY . '</span></p>';
				echo '<p>closest gameball <span class="large_text">#' . $closestResult['GameBall']['gameballNumber'] . '</span></p>';
				echo '<p>best ranking <span class="large_text">' . $bestRanking . '</span></p>';
				echo '<p>closest distance to winning spot <span class="large_text">' . $closestResult['GameBall']['distanceFromWinningSpot']  . '</span></p>';
				echo '<p>average distance to winning spot <span class="large_text">' . $averageDistance . '</span></p>';
			}?>
			</div>
		</div>
		<div class="col8 last">
			<?= $this->element('game/game_images'); ?>
		</div>
	</div>

	<?php
	if($gameHasEnded){
	?>
		<div class="onerow">
			<div class="col12">
				<h2>winners</h2>
				<div>
					<table>
						<tr>
							<th>ranking</th>
							<th>username</th>
							<th>team</th>
							<th>x</th>
							<th>y</th>
							<th>how close?</th>
						</tr>
						<?php
						$i = 0;
						foreach ($topOfLeaderboard as $key => $selection) {
							
							if($selection['GameBall']['username'] == $username){
								$class = "class='helper--highlight-text'";
							}else{
								$class = "";
							}
						?>
							<tr>
								<td <?=$class?> > <?=$i + 1?></td>
								<td <?=$class?> > <?=$selection['GameBall']['username']?></td>
								<td <?=$class?> > <?=$selection['GameBall']['team']?></td>
								<td <?=$class?> > <?=$selection['GameBall']['x']?></td>
								<td <?=$class?> > <?=$selection['GameBall']['y']?></td>
								<td <?=$class?> > <?=$selection['GameBall']['distanceFromWinningSpot']?></td>
							</tr>
						<?php
							$i++;
						}
						if( isset($beforeUserLeaderboard) ){
							echo '<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>';
							$i = sizeof($beforeUserLeaderboard);
							foreach ($beforeUserLeaderboard as $key => $selection) {
							?>
								<tr>
									<td><?=$bestRanking - $i?></td>
									<td><?=$selection['GameBall']['username']?></td>
									<td><?=$selection['GameBall']['team']?></td>
									<td><?=$selection['GameBall']['x']?></td>
									<td><?=$selection['GameBall']['y']?></td>
									<td><?=$selection['GameBall']['distanceFromWinningSpot']?></td>
								</tr>
							<?php
								$i--;
							}
						?>
							<tr>
								<td class="helper--highlight-text"><?=$bestRanking?></td>
								<td class="helper--highlight-text"><?=$closestResult['GameBall']['username']?></td>
								<td class="helper--highlight-text"><?=$closestResult['GameBall']['team']?></td>
								<td class="helper--highlight-text"><?=$closestResult['GameBall']['x']?></td>
								<td class="helper--highlight-text"><?=$closestResult['GameBall']['y']?></td>
								<td class="helper--highlight-text"><?=$closestResult['GameBall']['distanceFromWinningSpot']?></td>
							</tr>
						<?php
						}

						if( isset($afterUserLeaderboard) ){
							$i = 1;
							foreach ($afterUserLeaderboard as $key => $selection) {
								$bestRanking++;
							?>
								<tr>
									<td><?=$bestRanking?></td>
									<td><?=$selection['GameBall']['username']?></td>
									<td><?=$selection['GameBall']['team']?></td>
									<td><?=$selection['GameBall']['x']?></td>
									<td><?=$selection['GameBall']['y']?></td>
									<td><?=$selection['GameBall']['distanceFromWinningSpot']?></td>
								</tr>
							<?php
							$i++;
							}
						}
						?>
						<tr>
							<td>...</td>
							<td>...</td>
							<td>...</td>
							<td>...</td>
							<td>...</td>
							<td>...</td>
						</tr>

					</table>
				</div>
			</div>
		</div>
	<?php
	}
	if (sizeof($distinctMonths) > 0) {
	?>
		<div class="[ onerow ]  [ alt-background ]  [ scene__element  scene__element--fadeinup ]">
			<div class="col12">
				<?=$this->element('gameballs/months_played');?>
			</div>
		</div>
	<?php
	}
	?>
</div>

<script>

	$(document).ready(function() {

		$(".main_game_image").click( function(event) {		
			enterSelectMode();
		});

		$(".main_game_image").mousemove(function(event) {
			findMouse(event,date);
		});
		
		$("#loupe_image_container").mousemove(function(event) {
			findMouseWithinLoupe(event,date);
		});
	});


	function changeSelectionIcon(elem,date){
		
		var idArray = elem.id.split("_");
		var rowId = elem.id;
		var rowType = idArray[2];
		var idNumber = idArray[0];

		var altRow = (rowType == "transfer") ? idNumber + "_checkbox_gameball" : idNumber + "_checkbox_transfer";

		if( $("#" + altRow).length > 0 ){
			if($("#" + rowId).prop("checked") == true){
				$("#" + altRow).prop("checked", true);
			}else{
				$("#" + altRow).prop("checked", false);
			}
		}
		var selectedId = '#selected_' + idNumber + '_' + date + '_normal';
		var unselectedId = '#unselected_' + idNumber + '_' + date + '_normal';
		var selectedIdLoupe = '#selected_' + idNumber + '_' + date + '_loupe';
		var unselectedIdLoupe = '#unselected_' + idNumber + '_' + date + '_loupe';

		if( $('#unselected_' + idNumber + '_' + date + '_normal').css('display') != 'none'){
			$(unselectedId).css("display","none");
			$(selectedId).css("display","block");
			$(selectedId).css("zIndex","4");

			$(unselectedIdLoupe).css("display","none");
			$(selectedIdLoupe).css("display","block");
			$(selectedIdLoupe).css("zIndex","4");
		}else{
			$(unselectedId).css("display","block");
			$(selectedId).css("display","none");
			$(selectedId).css("zIndex","0");

			$(unselectedIdLoupe).css("display","block");
			$(selectedIdLoupe).css("display","none");
			$(selectedIdLoupe).css("zIndex","0");
		}
	}
</script>