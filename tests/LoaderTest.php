<?php

use yiithings\dotenv\Loader;

class LoaderTest extends PHPUnit_Framework_TestCase
{
    public function testLoad()
    {
        require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
        Yii::setAlias('@app', __DIR__);
        $this->assertTrue(Loader::load());
        $this->assertEquals('admin', getenv('YII2_DOTENV_USER'));
    }
}
