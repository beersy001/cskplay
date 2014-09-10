<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $components = array(
		//'DebugKit.Toolbar',
		'Session',
		'Security',
		'RequestHandler',
		'Auth' => array(
			'authError' => "Access Denied",
			'authorize' => array('controller')
		)
	);


	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('add', 'login');

		$this->Security->blackHoleCallback = 'blackhole';
	}

	public function blackhole(){
		return $this->redirect(array('action'=>'accountAdmin'));
	}

	/********************************************************
	 *		Index											*
	 ********************************************************/
	public function index(){
		
	}

	/********************************************************
	 *		Login											*
	 ********************************************************/
	public function login(){
		$this->set('pageId', 'usersLogin');
		$this->set('title_for_page', 'CSK - login');

		if($this->Auth->loggedIn()){
			if( $this->Session->read('basketRedirect') ) {
				$this->redirect(array('controller' => 'games' , 'action' => 'basket'));
			}
			return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}

		if ($this->request->is('post')) {
			
			if ($this->Auth->login()) {

				if( $this->Session->read('basketRedirect') ) {
					$this->redirect(array('controller' => 'games' , 'action' => 'basket'));
				}

				return $this->redirect($this->Auth->redirect(array('controller' => 'games', 'action' => 'displayGame')));
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

					//if($local_user['User']['completeProfile'] != true){
					//	$this->redirect($this->Auth->redirectUrl(array('controller'=>'users' ,'action'=>'addDetails')));
					//}else{
					//	$this->redirect($this->Auth->redirectUrl());
					//}

					$this->redirect($this->Auth->redirectUrl());

				}else {

					list($firstName,$surname) = explode(' ', $facebookUser['name']);

					$data = array(
						'_id' => $facebookUser['username'],
						'username' => $facebookUser['username'],
						'password' => AuthComponent::password(uniqid(md5(mt_rand()))),
						'firstName' => $firstName,
						'surname' => $surname,
						'emailAddress' => $facebookUser['email'],
						'facebook' => true,
						'completeProfile' => false,
						'role' => 'user'
					);
					
					$this->User->save($data);

					$this->Auth->login($data);

					$this->redirect(array('action' => 'login', '?' => array('code' => 'code')));
				}
			}
		}
	}

	/********************************************************
	 *		Log out											*
	 ********************************************************/
	public function logout(){

		CakeLog::write('debug', "UserssController - logout() - logout");

		$this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}

	/********************************************************
	 *		Add												*
	 ********************************************************/
	public function add() {
		$this->set('title_for_page', 'csk - register');
		$this->set('pageId', 'register');

		if($this->Auth->loggedIn()){
			return $this->redirect(array('controller' => 'users', 'action' => 'accountAdmin'));
		}

		if ($this->request->is('post')) {

			CakeLog::write('debug', "UserssController - add() - post data: " . print_r($this->request->data, true));

			$dateOfBirth = $this->request->data['User']['dateOfBirth']['day'] . '/' . $this->request->data['User']['dateOfBirth']['month'] . '/' . $this->request->data['User']['dateOfBirth']['year'];

			$this->request->data['User']['_id'] = $this->request->data['User']['username'];
			$this->request->data['User']['facebook'] = false;
			$this->request->data['User']['role'] = 'user';
			$this->request->data['User']['completeProfile'] = true;
			$this->request->data['User']['dateOfBirth'] = $dateOfBirth;

			$this->User->create();


			if ($this->User->save($this->request->data)) {

				if( $this->Session->read('basketRedirect') ) {
					
					$this->Auth->login($this->request->data['User']);
					$this->redirect(array('contorller' => 'games' , 'action' => 'basket'));
				}

				$this->Session->setFlash('user created, please login' ,'default', array('class'=>'small_orange_flash'));
				$this->redirect(array('action' => 'login'));
			}

			if(isset($this->request->data['User']['password']) && $this->request->data['User']['password'] != ""){
				$this->request->data['User']['password'] = null;
				$this->request->data['User']['passwordVerify'] = null;
			}
		}

	}

	/********************************************************
	 *		Edit											*
	 ********************************************************/
	public function edit() {

		$this->set('title_for_page', 'csk - edit details');

		if ($this->request->is('post') && isset($this->request->data['User']['id']) && $this->request->data['User']['id'] == $this->Session->read('Auth.User.id')) {
			
			$dateOfBirth = $this->request->data['User']['dateOfBirth']['day'] . '/' . $this->request->data['User']['dateOfBirth']['month'] . '/' . $this->request->data['User']['dateOfBirth']['year'];
			$this->request->data['User']['dateOfBirth'] = $dateOfBirth;

			$this->User->save($this->request->data['User']);

			$this->Session->write('Auth', $this->User->read());
			$this->redirect(array('action' => 'accountAdmin'));
		}

		$username = $this->Session->read('Auth.User.username');
		$this->request->data = $this->User->findById($username);
	}


	/********************************************************
	 *		Edit Password									*
	 ********************************************************/
	public function editPassword() {

		$this->set('title_for_page', 'csk - edit password');

		if ($this->request->is('post') && isset($this->request->data['User']['id']) && $this->request->data['User']['id'] == $this->Session->read('Auth.User.id')) {
			if($this->User->save($this->request->data['User'])){
				$this->Session->write('Auth', $this->User->read());
				$this->Session->setFlash('Successfully changed password');
			}else{
				$this->Session->setFlash('password not changed');
			}
		}
	}


	/********************************************************
	 *		Account Admin									*
	 ********************************************************/
	public function accountAdmin(){

		$this->set('title_for_page', 'csk - my account');

		$this->loadModel('GameBall');
		$this->loadModel('Game');

		$username = $this->Session->read('Auth.User.username');

		$currentUser = $this->User->find('first', array('conditions' => array('id' => $username)));
		$numberOfBallsPlayed = $this->GameBall->getNumberOfBallsPlayed($username,  date('Ym'));
		$usersPreviousGames = $this->GameBall->getDistinctMonths($username);
		$allGames = $this->Game->find('all');

		foreach ($allGames as $id => $singleGame) {
			$sortedGames[$singleGame['Game']['month']] = $singleGame;
		}
		
		$this->set('usersPreviousGames', $usersPreviousGames);
		$this->set('currentUser', $currentUser );
		$this->set('ballsPlayed', $numberOfBallsPlayed );
		$this->set('allGames', $sortedGames );


	}

	/********************************************************
	 *		Purchase Gameballs								*
	 ********************************************************/
	public function purchaseGameBalls(){

		$this->set('title_for_page', 'gameballs');
		$this->set('pageId', 'purchaseGameBalls');

		$numberPurchased = 0;

		if(isset($this->request->data['User']['code'])){
			$numberPurchased = $this->promoCode($this->request->data['User']['code']);
		}

		if ($this->request->query('purchase')) {

			$username = $this->Session->read('Auth.User.username');
			$user = $this->User->read(null, $username);

			$gameBalls = $user['User']['gameBallsLeft'];

			$this->User->saveField('gameBallsLeft', $gameBalls + 1);

			$this->Session->write('Auth', $this->User->read());

			$numberPurchased = 1;
		}

		$this->Session->setFlash('Successfully purchased ' . $numberPurchased . ' gamealls');
		$this->redirect($this->referer());
	}


	/********************************************************
	 *		Admin											*
	 ********************************************************/
	public function admin(){

		$this->set('title_for_page', 'Administrator');
		$this->set('pageId', 'administrator');

	}

	/********************************************************
	 *		Promo Code										*
	 ********************************************************/
	private function promoCode($code){

		if($code == 'FOCUS05'){

			$username = $this->Session->read('Auth.User.username');

			$user = $this->User->read(null, $username);

			$gameBalls = $user['User']['gameBallsLeft'];

			$this->User->saveField('gameBallsLeft', $gameBalls + 5);

			$this->Session->write('Auth', $this->User->read(null, $username));

			return 5;
		}
	}

	/********************************************************
	 *		Join Team								*
	 ********************************************************/
	public function joinTeam(){

		$this->loadModel('Team');

		if($this->request->is('post')){
			$data = $this->request->data;
			$pinNumber = (int)$data['Team']['pinNumber'];
			$teamName = $data['Team']['name'];

			debug($data);

			debug($this->Team->validateTeam($pinNumber,$teamName));
			

			if($this->Team->validateTeam($pinNumber,$teamName) == true){

				$team = $this->Team->find('first',array('conditions' => array('name' => $teamName)));

				debug($team);

				$this->User->addTeamToUser($this->Session->read('Auth.User.username'),$team);
				$this->Session->setFlash('you have successfully joined ' . $teamName ,'default', array('class'=>'small_orange_flash'), 'joinTeam');
				$this->Session->write('Auth', $this->User->read(null, $this->Auth->User('id')));

				$this->redirect(array('action' => 'accountAdmin'));
			}else{
				$this->Session->setFlash('error joining ' . $teamName ,'default', array('class'=>'small_orange_flash'), 'joinTeam');
				$this->redirect(array('action' => 'accountAdmin'));
			}
			
		}
	}

}