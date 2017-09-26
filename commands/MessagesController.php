<?php
/**
 * @copyright Copyright (c) 2017. ActiveMedia Solutions LLC
 * @author    Rustam Mamadaminov <rmamdaminov@gmail.com>
 */

namespace rustam95\telegram\commands;

use Longman\TelegramBot\Exception\TelegramException;
use yii\base\UserException;
use yii\console\Controller;
use yii\mongodb\Connection;
use yii\web\Response;

class MessagesController extends Controller
{
    public function actionClean($keep = 7)
    {
        /** @var Connection $mongodb */
        $mongodb = \Yii::$app->mongodb;
        $mongodb->getCollection('tg_messages')->remove(['time < \'' . date("Y-m-d H:i:s", time() - (3600 * 24 * $keep)) . '\'']);
    }

    public function actionSend($message = '')
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $postData['message'] = $message;

        try {
            $result = YiiChatCommand::sendToAuthorized($postData);
        } catch (TelegramException $e){
            throw new UserException('The message is empty');
        }

        return $result;
    }
}
