<?php
/**
  * @copyright Copyright &copy; Rustam Mamadaminov (RustamWin)
  * @package   telegram
  * Date: 09.06.2017
  */
namespace rustam95\telegram;

use yii\helpers\Html;
use yii\web\Cookie;
use yii\widgets\ActiveForm;
use Yii;

/**
 * Class Telegram
 * @package rustam95\telegram
 */
class TelegramBot extends \yii\base\Widget
{

    public static $tlgrmChatId = null;

    public function init()
    {
        if (empty(\Yii::$app->i18n->translations['tlgrm'])) {
            \Yii::$app->i18n->translations['tlgrm'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => __DIR__ . '/messages',
                //'forceTranslation' => true,
            ];
        }

        parent::init();
    }

    public function run()
    {
        $view = $this->getView();
        TelegramBotAsset::register($view);
        $this->renderInitiateBtn();
    }
    

    private function renderInitiateBtn()
    {
        include (__DIR__ . '/views/default/button.php');
    }

}