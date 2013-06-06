<?php
class Webgriffe_TaxIdPro_Block_AddressEdit extends Mage_Customer_Block_Address_Edit
{
	function __construct()
	{
		parent::__construct();	
	}
	
	public function escapeUrl($data)
    {
        return htmlspecialchars($data);
    }
	
	function getFormatsJs($field)
	{
		$taxidFormats = Mage::helper('customer/address')->getConfig($field . '_formats');
		
		$parsedFormats = array();
		$taxidFormats = split(',',$taxidFormats);		
		foreach($taxidFormats as $format) {
			$format = split(':', $format);
			$country = strtoupper($format[0]);
			if(strlen($country) != 2) {
				continue;
			}			
			$fstr = $format[1];			
			if(!preg_match('/[-ANC]+/', $fstr)) {
				continue;
			}			
			$fstr = str_replace('N', '\d', $fstr); //Replace digits
			$fstr = str_replace('A', '[A-Z0-9]', $fstr); //Replace alphanumeric characters
			$fstr = str_replace('C', '[A-Z]', $fstr); //Replace alpha characters			
			
			
			$parsedFormats[$country][] = $fstr;
		}
		
		$formatsJs = 'var isValid = {};'."\r\n";
		foreach($parsedFormats as $country => $formats) {
			$formatsJs .= 'isValid.'.$country.' = ';
			foreach($formats as $i => $format) {
				$formatsJs .= '/^'.$format.'$/.test(v)'.($i == count($formats)-1 ? '' : ' || ');
			}
			$formatsJs .= ';'."\r\n";
		}
		
		return $formatsJs;
	}
	
	function getCountriesJs($field)
	{
		return Mage::helper('customer/address')->getConfig($field . '_countries');	
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