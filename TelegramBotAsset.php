<?php
/**
 * @copyright Copyright (c) 2017. ActiveMedia Solutions LLC
 * @author    Rustam Mamadaminov <rmamdaminov@gmail.com>
 */
namespace rustam95\telegram;

use yii\web\AssetBundle;

class TelegramBotAsset extends AssetBundle
{

    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }

    public $css     = [
        'css/telegram.css',
    ];
    public $js      = [
        'js/telegram.js',
        'js/jquery.nicescroll.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
