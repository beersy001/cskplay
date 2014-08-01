<?php

class Team extends AppModel{

	public function validateTeam($pinNumber, $teamName){

		debug($this->hasAny(array('name'=>$teamName)));

		if ($this->hasAny(array('name'=>$teamName))) {
			
			$results = $this->find(
				'all', array(
					'conditions' => array(
						'name' => $teamName,
						'pinNumber' => $pinNumber)
					)
			);

			debug($results);

			if (sizeof($results) > 0) {
				return true;
			}

			return false;
		}
	}

	public function findTeamById($id){
		return $this->find('first', array('conditions' => array('_id' => $id)));
	}
}

?>