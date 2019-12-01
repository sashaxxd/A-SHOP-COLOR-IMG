<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_filters".
 *
 * @property int $id
 * @property string $name
 * @property int $product_id
 */
class ProductFilters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_filters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['filter_id'], 'required'],
//            [['product_id', 'filter_id'], 'integer'],

        ];
    }


    /**
     * Возвращаем родительские фильтры
     */
//    public function getParent(){
//        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
//    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
//            'filter_id1' => 'фильтр',
//            'product_id' => 'Product ID',
        ];
    }
}
