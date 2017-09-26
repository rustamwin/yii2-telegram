<?php
/**
 * @copyright Copyright &copy; Rustam Mamadaminov (RustamWin)
 * @package   telegram
 * Date: 09.06.2017
 */
namespace rustam95\telegram\models;


/**
 * This is the model class for table "authorized_chats".
 *
 * @property integer $chat_id
 * @property integer $client_chat_id
 * @property string  $timestamp
 */
class AuthorizedManagerChat extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'tg_auth_chats';
    }

    public function attributes()
    {
        return [
            '_id',
            'chat_id',
            'client_chat_id',
            'timestamp',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chat_id'], 'required'],
            [['chat_id'], 'integer'],
            [['client_chat_id'], 'string'],
            [['client_chat_id'], 'unique'],
            [['timestamp'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'chat_id' => 'Chat ID',
        ];
    }
}
