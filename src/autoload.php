<?php
/*
 * PHP DotEnv for Yii2 framework
 *
 * Autoload .env at Composer autoloader.
 */

use yiithings\dotenv\Loader;

/*
 * If the environment variable COMPOSER_DOTENV_DISABLE have been set to stop loading.
 */
if (getenv('COMPOSER_DOTENV_DISABLE')) {
    return;
}

/*
 * Prevent duplicate definition of the same name function.
 */
if ( ! function_exists('env')) {
    /**
     * Get a value from environment variable.
     *
     * @param string $name
     * @param bool $default
     * @return array|bool|false|string
     */
    function env($name, $default = false)
    {
        static $loaded = false;
        if ( ! $loaded) {
            Loader::load(
                getenv('COMPOSER_DOTENV_PATH'),
                getenv('COMPOSER_DOTENV_FILE'),
                getenv('COMPOSER_DOTENV_OVERLOAD')
            );
            $loaded = true;
        }
        $value = getenv($name);

        return $value ? $value : $default;
    }
}