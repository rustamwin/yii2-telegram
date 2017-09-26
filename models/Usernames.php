<?php
/**
 * @copyright Copyright (c) 2017. ActiveMedia Solutions LLC
 * @author    Rustam Mamadaminov <rmamdaminov@gmail.com>
 */
namespace rustam95\telegram\models;


/**
 * This is the model class for table "actions".
 *
 * @property integer $chat_id
 * @property string  $user_id
 * @property string  $username
 */
class Usernames extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'tg_usernames';
    }

    public function attributes()
    {
        return [
            '_id',
            'chat_id',
            'user_id',
            'username',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chat_id'], 'required'],
            [['chat_id', 'user_id'], 'integer'],
            [['username'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'chat_id'  => 'User ID',
            'username' => 'username',
        ];
    }
}
