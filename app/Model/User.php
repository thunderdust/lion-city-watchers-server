<?php 
class User extends AppModel {

	var $name = 'User';
	// validate if user exists 
	function validateUser($data){
		$encryptedPassword = Security::hash(Configure::read('Security.salt') . $data['password']);
		$user = $this->find('first',  array('conditions' => array('User.email' => $data['email'], 'User.password' => $encryptedPassword)));
	    if ($user){
	    	return $user;
	    }
	    else return false;
	}

	function isEmailAvailableToRegister($email){
		$count = $this->find('count', array('conditions' => array('User.email' => $email)));
		if ($count == 0){
			return true;
		}
		else return false;
	}
}
?>