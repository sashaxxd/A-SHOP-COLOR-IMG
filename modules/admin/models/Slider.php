<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property string $id
 * @property string $link
 */
class Slider extends \yii\db\ActiveRecord
{
    public $image;


    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['link'], 'required'],
            [['link'], 'string', 'max' => 255],
//            [['title'], 'string', 'max' => 255],
//            [['title2'],'string'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Ссылка',
            'image' => 'Изображение для слайда',
//            'title' => 'Заголовок слайда',
//            'title2' => 'Подзаголовок слайда',
        ];
    }

    public function upload(){
        if($this->validate()){
            $path = 'uploads/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
}
