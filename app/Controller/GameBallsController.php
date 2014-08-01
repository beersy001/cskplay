<?php
App::uses('AppController', 'Controller');
  
class GameBallsController extends AppController{

	public $components = array('Paginator');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('leaderboard');
	}


	/********************************************************
	 *		Save Selection - ajax request					*
	 ********************************************************/
	public function saveSelection(){
		
		if( isset( $this->request->data['GameBalls'] ) ){

			$this->loadModel('User');

			$username = $this->Session->read('Auth.User.username');

			$this->User->read(null, $username);
			$user = $this->User->read();
			$currentDate = date('Ym');


			if($this->request->data['GameBalls']['code'] == 'FOCUS05' ){

				$gameballs = array();
	
				foreach ($this->Session->read('selections') as $key => $selection) {

					$newGameBall['GameBall']['x'] = $selection['x'];
					$newGameBall['GameBall']['y'] = $selection['y'];
					$newGameBall['GameBall']['username'] = $username;
					$newGameBall['GameBall']['month'] = $currentDate;
					$newGameBall['GameBall']['team'] = 'individual';


					array_push($gameballs, $newGameBall);
				}

				$this->GameBall->saveMany( $gameballs );

				$insertedIds=$this->GameBall->insertedIds;
				

				$this->Session->write( 'insertedIds', $insertedIds );

			}else{
				$this->Session->setFlash( 'invalid promo code' );
				$this->redirect($this->referer());
			}
 
		}/*

		

		//if($user['User']['gameBallsLeft'] > 0){



		

		$gameballData = array( 
			'x' => $this->request->data['x'],
			'y' => $this->request->data['y'],
			'team' => $this->request->data['team'],
			'username' => $username,
			'month' => $currentDate
			);
	
		if($gameballData['team'] != 'individual'){
			$user = $this->activateTeamGameball($user, $currentDate, $gameballData['team']);
		}

		//$user['User']['gameBallsLeft'] = $user['User']['gameBallsLeft'] - 1;

		$this->User->save($user);

		$this->GameBall->save($gameballData);

		$this->Session->write('Auth', $user);

		//}
		*/

		$this->redirect(array('controller' => 'games', 'action' => 'confirmation'));
	}

	/********************************************************
	 *		activate team gameball							*
	 ********************************************************/
	private function activateTeamGameball($user, $date, $teamName){

		if(isset($user['User']['teams'][$teamName]['months'][$date]['active']) && isset($user['User']['teams'][$teamName]['months'][$date]['numberOfGameBalls'])){

			$user['User']['teams'][$teamName]['months'][$date]['numberOfGameBalls']++;
			$numberOfGameBalls = $user['User']['teams'][$teamName]['months'][$date]['numberOfGameBalls'];

			if($numberOfGameBalls >= 3){
				$user['User']['teams'][$teamName]['months'][$date]['active'] = true;
			}

		}else{
			$user['User']['teams'][$teamName]['months'][$date]['active'] = false;
			$user['User']['teams'][$teamName]['months'][$date]['numberOfGameBalls'] = 1;	
		}

		return $user;
	}

	/********************************************************
	 *		transfer gameball								*
	 ********************************************************/
	public function transferGameball(){

		$this->loadModel('User');
		$currentDate = date('Ym');

		$username = $this->Session->read('Auth.User.username');

		$this->User->read(null, $username);

		$user = $this->User->read();

		$data = $this->request->data['GameBall'];

		if($data['team'] != 'individual'){
			$user = $this->activateTeamGameball($user, $currentDate, $data['team']);
		}

		$this->GameBall->save($data);
		$this->User->save($user);

		$this->redirect(array('action' => 'myGameballs', 'month' => $currentDate));
	}

	/********************************************************
	 *		Fetch Selections - ajax request					*
	 ********************************************************/
	public function fetchSelections(){

		$this->loadModel('User');

		$username = $this->Session->read('Auth.User.username');

		if( isset($this->request->params['named']['requestedMonth']) ){
			$requestedMonth = $this->request->params['named']['requestedMonth'];
		}else{
			$requestedMonth = date('Ym');
		}

		if( isset($this->request->params['named']['locationId']) ){
			$locationId = $this->request->params['named']['locationId'];
		}else{
			$locationId = 'normal';
		}

		if( isset($this->request->params['named']['requestedTeam'] )){
			$team = $this->request->params['named']['requestedTeam'];
			$results = $this->User->getUsersResultsByTeam($username,$requestedMonth,$team);
		}else{
			$results = $this->GameBall->getUsersResults($username,$requestedMonth);
		}
			
		$this->set('locationId', $locationId);
		$this->set('month', $requestedMonth);
		$this->set('results', $results);

		$this->render('/Elements/game/game_crosshairs');
	}

	/********************************************************
	 *		My Gameballs									*
	 ********************************************************/
	public function myGameballs(){
		$this->set('title_for_page', 'my gameballs');
		$this->set('pageId', 'my gameballs');

		$this->loadModel('Celebrity');
		$this->loadModel('Game');
		$this->loadModel('User');

		$requestedMonth			= $this->request->params['named']['month'];
		$username				= $this->Session->read('Auth.User.username');
		$user					= $this->User->read(null, $username);
		$teams					= $this->User->getTeams($username);
		$celebrity				= $this->Celebrity->getCelebrityByMonth($requestedMonth);
		$numberOfBallsPlayed	= $this->GameBall->getNumberOfBallsPlayed($username, $requestedMonth);
		$results				= $this->GameBall->getUsersResults($username,$requestedMonth);
		$distinctMonths			= $this->GameBall->getDistinctMonths($username);
		$game 					= $this->Game->getGameByMonth($requestedMonth);
		$allGames				= $this->Game->find('all');

		foreach ($allGames as $id => $singleGame) {
			$sortedGames[$singleGame['Game']['month']] = $singleGame;
		}

		if( isset($teams) && sizeof($teams) > 0 ){
			$teamNames['individual'] = 'individual';
			foreach ( $teams as $teamName => $team ) {
				$teamNames[$teamName] = $teamName;
			}
			$this->set('teams', $teamNames);
		}

		if(isset($game['Game']['ended']) && $game['Game']['ended']){
			$closestResult['GameBall']['distanceFromWinningSpot'] = 99999;
			$averageDistance = 0;

			foreach ($results as $key => $singleResult) {

				$averageDistance += $singleResult['GameBall']['distanceFromWinningSpot'];

				if($singleResult['GameBall']['distanceFromWinningSpot'] <= $closestResult['GameBall']['distanceFromWinningSpot']){
					$closestResult = $singleResult;
					$closestResult['GameBall']['gameballNumber'] = $key + 1;
				}	
			}

			$averageDistance = round($averageDistance / sizeof($results), 1);
			$closestDistance = $closestResult['GameBall']['distanceFromWinningSpot'];
			$bestRanking = $this->GameBall->calculateRank($requestedMonth, $closestDistance);

			$this->set('allResultsTest', $this->GameBall->getAllGameBallsByMonth($requestedMonth));

			$this->set('winningX', $game['Game']['winningX']);
			$this->set('winningY', $game['Game']['winningY']);
			$this->set('closestResult', $closestResult);
			$this->set('averageDistance', $averageDistance);
			$this->set('bestRanking', $bestRanking);

			if($bestRanking > 10){
				$this->set('topOfLeaderboard', $this->GameBall->getTopOfLeaderboard($requestedMonth, 3));
				$beforeUserLeaderboard = $this->GameBall->getUserSpecificLeaderboard($requestedMonth, $closestDistance, '$lt', 'desc', 3);
				krsort($beforeUserLeaderboard);
				$this->set('beforeUserLeaderboard', $beforeUserLeaderboard);
				$this->set('afterUserLeaderboard', $this->GameBall->getUserSpecificLeaderboard($requestedMonth, $closestDistance, '$gt', 'asc', 3));
			}else if( $bestRanking < 10 ){
				$this->set('topOfLeaderboard', $this->GameBall->getTopOfLeaderboard($requestedMonth, 15));
			}

		}else{
			$game['Game']['ended'] = false;
		}

		$this->set('distinctMonths', $distinctMonths);
		$this->set('username', $username);
		//$this->set('gameBallsLeft', $user['User']['gameBallsLeft']);
		$this->set('gameHasEnded', $game['Game']['ended']);
		$this->set('results', $results);
		$this->set('numberOfBallsPlayed', $numberOfBallsPlayed );
		$this->set('month', $requestedMonth);
		$this->set('celebrityName', strtolower($celebrity['Celebrity']['firstName'] . ' ' . $celebrity['Celebrity']['surname']));
		$this->set('charityName', strtolower($celebrity['Celebrity']['charity']));
		$this->set('realDate', strtolower(date("F Y", strtotime(substr($requestedMonth, 0, 4 ). '-' . substr($requestedMonth, 4,5)))));
		$this->set('allGames', $sortedGames);
		$this->set('typeOfGame', 'competition');
		

		$this->set('locationId', 'normal');

		echo '<script>var date = "' . $requestedMonth . '"</script>';
	}

	public function leaderboard() {

	$this->loadModel('Game');

	$latestEndedGame = $this->Game->getLastGame();


	if(isset($latestEndedGame['Game'])){

		$this->paginate = array(
			'conditions' => array('GameBall.month' => $latestEndedGame['Game']['month']),
			'limit' => 20,
			'order' => array('distanceFromWinningSpot' => 'ASC')
		);
		
		$gameballs = $this->paginate('GameBall');
		$this->set('gameballs', $gameballs);
		$this->set('latestEndedGame', $latestEndedGame);


		$getAllGameballsByTeam = $this->GameBall->getAllGameballsByTeam($latestEndedGame['Game']['month']);
		$teamsLeaderboard = array();

		foreach ($getAllGameballsByTeam as $teamName => $team) {
			$totalDistance = 0;

			foreach ($team as $id => $gameball) {
				$totalDistance += $gameball['GameBall']['distanceFromWinningSpot'];
			}

			$averageDistance = $totalDistance / sizeof($team);

			$teamsLeaderboard[$averageDistance] = $teamName;
		}

		ksort($teamsLeaderboard);
		
		$this->set('teamsLeaderboard', $teamsLeaderboard );
	}
	
	}
}

?>