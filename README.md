Webgriffe TaxIdPro Extension
============================

Magento 1.x extension which allows italians customers to enter tax and VAT identification numbers.

Installation
------------

Please, use [Magento Composer Installer](https://github.com/Cotya/magento-composer-installer) and add `webgriffe/taxidpro-extension` to your dependencies.

```shell
composer require webgriffe/taxidpro-extension
```

Usage
-----

Edit the following templates of your theme:

* customer/address/edit.phtml
* persistent/checkout/onepage/billing.phtml
* checkout/onepage/billing.phtml
* checkout/onepage/shipping.phtml

In every template replace the `company` field markup with the following code:

```php
<?php echo $this->getChildHtml('webgriffe_taxidpro') ?>
```

If needed, override the template `webgriffe_taxidpro/fields.phtml` to fit the html of your theme.

Credits
-------

Developed by [Webgriffe®](http://webgriffe.com).