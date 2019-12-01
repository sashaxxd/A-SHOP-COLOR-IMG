<?php

namespace app\modules\admin\Models;

use Yii;

/**
 * This is the model class for table "enable slider".
 *
 * @property string $enable
 */
class EnableSlider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enabler_s';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enable'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enable' => 'Поставить галочку что бы включить слайдер',
        ];
    }
}
