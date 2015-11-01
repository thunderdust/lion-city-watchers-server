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

	public function add() {
        if ($this->request->is('post')) {
                 
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been created'));
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('The user could not be created. Please, try again.'));
            }   
        }
    }

    /*

    // Add new user (register)
	function add(){
		if ($this->data) {

			// Get data from registration form 
			$data['username'] = Sanitize::clean($this->data['Users']['username'], array('encode' => false, 'escape' => false, 'remove_html' => true));
			$data['email'] = Sanitize::clean($this->data['Users']['email'], array('encode' => false, 'escape' => false, 'remove_html' => true));
			$data['password'] = $this->data['Users']['password'];
			
			if ($this->User->isEmailAvailableToRegister($data['email'])){

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
				echo 'Email has been registered!';
				return false;
			}
			$this->redirect("/users/login");
		}
	}
	*/

	public function login(){

		if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'index'));      
        }

		if($this->request->is('post')) {
			$data['username'] = Sanitize::clean($this->data['Users']['username'], array('encode' => false, 'escape' => false, 'remove_html' => true));
            //$data['password'] = $this->data['Users']['password'];

            if ($this->Auth->login()) { 
            	echo "Logged in";
            	$this->redirect(array('action' => 'index')); 
		    }
		    else {
		    	$this->redirect('/login');
		    	echo "Invalid email or password!";
		    }
		}
	}

    function logout() {
	    $redirect_url = '/login';
	    $this->Session->destroy();
	    $this->redirect($this->Auth->logout());
    }

    function index(){

    }
}


?>