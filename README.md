Yii2 DotEnv
===========
[![Build Status](https://github.com/panlatent/yii2-dotenv/actions/workflows/tests.yml/badge.svg)](https://github.com/panlatent/yii2-dotenv/actions/workflows/tests.yml)
[![Latest Stable Version](https://poser.pugx.org/yiithings/yii2-dotenv/v/stable.svg)](https://packagist.org/packages/yiithings/yii2-dotenv) 
[![Total Downloads](https://poser.pugx.org/yiithings/yii2-dotenv/downloads.svg)](https://packagist.org/packages/yiithings/yii2-dotenv) 
[![Latest Unstable Version](https://poser.pugx.org/yiithings/yii2-dotenv/v/unstable.svg)](https://packagist.org/packages/yiithings/yii2-dotenv)
[![License](https://poser.pugx.org/yiithings/yii2-dotenv/license.svg)](https://packagist.org/packages/yiithings/yii2-dotenv)

PHP DotEnv for Yii2 framework.

Installation
------------
Then tell [Composer](https://getcomposer.org) to load the extension:

```bash
composer require yiithings/yii2-dotenv
```

Configuration
------------
The extension default load environment variables from `.env` file in your application root directory. You can change 
the file path and name configure in your application entry file:

```php
define('DOTENV_PATH', '/path/to/.env');
define('DOTENV_FILE', '.env');
define('DOTENV_OVERLOAD', false);
```

Usage
-----
Once the extension is installed, simply use it in your code by  :
```
[
    'db' => [
        'username' => env('DB_USERNAME', 'root'),
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
