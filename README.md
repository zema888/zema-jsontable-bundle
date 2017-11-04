JsontableBundle
===============

Symfony2 bundle. Type "jsontable" for symfony-form for display of array type data like table.

Installation
------------

1. Add this bundle to your project in composer.json:

	```
    {
        "require": {
            "zema888/zema-jsontable-bundle": "dev-master",
        }
    }
    ```
    
2. Run the composter to download the bundle:

    php composer.phar update zema888/zema-jsontable-bundle

3. Add address to composer.json

    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/zema888/zema-tree-bundle.git"
        }
    ]
    
4. Register this bundle to your app/AppKernel.php:

    ```
    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            Zema\Bundle\JsontableBundle\ZemaJsontableBundle(),
            // ...
        );
    }
5. Add to twig configuration in config.yml

# Twig Configuration
twig:
    debug:            "%kernel.debug%"
    strict_variables: "%kernel.debug%"
    form:
        resources:
            - 'SonataFormatterBundle:Form:formatter.html.twig'
            - 'ZemaJsontableBundle:Form:jsontable_widget.html.twig'
    
#Usage#

Use widget in your forms (works with SonataAdmin too) to create a simple image field:

->add('arr1', 'jsontable', [
        'label' => 'Name field',
        "required" => false,
        "keys" => ['title','text'],             // array keys 
        "labeles" => [ 'Name', 'description'],  // table columns title
        "fixed_row" => false,                   // true - if you want to fixed the number of rows in the table
        "min" => 5,                             // minimal quantity rows         
        "max" => 6                              // maximal quantity rows    
    ])