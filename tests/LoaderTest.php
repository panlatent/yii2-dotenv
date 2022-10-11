<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Yii;
use yiithings\dotenv\Loader;

class LoaderTest extends TestCase
{
    public function testLoad(): void
    {
        require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
        Yii::setAlias('@app', __DIR__);
        $this->assertTrue(Loader::load());
        $this->assertEquals('admin', getenv('YII2_DOTENV_USER'));
    }
}
