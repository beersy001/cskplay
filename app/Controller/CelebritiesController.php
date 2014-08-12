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

	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('profile', 'outtakes','viewAllOuttakes');
	}

	
	/********************************************************
	 *		View All										*
	 ********************************************************/

	public function viewAll(){
		$this->set('title_for_page', 'our celebrities');
		$this->set('pageId','viewAllCelebrities');

		$this->set('celebrities', $this->Celebrity->getAllCelebrities());
	}


	/********************************************************
	 *		Profile											*
	 ********************************************************/

	public function profile() {

		$this->loadModel('Charity');
		$this->set('pageId', 'celebrityProfile');

		$month = $this->request->params['named']['month'];

		$celeb = $this->Celebrity->getCelebrityByMonth($month);
			
		if(!empty($celeb)){
			$celebNameId = $celeb['Celebrity']['nameId'];
			
			$charity = $this->Charity->getCharityByCelebrity($celebNameId);

			
			$charityNameId = $charity['Charity']['nameId'];

			$this->set('charityNameId', $charityNameId);
			$this->set('charityName', $charity['Charity']['name']);
			$this->set('celeb', $celeb);
			$this->set('celebName', strtolower($celeb['Celebrity']['firstName'] . ' ' . $celeb['Celebrity']['surname']));
			$this->set('realMonth', strtolower(DateTime::createFromFormat('!Ym', $month)->format('F Y')));
			$this->set('image1', 'celebrities/' . $celebNameId . '/image1.jpg');
			$this->set('image2', 'celebrities/' . $celebNameId . '/image2.jpg');
			$this->set('image3', 'celebrities/' . $celebNameId . '/image3.jpg');
			$this->set('image4', 'celebrities/' . $celebNameId . '/image4.jpg');
			$this->set('image5', 'celebrities/' . $celebNameId . '/image5.jpg');
			$this->set('image6', 'celebrities/' . $celebNameId . '/image6.jpg');
			$this->set('image7', 'celebrities/' . $celebNameId . '/image7.jpg');

			$this->set('profileHeading1', $celeb['Celebrity']['profileHeading1']);
			$this->set('profileHeading2', $celeb['Celebrity']['profileHeading2']);
			$this->set('profileTextarea1', $celeb['Celebrity']['profileTextarea1']);
			$this->set('profileTextarea2', $celeb['Celebrity']['profileTextarea2']);
			$this->set('profileVideoLink1', $celeb['Celebrity']['profileVideoLink1']);
			$this->set('profileVideoLink2', $celeb['Celebrity']['profileVideoLink2']);
			$this->set('profileVideoLink3', $celeb['Celebrity']['profileVideoLink3']);

			$this->set('outtakesTitle', strtolower($celeb['Celebrity']['outtakesTitle']));
			$this->set('outtakesHeading1', strtolower($celeb['Celebrity']['outtakesHeading1']));
			$this->set('outtakesHeading2', strtolower($celeb['Celebrity']['outtakesHeading2']));
			$this->set('outtakesHeading3', strtolower($celeb['Celebrity']['outtakesHeading3']));
			$this->set('outtakesTextarea1', strtolower($celeb['Celebrity']['outtakesTextarea1']));
			$this->set('outtakesTextarea2', strtolower($celeb['Celebrity']['outtakesTextarea2']));
			$this->set('outtakesTextarea3', strtolower($celeb['Celebrity']['outtakesTextarea3']));
			$this->set('outtakesVideoLink1', $celeb['Celebrity']['outtakesVideoLink1']);
			$this->set('outtakesVideoLink2', $celeb['Celebrity']['outtakesVideoLink2']);
			$this->set('outtakesVideoLink3', $celeb['Celebrity']['outtakesVideoLink3']);
			$this->set('outtakesVideoLink4', $celeb['Celebrity']['outtakesVideoLink4']);
			$this->set('outtakesQuote1', strtolower($celeb['Celebrity']['outtakesQuote1']));

			$this->set('currentMonth', $celeb['Celebrity']['month']);



			$this->set('charityImage', 'charities/' . $charityNameId . '/logo.png');	

			if($this->RequestHandler->isAjax()){
				$this->view = '/Elements/celebrity/single_profile';
				//$this->render('profile');
			}else{
				$this->render('profile');
			}
		}
	}

	/********************************************************
	 *		Celebrity Admin									*
	 ********************************************************/

	public function celebrityAdmin(){
		$this->set('title_for_page', 'celebrity admin');
		$this->set('pageId', 'celebrityAdmin');

		
		$this->set('celebrities', $this->Celebrity->getAllCelebrities());

		/*
		if($this->RequestHandler->isAjax()){
			$this->render('listAll','ajax');
		}else{
			//$this->render('listAll');
		}
		*/
	}

	/********************************************************
	 *		Add Celebrity 									*
	 ********************************************************/

	public function addCelebrity(){
		$this->set('title_for_page', 'add celebrity');
		$this->set('pageId', 'addCelebrity');

		if(!empty($this->data)){

			$month = $this->request->data['Celebrity']['year']['year'] . $this->request->data['Celebrity']['month']['month'];

			unset($this->request->data['Celebrity']['year']);
			unset($this->request->data['Celebrity']['month']);

			$this->request->data['Celebrity']['month'] = $month;
			$this->request->data['Celebrity']['nameId'] = strtolower($this->request->data['Celebrity']['firstName'] . $this->request->data['Celebrity']['surname']);
			$this->request->data['Celebrity']['charityNameId'] = preg_replace('/\s+/', '', strtolower($this->request->data['Celebrity']['charity']));

			$this->Celebrity->save($this->request->data['Celebrity']);
		}
		
		//$this->redirect(array('action' => 'celebrityAdmin'));
	}

	/********************************************************
	 *		Edit Celebrity 									*
	 ********************************************************/

	public function editCelebrity(){
		$this->set('title_for_page', 'edit celebrity');
		$this->set('pageId', 'editCelebrity');

		$data = $this->request->data['Celebrity'];

		$action = $data['submitButton'];

		print_r($this->request->data);
		
		unset($data['submitButton']);


		if($action == 'Delete'){
			$this->Celebrity->delete($data['month']);
		}elseif($action == 'Save'){

			$this->Celebrity->delete($data['month']);
			$data['_id'] = $data['month'];

			$this->Celebrity->save($data);
		}

		$this->redirect(array('action' => 'celebrityAdmin'));
	}

	/********************************************************
	 *		List All 										*
	 ********************************************************/

	public function listAll(){
		$this->set('title_for_page', 'our celebrities');
		$this->set('pageId','viewAll');

		$this->set('celebrities', $this->Celebrity->getAllCelebrities());
	}


}
