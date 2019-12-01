<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Просмотр заказа № <?= $model->id ?></h1>

    <p>
        <?= Html::a('Редактировать заказ', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'value' => !$model->status ? '<span class="text-danger">Заказ активен</span>' :
                        '<span class="text-success">Заказ обработан</span>',
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
            'name',
//            'email:email',
            'phone',
            'address',

        ],
    ]) ?>

    <?php $items = $model->orderItems; ;

    ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>


                <th>Наименование</th>
                <th>Артикул</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item): ?>
                <tr>

                    <td><a href="<?= Url::to(['/podguzniki-product/view', 'alias' => $item->product_alias]) ?>"><?= $item['name'] ?></a></td>
                    <td><?= $item['article'] ?></td>
                    <td><?= $item['qty_item'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><?= $item['sum_item'] ?></td>
                </tr>
            <?php endforeach ?>

            </tbody>
        </table>
    </div>


</div>
