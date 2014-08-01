<?php

class Celebrity extends AppModel{

	var $order = array('Celebrity.month' => 'DESC');

	public function getCurrentCelebrity(){
		$month = date('Y-m');

		$results = $this->find($type = 'all', array('conditions' => array('Celebrity.month' => $month)));

		return $results[0]['Celebrity'];
	}

	public function getAllCelebrities(){
		$celebs = $this->find($type = 'all');
		return $celebs;
	}

	public function getAllCelebritiesNames(){
		return $this->find($type = 'all', array(
			'fields' => array('Celebrity.firstName', 'Celebrity.surname', 'Celebrity.nameId', 'Celebrity.month')
			)
		);
	}

	public function getCelebrityByMonth($month){

		$result = $this->find($type = 'first', array('conditions' => array('Celebrity.month' => $month)));

		return $result;
	}

}

?>