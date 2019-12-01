<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PodguznikiProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="podguzniki-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'price_sale') ?>

    <?php // echo $form->field($model, 'article') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'sale') ?>

    <?php // echo $form->field($model, 'sklad') ?>

    <?php // echo $form->field($model, 'popular') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'subcat') ?>

    <?php // echo $form->field($model, 'cat') ?>

    <?php // echo $form->field($model, 'razdel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
