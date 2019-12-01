<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
<!--    --><?//= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
<!--    --><?//= $form->field($model, 'title2')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'title2')->widget(CKEditor::className(), [
//
//        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
//    ]);
//    ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
