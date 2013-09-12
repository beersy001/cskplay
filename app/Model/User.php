<?php

class User extends AppModel{

	public function getNumberOfAttemptsRemaining($username){

		$user = $this->findById($username);

		return $user['User']['attemptsLeft'];
	}


}

?>