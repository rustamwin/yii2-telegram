<?php
/**
 * @copyright Copyright &copy; Rustam Mamadaminov (RustamWin)
 * @package   telegram
 * Date: 09.06.2017
 */
namespace rustam95\telegram\models;

use yii\behaviors\AttributeBehavior;
use yii\mongodb\ActiveRecord;


/**
 * This is the model class for table "actions".
 *
 * @property integer $client_chat_id
 * @property string  $message
 * @property string  $time
 * @property string  $direction
 */
class Message extends \yii\mongodb\ActiveRecord
{
    /*public function behaviors()
    {
        return [
            'class'      => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => 'time',
            ],
            'value'      => time(),
        ];
    }*/

    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'tg_messages';
    }

    public function attributes()
    {

        return [
            '_id',
            'time',
            'client_chat_id',
            'message',
            'direction',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_chat_id'], 'required'],
            //   [['message'], 'string', 'max' => 4100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

        ];
    }
}
