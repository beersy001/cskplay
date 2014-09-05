<?php

class User extends AppModel{

	var $name = 'User';



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

	public $validate = array(
		'firstName' => array(
			'rule' => 'notempty',
			'required' => true
		),

		'surname' => array(
			'rule' => 'notempty',
			'required' => true
		),
		
		'username' => array(
			'rule' => 'notempty',
			'required' => true
		),

		'emailAddress' => array(
			'rule1' => array(
				'rule' => 'notempty',
				'message' => 'This field cannot be left blank',
				'required' => true
			),
			'rule2' => array(
				'rule' => array('email', true),
				'message' => 'Please enter a valid email address',
				'required' => true
			)
		),

		'contactNumber' => array(
			'rule1' => array(
				'rule' => array('phone','/^\s*\(?(020[78]?\)? ?[1-9][0-9]{2,3} ?[0-9]{4})|(0[1-8][0-9]{3}\)? ?[1-9][0-9]{2} ?[0-9]{3})\s*$/','all'),
				'message' => 'Please enter a valid contact number',
				'required' => true
			),
			'rule2' => array(
				'rule' => 'notempty',
				'message' => 'This field cannot be left blank',
				'required' => true
			)
		),

		'password' => array(
			'rule' => 'notempty',
			'required' => true
		),

		'passwordVerify' => array(
			'rule' => 'notempty',
			'required' => true
		),
/*
		'dateOfBirth' => array(
			'rule' => 'notempty',
			'required' => true,
			'message' => 'This field cannot be left blank',
		),
*/
		'region' => array(
			'rule' => 'notempty',
			'required' => true
		)
		
	);
}

?>
