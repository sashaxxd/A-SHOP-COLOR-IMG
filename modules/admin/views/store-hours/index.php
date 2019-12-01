<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Часы работы магазина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-hours-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Create Store Hours', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'content:html',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}',],
        ],
    ]); ?>


</div>
