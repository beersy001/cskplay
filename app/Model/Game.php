<?php

class Game extends AppModel{

	var $order = array('Game.rank' => 'ASC');

	public function endGame($month, $x, $y){
		$game = $this->find('first', array('conditions' => array(
			'Game.month' => $month,
			'Game.typeOfGame' => 'competition')
		));

		if(isset($game['Game'])){

			$game['Game']['ended'] = true;
			$game['Game']['winningX'] = $x;
			$game['Game']['winningY'] = $y;

			$this->save($game);
		}
	}

	public function hasGameEnded($month){
		$game = $this->find('first', array('conditions' => array('Game.month' => $month,'Game.typeOfGame' => 'competition')));

		if(isset($game['Game']['ended'])){
			return $game['Game']['ended'];
		}

		return false;
	}

	public function getLastGame(){

		return $this->find('first', array(
			'conditions' => array('Game.ended' => true, 'Game.typeOfGame' => 'competition'),
			'order' => array('month' => 'desc')
			));
	}


	public function getGameByMonth($month){

		$result = $this->find($type = 'first', array('conditions' => array('Game.month' => $month, 'Game.typeOfGame' => 'competition')));

		return $result;
	}

	public function getPracticeGames(){

		$results = $this->find($type = 'all', array('conditions' => array('Game.typeOfGame' => 'practice')));

		return $results;
	}

	public function getCurrentCompetition(){

		$result = $this->find($type = 'first', array('conditions' => array('Game.typeOfGame' => 'competition', 'Game.month' => date('Ym'))));
		//$result = $this->find($type = 'first', array('conditions' => array('Game.typeOfGame' => 'competition', 'Game.ended !='=>true)));

		return $result;
	}
}

?>