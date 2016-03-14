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
        if ($this->getExtractedData('country_id') !== 'IT' || !$this->getExtractedData('is_business_address')) {
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

        $s = 0;
        for ($i = 0; $i <= 9; $i += 2) {
            $s += ord($vatNumber[$i]) - ord('0');
        }

        for ($i = 1; $i <= 9; $i += 2) {
            $c = 2 * (ord($vatNumber[$i]) - ord('0'));
            if ($c > 9) {
                $c = $c - 9;
            }
            $s += $c;
        }

        if ((10 - $s % 10) % 10 != ord($vatNumber[10]) - ord('0')) {
            return $helper->__('"Vat Number" is not valid. The control character does not match.', $label);
        }
        return true;
    }
}
