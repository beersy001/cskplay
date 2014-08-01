<?php

App::uses('AppController', 'Controller');


/**
 * @package       app.Controller
 */
class TeamsController extends AppController {

	/********************************************************
	 *		Index											*
	 ********************************************************/
	public function index(){
		
	}

	/********************************************************
	 *		Team Info										*
	 ********************************************************/
	public function teamInfo(){
		
	}

	/********************************************************
	 *		Team Info										*
	 ********************************************************/
	public function aboutTeams(){
		
	}

	/********************************************************
	 *		View Team										*
	 ********************************************************/
	public function viewTeam(){
		$this->set('title_for_page', 'my team');
		$this->set('pageId', 'viewTeam');

		$this->loadModel('User');
		
		$id = $this->request->params['named']['id'];
		$thisTeam = $this->Team->findTeamById($id);

		if(sizeof($thisTeam) == 1){

			$members = $this->User->getTeamMembers($thisTeam['Team']['name']);

			$this->set('teamId',$id);
			$this->set('members',$members);
			$this->set('teamName',$thisTeam['Team']['name']);
		}else{
			$this->redirect($this->redirect(array('controller'=>'pages', 'action'=>'home')));
		}
	}

	/********************************************************
	 *		Fetch Members									*
	 ********************************************************/
	public function viewUserTeams(){
		$this->set('title_for_page', 'my teams');
		$this->set('pageId', 'viewUserTeams');


	}

	/********************************************************
	 *		Fetch Players									*
	 ********************************************************/
	public function fetchPlayers(){
		$this->loadModel('User');

		$id = $this->request->params['named']['id'];

		$thisTeam = $this->Team->findById($id);
		$teamName = $thisTeam['Team']['name'];
		$members = $this->User->getTeamMembers($teamName);
		$this->set('teamId',$id);
		$this->set('members',$members);
		$this->set('teamName',$teamName);
	}

	/********************************************************
	 *		Fetch Details									*
	 ********************************************************/
	public function fetchDetails(){
		$this->loadModel('User');
		$this->loadModel('GameBall');

		$username = $this->Session->read('Auth.User.username');

		$month = date('Ym');
		
		$id = $this->request->params['named']['id'];
		$thisTeam = $this->Team->findById($id);
		$teamName = $thisTeam['Team']['name'];
		$members = $this->User->getTeamMembers($teamName);
		$totalBallsPlayed = $this->GameBall->getNumberOfBallsPlayedByTeam($teamName);
		$numberOfActivePlayers = sizeof($this->User->getActivePlayers($teamName, $month));
		$totalNumberOfUsersTeamGameballs = sizeof($this->GameBall->getAllUsersTeamGameballs($username, $teamName));
		$numberOfNonActivePlayers = sizeof($members) - $numberOfActivePlayers;

		$this->set('team', $thisTeam['Team']);
		$this->set('teamId', $id);
		$this->set('members', $members);
		$this->set('teamName', $teamName);
		$this->set('numberOfActivePlayers', $numberOfActivePlayers);
		$this->set('numberOfNonActivePlayers', $numberOfNonActivePlayers);
		$this->set('totalNumberOfUsersTeamGameballs', $totalNumberOfUsersTeamGameballs);
		$this->set('totalBallsPlayed', $totalBallsPlayed);
	}

	/********************************************************
	 *		Fetch Current Game								*
	 ********************************************************/
	public function fetchCurrentGame(){
		$this->loadModel('User');
		$this->loadModel('GameBall');
		
		$id = $this->request->params['named']['id'];

		$thisTeam = $this->Team->findById($id);
		$teamName = $thisTeam['Team']['name'];
		$members = $this->User->getTeamMembers($teamName);
		$gameBalls = $this->GameBall->getTeamsGameBalls($teamName, date('Ym'));

		$this->set('teamId',$id);
		$this->set('members',$members);
		$this->set('teamName',$teamName);
		$this->set('month', date('Ym'));
		$this->set('results', $gameBalls);
		$this->set('locationId', 'normal');
	}

	/********************************************************
	 *		Fetch Previous Games							*
	 ********************************************************/
	public function fetchPreviousGames(){
		$this->loadModel('User');
		
		$id = $this->request->params['named']['id'];

		$thisTeam = $this->Team->findById($id);
		$teamName = $thisTeam['Team']['name'];
		$members = $this->User->getTeamMembers($teamName);
		$this->set('teamId',$id);
		$this->set('members',$members);
		$this->set('teamName',$teamName);
	}

	/********************************************************
	 *		Fetch fetchInstructions							*
	 ********************************************************/
	public function fetchInstructions(){
		$this->loadModel('User');
		
		$id = $this->request->params['named']['id'];

		$thisTeam = $this->Team->findById($id);
		$teamName = $thisTeam['Team']['name'];
		$members = $this->User->getTeamMembers($teamName);
		$this->set('teamId',$id);
		$this->set('members',$members);
		$this->set('teamName',$teamName);
	}


	

	/********************************************************
	 *		View All Teams							*
	 ********************************************************/
	public function viewAll() {
		$this->set('title_for_page', 'View All Teams');
		$this->set('pageId', 'viewAllTeams');

		print_r($this->Team->find('first', array('conditions' => array('id' => '528c8c2b7f661b6c17000001'))));

	}

	/********************************************************
	 *		Create Team								*
	 ********************************************************/
	public function createTeam(){
		$this->set('title_for_page', 'create team');
		$this->set('pageId', 'createTeam');

		$this->loadModel('User');
		$data = $this->request->data;

		if($this->Team->hasAny(array('name'=>$data['Team']['name']))){
			$this->Session->setFlash('Team already exists' ,'default', array('class'=>'small_orange_flash'),'team');
			$this->redirect($this->referer());
		}else{

			$user = $this->Auth->user();

			$data['Team']['captain'] = $user['username'];
			$data['Team']['pinNumber'] = rand(10000,99999);
			$this->Team->save($data);

			$team = $this->Team->find('first',array('conditions' => array('name' => $data['Team']['name'])));

			print_r($team);
			$this->User->addTeamToUser($user['username'],$team);
			$this->Session->write('Auth', $this->User->read(null, $this->Auth->User('id')));
			$this->redirect(array('action'=>'viewTeam', 'id'=>$team['Team']['id']));
		}

	}
}