<?php

/**
 * Created by PhpStorm.
 * User: manuele
 * Date: 04/11/14
 * Time: 16:23
 */
class Webgriffe_TaxIdPro_Block_Fields extends Mage_Core_Block_Template
{
    private $taxCodeEmId = '';

    private $taxCodeId = '';

    private $taxCodeName = '';

    private $vatNumberEmId = '';

    private $vatNumberId = '';

    private $vatNumberName = '';

    private $countryId = '';

    private $isBusinessAddressId = '';

    private $isBusinessAddressName = '';

    private $companyName = '';

    private $companyId = '';

    /**
     * @param string $companyId
     * @return $this
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param string $companyName
     * @return $this
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $countryId
     * @return $this
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param string $isBusinessAddressId
     * @return $this
     */
    public function setIsBusinessAddressId($isBusinessAddressId)
    {
        $this->isBusinessAddressId = $isBusinessAddressId;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsBusinessAddressId()
    {
        return $this->isBusinessAddressId;
    }

    /**
     * @param string $isBusinessAddressName
     * @return $this
     */
    public function setIsBusinessAddressName($isBusinessAddressName)
    {
        $this->isBusinessAddressName = $isBusinessAddressName;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsBusinessAddressName()
    {
        return $this->isBusinessAddressName;
    }

    /**
     * @param string $taxCodeEmId
     * @return $this
     */
    public function setTaxCodeEmId($taxCodeEmId)
    {
        $this->taxCodeEmId = $taxCodeEmId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxCodeEmId()
    {
        return $this->taxCodeEmId;
    }

    /**
     * @param string $taxCodeId
     * @return $this
     */
    public function setTaxCodeId($taxCodeId)
    {
        $this->taxCodeId = $taxCodeId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxCodeId()
    {
        return $this->taxCodeId;
    }

    /**
     * @param string $taxCodeName
     * @return $this
     */
    public function setTaxCodeName($taxCodeName)
    {
        $this->taxCodeName = $taxCodeName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxCodeName()
    {
        return $this->taxCodeName;
    }

    /**
     * @param string $vatNumberEmId
     * @return $this
     */
    public function setVatNumberEmId($vatNumberEmId)
    {
        $this->vatNumberEmId = $vatNumberEmId;
        return $this;
    }

    /**
     * @return string
     */
    public function getVatNumberEmId()
    {
        return $this->vatNumberEmId;
    }

    /**
     * @param string $vatNumberId
     * @return $this
     */
    public function setVatNumberId($vatNumberId)
    {
        $this->vatNumberId = $vatNumberId;
        return $this;
    }

    /**
     * @return string
     */
    public function getVatNumberId()
    {
        return $this->vatNumberId;
    }

    /**
     * @param string $vatNumberName
     * @return $this
     */
    public function setVatNumberName($vatNumberName)
    {
        $this->vatNumberName = $vatNumberName;
        return $this;
    }

    /**
     * @return string
     */
    public function getVatNumberName()
    {
        return $this->vatNumberName;
    }
}
