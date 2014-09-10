<?php

class User extends AppModel{

	var $name = 'User';

	public function beforeSave($options = array()) {


		if (isset($this->data['User']['password'])) {
			CakeLog::write('debug', "UserModel - beforeSave() - password is set");
			CakeLog::write('debug', "UserModel - beforeSave() - password: " . $this->data['User']['password']);

			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);

			CakeLog::write('debug', "UserModel - beforeSave() - password: " . $this->data['User']['password']);

		}

		if(isset($this->data['User']['password2'])){
			CakeLog::write('debug', "UserModel - beforeSave() - unset password2");
			unset($this->data['User']['password2']);
		}

		CakeLog::write('debug', "UserModel - beforeSave() - data: " . print_r($this->data, true));


		return true;
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



	public function checkCurrentPassword($data) {
		$this->id = AuthComponent::user('id');
		$password = $this->field('password');
		
		return(AuthComponent::password($data['currentPassword']) == $password);
	}

	public $validate = array(
		'currentPassword' => array(
			'rule' => 'checkCurrentPassword',
			'message' => 'your password is incorrect'
		),
/*
		'firstName' => array(
			'rule' => 'notEmpty',
			'required' => true
		),

		'surname' => array(
			'rule' => 'notEmpty',
			'required' => true
		),
		
		'username' => array(
			'rule' => 'notEmpty',
			'required' => true
		),

		'emailAddress' => array(
			'rule1' => array(
				'rule' => 'notEmpty',
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
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank',
				'required' => true
			)
		),

		'password' => array(
			'rule' => 'notEmpty',
			'required' => true
		),

		'passwordVerify' => array(
			'rule' => 'notEmpty',
			'required' => true
		),

		'dateOfBirth' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'This field cannot be left blank',
		),

		'region' => array(
			'rule' => 'notEmpty',
			'required' => true
		)
		*/
	);

}

?>
