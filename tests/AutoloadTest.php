<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class AutoloadTest extends TestCase
{
    public function testDefault()
    {
        putenv('COMPOSER_DOTENV_PATH=' . dirname(__FILE__));
        $this->assertEquals(dirname(__FILE__), getenv('COMPOSER_DOTENV_PATH'));
        $this->autoload();
        $this->assertEquals('admin', env('YII2_DOTENV_USER'));
    }

    private function autoload()
    {
        require __DIR__ . '/../vendor/autoload.php';
    }
}