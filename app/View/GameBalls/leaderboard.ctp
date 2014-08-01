<div class="grid" id="main_grid">
	<div class="onerow background_container">
		<div class="col12">
			<h1>individual leaderboards</h1>
		</div>
	</div>

	<div class="onerow background_container">
		<div class="col12">
			

			<?php
			$paginator = $this->Paginator;
			if(isset($gameballs)){
			?>
				<h2><?=strtolower(DateTime::createFromFormat('!Ym', $latestEndedGame['Game']['month'])->format('F Y'))?> leaderboard</h2>
				<table>
					<tr>
						<th>rank</th>
						<th>username</th>
						<th>x</th>
						<th>y</th>
						<th>team</th>
						<th>distance from winning spot</th>
					</tr>
				<?php
					$rank = $this->Paginator->counter('{:start}');

					foreach( $gameballs as $gameball ){

						echo "<tr>";
							echo "<td>{$rank}</td>";
							echo "<td>{$gameball['GameBall']['username']}</td>";
							echo "<td>{$gameball['GameBall']['x']}</td>";
							echo "<td>{$gameball['GameBall']['y']}</td>";
							echo "<td>{$gameball['GameBall']['team']}</td>";
							echo "<td>{$gameball['GameBall']['distanceFromWinningSpot']}</td>";
						echo "</tr>";

						$rank++;
					}
					
				echo "</table>";
				echo "<div class='paging'>";

					echo $paginator->first("first");
					
					if($paginator->hasPrev()){
						echo $paginator->prev("prev");
					}
					
					echo $paginator->numbers(array('modulus' => 2));
					
					if($paginator->hasNext()){
						echo $paginator->next("next");
					}
					
					echo $paginator->last("last");
				echo "</div>";
			}

			else{
				echo "no complete game";
			}
			?>
		</div>
	</div>

	<div class="onerow background_container margin_bottom">
		<div class="col12">
			<h2>team leaderboard</h2>
			<table>
				<tr>
					<th>rank</th>
					<th>team</th>
					<th>average distance</th>
				</tr>
				<?php
				$rank = 1;
				foreach ($teamsLeaderboard as $score => $teamName) {
					echo '<tr>';
					echo '<td>' . $rank . '</td>';
					echo '<td>' . $teamName. '</td>';
					echo '<td>' . $score . '</td>';
					echo '</tr>';

					$rank++;
				}

				?>

			</table>
		</div>
	</div>
</div>
