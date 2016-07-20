<?php

class Webgriffe_TaxIdPro_Helper_Data extends Mage_Core_Helper_Abstract
{
    const TAX_CODE_MANDATORY_COUNTIES = 'customer/address/specificcountry_taxcode';

    const TAX_VAT_MANDATORY_COUNTRIES = 'customer/address/specificcountry_taxvat';
    
    public function getTaxCodeMandatoryCountries()
    {
        return explode(',', Mage::getStoreConfig(self::TAX_CODE_MANDATORY_COUNTIES));
    }
    
    public function getTaxVatMandatoryCountries()
    {
        return explode(',', Mage::getStoreConfig(self::TAX_VAT_MANDATORY_COUNTRIES));
    }
}
