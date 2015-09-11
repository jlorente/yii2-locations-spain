Yii2 Locations Spain
====================

A Yii2 extension of the jlorente/yii2-locations module that provides the module 
with all the spanish regions and cities.

## Installation

Include the package as dependency under the composer.json file.

To install, either run

```bash
$ php composer.phar require jlorente/yii2-locations-spain "*"
```

or add

```json
...
    "require": {
        // ... other configurations ...
        "jlorente/yii2-locations-spain": "*"
    }
```

to the ```require``` section of your `composer.json` file and run the following 
commands from your project directory.
```bash
$ composer update
```
If you didn't install the jlorente/yii2-locations module previously, you must 
follow its installation process before continuing. The module should have been 
downloaded in the last "composer update" so you must only run its migrations and 
configure it.
```bash
$ ./yii migrate --migrationPath=@vendor/jlorente/yii2-locations-spain/src
```

## License 
Copyright &copy; 2015 José Lorente Martín <jose.lorente.martin@gmail.com>.

Licensed under the MIT license. See LICENSE.txt for details.