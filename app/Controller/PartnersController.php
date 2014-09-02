<?php

App::uses('AppController', 'Controller');

class PartnersController extends AppController {
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('viewAll');
	}


	/********************************************************
	 *		View All									*
	 ********************************************************/
	public function viewAll(){
		$this->set('title_for_page', 'our partners');
		$this->set('pageId', 'our partners');

		$this->set('partners', $this->Partner->find('all'));
	}

	/********************************************************
	 *		add partner										*
	 ********************************************************/
	public function add(){
		$this->set('title_for_page', 'add partner');
		$this->set('pageId', 'add partner');


		if(!empty($this->data['Partner'])){

			$data = $this->request->data;

			$data['Partner']['partnerNameId'] = str_replace(" ", "", strtolower($data['Partner']['name']));
			$this->Partner->save($data);

		}
	}

	/********************************************************
	 *		Profile											*
	 ********************************************************/

	public function profile() {

		$nameId = $this->request->params['named']['partnerNameId'];

		$partner = $this->Partner->getPartnerByNameId($nameId);
			
		if(!empty($partner)){			
			
			$this->set('title_for_page', strtolower($partner['Partner']['name']));
			$this->set('pageId', 'partner profile');

			$this->set('heading1', strtolower($partner['Partner']['heading1']));
			$this->set('textarea1', $partner['Partner']['textarea1']);
			$this->set('videoLink1', $partner['Partner']['videoLink1']);
			$this->set('videoLink2', $partner['Partner']['videoLink2']);
			$this->set('videoLink3', $partner['Partner']['videoLink3']);
			$this->set('partnerLogo', 'partners/' . $nameId . '/logo.png');	

		}
	}
}

?>