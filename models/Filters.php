<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filters".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 */
class Filters extends \yii\db\ActiveRecord
{

    public  $image;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'name'], 'required'],
            [['parent_id'], 'integer'],
            [['category_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }


    /**
     * Возвращаем родительский фильтр
     */
    public function getParent(){
        return $this->hasOne(Filters::className(), ['id' => 'parent_id']);
    }

    /**
     * Возвращаем дочерний фильтр
     */
    public function getChild(){
        return $this->hasMany(Filters::className(), ['parent_id' => 'id']);
    }


    /**
     * Возвращаем категорию фильтра
     */
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }


    /**
     * Возвращаем подфильтры (Для раздела брэнды)
     */

    public function Brands($item){
        $search1 = [];
        foreach ($item->child as $s){
            $search1[] =
                ['value' =>  $s->id, 'name' =>  $s->name]
            ;
        }
        return $search1;
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительский фильтр',
            'category_id' => 'Категория этого флиьтра',
            'name' => 'Название',
            'image' => 'Изображение - загружать только если фильтр БРЕНД!!!',
        ];
    }


    /**
     * метод сработает при удалении главного фильтра - удаляться его дочернии фильтры
     */
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            self::deleteAll(['parent_id' => $this->id]);

            return true;
        } else {
            return false;
        }
    }


    public  function  upload(){
        if($this->validate()){
            $path = 'uploads/store/'. $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path);
            @unlink($path);
            return true;
        }
        else{
            return false;
        }
    }
}
