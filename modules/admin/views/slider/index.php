<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слайдер';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('/js/checkbox.js',  ['depends' => 'app\assets\AdminAsset']);
?>
<div class="slider-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить изображение для слайдера', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



<!--    --><?php //$form = ActiveForm::begin(); ?>
<!--    --><?//= $form->field($EnableSlider, 'enable')->checkbox([ '0', '1', ]) ?>
<!---->
<!--    --><?php //ActiveForm::end(); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'link',
            [
                'attribute' => 'image',
                'value' => function ($data) {
                    $img = $data->getImage();
                    return "<img src='{$img->getUrl('300x')}'>";
                },
                'format' => 'html',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
            ],
        ],
    ]); ?>
</div>
