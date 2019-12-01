<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Home */

//$this->name = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Homes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-view">

    <h1>ТЕКСТОВЫЕ БЛОКИ ГЛАВНОЙ</h1>


    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',

            'content:html',
        ],
    ]) ?>

</div>
