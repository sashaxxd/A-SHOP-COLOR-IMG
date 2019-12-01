<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PodguznikiProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукция';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="podguzniki-product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
//    <?= \richardfan\sortable\SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

//        'sortUrl' => \yii\helpers\Url::to(['sortItem']),

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category->name;
                }
            ],
            'name',
//            'content:ntext',
            'price',
            'price_sale',
            //'article',
            //'size',
            //'count',
            //'keywords',
            //'description',
            //'sale',
            //'sklad',
            //'popular',
            //'category_id',
            //'subcat',
            //'cat',
            //'razdel',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
