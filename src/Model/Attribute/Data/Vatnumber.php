<?php

/**
 * Created by PhpStorm.
 * User: ddonnini
 * Date: 14/03/16
 * Time: 15.21
 */
class Webgriffe_TaxIdPro_Model_Attribute_Data_Vatnumber extends Mage_Eav_Model_Attribute_Data_Text
{
    /**
     * @param string $vatNumber
     * @return boolean|array
     */
    public function validateValue($vatNumber)
    {
        if (!$this->isItalianAddress() || !$this->isBusinessAddress()) {
            return true;
        }
        if (empty($vatNumber) && !Mage::helper('webgriffe_taxidpro')->isVatNumberRequired()) {
            return true;
        }
        $return = $this->checkVatNumber($vatNumber);
        return $return === true ?: array($return);
    }

    protected function checkVatNumber($vatNumber)
    {
        $helper = Mage::helper('webgriffe_taxidpro');
        $attribute = $this->getAttribute();
        $label = $helper->__($attribute->getStoreLabel());

        if (strlen($vatNumber) != 11) {
            return $helper->__('"%s" length must be %d characters.', $label, 11);
        }

        if (preg_match("/^[0-9]+\$/", $vatNumber) != 1) {
            return $helper->__('"%s" must contains only numbers.', $label);
        }

        if (!$this->validateVatNumberCheckDigit($vatNumber)) {
            return $helper->__('"%s" is not valid. The control character does not match.', $label);
        }

        return true;
    }

    /**
     * @return bool
     */
    private function isItalianAddress()
    {
        return $this->getExtractedData('country_id') === 'IT';
    }

    /**
     * @return mixed
     */
    private function isBusinessAddress()
    {
        return $this->getExtractedData('is_business_address');
    }

    /**
     * @param $vatNumber
     * @return bool
     */
    private function validateVatNumberCheckDigit($vatNumber)
    {
        return Mage::helper('webgriffe_taxidpro')->validateVatNumberCheckDigit($vatNumber);
    }
}
