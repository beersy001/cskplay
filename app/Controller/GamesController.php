<?php
/**
 * Static content controller.
 *
 * This file will render views from views/games/
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
class GamesController extends AppController {

	public function displayGame() {
		$this->loadModel('User');
		$username = $this->Session->read('Auth.User.username');

		$numberOfBallsPlayed = $this->Game->getNumberOfBallsPlayed($username);
		$numberOfBallsRemaining = $this->User->getNumberOfAttemptsRemaining($username);

		$this->set('ballsRemaining', $numberOfBallsRemaining);
		$this->set('ballsPlayed', $numberOfBallsPlayed);
	}

	public function registerSelection(){

		$this->loadModel('User');

		if($this->Session->read('Auth.User.attemptsLeft') != 0){

			$username = $this->Session->read('Auth.User.username');

			$x = $this->request->query['x'];
			$y = $this->request->query['y'];

			$data = array(
				'username' => $username,
				'x' => $x,
				'y' => $y
			);
		
			$this->Game->save($data);

			$user = $this->User->read(null, $username);
			$gameBalls = $user['User']['attemptsLeft'];
			$this->User->saveField('attemptsLeft', $gameBalls - 1);

			$this->Session->write('Auth', $this->User->read(null, $username));

		}

		$this->redirect(array('controller'=>'Games', 'action' => 'displayGame'));

	}
}