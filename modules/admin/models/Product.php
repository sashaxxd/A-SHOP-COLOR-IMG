<?php

namespace app\modules\admin\models;

use app\models\Filters;
use app\models\ProductFilters;
use Yii;

/**
 * This is the model class for table "podguzniki_product".
 *
 * @property string $id
 * @property string $name
 * @property string $content
 * @property string $price
 * @property string $price_sale
 * @property string $article
 * @property int $size
 * @property int $count
 * @property string $keywords
 * @property string $description
 * @property string $sale
 * @property string $sklad
 * @property string $popular
 * @property int $category_id
 * @property int $subcat
 * @property int $cat
 * @property int $razdel
 */
class Product extends \yii\db\ActiveRecord
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
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['content', 'sale', 'sklad', 'popular', 'sale2', 'published'], 'string'],
            [['price', 'price_sale', 'price_one'], 'number'],
            [['size', 'count', 'category_id', 'brands_id'], 'integer'],
            [['name', 'article', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'sklad' => 'Есть на складе',
            'name' => 'Название',
            'content' => 'Описание',
            'price' => 'Цена',
            'price_sale' => 'Цена до скидки',
            'price_one' => 'Цена за шт.',
            'article' => 'Артикул',
            'count' => 'Кол-во в упаковке',
            'keywords' => 'Мета ключевые слова',
            'description' => 'Мета описание',
            'image' => 'Изображение',
            'sale' => 'Распродажа (уцененные товары)',
            'sale2' => 'Акция',
            'popular' => 'Популярный товар',
            'category_id' => 'Категория',
            'size' => 'Размер',
            'published' => 'Товар опубликован на сайте',
            'filters_id' => 'Фильтры',
            'brands_id' => 'Бренд',
        ];
    }


    /**
     * Возвращаем фильтры
     */
    public function getFilters(){
        return $this->hasMany(ProductFilters::className(), ['product_id' => 'id']);
    }




    public  function  upload(){
        if($this->validate()){
            $path = 'upload/store/'. $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path);
            @unlink($path);
            return true;
        }
        else{
            return false;
        }
    }


    /**
     * метод сработает при удалении товара - удаляться его фильтры
     */
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            ProductFilters::deleteAll(['product_id' => $this->id]);

            return true;
        } else {
            return false;
        }
    }


    /**
     * Возвращаем категорию
     */
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

}
