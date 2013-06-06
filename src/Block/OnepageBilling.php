<?php
class Webgriffe_TaxIdPro_Block_OnepageBilling extends Mage_Checkout_Block_Onepage_Billing
{
	function __constructor() 
	{
		parent::__constructor();		
	}
	
	function getFormatsJs($field)
	{		
		$block = new Webgriffe_TaxIdPro_Block_AddressEdit();		
		return $block->getFormatsJs($field);
	}
	
	function getCountriesJs($field)
	{		
		$block = new Webgriffe_TaxIdPro_Block_AddressEdit();
		return $block->getCountriesJs($field);
	}
	
	/**
   * Set path to template used for generating block's output.
   *
   * @param string $template
   * @return Mage_Core_Block_Template
   */
  public function setTemplate($template)
  {
	  	$enabled = Mage::helper('customer/address')->getConfig('taxidpro_enable');
			if($enabled) {
				$template = 'taxidpro/' .$template;				
			}
			
      parent::setTemplate($template);
  }
}
