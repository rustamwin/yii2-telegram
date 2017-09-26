<?php
/**
  * @copyright Copyright &copy; Rustam Mamadaminov (RustamWin)
  * @package   telegram
  * Date: 09.06.2017
  */

namespace rustam95\telegram\controllers;


use rustam95\telegram\commands\YiiChatCommand;
use rustam95\telegram\models\Message;
use Longman\TelegramBot\Exception\TelegramException;
use yii\base\UserException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class ChatController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'send-msg' => ['post'],
                    'get-all-messages' => ['post'],
                    'get-last-messages' => ['post'],
                ],
            ],
        ];
    }

    public function actionSendMsg()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $postData = \Yii::$app->request->post();

        try {
            $result = YiiChatCommand::sendToAuthorized($postData);
        } catch (TelegramException $e){
            throw new UserException('The message is empty');
        }
       
        return $result;
    }

    public function actionGetAllMessages()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $session = \Yii::$app->session;
        if($session->has('tg_chat_id')){
            $tlgrmChatId = $session->get('tg_chat_id');
        }else{
            return false;
        }

        try {
            $messages = Message::find()->where(['client_chat_id' => $tlgrmChatId])->asArray()->all();
        } catch (TelegramException $e){
            throw new UserException('Messages load error');
        }
        if (!empty($messages)) return $messages;

        return false;
    }

    public function actionGetLastMessages()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $postData = \Yii::$app->request->post();
        $session = \Yii::$app->session;
        if($session->has('tlg_chat_id')){
            $tlgrmChatId = $session->get('tg_chat_id');
        }else{
            return false;
        }
        try {
            $messages = Message::find()->where(['client_chat_id' => $tlgrmChatId])->andWhere(['>', 'time', $postData['lastMsgTime']])->asArray()->all();
        } catch (TelegramException $e){
            throw new UserException('Messages load error');
        }
        if (!empty($messages)) return $messages;

        return false;
    }
    
}