<?php
/**
 * @copyright Copyright (c) 2017. ActiveMedia Solutions LLC
 * @author    Rustam Mamadaminov <rmamdaminov@gmail.com>
 */

namespace Longman\TelegramBot\Commands\SystemCommands;

use rustam95\telegram\models\Actions;
use rustam95\telegram\models\AuthorizedChat;
use rustam95\telegram\models\AuthorizedManagerChat;
use rustam95\telegram\models\AuthorizedUsers;
use rustam95\telegram\models\Message;
use rustam95\telegram\models\Usernames;
use rustam95\telegram\TelegramVars;
use Longman\TelegramBot\Conversation;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Commands\SystemCommand;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * Generic message command
 */
class GenericmessageCommand extends SystemCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'Genericmessage';
    protected $description = 'Handle generic message';
    protected $version = '1.0.2';
    protected $need_mysql = false;
    /**#@-*/

    /**
     * Execution if MySQL is required but not available
     *
     * @return boolean
     */
    public function executeNoDb()
    {
        //Do nothing
        return Request::emptyResponse();
    }


    /**
     * Execute command
     *
     * @return boolean
     */
    public function execute()
    {
        //Do nothing, just for rewriting default Longman command
        return Request::emptyResponse();
    }
}
