<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары на главной';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-home-index">
    <div class="category_dop" style="float: left; padding: 20px; background: #D3D5D3; /* Для старых браузров */
    background: linear-gradient(to top, #fefcea, #D3D5D3); margin-bottom: 20px; border: 1px solid #30A5FF; width: 100%;">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    При добавлении раздела товаров на главную сначала добавьте название раздела и фото, затем добавьте ссылки для этого раздела
                </h2>
            </div>
        </div><!--/.row-->

    </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар на главную', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
