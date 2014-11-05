Webgriffe TaxIdPro Extension
============================

Installation
------------

Please, use [Magento Composer Installer](https://github.com/magento-hackathon/magento-composer-installer) and add `webgriffe/taxidpro-extension` to your dependencies. Also add this repository to your `composer.json`.

	"repositories": [
        {
            "type": "vcs",
            "url": "git@bitbucket.org:webgriffe/taxidpro-extension.git"
        }
    ]

Usage
-----

Edit the following templates:

* customer/address/edit.phtml
* persistent/checkout/onepage/billing.phtml
* checkout/onepage/billing.phtml
* checkout/onepage/shipping.phtml

Replace the `company` field with the following code:

    <?php echo $this->getChildHtml('webgriffe_taxidpro') ?>

If needed, override the template `webgriffe_taxidpro/fields.phtml` to fit the html of your theme.