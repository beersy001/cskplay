<?php

class Partner extends AppModel{
	
	public function getPartnerByNameId($nameId){

		return $this->find('first', array('conditions' => array('Partner.partnerNameId' => $nameId)));
	}

	public function getPartnerNames(){

		return $this->find('all', array('fields' => array('Partner.name', 'Partner.partnerNameId')));
	}

	
}

?>