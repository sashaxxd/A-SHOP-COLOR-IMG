<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PodguznikiProduct */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Podguzniki Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="podguzniki-product-view">

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
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category->name;
                }
            ],
            'name',
            'content:html',
            'price',
            'price_sale',
            'price_one',
            'article',
            'size',
            'count',
            'keywords',
            'description',
            'sale',
            'sklad',
            'popular',
            'category_id',


            [
                'attribute' => 'image',
                'value' => "<img src='{$img->getUrl('x300')}'>",
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>




