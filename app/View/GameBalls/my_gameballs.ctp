<?php
$this->Html->script( 'gamePlay', array('inline'=>false));
$this->Html->script( 'ajaxGetSelections', array('inline'=>false));
$this->Html->script( 'moveUserSelections', array('inline'=>false));
?>

<script>
	$(document).ready(function() {
		var originalFontSize = 16;
		var sectionWidth = $('.adaptive_text').width();

		$('.adaptive_text a').each(function(){
			var spanWidth = $(this).width();
			var newFontSize = (sectionWidth/spanWidth) * originalFontSize;
			$(this).css({"font-size" : newFontSize, "line-height" : newFontSize/1.2 + "px"});
		});
	});
</script>

<div class="grid" id="main_grid">
	<div id="loupe" oncontextmenu="toggleLoupe();return false;">
		<?= $this->element('game/game_loupe'); ?>
	</div>

	<div class="onerow background_container">
		<div class="col12">
			<h1 class="border_bottom"><?=$realDate?> - your selections</h1>
			<a id="my_gameballs_return_link" href="<?=$this->Html->url(array('controller'=>'Users', 'action'=>'accountAdmin'))?>">back to my account</a>
		</div>
	</div>

	<div class="onerow background_container">
		<div class="col4 no_pad_top">
			<?= $this->Html->image( 'quickLinks/results_white.png', array('class'=>'results_title_image', 'align'=>'left') ) ?>
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

				<?php
				if(!$gameHasEnded){
				?>
					<br><br><br><br><br><br>
					<div class="adaptive_text">
						<?=$this->Html->link('play',array('controller'=>'games', 'action'=>'displayGame'), array('class'=>'no_decoration'))?>
					</div>
				<?php
				}
				?>

			</div>
		</div>
		<div class="col8 last no_padding no_margin">
			<div oncontextmenu="toggleLoupe();return false;" onmouseout="removeLoupe()">
				<?= $this->element('game/game_images'); ?>
			</div>
		</div>
	</div>

	<div class="onerow background_container">
		<?php if(!$gameHasEnded){
		?>	
			<div class="col12">
				<?= $this->Html->image( 'logo_white.png', array('class'=>'logo_title_image', 'align'=>'left') ); ?>
				<h2 class="large_indent border_bottom margin_bottom">transfer gameballs</h2>

				<div class="large_indent">
					<div class="tabular_form tabular_form_header">
						<span class="width25">#</span>
						<span class="width245">id</span>
						<span class="width100">team</span>
						<span class="width50">x</span>
						<span class="width50">y</span>
						<span class="width175">date played</span>
						<span class="width75">highlight</span>
						<?php if(isset($teams)){
							echo '<span class="width100">submit</span>';
						} ?>
					</div>

					<?php
					$i = 0;
					foreach ($results as $key => $selection) {
						$count = $i + 1;

						if(isset($teams)){

							echo $this->Form->create('GameBall', array(
								'controller'=>'GameBalls',
								'action' => 'transferGameball',
								'class' => 'tabular_form',
								'inputDefaults' => array(
									'label' => false,
									'div' => false
									)
								));

							echo $this->Form->input('id', array(
								'type' => 'hidden',
								'value' => $selection['GameBall']['id']
							));
							
							echo '<span class="width25">' . $count . '</span>';
							echo '<span class="width245">' . $selection['GameBall']['id'] . '</span>';

							echo $this->Form->input('team', array(
								'options' => $teams,
								'class' => 'width100',
								'default' => $selection['GameBall']['team']
							));

							echo '<span class="width50">' . $selection['GameBall']['x'] . '</span>';
							echo '<span class="width50">' . $selection['GameBall']['y'] . '</span>';
							echo '<span class="width175">' . date('d/m/Y - H:i', $selection['GameBall']['created']->sec) . '</span>';
							echo '<span class="width75 checkbox"><input id="' . $i . '_checkbox_transfer" type="checkbox" onChange="changeSelectionIcon(this,' . $month . ')">' . '</span>';
							echo $this->Form->end('update');

						}else{
							echo '<div class="tabular_form">';
							echo '<span class="width25">' . $count . '</span>';
							echo '<span class="width245">' . $selection['GameBall']['id'] . '</span>';
							echo '<span class="width100">' . $selection['GameBall']['team'] . '</span>';
							echo '<span class="width50">' . $selection['GameBall']['x'] . '</span>';
							echo '<span class="width50">' . $selection['GameBall']['y'] . '</span>';
							echo '<span class="width175">' . date('d/m/Y - H:i', $selection['GameBall']['created']->sec) . '</span>';
							echo '<span class="width75 checkbox"><input id="' . $i . '_checkbox_transfer" type="checkbox" onChange="changeSelectionIcon(this,' . $month . ')">' . '</span>';
							echo '</div>';
						}

						$i++;
					}
					?>
				</div>
			</div>
		<?php
		}else if($gameHasEnded){
		?>
			<div class="col12">
				<?= $this->Html->image( 'quickLinks/win_white.png', array('class'=>'win_title_image', 'align'=>'left') ); ?>
				<h2 class="large_indent border_bottom margin_bottom">winners</h2>
				<div class="large_indent full_table">

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
		<?php
		}?>
	</div>

	<?php
	if (sizeof($distinctMonths) > 0) {
	?>
		<div class="onerow background_container margin_bottom">
			<div class="col12">
				<?= $this->Html->image( 'user_white.png', array('class'=>'user_title_image', 'align'=>'left') ); ?>
				<h2 class="large_indent border_bottom margin_bottom">my previous games</h2>
				<div class="large_indent">
					<?= $this->element('gameballs/months_played'); ?>
				</div>
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

<?= $this->element('quick_links'); ?>