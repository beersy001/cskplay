<?php
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 */
class WinnersController extends AppController {

	/**
	 * Controller name
	 *
	 * @var string
	 */
	public $name = 'Winners';



	/********************************************************
	 *		Winning Spot									*
	 ********************************************************/
	public function winningSpot(){
		$this->set('title_for_page', 'Winning Spot');
		$this->set('pageId', 'winningSpot');

		$this->loadModel('User');
		$this->loadModel('Rank');
		$this->loadModel('Game');
		$this->loadModel('GameBall');


		if($this->request->is('post')) {	

			$data = $this->request->data;
			$month = $this->request->data['Winner']['month'];
			$data['Winner']['_id'] = $month;

			//debug($this->request->data);
			//debug($month);

			$gameballs = array();
			$userSortedGameballs = array();

			foreach ($this->GameBall->getAllGameBallsByMonth($month) as $key => $gameBall) {

				//print_r($gameBall);
				
				$userSortedGameballs[$gameBall['GameBall']['username']][$gameBall['GameBall']['id']] = $gameBall;

				$updatedGameBall = $this->calculateDistances($gameBall, $data['Winner']['xPos'], $data['Winner']['yPos'], $month);
				
				array_push($gameballs, $updatedGameBall);					
			}

			foreach ($userSortedGameballs as $username => $usersGameballs) {

				foreach ($usersGameballs as $gameballId => $gameball) {

				}

			}

			$this->GameBall->saveMany($gameballs);

			$this->Game->endGame($month,$data['Winner']['xPos'],$data['Winner']['yPos']);

			//$this->redirect(array('controller'=>'Winners', 'action' => 'viewWinners'));

		}else{
			if(isset($this->request->params['named']['month'])){
				echo '<script>var date = "' . $this->request->params['named']['month'] . '"</script>';
				$this->set('month',$this->request->params['named']['month']);
				$this->set('typeOfGame','competition');
			}
		}





	}

	private function calculateDistances($gameBall,$x,$y,$month){

		$distanceX = abs($x - $gameBall['GameBall']['x']);
		$distanceY = abs($y - $gameBall['GameBall']['y']);

		$sqrX = ($distanceX > 0) ? pow($distanceX, 2) : 0;
		$sqrY = ($distanceY > 0) ? pow($distanceY, 2) : 0;

		$distanceFromWinningSpot = round(sqrt( $sqrX + $sqrY),1);

		$gameBall['GameBall']['distanceFromWinningSpot'] = $distanceFromWinningSpot;
		$gameBall['GameBall']['winningX'] = $x;
		$gameBall['GameBall']['winningY'] = $y;
		
		return $gameBall;
	}


	private function generateRanks($month, $user){

		$iteration = 0;
		$selections = array();

		foreach ($user['User']['games'][$month]['choices'] as $id => $selection) {
			$iteration++;

			$selection['_id'] = $user['User']['id'] . '_' . $iteration . '_' . $month;
			$selection['month'] = $month;
			$selection['username'] = $user['User']['id'];

			array_push($selections, $selection);
		}

		$this->Rank->saveMany($selections);

		return $selections;
	}

	/********************************************************
	 *		Find a Winner									*
	 ********************************************************/
	private function findWinner($month){

		$this->loadModel('Rank');

		$results = $this->Rank->getTopWinners($month);
		
		return $results;
	}

	/********************************************************
	 *		Find a Winner									*
	 ********************************************************/
	public function viewWinners(){

	}
}