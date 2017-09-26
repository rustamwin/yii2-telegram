<?php
/**
 * @copyright Copyright &copy; Rustam Mamadaminov (RustamWin)
 * @package   telegram
 * Date: 09.06.2017
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
