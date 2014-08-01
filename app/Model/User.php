<?php

class User extends AppModel{

	/********************************************************
	 *		Get number of gameballs left					*
	 ********************************************************/
	public function getNumberOfAttemptsRemaining($username){

		$user = $this->findById($username);

		return $user['User']['gameBallsLeft'];
	}

	/********************************************************
	 *		Add a Team to a User							*
	 ********************************************************/
	public function addTeamToUser($id,$team){

		$user = $this->find('first', array('conditions' => array('User.id' => $id)));
		$teamName = $team['Team']['name'];
		
		$user['User']['teams'][$team['Team']['name']] = $team['Team'];

		$this->save($user);
	}

	/********************************************************
	 *		Get Teams										*
	 ********************************************************/
	public function getTeams($username){
		$user = $this->findById($username);
		if(isset($user['User']['teams'])){
			return $user['User']['teams'];
		}

		return null;
	}

	/********************************************************
	 *		Get Team Members								*
	 ********************************************************/
	public function getTeamMembers($teamName){
		return $this->find('all', array('conditions' => array('User.teams.' . $teamName . '.name' => $teamName)));
	}

	/********************************************************
	 *		Check if player is active						*
	 ********************************************************/
	public function checkPlayerActive($username, $teamName, $month){
		return $this->find('first', array('conditions' => array('User.teams.'.$teamName.'.months.'.$month.'.active' => 'true')));
	}

	public function getActivePlayers($teamName, $month){
		return $this->find('all', array('conditions' => array('User.teams.'.$teamName.'.months.'.$month.'.active' => true)));
	}

}

?>