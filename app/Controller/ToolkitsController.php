<?php

App::uses('AppController', 'Controller');

class ToolkitsController extends AppController {

	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow();
	}
	
	/********************************************************
	 *		Index											*
	 ********************************************************/
	public function index(){
		$this->set('title_for_page', 'Toolkit');
		$this->set('pageId', 'Toolkit');
	}

	/********************************************************
	 *		Layouts											*
	 ********************************************************/
	public function layouts(){
		$this->set('title_for_page', 'Toolkit - Layouts');
		$this->set('pageId', 'Toolkit Layouts');
	}

	/********************************************************
	 *		Forms											*
	 ********************************************************/
	public function forms(){
		$this->set('title_for_page', 'Toolkit - Forms');
		$this->set('pageId', 'Toolkit Forms');
	}

	/********************************************************
	 *		Video Background								*
	 ********************************************************/
	public function videoBackground(){
		$this->set('title_for_page', 'Toolkit - Video Background');
		$this->set('pageId', 'Toolkit Video Background');
	}
}

?>