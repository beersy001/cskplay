<?php

class Charity extends AppModel{

	public function getCharityByName($name){

		$results = $this->find('first', array('conditions' => array('Charity.name' => $name)));

		return $results;
	}

	public function getCharityByNameId($nameId){

		$results = $this->find('first', array('conditions' => array('Charity.nameId' => $nameId)));

		return $results;
	}

	public function getCharityByMonth($month){

		$results = $this->find('first', array('conditions' => array('Charity.month' => $month)));

		return $results;
	}

	public function getCharityByCelebrity($celebNameId){

		$result = $this->find('first', array('conditions' => array('Charity.celebrityNameId' => $celebNameId)));

		return $result;
	}

	public function getAllCharities(){
		$results = $this->find('all');

		return $results;
	}

	public function getCharitiesByType($type){

		$results = $this->find('all', array('conditions' => array('Charity.type' => $type)));

		//debug($results);
		return $results;
	}

	public function getCharityNamesByType($type){
		//debug($type);
		$results = $this->find('all', array(
			'fields' => array('Charity.name', 'Charity.nameId'),
			'conditions' => array('Charity.type' => $type)
			));

		//debug($results);

		return $results;
	}
}

?>