<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "order".
 *
 * @property string $id
 * @property string $created_at
 * @property string $updated_at
 * @property double $qty
 * @property double $sum
 * @property string $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $payment
 * @property string $delivery
 * @property string $time_with
 * @property string $time_to
 * @property string $sleep
 * @property string $need_check
 */
class Order extends \yii\db\ActiveRecord
{

    public $delivery1 = 0;
    public $payment1 = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty', 'sum'], 'number'],
            [['status', 'payment', 'delivery', 'sleep', 'need_check'], 'string'],
            [['name', 'email', 'phone', 'address', 'time_with', 'time_to'], 'string', 'max' => 255],
        ];
    }


    public function getOrderItems()
    {
        return $this->hasMany(Orderitems::className(), ['order_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Заказ поступил',
            'updated_at' => 'Заказ обработан',
            'qty' => 'Кол-во',
            'sum' => 'Сумма',
            'status' => 'Статус',
            'name' => 'Ф.И.О.',
            'email' => 'Email',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'payment' => 'Способ оплаты',
            'delivery' => 'Способ доставки',
            'time_with' => 'Время со скольки',
            'time_to' => 'Время до скольки',
            'sleep' => 'Ребенок',
            'need_check' => 'Чек',
        ];
    }


    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            OrderItems::deleteAll(['order_id' => $this->id]);

            return true;
        } else {
            return false;
        }
    }
}
