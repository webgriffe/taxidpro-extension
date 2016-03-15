<?php

/**
 * Created by PhpStorm.
 * User: ddonnini
 * Date: 14/03/16
 * Time: 15.21
 */
class Webgriffe_TaxIdPro_Model_Attribute_Data_Taxcode extends Mage_Eav_Model_Attribute_Data_Text
{
    /**
     * @param string $taxCode
     * @return boolean|array
     */
    public function validateValue($taxCode)
    {
        if ($this->getExtractedData('country_id') !== 'IT') {
            return true;
        }
        $return = $this->checkTaxCode($taxCode);
        return $return === true ?: array($return);
    }

    protected function checkTaxCode($taxCode)
    {
        $helper = Mage::helper('webgriffe_taxidpro');
        $attribute = $this->getAttribute();
        $label = $helper->__($attribute->getStoreLabel());

        if ($taxCode === '') {
            return $helper->__('"%s" is a required value.', $label);
        }

        if (strlen($taxCode) != 16) {
            return $helper->__('"%s" length must be %d characters.', $label, 16);
        }

        $taxCode = strtoupper($taxCode);
        if (preg_match("/^[A-Z0-9]+\$/", $taxCode) != 1) {
            return $helper->__('"%s" must contains only letters and numbers.', $label);
        }

        $s = 0;

        for ($i = 1; $i <= 13; $i += 2) {
            $c = $taxCode[$i];
            if (strcmp($c, "0") >= 0 and strcmp($c, "9") <= 0) {
                $s += ord($c) - ord('0');
            } else {
                $s += ord($c) - ord('A');
            }
        }

        for ($i = 0; $i <= 14; $i += 2) {
            $c = $taxCode[$i];
            switch ($c) {
                case '0':
                    $s += 1;
                    break;
                case '1':
                    $s += 0;
                    break;
                case '2':
                    $s += 5;
                    break;
                case '3':
                    $s += 7;
                    break;
                case '4':
                    $s += 9;
                    break;
                case '5':
                    $s += 13;
                    break;
                case '6':
                    $s += 15;
                    break;
                case '7':
                    $s += 17;
                    break;
                case '8':
                    $s += 19;
                    break;
                case '9':
                    $s += 21;
                    break;
                case 'A':
                    $s += 1;
                    break;
                case 'B':
                    $s += 0;
                    break;
                case 'C':
                    $s += 5;
                    break;
                case 'D':
                    $s += 7;
                    break;
                case 'E':
                    $s += 9;
                    break;
                case 'F':
                    $s += 13;
                    break;
                case 'G':
                    $s += 15;
                    break;
                case 'H':
                    $s += 17;
                    break;
                case 'I':
                    $s += 19;
                    break;
                case 'J':
                    $s += 21;
                    break;
                case 'K':
                    $s += 2;
                    break;
                case 'L':
                    $s += 4;
                    break;
                case 'M':
                    $s += 18;
                    break;
                case 'N':
                    $s += 20;
                    break;
                case 'O':
                    $s += 11;
                    break;
                case 'P':
                    $s += 3;
                    break;
                case 'Q':
                    $s += 6;
                    break;
                case 'R':
                    $s += 8;
                    break;
                case 'S':
                    $s += 12;
                    break;
                case 'T':
                    $s += 14;
                    break;
                case 'U':
                    $s += 16;
                    break;
                case 'V':
                    $s += 10;
                    break;
                case 'W':
                    $s += 22;
                    break;
                case 'X':
                    $s += 25;
                    break;
                case 'Y':
                    $s += 24;
                    break;
                case 'Z':
                    $s += 23;
                    break;
            }
        }

        if (chr($s % 26 + ord('A')) != $taxCode[15]) {
            return $helper->__('"Tax Code" is not valid. The control character does not match.', $label);
        }

        return true;
    }
}
