<?php

App::uses('AppController', 'Controller');

class QuestionsController extends AppController {

	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('frequentlyAskedQuestions');
	}
	
	/********************************************************
	 *		Frequently asked questions						*
	 ********************************************************/
	public function frequentlyAskedQuestions(){
		$this->set('title_for_page', 'faqs');
		$this->set('pageId', 'faqs');

		$questions = $this->Question->find('all');

		foreach ($questions as $id => $faq) {
			$categorisedQuestions[$faq['Question']['category']][$faq['Question']['id']] = $faq;
		}

		$this->set('questions',$categorisedQuestions);
	}

	/********************************************************
	 *		add question									*
	 ********************************************************/
	public function addQuestion(){
		$this->set('title_for_page', 'add faq');
		$this->set('pageId', 'add faq');


		if(!empty($this->data['Question'])){

			$this->Question->save($this->request->data['Question']);
		}
	}
}

?>