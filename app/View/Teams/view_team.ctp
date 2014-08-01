<?php
App::uses('Debugger', 'Utility');
$this->Html->script( 'gamePlay', array('inline'=>false));
$this->Html->script( 'ajaxGetSelections', array('inline'=>false));
$this->Html->script( 'moveUserSelections', array('inline'=>false));
?>

<script>
	function teamAjaxRequest(action){

		var targetURL;

		switch (action){
			case "players":
			targetURL = "<?=$this->Html->url(array('controller' => 'teams', 'action' => 'fetchPlayers', 'id' => $teamId))?>";
			break
			case "details":
			targetURL = "<?=$this->Html->url(array('controller' => 'teams', 'action' => 'fetchDetails', 'id' => $teamId))?>";
			break
			case "currentGame":
			targetURL = "<?=$this->Html->url(array('controller' => 'teams', 'action' => 'fetchCurrentGame', 'id' => $teamId))?>";
			break
			case "previousGames":
			targetURL = "<?=$this->Html->url(array('controller' => 'teams', 'action' => 'fetchPreviousGames', 'id' => $teamId))?>";
			break
			case "instructions":
			targetURL = "<?=$this->Html->url(array('controller' => 'teams', 'action' => 'fetchInstructions', 'id' => $teamId))?>";
			break
		}

		$.ajax({
			url: targetURL,
			cache: false,
			type: "GET",
			dataType: "HTML",
			success: function (data) {
				$("#team_content").html(data);
				if(action == "currentGame"){
					//moveUserSelections("201402");
				}
			}
		});
	}
</script>

<div class="grid" id="main_grid">
	<div class="onerow background_container ">
		<div class="col12">

			<h1><?=$teamName?></h1>

			<div id="teams_navbar">
				<ul id="simple_nav_bar">
					<li>
						<a href="#" onclick="teamAjaxRequest('details')">details</a>
					</li>
					<li>
						<a href="#" onclick="teamAjaxRequest('currentGame')">games</a>
						<ul>
							<li><a href="#" onclick="teamAjaxRequest('currentGame')">current</a></li>
							<li><a href="#" onclick="teamAjaxRequest('previousGames')">previous</a></li>
						</ul>
					</li>

					<li>
						<a href="#" onclick="teamAjaxRequest('players')">players</a>
					</li>

					<li>
						<a href="#" onclick="teamAjaxRequest('instructions')">instructions</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="onerow background_container margin_bottom" id="team_content">
	</div>
</div>

