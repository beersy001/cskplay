<?php

class Game extends AppModel{

	public function getUsersResults($username){
		$results = $this->find($type = 'all', array('conditions' => array('Game.username' => $username)));
		return $results;
	}

	public function getNumberOfBallsPlayed($username){
		$results = $this->find($type = 'all', array('conditions' => array('Game.username' => $username)));
		return sizeof($results);
	}


}

?>