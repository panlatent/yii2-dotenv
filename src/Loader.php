<?php

namespace yiithings\dotenv;

use Dotenv\Dotenv;
use yii\base\Component;

class Loader extends Component
{
    public static function load($path, $file = '.env', $overload = false)
    {
        /*
         * Find Composer base directory.
         */
        if (empty($path)) {
            $vendorDir = dirname(dirname(dirname(dirname(__FILE__))));
            $path = dirname($vendorDir);
        }
        /*
         * Get env file name from environment variable,
         * if COMPOSER_DOTENV_FILE have been set.
         */
        if (empty($file)) {
            $file = '.env';
        }
        /*
         * This program will not force the file to be loaded,
         * if the file does not exist then return.
         */
        if ( ! file_exists(rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $file)) {
            return false;
        }
        $dotEnv = new DotEnv($path, $file);
        /*
         * Overload or load method by environment variable COMPOSER_DOTENV_OVERLOAD.
         */
        if ($overload) {
            $dotEnv->overload();
        } else {
            $dotEnv->load();
        }

        return true;
    }
}