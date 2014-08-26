<?php
class GamesController extends AppController {

	public $components = array(
		'Session',
		'RequestHandler',
		'Auth' => array(
			'loginRedirect' => array('controller' => 'pages', 'action' => 'home'),
			'logoutRedirect' => array('controller' => 'pages', 'action' => 'home'),
			'authError' => "Access Denied",
			'authorize' => array('controller')
		)
	);

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('displayDemo', 'displayGame', 'fetchPractice', 'fetchLoupe', 'confirmation', 'basket');
	}

	public function displayGame() {

		$this->set('title_for_page', 'CSK - play now');
		$this->set('pageId', 'gamesDisplayGame');

		echo '<script>var date = "' . date('Ym') . '"</script>';
		
		$this->loadModel('User');
		$this->loadModel('GameBall');

		$username = $this->Session->read('Auth.User.username');
		$month = date('Ym');

		$this->set('month', $month);
		$this->set('realMonth', strtolower(DateTime::createFromFormat('!Ym', $month)->format('F')));

		//$results = $this->GameBall->getUsersResults($username,date('Ym'));
		$currentCompetition = $this->Game->getCurrentCompetition();

		//$this->set('results', $results);
		$this->set('currentCompetition', $currentCompetition);
	}

	public function displayDemo() {

		echo '<script>var date = "' . date('Ym') . '"</script>';
		
		$this->loadModel('User');
		$this->loadModel('GameBall');

		$user = $this->User->read(null, 'demo');

		$numberOfBallsRemaining = 5;
		$results = $this->GameBall->getUsersResults('demo',date('Ym'));
		$teams = $this->User->getTeams('demo');
		$month = date('Ym');
	
		$this->set('results', $results);
		$this->set('ballsRemaining', $numberOfBallsRemaining);
		$this->set('teams', $teams);
		$this->set('title_for_page', 'demo');
		$this->set('pageId', 'displayGame');
		$this->set('month', $month);
		$this->set('realMonth', strtolower(DateTime::createFromFormat('!Ym', $month)->format('F Y')));
	}

	public function basket(){

		$this->set('title_for_page', 'CSK - gameball basket');
		$this->set('pageId', 'gamesBasket');

		if ($this->request->is('post')) {
			if ( isset( $this->request->data['Selection'] ) ) {
				$data = $this->request->data;
				$selections = $data['Selection'];
				$price = 0;

				for ($i=1; $i <= count($selections); $i++) { 
					if($i % 3 == 0){
						$selections[$i-1]["price"] = "free";
					}else{
						$selections[$i-1]["price"] = "£1";
						$price++;
					}
				}

				CakeLog::write('debug', print_r($selections, true));
				CakeLog::write('debug', "totalPrice: " . $price);

				$this->Session->write('selections', $selections);
				$this->Session->write('totalPrice', $price);
			}
		}
		
		if(!$this->Auth->user()){
			$this->Session->write('basketRedirect', true);
			$this->redirect(array('controller' => 'Users', 'action' => 'login'));
		}
	}

	public function confirmation(){

		$this->set('title_for_page', 'CSK - gameball confirmation');
		$this->set('pageId', 'gamesConfirmation');

		$this->loadModel('GameBall');

		$insertedIds = $this->Session->read('insertedIds');

		$insertedGameBalls = array();

		foreach ($insertedIds as $key => $id) {
			$gameball = $this->GameBall->find('first', array(
				'conditions' => array( "_id" => $id )
			));

			array_push($insertedGameBalls, $gameball);
		}

		$this->set('insertedGameBalls', $insertedGameBalls);
		
	}

	public function fetchGameSidebar(){

		$this->loadModel('User');
		$this->loadModel('GameBall');

		$username = $this->Session->read('Auth.User.username');
		$user = $this->User->read(null, $username);

		$numberOfBallsRemaining = $this->User->getNumberOfAttemptsRemaining($username);
		$results = $this->GameBall->getUsersResults($username,date('Ym'));
		$teams = $this->User->getTeams($username);
		$practiceGames = $this->Game->getPracticeGames();
		$competition = $this->Game->getCurrentCompetition();

		$this->set('month', date('Ym'));
		$this->set('results', $results);
		$this->set('ballsRemaining', $numberOfBallsRemaining);
		$this->set('teams', $teams);
		$this->set('typeOfGame', 'competition');
		$this->set('practiceGames',$practiceGames);
		$this->set('competition',$competition);
	}

	public function fetchCompetition(){
		if($this->request->is('ajax')){
			$this->set('month', date('Ym'));
			$this->set('typeOfGame', 'competition');
			$this->render('/Elements/game/game_images');
		}
	}

	public function fetchPractice(){
		if($this->request->is('ajax')){

			$month = $this->request->params['named']['month'];

			$this->set('month', $month);
			$this->set('typeOfGame', 'practice');
			$this->render('/Elements/game/game_images');
		}
	}

	public function fetchLoupe(){
		if($this->request->is('ajax')){

			if(isset($this->request->params['named']['month'])){
				$month = $this->request->params['named']['month'];
			}else{
				$month = date('Ym');
			}

			$this->set('month', $month);
			$this->set('typeOfGame', 'practice');
			$this->render('/Elements/game/game_loupe');
		}
	}


	public function add(){
		$this->set('title_for_page', 'new game');
		$this->set('pageId', 'addGame');

		if($this->request->is('post')) {
			$this->Game->save($this->request->data);
		}

	}
}