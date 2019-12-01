<?php
/**
 * User: noutsasha
 * Date: 11.10.2017
 * Time: 22:02
 */

namespace app\components;


use app\models\Brands;
use yii\base\Widget;

/**
 * Class MultilevelFilters
 */
class BrandsWidget extends Widget
{

    public function run()
    {


        $brands= Brands::find()->limit(10)->all();

        return $this->render('brands',[
            'brands' => $brands,

        ]);
    }

}