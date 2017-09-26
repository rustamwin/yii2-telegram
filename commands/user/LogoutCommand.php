<?php
/**
 * @copyright Copyright (c) 2017. ActiveMedia Solutions LLC
 * @author    Rustam Mamadaminov <rmamdaminov@gmail.com>
 */


namespace Longman\TelegramBot\Commands\UserCommands;

use rustam95\telegram\models\Actions;
use rustam95\telegram\models\AuthorizedChat;
use rustam95\telegram\models\AuthorizedManagerChat;
use rustam95\telegram\models\Usernames;
use rustam95\telegram\TelegramVars;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;
use Yii;

/**
 * User "/logout" command
 */
class LogoutCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'logout';
    protected $description = '';
    protected $usage = '/logout';
    protected $version = '1.0.0';
    
    /**#@-*/

    public function __construct($telegram, $update = NULL)
    {
        $this->description = \Yii::t('tlgrm', 'Logout from the support system.');
        parent::__construct($telegram, $update);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();
        $userId = $message->getFrom()->getId();

        $authChat = AuthorizedManagerChat::findOne($chat_id);
        if (!$authChat){
            $data = [
                'chat_id' => $chat_id,
                'text'    => Yii::t('tlgrm', 'You are not logged in.'),
            ];
        }else{
            $authChat->delete();
            $dbUsername = Usernames::find()->where(['chat_id' => $chat_id])->one();
            if ($dbUsername) $dbUsername->delete();
            $data = [
                'chat_id' => $chat_id,
                'text'    => Yii::t('tlgrm', 'You will no longer receive messages.'),
            ];
        }
        
        return Request::sendMessage($data);
    }
}
