<?php
require_once 'Mage/Adminhtml/controllers/System/ConfigController.php';

class Webgriffe_TaxIdPro_System_ConfigController
	extends Mage_Adminhtml_System_ConfigController 
{
	
	function saveAction()
	{
		$request = $this->getRequest();
		$post = $request->getPost();
		$groups = $post['groups'];
		
		if($request->getParam('section') == 'customer') {			
			if(!isset($groups['address']['fields']['tax_code_countries'])) {
				$groups['address']['fields']['tax_code_countries']['value'] = array();
			}
			if(!isset($groups['address']['fields']['vat_number_countries'])) {
				$groups['address']['fields']['vat_number_countries']['value'] = array();
			}
			$post['groups'] = $groups;
			$request->setPost($post);	
		}

		parent::saveAction();
	}
}
