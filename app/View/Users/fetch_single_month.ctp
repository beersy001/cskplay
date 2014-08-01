
<div id="<?=$month?>_user_selection_information" class="monthly_game_details">
	<?php
	
	//print_r($results);

	$endedBool = (isset($results['ended']) && $results['ended'] == true) ? true : false ;
	$containsChoices = (sizeof($results)>0) ? true : false ;

	?>
	<div class="col3 clear">
		<br>
		<p class="clear">Game Balls played:
			<span class="helper--highlight-text"><?=$numberOfBallsPlayed?></span>
		</p>

		<?php
		if($endedBool){
		?>
			<p>your average distance: <span class="helper--highlight-text"><?=$results['averageDistance']?></span></p>
			<p>winning spot: <span class="helper--highlight-text"><?=$results['winningX']?> , <?=$results['winningY']?></span></p>
		<?php
		}
		?>
	</div>

	<div class="col3">
		<?php
		if($containsChoices){
		?>
			<table class="icon_table">
				<tr>
					<td></td>
					<td>x</td>
					<td>y</td>
					<?php
					if($endedBool){ 
						echo '<td>distance</td>';
					}?>
				</tr>
				<?php
				foreach ($results as $id => $element) {
				?>
					
					<tr id='<?=$id?>icon' onmouseover='changeSelectionIcon(this,<?= $month ?>)' onmouseout='changeSelectionIconBack(this,<?= $month ?>)'>
						<td>
							<?php echo $this->Html->image( 'logo_orange.png', array('class'=>'game_ball_image', 'id' => $id . 'bagIcon') ); ?>
						</td>
						<td>
							<?=$element['GameBall']['x']?>
						</td>
						<td>
							<?=$element['GameBall']['y']?>
						</td>
						<?php
						if($endedBool){ 
							echo '<td>';
							echo round($element['distanceFromWinningSpot'],2);
							echo '</td>';
						}?>
					</tr>
				<?php
				}
			}else{
				echo '<p>you do not have any game balls played in this team</p>';
			}
			?>
		</table>
	</div>
</div>

<div class="col6 last no_padding no_margin">
	<?php
	$imageSize = getimagesize('img/gameImages/gameImage1_large_' . $month . '.jpg');
	echo $this->Html->image( 'gameImages/gameImage1_large_'. $month .'.jpg', array('class'=>'game_image no_padding no_margin', 'id'=> 'mainImage_' . $imageSize[0] . '_' . $imageSize[1] .  '_' . $month) );
	?>

	<div class='crosshairs' id='crosshairs_<?=$month?>'>
		<?php
		if($containsChoices){
		
			foreach ($results as $id => $element) {

				$xPos = $element['GameBall']['x'];
				$yPos = $element['GameBall']['y'];

				$spanXPos = $xPos - 230;
				$spanYPos = $yPos + 100;

				echo $this->Html->image( 'logo_white.png', array('class'=>'crosshair saved_selection','id' => 'unselected_' . $id . '_' . $month . '_normal', 'style' => 'left:' . $element['GameBall']['x'] . "px; top: " . $element['GameBall']['y'] . "px" ) );
				echo $this->Html->image( 'logo_orange.png', array('class'=>'crosshair saved_selection','id' =>  'selected_' . $id . '_' . $month . '_normal', 'style' => 'left:' . $element['GameBall']['x'] . "px; top: " . $element['GameBall']['y'] . "px; display: none" ) );
			}
		}
		?>
	</div>
	<div class="full_overlay" id="game_balls_overlay">
	</div>
</div>
