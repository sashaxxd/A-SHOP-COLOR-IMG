<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Главная страница';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-index">
    <h1>ТЕКСТОВЫЕ БЛОКИ ГЛАВНОЙ</h1>


    <!--    <p>-->
<!--        --><?//= Html::a('Create Home', ['create'], ['class' => 'btn btn-success']) ?>
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
