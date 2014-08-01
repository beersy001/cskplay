<?php

class Rank extends AppModel{

	var $order = array('Rank.distanceFromWinningSpot' => 'ASC');


	public function getTopWinners($month){
		$results = $this->find(
			'all', array(
				'conditions' => array('Rank.month' => $month),
				'order' => array('Rank.distanceFromWinningSpot' => 'ASC'),
				'limit' => 500
			)
		);

		$firstPrizeWinners = array();
		$secondPrizeWinners = array();
		$thridPrizeWinners = array();
		$position = 0;
		$winningRank = -999;

		foreach ($results as $winningSpot) {

			if($winningRank != $winningSpot['Rank']['distanceFromWinningSpot']){

				$position++;
				
				if($position == 4){
					break;
				}
			}

			$winningRank = $winningSpot['Rank']['distanceFromWinningSpot'];
				
			switch ($position) {
				case 1:
					array_push($firstPrizeWinners, $winningSpot);
					break;

				case 2:
					array_push($secondPrizeWinners, $winningSpot);
					break;

				case 3:
					array_push($thridPrizeWinners, $winningSpot);
					break;

				default:
					array_push($firstPrizeWinners, $winningSpot);
					break;
			}
		}

		$winningArrays['first'] = $firstPrizeWinners;
		$winningArrays['second'] = $secondPrizeWinners;
		$winningArrays['third'] = $thridPrizeWinners;

		return $winningArrays;
	}

	public function getAllUserRanks($username){
		return $this->find(
			'all', array(
				'conditions' => array('Rank.username' => $username),
				'order' => array('Rank.distanceFromWinningSpot' => 'ASC')
			)
		);
	}


}

?>