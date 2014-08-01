<?php

class GameBall extends AppModel{

	/********************************************************
	 *		Get a users gameballs							*
	 ********************************************************/
	public function getUsersResults($username, $month){
		$results = $this->find(
			'all', array(
				'conditions' => array('username' => $username, 'month' => $month),
			)
		);
		return $results;
	}

	/********************************************************
	 *		Get all of a users team gameballs				*
	 ********************************************************/
	public function getAllUsersTeamGameballs($username, $team){
		$results = $this->find(
			'all', array(
				'conditions' => array('username' => $username, 'team' => $team),
			)
		);
		return $results;
	}

	/********************************************************
	 *		Get a teams GameBalls							*
	 ********************************************************/
	public function getTeamsGameBalls($team, $month){
		$results = $this->find(
			'all', array(
				'conditions' => array('team' => $team, 'month' => $month),
			)
		);
		return $results;
	}

	/********************************************************
	 *		Get all gameballs by team						*
	 ********************************************************/
	public function getAllGameballsByTeam($month){
		$results = $this->find(
			'all', array(
				'conditions' => array('month' => $month),
			)
		);

		$teamGameballs = array();

		foreach ($results as $id => $gameball) {
			if($gameball['GameBall']['team'] != 'individual'){
				$teamGameballs[$gameball['GameBall']['team']][$gameball['GameBall']['id']] = $gameball;
			}
		}


		return $teamGameballs;
	}

	/********************************************************
	 *		Get a users team gameballs						*
	 ********************************************************/
	public function getUsersResultsByTeam($username, $month, $team){
		$results = $this->find(
			'all', array(
				'conditions' => array(
					'username' => $username,
					'month' => $month,
					'team' => $team
					),
			)
		);
		return $results;
	}

	/********************************************************
	 *		Get all gameballs in a month					*
	 ********************************************************/	
	public function getAllGameBallsByMonth($month){
		$results = $this->find(
			'all', array(
				'conditions' => array(
					'month' => $month
					),
				'order' => array('GameBall.distanceFromWinningSpot' => 'ASC'),
			)
		);
		return $results;
	}

	/********************************************************
	 *		Get number of gameballs played by a user		*
	 ********************************************************/
	public function getNumberOfBallsPlayed($username, $month){
		$results = $this->find(
			'all', array(
				'conditions' => array('username' => $username, 'month' => $month)
			)
		);

		return sizeof($results);
	}

	/********************************************************
	 *		Get number of gameballs played by a team		*
	 ********************************************************/
	public function getNumberOfBallsPlayedByTeam($teamName){
		$results = $this->find(
			'all', array(
				'conditions' => array('GameBall.team' => $teamName)
			)
		);

		return sizeof($results);
	}

	/********************************************************
	 *		Get all the months a user has played in			*
	 ********************************************************/
	public function getDistinctMonths($username){
		$results = $this->find(
			'all', array(
				'conditions' => array('GameBall.username' => $username),
				'fields' => array('GameBall.month')
			)
		);

		$months = array();

		foreach ($results as $key => $gameball) {
			$months[$gameball['GameBall']['month']] = $gameball['GameBall']['month'];
		}

		return $months;
	}

	public function getTopOfLeaderboard($month, $limit){
		return $this->find(
			'all', array(
				'conditions' => array('GameBall.month' => $month),
				'order' => array('GameBall.distanceFromWinningSpot' => 'ASC'),
				'limit' => $limit
			)
		);
	}

	public function getUserSpecificLeaderboard($month, $distanceFromWinningSpot, $position, $sortOrder, $limit){
		return $this->find(
			'all', array(
				'conditions' => array('GameBall.month' => $month, 'GameBall.distanceFromWinningSpot' => array( $position => $distanceFromWinningSpot)),
				'order' => array('GameBall.distanceFromWinningSpot' => $sortOrder),
				'limit' => $limit
			)
		);
	}


	public function calculateRank($month, $distanceFromWinningSpot){

		$query = array(
			'initial' => array('csum' => 0),
			'reduce' => 'function(obj, prev){prev.csum += 1;}',
			'options' => array(
				'condition' => array('month' => $month, 'distanceFromWinningSpot' => array('$lt' => $distanceFromWinningSpot)),
				'order' => array('GameBall.distanceFromWinningSpot' => 'ASC'),
				),
			);

		$mongo = $this->getDataSource();
		$result = $mongo->group($query, $this);

		return $result['count'] + 1;
	}
}

?>