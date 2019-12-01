<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Фильтры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filters-index">
    <div class="category_dop" style="float: left; padding: 20px; background: #D3D5D3; /* Для старых браузров */
    background: linear-gradient(to top, #fefcea, #D3D5D3); margin-bottom: 20px; border: 1px solid #30A5FF; width: 100%;">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    В каждую категорию можно добавить до 5 фильтров - кол-во параметров не ограничено
                </h2>
            </div>
        </div><!--/.row-->

    </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать фильтр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= \richardfan\sortable\SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'sortUrl' => \yii\helpers\Url::to(['sortItem']),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'parent_id',
                'value' => function($data){
                    return $data->parent->name ? $data->parent->name : 'Главный фильтр';
                },
            ],
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category->name ? $data->category->name : 'Категория не указанна';
                },
            ],
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
