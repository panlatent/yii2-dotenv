<?php

namespace yiithings\dotenv;

use Dotenv\Dotenv;
use Yii;
use yii\base\Component;

class Loader extends Component
{
    /**
     * Load .env file from Yii2 project root directory.
     *
     * @param string $path The path to the directory containing the .env file.
     * @param string $file The name of the .env file.
     * @param bool $overload Overload existing environment variables.
     * @return bool
     */
    public static function load(string $path = '', string $file = '.env', bool $overload = false): bool
    {
        /*
         * Find Composer base directory.
         */
        if ($path === '') {
            if (class_exists('Yii', false)) {
                /*
                 * Usually, the env is used before defining these aliases:
                 * @vendor and @app. So, if you vendor is symbolic link,
                 * Please register @vendor alias in bootstrap file or before
                 * call env function.
                 */
                if (Yii::getAlias('@vendor', false)) {
                    $vendorDir = Yii::getAlias('@vendor');
                    $path = dirname($vendorDir);
                } elseif (Yii::getAlias('@app', false)) {
                    $path = Yii::getAlias('@app');
                } else {
                    $yiiDir = Yii::getAlias('@yii');
                    $path = dirname($yiiDir, 3);
                }
            } else {
                if (defined('VENDOR_PATH')) {
                    $vendorDir = VENDOR_PATH;
                } else {
                    /*
                     * If not found Yii class, will use composer vendor directory
                     * structure finding.
                     *
                     * Notice: this method are not handled process symbolic link!
                     */
                    $vendorDir = dirname(__FILE__, 4);
                }
                $path = dirname($vendorDir);
            }
        }
        /*
         * Get env file name from environment variable,
         * if COMPOSER_DOTENV_FILE have been set.
         */
        if ($file === '') {
            $file = '.env';
        }

        /*
         * This program will not force the file to be loaded,
         * if the file does not exist then return.
         */
        if (!file_exists(rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $file)) {
            return false;
        }

        /*
         * Overload or load method by environment variable COMPOSER_DOTENV_OVERLOAD.
         */
        $dotEnv = $overload ? DotEnv::createUnsafeImmutable($path, $file) : Dotenv::createUnsafeMutable($path, $file);
        $dotEnv->load();

        return true;
    }
}
