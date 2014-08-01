<?php

class ValidationComponent extends Component{


	public function checkNull($field){
		if($field == null || $field == ""){
			return false;
		}else{
			return true;
		}
	}

	public function checkPhoneNumber($field){

		$field = str_replace("+44", "0", string $field);

		if(is_numeric($field) && strlen(string $field) == 11){
			return true;
		}else{
			return false;
		}
	}

	public function checkEmailAddress($field){
		if(filter_var($field, FILTER_VALIDATE_EMAIL)){
			return true;
		}else{
			return false;
		}
	}

	public function checkPasswords($passwordOne, $passwordTwo){
		if($passwordOne == $passwordTwo && strlen($passwordOne) >= 6){
			return true;
		}else{
			return false;
		}
	}

	public function checkDateOfBirth($field){
		
	}

}

?>