<?php

namespace app\modules\admin\models;

use app\models\Filters;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property string $parent_id
 * @property string $name
 * @property string $keywords
 * @property string $description
 */
class Category extends \yii\db\ActiveRecord
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
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    public  function getCategory()
    {
        return $this->hasOne(Category::Classname(),['id' => 'parent_id'] );
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'keywords', 'description'], 'string', 'max' => 255],
            [['content'], 'string'],


            [['image'], 'file',  'extensions' => 'png, jpg'],

        ];
    }


    public function getChilds(){
        return $this->hasMany(self::className(), ['parent_id' => 'id']);
    }


    public function getFilters(){
        return $this->hasMany(Filters::className(), ['category_id' => 'id']);
    }

    public static function getCategorys()
    {


        $options = [];
        $sep = '-----';

        $parents = self::find()->where("parent_id = 0")->with('childs')->all();

        foreach ($parents as $root) {
            $options[$root->id] = $root->name;
            foreach ($root->childs as $child)
            {
                $options[$child->id] = $sep . $child->name;
                if (isset($child->childs)){
                    foreach ($child->childs as $two){
                        $options[$two->id] = $sep . $sep . $two->name;
                    }

                }
            }
        }
        return $options;

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ категории',
            'parent_id' => 'Родительская категория',
            'name' => 'Название категории',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание',
            'image' => 'Изображение категории',
            'content' => 'Описание категории',
        ];
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
