<?php

class Celebrity extends AppModel{

	public function getCurrentCelebrity(){
		$month = date('m/Y');

		$results = $this->find($type = 'all', array('conditions' => array('Celebrity.month' => $month)));

		return $results[0]['Celebrity'];
	}

	public function getAllCelebrities(){
		$celebs = $this->find($type = 'all');



		return $celebs;
	}

}

?>