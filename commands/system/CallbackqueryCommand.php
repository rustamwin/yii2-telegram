<?php
/**
 * @copyright Copyright (c) 2017. ActiveMedia Solutions LLC
 * @author    Rustam Mamadaminov <rmamdaminov@gmail.com>
 */

namespace Longman\TelegramBot\Commands\SystemCommands;

use rustam95\telegram\models\AuthorizedManagerChat;
use rustam95\telegram\models\Usernames;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Request;
use Yii;

/**
 * Callback query command
 */
class CallbackqueryCommand extends SystemCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'callbackquery';
    protected $description = 'Reply to callback query';
    protected $version = '1.0.0';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        //Do nothing, just for rewriting default Longman command
        return Request::emptyResponse();
    }
}
