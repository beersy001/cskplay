<?php
/**
 * Static content controller.
 *
 * This file will render views from views/celebrities/
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
class CelebritiesController extends AppController {

	public function viewAll(){
		$this->set('title_for_page', 'Our Celebrities');
		$this->set('pageId','viewAll');

		$this->set('celebrities', $this->Celebrity->getAllCelebrities());
	}

	public function thisMonthsCelebrity() {
		
		$this->set('title_for_page', 'This Months Celebrity');

		$celeb = $this->Celebrity->getCurrentCelebrity();

		$this->set('celebName',$celeb['firstName'] . ' ' . $celeb['surname']);
		$this->set('celebImage',$celeb['firstName'] . $celeb['surname'] . '_large.jpg');
		$this->set('celebText',$celeb['text']);
	}

	public function celebrityAdmin(){
		$this->set('title_for_page', 'Celebrity Admin');

		if(!empty($this->data)){
			$celebrityData = $this->request->data['Celebrity'];

			$celebrityData['_id'] = $celebrityData['month'];

			$this->Celebrity->save($celebrityData);
		}

		$this->set('celebrities', $this->Celebrity->getAllCelebrities());

		if($this->RequestHandler->isAjax()){
			$this->render('listAll','ajax');
		}else{
			//$this->render('listAll');
		}
	}

	public function addCelebrity(){
		$this->set('title_for_page', 'This Months Celebrity');
		
		$this->redirect(array('action' => 'celebrityAdmin'));
	}

	public function editCelebrity(){
		$this->set('title_for_page', 'This Months Celebrity');

		$action = $this->request->data['submitButton'];
		unset($this->request->data['submitButton']);

		$data = $this->request->data['Celebrity'];

		if($action == 'Delete'){
			$this->Celebrity->delete($data['month']);
		}elseif($action == 'Edit'){

			$this->Celebrity->delete($data['month']);
			$data['_id'] = $data['month'];

			$this->Celebrity->save($data);
		}

		$this->redirect(array('action' => 'celebrityAdmin'));
	}

	public function outtakes(){
		$this->set('title_for_page', 'This Months Celebrity');
		$this->set('title_for_page', 'Celebrity Outtakes');
	}

	public function listAll(){
		$this->set('title_for_page', 'Our Celebrities');
		$this->set('pageId','viewAll');

		$this->set('celebrities', $this->Celebrity->getAllCelebrities());
	}


}
