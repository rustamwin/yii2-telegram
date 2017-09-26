<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use rustam95\telegram\models\Actions;
use rustam95\telegram\models\AuthorizedManagerChat;
use rustam95\telegram\models\Usernames;
use rustam95\telegram\TelegramVars;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;
use Yii;

/**
 * User "/login" command
 */
class LoginCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'login';
    protected $description = '';
    protected $usage = '/login';
    protected $version = '1.0.0';

    public function __construct($telegram, $update = NULL)
    {
        $this->description = \Yii::t('tlgrm', 'Login to the support system');
        parent::__construct($telegram, $update);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat = $message->getChat();
        $username = $chat->getFirstName() . ' ' . $chat->getLastName() . ' (@' . $chat->getUsername() . ')';
        $chat_id = $chat->getId();
        $text = /*"CAADAgADigADnNbnCva2H7jmPtUxAg"*/Yii::t('tlgrm', 'Enter passphrase:');
        $userId = $message->getFrom()->getId();
        $authChat = AuthorizedManagerChat::findOne($chat_id);
        if ($authChat) {
            $data = [
                'chat_id' => $chat_id,
                'title' => 'Product',
                'description' => Yii::t('tlgrm', 'You are already logged in as ') . $username,
                'payload' => '1234',
                'provider_token' => '371317599:TEST:268580546',
                'start_parameter'=> '324123d32',
                'currency' => 'UZS',
                'prices' => ['label' => 'Som', 'amount' => 12]
            ];
            return Request::sendMessage($data);
        } else {
            $dbUser = Actions::findOne($chat_id);
            if ($dbUser) {
                $dbUser->action = 'login';
            } else {
                $dbUser = new Actions();
                $dbUser->chat_id = $chat_id;
                $dbUser->action = 'login';
            }
            $dbUser->save();
            $data = [
                'chat_id' => $chat_id,
                'title' => 'Product',
                'description' => Yii::t('tlgrm', 'You are already logged in as ') . $username,
                'payload' => '1234',
                'provider_token' => '371317599:TEST:268580546',
                'start_parameter'=> '1234',
                'currency' => 'UZS',
                'prices' => [['label' => 'tax', 'amount' => 1233]]
            ];

            return Request::send('sendInvoice', $data);

        }
    }
}
