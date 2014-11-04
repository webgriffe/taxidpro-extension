<?php
/**
 * Created by PhpStorm.
 * User: manuele
 * Date: 04/11/14
 * Time: 16:23
 */

class Webgriffe_TaxIdPro_Block_Fields extends Mage_Core_Block_Template
{
    public function getTaxCodeEmId()
    {
        return 'tax_code-em';
    }

    public function getTaxCodeId()
    {
        return 'tax_code';
    }

    public function getTaxCodeName()
    {
        return 'tax_code';
    }

    public function getVatNumberEmId()
    {
        return 'vat_number-em';
    }

    public function getVatNumberId()
    {
        return 'vat_number';
    }

    public function getVatNumberName()
    {
        return 'vat_number';
    }

    public function getCountryId()
    {
        return 'country';
    }

    public function getIsBusinessAddressId()
    {
        return 'is_business_address';
    }

    public function getIsBusinessAddressName()
    {
        return 'is_business_address';
    }

    public function getCompanyName()
    {
        return 'company';
    }

    public function getCompanyId()
    {
        return 'company';
    }
}
