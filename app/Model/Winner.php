<?php

class Winner extends AppModel{

	public function getAllWinners(){

		$allWinners = $this->find($type = 'all');
		return $allWinners;
	}


	public function getWinnerByMonth($month){
		return $this->findById($month);
	}
}

?>