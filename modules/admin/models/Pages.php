<?php

namespace app\modules\admin\models;

use Yii;
use zxbodya\yii2\galleryManager\GalleryBehavior;
use Imagine\Image\Box;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string $name
 * @property string $content
 */
class Pages extends \yii\db\ActiveRecord
{


//
//    public function behaviors()
//    {
//        return [
//
//            /**
//             * Загрузка галереи
//             */
//            'galleryBehavior' => [
//                'class' => GalleryBehavior::className(),
//                'type' => 'gallery',
//                'extension' => 'jpg',
//                'directory' => Yii::getAlias('@webroot') . '/uploads',
//                'url' => Yii::getAlias('@web') . '/uploads',
//                'versions' => [
//                    'small' => function ($img) {
//                        /** @var ImageInterface $img */
//                        return $img
//                            ->copy()
//                            ->thumbnail(new Box(200, 200));
//                    },
//                    'medium' => function ($img) {
//                        /** @var ImageInterface $img */
//                        $dstSize = $img->getSize();
//                        $maxWidth = 800;
//                        if ($dstSize->getWidth() > $maxWidth) {
//                            $dstSize = $dstSize->widen($maxWidth);
//                        }
//                        return $img
//                            ->copy()
//                            ->resize($dstSize);
//                    },
//                ]
//            ]
//        ];
//    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'content'], 'required'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['alias'], 'string', 'max' => 255],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'name' => 'Название',
            'content' => 'Контент',
        ];
    }


}
