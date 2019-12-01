<?php


namespace app\models;



use yii\db\ActiveRecord;

class Category extends ActiveRecord
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

    public  static function tableName()
    {
        return 'category';
    }

    /**
     * Возвращаем продукцию
     */
    public function getProducts(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    /**
     * Возвращаем дочерние категории
     */
    public function getChild(){
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }

    /**
     * Возвращаем родительскую категорию
     */
    public function getParent(){
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }


    /**
     * Возвращаем фильтры
     */
    public function getFilters(){
        return $this->hasMany(Filters::className(), ['category_id' => 'id']);
    }


    /**
     * Возвращаем картинку для категории
     */
    public function getImg(){
        return $this->hasOne(\rico\yii2images\models\Image::className(), ['itemId' => 'id']);
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