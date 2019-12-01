<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MultilevelFilters;
/* @var $this yii\web\View */
/* @var $model app\models\Filters */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="filters-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'parent_id')->textInput() ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <?php
    $parents = \app\models\Filters::find()->where(['parent_id' => '0'])->all();
    $cat = new \app\models\Filters();
    $ml = new MultilevelFilters();
    echo $form->field($model, 'parent_id')->dropDownList($ml->makeDropDown($parents , $cat), ['id' => 'cat-id', 'prompt' => 'Создать новый фильтр', 'class' => 'form-control required',
        ]

    );
    ?>

<!--    <div class="form-group field-filters-parent_id has-success">-->
<!--        <label class="control-label" for="filters-parent_id">Родительский фильтр</label>-->
<!--        <select id="filters-parent_id" class="form-control" name="Filters[parent_id]" aria-invalid="false">-->
<!--            <option value="0">Главный фильтр</option>-->
<!--            --><?//= \app\components\FiltersDropWidget::widget(['tpl' => 'select', 'model' => $model]) ?>
<!--        </select>-->
<!--    </div>-->


    <?php
    // получаем все категории
    $category = \app\modules\admin\models\Category::find()->where(['parent_id' => '0'])->all();
    //        ->where(['>','parent_id', 0])->all();

    // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
    $items = \yii\helpers\ArrayHelper::map($category,'id','name');
    //    $params = [
    //        'prompt' => 'Категория для фильтра'
    //    ];
    $c = new \app\models\Category();
    $ml2 = new \app\components\Multilevel();
    echo $form->field($model, 'category_id')->dropDownList(  $ml2->makeDropDown($category , $c), ['id' => 'cat-id2',  'class' => 'form-control required',
        ]

    );
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
