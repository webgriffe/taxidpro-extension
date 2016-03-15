<?php
$setup = $this;
$setup->startSetup();

$setup->updateAttribute(
	'customer_address',
	'tax_code',
	'data_model',
	'webgriffe_taxidpro/attribute_data_taxcode'
);

$setup->updateAttribute(
	'customer_address',
	'vat_number',
	'data_model',
	'webgriffe_taxidpro/attribute_data_vatnumber'
);

$setup->endSetup();
