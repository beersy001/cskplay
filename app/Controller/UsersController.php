
<?php
/**
 * Static content controller.
 *
 * This file will render views from views/users/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 */
class UsersController extends AppController {


	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('add');
	}

	public function index(){
		
	}

	public function login(){
		$this->set('title_for_page', 'Login');


		if($this->Auth->loggedIn()){
			return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}

		if ($this->request->is('post')) {
			
			if ($this->Auth->login()) {

				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Invalid username or password, try again');
			}
		} elseif( $this->request->query('code')){


			$facebookUser = $this->Facebook->getUser();

			if($facebookUser){

				$facebookUser = $this->Facebook->api('/me');
				$local_user = $this->User->find('first', array('conditions' => array('username' => $facebookUser['username'])));
			
				if ($local_user){
					$this->Auth->login($local_user['User']);
					$this->redirect($this->Auth->redirectUrl());
				}else {
					$data = array(
						'_id' => $facebookUser['username'],
						'username' => $facebookUser['username'],
						'password' => AuthComponent::password(uniqid(md5(mt_rand()))),
						'fullName' => $facebookUser['name'],
						'email' => $facebookUser['email'],
						'attemptsMade' => 0,
						'attemptsLeft' => 0
					);
					
					$this->User->save($data);

					$this->redirect(array('action' => 'login', '?' => array('code' => 'code')));
				}
			}
		} else {
			//$this->Session->setFlash('none');

		}
	}

	public function logout(){

		//$this->Session->setFlash('Logged out');

		$this->redirect($this->Auth->logout());
	}

	public function add() {
		if ($this->request->is('post')) {

			if(isset($this->request->data['User']['password'])){
				//create MD5 password
				$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
			}

			
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				return $this->redirect(array('action' => 'index'));
			}
			//$this->Session->setFlash('The user could not be saved. Please, try again.');
		} else {
			//$this->Session->setFlash('Skipped add user');
		}
	}

	public function accountAdmin(){

		$this->set('title_for_page', 'My Page');

		$this->loadModel('Game');

		$username = $this->Session->read('Auth.User.username');

		$results = $this->Game->getUsersResults($username);

		$user = $this->User->findById($username);
		
		$this->set('results', $results);

		$this->set('currentUser', $user);

		$numberOfBallsPlayed = $this->Game->getNumberOfBallsPlayed($username);
		$numberOfBallsRemaining = $this->User->getNumberOfAttemptsRemaining($username);

		$this->set('ballsRemaining', $numberOfBallsRemaining);
		$this->set('ballsPlayed', $numberOfBallsPlayed);
		
	}

	public function purchaseGameBalls(){

		$this->layout = 'sidebar';

		if ($this->request->query('purchase')) {

			$username = $this->Session->read('Auth.User.username');

			$user = $this->User->read(null, $username);

			$gameBalls = $user['User']['attemptsLeft'];

			$this->User->saveField('attemptsLeft', $gameBalls + 1);

			$this->Session->write('Auth', $this->User->read(null, $username));
		}

	}

}