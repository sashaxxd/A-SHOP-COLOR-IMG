<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>


    <?php $items = \yii\helpers\ArrayHelper::map($pages,'id','name');
    $params = [
        'prompt' => 'Выбрать cтраницу для этого пункта меню',
         'id' => 'Combobox1'
    ] ?>
    <?= $form->field($model, 'parent_id')->dropDownList($items,$params);?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
