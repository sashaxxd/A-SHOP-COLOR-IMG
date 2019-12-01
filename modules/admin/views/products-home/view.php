<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsHome */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products Homes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-home-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img = $model->getImage();?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'image',
                'value' => "<img src='{$img->getUrl('x300')}'>",
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>


<div class="products-home-links-index">

    <h1>ССЫЛКИ ДЛЯ ЭТОГО РАЗДЕЛА</h1>

    <p>
        <?= Html::a('Создать', ['/admin/products-home-links/create' , 'parent_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>


    <?= \yii\grid\GridView::widget([
        'dataProvider' => $links,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'parent_id',
//            'name',
//            'link',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],



        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_id',
            'name',
            'link',

            ['class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'update' => function ($url, $model, $key)  {

                        return Html::a('', ['/admin/products-home-links/update' , 'id'=> $key], ['class' => 'glyphicon glyphicon-pencil']);

                    },
                    'view' => function ($url, $model, $key)   {

                        return Html::a('', ['/admin/products-home-links/view', 'id'=> $key], ['class' => 'glyphicon glyphicon-eye-open']);

                    },
                    'delete' => function ($url, $model, $key)   {

                        return Html::a('', ['/admin/products-home-links/delete', 'id'=> $key], ['class' => 'glyphicon glyphicon-trash']);

                    },

                ], 'template' => '{view}{update}{delete}']
        ],
    ]); ?>


</div>
