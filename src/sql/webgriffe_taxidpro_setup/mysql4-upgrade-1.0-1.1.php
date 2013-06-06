<?php
$setup = $this;
$setup->startSetup();

if(version_compare(Mage::getVersion(), '1.4.1.1', '>=')) {
	$attributes = array();
	$attributes[] = Mage::getSingleton('eav/config')->getAttribute('customer_address', 'is_business_address')->getId();
	$attributes[] = Mage::getSingleton('eav/config')->getAttribute('customer_address', 'tax_code')->getId();
	$attributes[] = Mage::getSingleton('eav/config')->getAttribute('customer_address', 'vat_number')->getId();
	
	foreach($attributes as $attributeId) {
		$setup->run("
			INSERT INTO {$this->getTable('customer/form_attribute')} (form_code, attribute_id) VALUES ('adminhtml_customer_address', ".$attributeId.");
		");
		$setup->run("
			INSERT INTO {$this->getTable('customer/form_attribute')} (form_code, attribute_id) VALUES ('customer_address_edit', ".$attributeId.");
		");
		$setup->run("
			INSERT INTO {$this->getTable('customer/form_attribute')} (form_code, attribute_id) values ('customer_register_address', ".$attributeId.");
		");
	}
}

$setup->endSetup();