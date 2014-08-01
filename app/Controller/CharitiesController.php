<?php
App::uses('AppController', 'Controller');


class CharitiesController extends AppController {

	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('viewCelebrityCharities','viewCskCharities','profile');
	}

	/********************************************************
	 *		View All										*
	 ********************************************************/

	public function viewAll(){
		$this->set('title_for_page', 'all charities');
		$this->set('pageId','all charities');

		$allCharities = $this->Charity->getAllCharities();

		$celebCharities = array();
		$cskCharities = array();

		foreach ($allCharities as $id => $charity) {
			if($charity['Charity']['type'] == 'csk'){
				$cskCharities[] = $charity;
			}else if($charity['Charity']['type'] == 'celeb' && isset($charity['Charity']['month'])){
				$celebCharities[$charity['Charity']['month']] = $charity;
			}
		}
		
		krsort($celebCharities);

		$this->set('celebCharities', $celebCharities);
		$this->set('cskCharities', $cskCharities);
	}

	/********************************************************
	 *		View celebrity charities						*
	 ********************************************************/
	public function viewCelebrityCharities(){
		$this->set('title_for_page', 'celebrity charities');
		$this->set('pageId','celebrity charities');

		$charities = $this->Charity->getCharitiesByType('celeb');

		krsort($charities);

		$this->set('charities', $charities);
	}

	/********************************************************
	 *		View CSK charities								*
	 ********************************************************/
	public function viewCskCharities(){
		$this->set('title_for_page', 'csk charities');
		$this->set('pageId','csk charities');

		$charities = $this->Charity->getCharitiesByType('csk');

		krsort($charities);

		$this->set('charities', $charities);
	}


	/********************************************************
	 *		Profile											*
	 ********************************************************/
	public function profile() {

		$charityNameId = $this->request->params['named']['nameId'];
		$charity = $this->Charity->getCharityByNameId($charityNameId);

		$this->set('title_for_page', strtolower($charity['Charity']['name']));
		$this->set('pageId', 'charity profile');

		$this->set('heading1', strtolower($charity['Charity']['heading1']));
		$this->set('heading2', strtolower($charity['Charity']['heading2']));
		$this->set('heading3', strtolower($charity['Charity']['heading3']));
		$this->set('heading4', strtolower($charity['Charity']['heading4']));		

		$this->set('textarea1', $charity['Charity']['textarea1']);
		$this->set('textarea2', $charity['Charity']['textarea2']);
		$this->set('textarea3', $charity['Charity']['textarea3']);
		$this->set('textarea4', $charity['Charity']['textarea4']);

		$this->set('image1', 'charities/' . $charityNameId . '/image1.png');
		$this->set('image2', 'charities/' . $charityNameId . '/image2.png');
		$this->set('image3', 'charities/' . $charityNameId . '/image3.png');
		$this->set('image4', 'charities/' . $charityNameId . '/image4.png');

		$this->set('videoLink', $charity['Charity']['videoLink']);

	}

	public function charityAdmin(){
		$this->set('title_for_page', 'charity admin');
		$this->set('pageId', 'charity admin');

	}

	public function addCharity(){
		$this->set('title_for_page', 'add charity');
		$this->set('pageId', 'add charity');
	
		if(!empty($this->request->data['Charity'])){

			$data = $this->request->data;

			unset($data['Charity']['submitButton']);

			$data['Charity']['nameId'] = str_replace(" ", "", strtolower($data['Charity']['name']));
			$data['Charity']['celebrityNameId'] = str_replace(" ", "", strtolower($data['Charity']['celebrity']));

			$this->Charity->save($data);
		}
		
		$this->redirect(array('action' => 'charityAdmin'));
	}


}

?>