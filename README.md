Yii2 DotEnv
===========
[![Build Status](https://travis-ci.org/yiithings/yii2-dotenv.svg)](https://travis-ci.org/yiithings/yii2-dotenv)
[![Latest Stable Version](https://poser.pugx.org/yiithings/yii2-dotenv/v/stable.svg)](https://packagist.org/packages/yiithings/yii2-dotenv) 
[![Total Downloads](https://poser.pugx.org/yiithings/yii2-dotenv/downloads.svg)](https://packagist.org/packages/yiithings/yii2-dotenv) 
[![Latest Unstable Version](https://poser.pugx.org/yiithings/yii2-dotenv/v/unstable.svg)](https://packagist.org/packages/yiithings/yii2-dotenv)
[![License](https://poser.pugx.org/yiithings/yii2-dotenv/license.svg)](https://packagist.org/packages/yiithings/yii2-dotenv)

PHP DotEnv for Yii2 framework.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yiithings/yii2-dotenv "*"
```

or add

```
"yiithings/yii2-dotenv": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :
```
[
    'db' => [
        'password' => env('DB_PASS'),
    ],
]
```

The env function will autoload .env file, it uses the following search mechanism:

    If there is a Yii class, then pass the alias @vendor or @app or @yii, Otherwise 
    according to the project directory to determine.
    
But, if your application vendor directory is a symbol link and you no registered
@vendor or @app alias before call env function, the project will not working. So
you should set the @vendor alias before calling env function.
