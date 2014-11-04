<?php
$setup = $this;
$setup->startSetup();

if (version_compare( Mage::getVersion() , '1.3.2.4') > 0) {
	// Update 'sales_flat_order_address' table
	$setup->run("
		ALTER TABLE {$this->getTable('sales_flat_order_address')}
		ADD `is_business_address` INT( 1 ) NOT NULL DEFAULT 0,
		ADD `tax_code` VARCHAR( 25 ) NOT NULL DEFAULT '',
		ADD `vat_number` VARCHAR( 25 ) NOT NULL DEFAULT '';
	");
} else {
	//
	// Flag indicating whether an address is a business one
	//
	$setup->addAttribute(
		'order_address',
		'is_business_address',
			array(			
				'type'			=> 'int',
		    	'label'			=> Mage::helper('webgriffe_taxidpro')->__('Is Business Address'),
				'input'			=> 'select',
				'source'        => 'eav/entity_attribute_source_boolean',
				'visible'		=> true,
				'required'		=> false,
				'default'		=> 0,			
				'sort_order'	=> -50,
		 )
	);
	
	//
	// Tax Code
	//
	$setup->addAttribute(
		'order_address',
		'tax_code',
			array(			
				'type'				=> 'varchar',
		    	'label'				=> Mage::helper('webgriffe_taxidpro')->__('Tax Code'),
				'input'				=> 'text',
				'visible'			=> true,
				'frontend_class'	=> 'validate-tax_code',			
				'required'			=> false,
				'default'			=> '',			
				'sort_order'		=> -40,
		 )
	);
	
	//
	// VAT Number
	//
	$setup->addAttribute(
		'order_address',
		'vat_number',
			array(			
				'type'				=> 'varchar',
		    	'label'				=> Mage::helper('webgriffe_taxidpro')->__('VAT Number'),
				'input'				=> 'text',
				'visible'			=> true,
				'frontend_class'	=> 'validate-vat_number',			
				'required'			=> false,
				'default'			=> '',			
				'sort_order'		=> -30,
		 )
	);
		
}


// Update 'sales_flat_quote_address' table
$setup->run("
	ALTER TABLE {$this->getTable('sales_flat_quote_address')}
	ADD `is_business_address` INT( 1 ) NOT NULL DEFAULT 0,
	ADD `tax_code` VARCHAR( 25 ) NOT NULL DEFAULT '',
	ADD `vat_number` VARCHAR( 25 ) NOT NULL DEFAULT '';
");

//
// Flag indicating whether an address is a business one
//
$setup->addAttribute(
	'customer_address',
	'is_business_address',
		array(			
			'type'			=> 'int',
	    	'label'			=> Mage::helper('webgriffe_taxidpro')->__('Is Business Address'),
			'input'			=> 'select',
			'source'        => 'eav/entity_attribute_source_boolean',
			'visible'		=> true,
			'required'		=> false,
			'default'		=> 0,			
			'sort_order'	=> -50,
	 )
);

//
// Tax Code
//
$setup->addAttribute(
	'customer_address',
	'tax_code',
		array(			
			'type'				=> 'varchar',
	    	'label'				=> Mage::helper('webgriffe_taxidpro')->__('Tax Code'),
			'input'				=> 'text',
			'visible'			=> true,
			'frontend_class'	=> 'validate-tax_code',			
			'required'			=> false,
			'default'			=> '',			
			'sort_order'		=> -40,
	 )
);

//
// VAT Number
//
$setup->addAttribute(
	'customer_address',
	'vat_number',
		array(			
			'type'				=> 'varchar',
	    	'label'				=> Mage::helper('webgriffe_taxidpro')->__('VAT Number'),
			'input'				=> 'text',
			'visible'			=> true,
			'frontend_class'	=> 'validate-vat_number',			
			'required'			=> false,
			'default'			=> '',			
			'sort_order'		=> -30,
	 )
);

$setup->endSetup();
