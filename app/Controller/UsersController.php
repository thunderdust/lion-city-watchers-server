<?php 

App::uses('AppController', 'Controller');

class UsersController extends AppController{

    // Set controller name
	var $name = 'Users';
	// Specify models to be used
	// var $uses = array('User');

	function beforeFilter(){
		parent::beforeFilter();
		// Adding user does not require authentication 
		$this->Auth->allow('add');
	}

    // Add new user (register)
	function add(){
		if ($this->data) {

			// Get data from registration form 
			$data['username'] = Sanitize::clean($this->data['Users']['username'], array('encode' => false, 'escape' => false, 'remove_html' => true));
			$data['email'] = Sanitize::clean($this->data['Users']['email'], array('encode' => false, 'escape' => false, 'remove_html' => true));
			$data['password'] = $this->data['Users']['password'];
			
			if ($this->User->isEmailAvailableToRegister($email)){

				$this->User->create();
				$this->User->set($data);
				// Save new record to database
				if ($this->User->save()){
					$id = $this->User->id;
					$this->Session->setFlash('New user added.', 'default', array('class' => 'success'));
				}
				else {
					// Creation failed 
					$this->Session->setFlash('User Creation failed.', 'default', array('class' => 'error'));
				}
			}
			else {
				// Email already been registered 
				$this->Session->setFlash('Email has been registered.', 'default', array('class' => 'error'));
			}
		}
	}
}


?>