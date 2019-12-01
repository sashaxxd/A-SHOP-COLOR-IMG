<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <span id="del-right" style="float: right; margin-bottom: 30px;">
        <?= Html::a('Удалить все заказы', ['delete-all'], ['class' => 'btn btn-danger']) ?>
        </span>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at',
//            'updated_at',
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'value' => function($data){

                    return !$data->status ? '<span class="text-danger">Заказ активен</span>' :
                        '<span class="text-success">Заказ обработан</span>';
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'sleep',
                'value' => function($data){

                    return $data->sleep == 1 ? '<span class="text-danger">Может спать ребенок</span>' :
                        '<span class="text-success">Можно звонить в домофон</span>';
                },
                'format' => 'html',
            ],
             'phone',
            [
                'attribute' => 'payment',
                'value' => function($data){

             if($data->payment == 0){
                 return '<span class="text-success">Наличными</span>';
             }
             elseif ($data->payment == 1){
                 return '<span class="text-success">Через терминал</span>';
             }
             elseif($data->payment == 2){
                 return '<span class="text-success">Онлайн оплата</span>';
             }
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'delivery',
                'value' => function($data){

                    return $data->delivery == 1 ? '<span class="text-danger">У вас только курьер</span>' :
                        '<span class="text-success">У вас только курьер</span>';
                },
                'format' => 'html',
            ],
            'time_with',
            'time_to',
            [
                'attribute' => 'need_check',
                'value' => function($data){

                    return $data->need_check == 1 ? '<span class="text-danger">Нужен</span>' :
                        '<span class="text-success">Не нужен</span>';
                },
                'format' => 'html',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
