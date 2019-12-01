<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calls".
 *
 * @property string $id
 * @property int $count
 */
class Calls extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calls';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count'], 'required'],
            [['count'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'count' => 'Count',
        ];
    }

    public function callsCount(){
        $calls = Calls::findOne(1);
        $calls->updateCounters(['count' => 1]);


    }
}
