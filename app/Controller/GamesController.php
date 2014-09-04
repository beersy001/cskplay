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
		$this->Auth->allow(
			'noGame',
			'displayDemo',
			'displayGame',
			'fetchPractice',
			'fetchLoupe',
			'confirmation',
			'basket'
		);
	}

	public function noGame(){
		$this->set('title_for_page', 'CSK - no game available');
		$this->set('pageId', 'gamesNoGame');

		

	}

	public function displayGame() {
		$this->set('title_for_page', 'CSK - play now');
		$this->set('pageId', 'gamesDisplayGame');

		CakeLog::write('debug', "GamesController - displayGame() - session selections: " . print_r($this->Session->read('selections'), true));

		$currentCompetition = $this->Game->getCurrentCompetition();

		if( sizeof($currentCompetition) > 0 ){

			echo '<script>var date = "' . date('Ym') . '"</script>';
			
			$this->loadModel('User');
			$this->loadModel('GameBall');

			$username = $this->Session->read('Auth.User.username');
			$month = date('Ym');

			$this->set('month', $month);
			$this->set('realMonth', strtolower(DateTime::createFromFormat('!Ym', $month)->format('F')));

			//$results = $this->GameBall->getUsersResults($username,date('Ym'));

			$this->set('currentCompetition', $currentCompetition);
		}else{
			$this->render('noGame');
		}
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

				$selections = $this->request->data['Selection'];
				$updatedSelections = array();
				$price = 0;
				$count = 0;

				foreach ($selections as $selection) { 
					$count++;

					CakeLog::write('debug', "GamesController - basket() - count: " . $count);
					CakeLog::write('debug', "GamesController - basket() - $count % 3: " . $count % 3);

					if($count % 3 == 0){
						$selection["price"] = "free";
					}else{
						$selection["price"] = "£1";
						$price++;
					}

					$updatedSelections[] = $selection;
				}

				CakeLog::write('debug', "GamesController - basket() - selection: " . print_r($updatedSelections, true));

				$this->Session->write('selections', $updatedSelections);
				$this->Session->write('totalPrice', $price);


			}
		}

		CakeLog::write('debug', "GamesController - basket() - session selections: " . print_r($this->Session->read('selections'), true));
		
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

		CakeLog::write('debug', "GamesController - confirmation() - insertedGameBalls: " . print_r($insertedGameBalls, true));

		$this->set('insertedGameBalls', $insertedGameBalls);
		
	}


	public function add(){
		$this->set('title_for_page', 'new game');
		$this->set('pageId', 'addGame');

		if($this->request->is('post')) {
			$this->Game->save($this->request->data);
		}

	}
}